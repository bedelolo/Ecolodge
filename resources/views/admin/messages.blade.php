<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Messages</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; background: #f4f7f6; }
        .sidebar { height: 100vh; background: #2c3e50; color: white; position: fixed; width: 250px; z-index: 1000; }
        .sidebar a { color: #bdc3c7; text-decoration: none; padding: 15px 25px; display: block; border-bottom: 1px solid #34495e; transition: 0.3s; }
        .sidebar a:hover, .sidebar a.active { background: #34495e; color: white; }
        .content { margin-left: 250px; padding: 30px; transition: 0.3s; }
        .message-card { background: white; border-radius: 15px; border: none; margin-bottom: 20px; transition: 0.3s; }
        .message-card:hover { transform: scale(1.01); box-shadow: 0 10px 20px rgba(0,0,0,0.05); }

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
        <a href="{{ route('admin.bookings') }}"><i class="fas fa-calendar-check me-2"></i> Réservations</a>
        <a href="{{ route('admin.messages') }}" class="active"><i class="fas fa-envelope me-2"></i> Messages</a>
        <a href="{{ url('/') }}" target="_blank"><i class="fas fa-globe me-2"></i> Voir le site</a>
    </div>

    <div class="content">
        <h2 class="mb-4">Messagerie Clients</h2>
        
        <div class="row">
            @foreach($messages as $msg)
            <div class="col-md-12">
                <div class="card message-card p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h5 class="mb-1">{{ $msg->name }}</h5>
                            <span class="text-primary small"><i class="fas fa-envelope me-1"></i> {{ $msg->email }}</span>
                        </div>
                        <span class="text-muted small">{{ $msg->created_at->diffForHumans() }}</span>
                    </div>
                    <h6 class="text-dark">{{ $msg->subject }}</h6>
                    <p class="text-muted">{{ $msg->message }}</p>
                    <div class="text-end">
                        <button class="btn btn-sm btn-outline-success">Répondre</button>
                        <button class="btn btn-sm btn-outline-danger">Archiver</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="mt-4">
            {{ $messages->links() }}
        </div>
    </div>
</body>
</html>
