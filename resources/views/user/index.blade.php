@extends('layouts.layout')

@section('content')


{{-- Header --}}
<header class="hero">
    <div class="container">
      <h6 class="text-primary fw-bold text-uppercase">Vente d'occasion premium</h6>
      <h1 class="display-3 mb-4">Trouvez votre voiture d'occasion<br>au meilleur prix à Casablanca</h1>
      <a  href="{{url('all-cars')}}" class="btn btn-primary btn-lg">VOIR NOS ANNONCES</a>
    </div>
</header>

{{-- End header --}}
  <section class="search-container container">
    <div class="search-box">
       <form action="{{ route('all-cars') }}" method="GET"  class="row g-3">
        @csrf
        <div class="col-md-3">
          <select class="form-select border-0 bg-light py-3" name="search_name_cars">
            <option selected>Marque</option>
             @forelse($data_cars_name as $data)
             <option value="{{$data->name}}">{{$data->name}}</option>
            @empty
             <option selected="selected" disabled>no data</option>
            @endforelse
          </select>
        </div>
        <div class="col-md-3">
          <select class="form-select border-0 bg-light py-3" name="search_ville">
            <option selected disabled>Sélectionnez une ville</option>
          @forelse($data_cars_ville as $data )
             <option value="{{$data->ville}}">{{$data->ville}}</option>
          @empty
             <option selected="selected" disabled>no data</option>
          @endforelse
          </select>
        </div>
        <div class="col-md-3">
          <input type="number" name="price_max" class="form-control border-0 bg-light py-3" placeholder="Budget Max (DH)">
        </div>
        <div class="col-md-3">
          <button type="submit" class="btn btn-primary w-100 py-3">RECHERCHER</button>
        </div>
      </form>
    </div>
  </section>
  <!-- end search cars -->
  {{-- Wlcome in zad cars --}}
  <section class="section-padding text-center container">
    <h2 class="mb-4">BIENVENUE CHEZ <span class="text-primary">ZAD CARS</span></h2>
    <div class="row justify-content-center mb-5">
        <div class="col-lg-8">
            <p class="text-muted">Plus de 5 ans d'expertise dans l'automobile d'occasion au Maroc. Nous sélectionnons rigoureusement chaque véhicule pour vous garantir sécurité et sérénité sur la route.</p>
        </div>
    </div>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="p-4 bg-light">
                <i class="fas fa-headset fa-2x text-primary mb-3"></i>
                <h5>Support 24/7</h5>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-4 bg-secondary text-white">
                <i class="fas fa-car fa-2x text-primary mb-3"></i>
                <h5>Réservation en ligne</h5>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-4 bg-light">
                <i class="fas fa-map-marker-alt fa-2x text-primary mb-3"></i>
                <h5>Agences à Casablanca</h5>
            </div>
        </div>
    </div>
  </section>
  {{-- end welcome in zad cars --}}
  <!-- start best number  -->

<!-- end section number -->
{{-- Nos services --}}

  <section id="services" class="section-padding bg-light">
    <div class="container text-center">
        <h2 class="mb-5 text-uppercase">Nos Services</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="bg-white p-5 shadow-sm text-start border-bottom border-primary border-4">
                    <div class="service-icon"><i class="fas fa-key"></i></div>
                    <h4>Location Longue Durée</h4>
                    <p class="text-muted small">Des solutions flexibles pour les entreprises et les particuliers.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-white p-5 shadow-sm text-start border-bottom border-primary border-4">
                    <div class="service-icon"><i class="fas fa-money-check-alt"></i></div>
                    <h4>Financement</h4>
                    <p class="text-muted small">Accompagnement personnalisé pour votre crédit automobile.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-white p-5 shadow-sm text-start border-bottom border-primary border-4">
                    <div class="service-icon"><i class="fas fa-tools"></i></div>
                    <h4>Inspection 150 Points</h4>
                    <p class="text-muted small">Chaque véhicule est contrôlé par nos experts certifiés.</p>
                </div>
            </div>
        </div>
    </div>
  </section>
{{-- end nos services --}}

{{--  --}}

 <section id="voitures" class="section-padding">
    <div class="container text-center">
        <h2 class="mb-5 text-uppercase">Dernières Annonces</h2>
        <div class="row g-4">

           @php
        $x =0;

        @endphp
         @foreach($cars as $item)
            <div class="col-lg-4 col-md-6">
                <div class="car-card card">
                    <div class="car-img-container">
                       @if (file_exists('dataimg/covercars/'.$item->cover))
                        <img src="{{url('dataimg/covercars/')}}/{{$item->cover}}" class="card-img-top" alt="{{$item->name}}">
                        @else
                                <img class="card-img-top" src="{{url('dataimg/noimage/no-image.png')}}">
                        @endif
                      </div>
                    <div class="card-body p-4">
                        <h5 class="card-title fw-bold">{{$item->name}}</h5>
                        <div class="d-flex justify-content-between text-muted mb-3 border-bottom pb-2">
                            <span><i class="fas fa-calendar-alt text-primary me-1"></i> {{$item->date_out}}</span>
                            <span><i class="fas fa-cog text-primary me-1"></i>{{$item->Gearboxe}}</span>
                            <span><i class="fa-solid fa-gas-pump text-primary me-1"></i> {{$item->motor}}</span>
                            <span><i class="fas fa-road text-primary me-1"></i> {{$item->distance_km}}KM</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="price-tag">{{$item->price}}DH</span>
                            <a href="{{url('show')}}/{{$item->id}}" class="btn btn-outline-dark btn-sm">Détails</a>
                        </div>
                    </div>
                </div>
            </div>
             @endforeach

            
           
        </div>
        <div class="mt-5">
            <a href="{{url('all-cars')}}" class="btn btn-primary btn-lg">VOIR TOUT LE STOCK</a>
        </div>
    </div>
  </section>


{{--  --}}
  <!-- end section letest add cars -->
  <!-- start famous car brands-->
  <section class="vendor-section">
    <div class="container">
        <div class="owl-carousel vendor-carousel">
            <div class="vendor-item">
                <img src="{{url('frontapp/images/car6.png')}}" alt="Nissan">
            </div>
            <div class="vendor-item">
                <img src="{{url('frontapp/images/car5.png')}}" alt="BMW">
            </div>
            <div class="vendor-item">
                <img src="{{url('frontapp/images/car4.png')}}" alt="Jaguar">
            </div>
            <div class="vendor-item">
                <img src="{{url('frontapp/images/car3.png')}}" alt="VW">
            </div>
            <div class="vendor-item">
                <img src="{{url('frontapp/images/car2.png')}}" alt="Pontiac">
            </div>
            <div class="vendor-item">
                <img src="{{url('frontapp/images/car1.png')}}" alt="" alt="Mercedes">
            </div>
        </div>
</div>
  </section>
<!-- end famous car brands-->

{{-- ============= --}}
  <section class="bg-secondary-dark text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-9">
                <h2 class="mb-0">Vous souhaitez vendre votre voiture rapidement ?</h2>
                <p class="mb-0 text-white-50">Estimation gratuite en 24h et paiement sécurisé immédiat.</p>
            </div>
            <div class="col-lg-3 text-lg-end mt-4 mt-lg-0">
                <a href="https://wa.me/+212722560011"  class="btn btn-primary btn-lg">ESTIMER MA VOITURE</a>
            </div>
        </div>
    </div>
  </section>
{{-- ==================== --}}
<!-- start contact us -->
  <section class="py-5 mb-5">
    <div class="container">
        <h1 class="text-center mb-5">NOUS CONTACTER</h1>
      <div class="row g-5">
        <div class="col-lg-6">
          @if(Session::get('message'))
          <div class="alert alert-success" role="alert">
             Votre message a été envoyé avec succès.
          </div>
          @endif
          <h2 class="fw-bold mb-4">Envoyez-nous un message</h2>
          <form id="contactForm" action="{{ route('contact')}}" method="POST">
            @csrf
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">Nom complet</label>
                <input name="fullName" type="text" class="form-control" placeholder="Ahmed Benjelloun" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Email</label>
                <input name="email" type="email" class="form-control" placeholder="ahmed@mail.com" required>
              </div>
              <div class="col-12">
                <label class="form-label">Téléphone (Optionnel)</label>
                <input name="phone" type="tel" class="form-control" placeholder="06 00 00 00 00">
              </div>
              <div class="col-12">
                <label class="form-label">Sujet</label>
                <select name="subject" class="form-select form-control">
                  <option selected>Achat d'un véhicule</option>
                  <option>Vendre ma voiture</option>
                  <option>Financement & Crédit</option>
                  <option>Autre demande</option>
                </select>
              </div>
              <div class="col-12">
                <label class="form-label">Message</label>
                <textarea name="body" class="form-control" rows="6" placeholder="Comment pouvons-nous vous aider ?" required></textarea>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary">Envoyer le message</button>
              </div>
            </div>
          </form>
        </div>

        <div class="col-lg-6">
          <h2 class="fw-bold mb-4">Où nous trouver</h2>
          <div class="map-container">
            <iframe 
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d53192.85324003233!2d-7.632560!3d33.589163!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda7d2927d0d071b%3A0x67a916943b94090!2sCasablanca!5e0!3m2!1sfr!2sma!4v1700000000000" 
              width="100%" 
              height="100%" 
              style="border:0;" 
              allowfullscreen="" 
              loading="lazy">
            </iframe>
          </div>
          <div class="mt-4">
            <h5 class="fw-bold">Horaires d'ouverture :</h5>
            <div class="d-flex justify-content-between border-bottom py-2">
              <span>Lundi - Vendredi</span>
              <span class="fw-bold">09:00 - 19:00</span>
            </div>
            <div class="d-flex justify-content-between border-bottom py-2">
              <span>Samedi</span>
              <span class="fw-bold">09:00 - 16:00</span>
            </div>
            <div class="d-flex justify-content-between py-2 text-danger">
              <span>Dimanche</span>
              <span class="fw-bold">Fermé</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<!-- end contact us -->
@endsection
