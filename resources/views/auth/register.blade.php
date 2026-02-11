@extends('layouts.master')

@section('content')
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <h2>Inscription</h2>
                <div class="page_link">
                    <a href="{{ url('/') }}">Accueil</a>
                    <a href="{{ route('register') }}">Inscription</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contact_area section_gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card border-0 shadow-lg p-4" style="border-radius: 20px;">
                    <h3 class="text-center mb-4">Créez votre compte</h3>
                    
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name">Nom complet</label>
                            <input type="text" name="name" class="form-control" placeholder="Ex: Jean Dupont" required value="{{ old('name') }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="votre@email.com" required value="{{ old('email') }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Mot de passe</label>
                            <input type="password" name="password" class="form-control" placeholder="Minimum 8 caractères" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="password_confirmation">Confirmer le mot de passe</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmez votre mot de passe" required>
                        </div>
                        <button type="submit" class="main_btn w-100 border-0">S'inscrire</button>
                    </form>
                    
                    <div class="text-center mt-4">
                        <p>Déjà un compte ? <a href="{{ route('login') }}" class="text-primary">Connectez-vous ici</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
