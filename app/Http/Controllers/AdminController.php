<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Message;
use App\Models\Post;
use App\Models\Room;
use DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard()
    {
        $bookings_count = Booking::count();
        $messages_count = Message::count();
        $posts_count = Post::count();
        $rooms_count = Room::count();

        $recent_bookings = Booking::with('room')->latest()->take(5)->get();
        $recent_messages = Message::latest()->take(5)->get();

        // Analytics Data
        $monthly_data = Booking::select(
            DB::raw('strftime("%m", check_in) as month'),
            DB::raw('COUNT(id) as count'),
            DB::raw('SUM(total_price) as revenue')
        )
        ->whereYear('check_in', date('Y'))
        ->groupBy('month')
        ->orderBy('month')
        ->get();

        $room_stats = Booking::select('room_id', DB::raw('COUNT(id) as count'))
            ->with('room')
            ->groupBy('room_id')
            ->get();

        return view('admin.dashboard', compact(
            'bookings_count', 
            'messages_count', 
            'posts_count', 
            'rooms_count',
            'recent_bookings',
            'recent_messages',
            'monthly_data',
            'room_stats'
        ));
    }

    public function bookings()
    {
        $bookings = Booking::with(['room', 'user'])->latest()->paginate(15);
        return view('admin.bookings', compact('bookings'));
    }

    public function messages()
    {
        $messages = Message::latest()->paginate(15);
        return view('admin.messages', compact('messages'));
    }
}
