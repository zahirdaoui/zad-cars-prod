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
  <section id="contact" class="section-padding container">
    <h2 class="text-center mb-5">NOUS CONTACTER</h2>
    <div class="row g-5">
        <div class="col-lg-7">
            <div class="bg-light p-4">
                <form>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control border-0 py-3" placeholder="Votre Nom">
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control border-0 py-3" placeholder="Votre Email">
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control border-0 py-3" placeholder="Sujet">
                        </div>
                        <div class="col-12">
                            <textarea class="form-control border-0 py-3" rows="5" placeholder="Votre Message"></textarea>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit">ENVOYER LE MESSAGE</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="bg-secondary p-5 text-white h-100">
                <h4 class="mb-4">Informations</h4>
                <div class="d-flex mb-4">
                    <i class="fas fa-map-marker-alt text-primary mt-1 me-3"></i>
                    <p>123 Boulevard d'Anfa, Casablanca, Maroc</p>
                </div>
                <div class="d-flex mb-4">
                    <i class="fas fa-phone-alt text-primary mt-1 me-3"></i>
                    <p>+212 5 00 00 00 00</p>
                </div>
                <div class="d-flex mb-4">
                    <i class="fas fa-envelope text-primary mt-1 me-3"></i>
                    <p>zadcars@ezzahir.ma</p>
                </div>
            </div>
        </div>
    </div>
  </section>

<!-- end contact us -->
@endsection
