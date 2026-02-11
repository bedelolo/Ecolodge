<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('info', 'Veuillez vous connecter pour effectuer une réservation.');
        }

        $validated = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'guests' => 'required|integer|min:1',
        ]);

        $room = Room::findOrFail($validated['room_id']);
        
        // Calculate total price
        $checkIn = Carbon::parse($validated['check_in']);
        $checkOut = Carbon::parse($validated['check_out']);
        $nights = $checkIn->diffInDays($checkOut);
        if ($nights == 0) $nights = 1; // Minimum 1 night
        $totalPrice = $nights * $room->price;

        $booking = Booking::create(array_merge($validated, [
            'user_id' => Auth::id(),
            'total_price' => $totalPrice,
            'status' => 'pending'
        ]));

        return back()->with('success', 'Votre demande de réservation a été enregistrée. Nous vous contacterons bientôt pour la confirmation. Prix total estimé: ' . number_format($totalPrice, 0, ',', ' ') . ' FCFA');
    }

    public function myBookings()
    {
        $bookings = Booking::where('user_id', Auth::id())->with('room')->latest()->get();
        return view('bookings.index', compact('bookings'));
    }

    public function checkAvailability(Request $request)
    {
        $validated = $request->validate([
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
        ]);

        // Just Redirecting to rooms for now with the dates
        return redirect()->route('rooms')->with(['check_in' => $validated['check_in'], 'check_out' => $validated['check_out']]);
    }
}
