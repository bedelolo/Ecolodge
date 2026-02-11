<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Réservations</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; background: #f4f7f6; }
        .sidebar { height: 100vh; background: #2c3e50; color: white; position: fixed; width: 250px; z-index: 1000; }
        .sidebar a { color: #bdc3c7; text-decoration: none; padding: 15px 25px; display: block; border-bottom: 1px solid #34495e; transition: 0.3s; }
        .sidebar a:hover, .sidebar a.active { background: #34495e; color: white; }
        .content { margin-left: 250px; padding: 30px; transition: 0.3s; }
        .table-container { background: white; border-radius: 15px; padding: 25px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }

        @media (max-width: 992px) {
            .sidebar { width: 100%; height: auto; position: relative; }
            .content { margin-left: 0; padding: 15px; }
            .sidebar a { display: inline-block; border-bottom: none; }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="p-4">
            <h4>Ecolodge Admin</h4>
        </div>
        <a href="{{ route('admin.dashboard') }}"><i class="fas fa-chart-line me-2"></i> Analytics</a>
        <a href="{{ route('admin.bookings') }}" class="active"><i class="fas fa-calendar-check me-2"></i> Réservations</a>
        <a href="{{ route('admin.messages') }}"><i class="fas fa-envelope me-2"></i> Messages</a>
        <a href="{{ url('/') }}" target="_blank"><i class="fas fa-globe me-2"></i> Voir le site</a>
    </div>

    <div class="content">
        <h2 class="mb-4">Gestion des Réservations</h2>
        
        <div class="table-container">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Client</th>
                            <th>Email</th>
                            <th>Hébergement</th>
                            <th>Séjour</th>
                            <th>Voyageurs</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $booking)
                        <tr>
                            <td>#{{ $booking->id }}</td>
                            <td><strong>{{ $booking->customer_name }}</strong></td>
                            <td>{{ $booking->customer_email }}</td>
                            <td>{{ $booking->room->name }}</td>
                            <td>
                                <small class="text-muted">Du</small> {{ $booking->check_in }}<br>
                                <small class="text-muted">Au</small> {{ $booking->check_out }}
                            </td>
                            <td>{{ $booking->guests }}</td>
                            <td>{{ number_format($booking->total_price, 0, ',', ' ') }} FCFA</td>
                            <td>
                                <select class="form-select form-select-sm border-0 bg-light" style="width: 120px;">
                                    <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>En attente</option>
                                    <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Confirmée</option>
                                    <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>Annulée</option>
                                </select>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $bookings->links() }}
                </div>
            </div>
        </div>
    </div>
</body>
</html>
