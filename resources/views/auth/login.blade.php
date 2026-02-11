@extends('layouts.master')

@section('content')
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <h2>Connexion</h2>
                <div class="page_link">
                    <a href="{{ url('/') }}">Accueil</a>
                    <a href="{{ route('login') }}">Connexion</a>
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
                    <h3 class="text-center mb-4">Bon retour parmi nous !</h3>
                    
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="votre@email.com" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="password">Mot de passe</label>
                            <input type="password" name="password" class="form-control" placeholder="********" required>
                        </div>
                        <button type="submit" class="main_btn w-100 border-0">Se connecter</button>
                    </form>
                    
                    <div class="text-center mt-4">
                        <p>Pas encore de compte ? <a href="{{ route('register') }}" class="text-primary">Inscrivez-vous ici</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
