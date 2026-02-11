@extends('layouts.master')

@section('content')
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <h2>Mes Réservations</h2>
                <div class="page_link">
                    <a href="{{ url('/') }}">Accueil</a>
                    <a href="{{ route('bookings.my') }}">Mes Réservations</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contact_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main_title">
                    <h2>Historique de vos séjours</h2>
                    <p>Retrouvez ici toutes vos demandes de réservation passées et en cours.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                @if($bookings->isEmpty())
                    <div class="alert alert-info text-center p-5 border-0 shadow-sm" style="border-radius: 20px;">
                        <i class="fas fa-calendar-times mb-3" style="font-size: 3rem; color: #f3c300;"></i>
                        <h4>Vous n'avez pas encore de réservation.</h4>
                        <p>Découvrez nos magnifiques écolodges et réservez votre prochain séjour !</p>
                        <a href="{{ route('rooms') }}" class="main_btn mt-3">Voir les chambres</a>
                    </div>
                @else
                    <div class="table-responsive shadow-lg p-4 bg-white" style="border-radius: 20px;">
                        <table class="table table-hover align-middle">
                            <thead class="text-secondary text-uppercase small">
                                <tr>
                                    <th>Logement</th>
                                    <th>Dates du séjour</th>
                                    <th>Voyageurs</th>
                                    <th>Prix Total</th>
                                    <th>Statut</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bookings as $booking)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset($booking->room->image) }}" alt="" style="width: 80px; height: 50px; object-fit: cover; border-radius: 8px;" class="mr-3">
                                            <div>
                                                <h6 class="mb-0">{{ $booking->room->name }}</h6>
                                                <span class="text-muted small">{{ $booking->room->type }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="small">
                                            <strong>Du:</strong> {{ \Carbon\Carbon::parse($booking->check_in)->format('d/m/Y') }}<br>
                                            <strong>Au:</strong> {{ \Carbon\Carbon::parse($booking->check_out)->format('d/m/Y') }}
                                        </div>
                                    </td>
                                    <td>{{ $booking->guests }} pers.</td>
                                    <td>
                                        <h6 class="mb-0">{{ number_format($booking->total_price, 0, ',', ' ') }} FCFA</h6>
                                    </td>
                                    <td>
                                        @if($booking->status == 'pending')
                                            <span class="badge badge-warning p-2">En attente</span>
                                        @elseif($booking->status == 'confirmed')
                                            <span class="badge badge-success p-2">Confirmée</span>
                                        @else
                                            <span class="badge badge-danger p-2">Annulée</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-outline-info btn-sm">Détails</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
