<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Booking;
use App\Models\Message;
use App\Models\Room;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AnalyticsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create an admin user
        $admin = User::create([
            'name' => 'Admin Ecolodge',
            'email' => 'admin@ecolodge.bj',
            'password' => Hash::make('password'),
        ]);

        // Create a regular user
        $user = User::create([
            'name' => 'Koffi Adjoua',
            'email' => 'koffi@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $rooms = Room::all();

        // Generate bookings for the last 6 months
        for ($i = 0; $i < 40; $i++) {
            $room = $rooms->random();
            $monthOffset = rand(0, 5);
            $checkIn = Carbon::now()->subMonths($monthOffset)->subDays(rand(1, 28));
            $checkOut = (clone $checkIn)->addDays(rand(1, 5));
            $guests = rand(1, 4);
            $totalPrice = $room->price * $checkIn->diffInDays($checkOut);
            if ($totalPrice == 0) $totalPrice = $room->price;

            Booking::create([
                'user_id' => $user->id,
                'room_id' => $room->id,
                'customer_name' => $user->name,
                'customer_email' => $user->email,
                'check_in' => $checkIn->toDateString(),
                'check_out' => $checkOut->toDateString(),
                'guests' => $guests,
                'total_price' => $totalPrice,
                'status' => rand(0, 10) > 2 ? 'confirmed' : 'pending',
            ]);
        }

        // Generate some messages
        for ($i = 0; $i < 15; $i++) {
            Message::create([
                'name' => 'Client ' . $i,
                'email' => 'client' . $i . '@example.com',
                'subject' => 'Question about ' . ['booking', 'pricing', 'amenities', 'location'][rand(0, 3)],
                'message' => 'Ceci est un message de test pour les analytics de l\'écolodge.',
                'is_read' => rand(0, 1),
            ]);
        }
    }
}
