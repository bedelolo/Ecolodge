<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Éco-Lodge de la Lagune</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { font-family: 'Inter', sans-serif; background: #f4f7f6; }
        .sidebar { height: 100vh; background: #2c3e50; color: white; position: fixed; width: 250px; z-index: 1000; }
        .sidebar a { color: #bdc3c7; text-decoration: none; padding: 15px 25px; display: block; border-bottom: 1px solid #34495e; transition: 0.3s; }
        .sidebar a:hover, .sidebar a.active { background: #34495e; color: white; }
        .content { margin-left: 250px; padding: 30px; transition: 0.3s; }
        .card-stat { border: none; border-radius: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); transition: 0.3s; margin-bottom: 20px; }
        .card-stat:hover { transform: translateY(-5px); }
        .bg-gradient-primary { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .bg-gradient-success { background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%); }
        .bg-gradient-info { background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); }
        .bg-gradient-warning { background: linear-gradient(135deg, #f6d365 0%, #fda085 100%); }
        .chart-container { background: white; border-radius: 15px; padding: 20px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); margin-bottom: 20px; }
        
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
        <a href="{{ route('admin.dashboard') }}" class="active"><i class="fas fa-chart-line me-2"></i> Analytics</a>
        <a href="{{ route('admin.bookings') }}"><i class="fas fa-calendar-check me-2"></i> Réservations</a>
        <a href="{{ route('admin.messages') }}"><i class="fas fa-envelope me-2"></i> Messages</a>
        <a href="{{ url('/') }}" target="_blank"><i class="fas fa-globe me-2"></i> Voir le site</a>
    </div>

    <div class="content">
        <h2 class="mb-4">Flux de Réservations & Analytics</h2>
        
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card card-stat bg-gradient-primary text-white p-4">
                    <h3>{{ $bookings_count }}</h3>
                    <p class="mb-0">Total Réservations</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-stat bg-gradient-success text-white p-4">
                    <h3>{{ number_format($monthly_data->sum('revenue'), 0, ',', ' ') }}</h3>
                    <p class="mb-0">Revenu Global (FCFA)</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-stat bg-gradient-info text-white p-4">
                    <h3>{{ $messages_count }}</h3>
                    <p class="mb-0">Messages Clients</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-stat bg-gradient-warning text-white p-4">
                    <h3>{{ $rooms_count }}</h3>
                    <p class="mb-0">Chambres Actives</p>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-8">
                <div class="chart-container">
                    <h5>Tendances Mensuelles (Réservations & Revenus)</h5>
                    <canvas id="mainChart"></canvas>
                </div>
            </div>
            <div class="col-md-4">
                <div class="chart-container text-center">
                    <h5>Populatité des Chambres</h5>
                    <canvas id="pieChart"></canvas>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="chart-container">
                    <h5>Dernières Réservations</h5>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Client</th>
                                    <th>Chambre</th>
                                    <th>Arrivée</th>
                                    <th>Prix</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recent_bookings as $booking)
                                <tr>
                                    <td><strong>{{ $booking->customer_name }}</strong></td>
                                    <td>{{ $booking->room->name }}</td>
                                    <td>{{ $booking->check_in }}</td>
                                    <td>{{ number_format($booking->total_price, 0, ',', ' ') }} FCFA</td>
                                    <td><span class="badge bg-{{ $booking->status == 'pending' ? 'warning' : 'success' }}">{{ $booking->status }}</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @php
        $labels = ['Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Aout', 'Sep', 'Oct', 'Nov', 'Dec'];
        $bookedCounts = array_fill(0, 12, 0);
        $revenueData = array_fill(0, 12, 0);
        
        foreach($monthly_data as $data) {
            $idx = intval($data->month) - 1;
            if($idx >= 0 && $idx < 12) {
                $bookedCounts[$idx] = $data->count;
                $revenueData[$idx] = $data->revenue;
            }
        }

        $roomLabels = [];
        $roomCounts = [];
        foreach($room_stats as $stat) {
            $roomLabels[] = $stat->room ? $stat->room->name : 'Inconnu';
            $roomCounts[] = $stat->count;
        }
    @endphp

    <script>
        const ctx = document.getElementById('mainChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    label: 'Nombre de Réservations',
                    data: {!! json_encode($bookedCounts) !!},
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgb(54, 162, 235)',
                    borderWidth: 1,
                    yAxisID: 'y',
                }, {
                    label: 'Revenu (FCFA)',
                    data: {!! json_encode($revenueData) !!},
                    type: 'line',
                    borderColor: 'rgb(255, 99, 132)',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    fill: true,
                    tension: 0.4,
                    yAxisID: 'y1',
                }]
            },
            options: {
                scales: {
                    y: { beginAtZero: true, position: 'left', title: { display: true, text: 'Réservations' } },
                    y1: { beginAtZero: true, position: 'right', grid: { drawOnChartArea: false }, title: { display: true, text: 'Revenu' } }
                }
            }
        });

        const pieCtx = document.getElementById('pieChart').getContext('2d');
        new Chart(pieCtx, {
            type: 'doughnut',
            data: {
                labels: {!! json_encode($roomLabels) !!},
                datasets: [{
                    data: {!! json_encode($roomCounts) !!},
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF']
                }]
            }
        });
    </script>
</body>
</html>
