@extends('layouts.layout')

@section('content')

  <div class="container my-5">
    <nav aria-label="breadcrumb" class="mb-4">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('index')}}" class="text-decoration-none text-secondary">Accueil</a></li>
        <li class="breadcrumb-item"><a href="{{url('all-cars')}}" class="text-decoration-none text-secondary">Voitures d'occasion</a></li>
        <li class="breadcrumb-item active">{{$cars->name}}</li>
      </ol>
    </nav>

    <div class="row g-5">
      <div class="col-lg-8">
        <h1 class="fw-bold">{{$cars->name}}</h1>
        <h5 class="text-muted">{{$cars->name_model}}</h5>
        <div class="d-flex">
          <p class="text-muted me-4"><i class="fas fa-map-marker-alt me-2"></i> {{$cars->ville}} </p>
          <p class="text-muted me-4"> <i class="fas fa-calendar me-2"></i> {{$cars->created_at->format('Y.m.d')}}</p>
          <p class="text-muted me-4"><i class="fas fa-calendar me-2"></i>anonce N° {{$cars->id}} </p>
        </div>
        
        
        <div class="mb-4">
          @if (file_exists('dataimg/covercars/'.$cars->cover))
              <img src="{{url('dataimg/covercars/')}}/{{$cars->cover}}"  id="mainView" class="main-img shadow-sm mb-3" alt="{{$cars->name}}">
          @else
             <img src="{{url('dataimg/noimage/no-image.png')}}"  id="mainView" class="main-img shadow-sm mb-3" alt="{{$cars->name}}">
          @endif
          <div class="row g-2">
            @foreach ($cars->images as $item)
              <div class="col-3">
                   <img src="{{url('dataimg/imgcars/')}}/{{$item->img}}" class="thumb-img" onclick="changeImg(this.src)">
              </div>
            @endforeach
          </div>
        </div>

        <div class="card border-0 bg-light p-4 mb-4">
          <h4 class="fw-bold mb-3">Description</h4>
          <p>{{$cars->details}}.</p>
        </div>


         
        <h4 class="fw-bold mb-3">Fiche Technique</h4>
        <div class="row g-3">
          <div class="col-md-6">
            <div class="spec-item">
              <div class="spec-icon"><i class="fas fa-calendar-check"></i></div>
              <div><small class="text-muted d-block">Année</small><strong>{{$cars->date_out}}</strong></div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="spec-item">
              <div class="spec-icon"><i class="fa-solid fa-car-rear"></i></div>
              <div><small class="text-muted d-block">Model</small><strong>{{$cars->name_model}}</strong></div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="spec-item">
              <div class="spec-icon"><i class="fas fa-tachometer-alt"></i></div>
              <div><small class="text-muted d-block">Kilométrage</small><strong>{{$cars->distance_km}} KM</strong></div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="spec-item">
              <div class="spec-icon"><i class="fas fa-gas-pump"></i></div>
              <div><small class="text-muted d-block">Carburant</small><strong>{{$cars->motor}}</strong></div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="spec-item">
              <div class="spec-icon"><i class="fas fa-cogs"></i></div>
              <div><small class="text-muted d-block">Boite de vitesse</small><strong>{{$cars->Gearboxe}}</strong></div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="spec-item">
              <div class="spec-icon"><i class="fas fa-horse"></i></div>
              <div><small class="text-muted d-block">Puissance fiscale</small><strong>{{$cars->horses}} CV</strong></div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="sticky-sidebar">
          <div class="card shadow-sm p-4 border-0">
            <div class="mb-3">
              <span class="badge bg-success mb-2">Occasion Garantie 12 mois</span>
              <div class="price-badge">{{$cars->price}} DH</div>
            </div>
            
            <hr>
            
            <div class="d-grid gap-3">
              <a href="tel:{{$cars->user->number_phone ? $cars->user->number_phone : '+212 625595887'}}" class="btn btn-secondary py-3 fw-bold">
                <i class="fas fa-phone-alt me-2"></i> Appeler le vendeur
              </a>
              <a href="https://wa.me/212{{$cars->user->number_phone ? $cars->user->number_phone : '625595887'}}" class="btn btn-whatsapp py-3 fw-bold">
                <i class="fab fa-whatsapp me-2"></i> Contact WhatsApp
              </a>
              <button class="btn btn-primary py-3 fw-bold" data-bs-toggle="modal" data-bs-target="#modalEssai">
                RESERVER UN ESSAI
              </button>
            </div>

            <div class="mt-4 p-3 border rounded">
              <div class="d-flex align-items-center">
                @if (file_exists('dataimg/adminimg'.$cars->cover))
                   <img src="{{url('dataimg/covercars/')}}/{{$cars->user->name}}"   class="rounded-circle me-3" width="50" alt="Logo vendeur">
                @else
                  <img src="{{url('dataimg/noimage/no-image.png')}}"   class="rounded-circle me-3" width="50" alt="Logo vendeur">
                @endif
                <div>
                  <h6 class="mb-0 fw-bold">Zad Cars Sarl</h6>
                  <small class="text-muted">{{$cars->user->name}}</small>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalEssai" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header border-0">
          <h5 class="modal-title fw-bold">Réserver un essai</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label class="form-label">Nom complet</label>
              <input type="text" class="form-control" placeholder="Ex: Ahmed Benjelloun">
            </div>
            <div class="mb-3">
              <label class="form-label">Téléphone</label>
              <input type="tel" class="form-control" placeholder="06 00 00 00 00">
            </div>
            <div class="mb-3">
              <label class="form-label">Date souhaitée</label>
              <input type="date" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary w-100">Confirmer la demande</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <section class="section-padding bg-light border-top mt-5 py-5">
    <div class="container">
      <div class="d-flex justify-content-between align-items-end mb-4">
        <div>
          <h6 class="text-primary fw-bold text-uppercase mb-1">Suggestions</h6>
          <h2 class="fw-bold mb-0">Véhicules Similaires</h2>
        </div>
        <a href="{{url('all-cars')}}" class="btn btn-outline-secondary btn-sm">Voir tout le stock</a>
      </div>

      <div class="row g-4">
            @php
                $z = 0;
            @endphp
             @foreach ($fcars as $item)
             @php
                 $z++;
             @endphp
             @if($z == 4)
                @break
              @endif

                <div class="col-lg-4 col-md-6">
                  <div class="card car-card shadow-sm border-0 h-100">
                    <div class="car-img-container">

                      @if (file_exists('dataimg/covercars/'.$item->cover))
                            <img src="{{url('dataimg/covercars/')}}/{{$item->cover}}"  class="card-img-top"  alt="{{$item->name }}">
                      @else
                                        <img class="card-img-top"  alt="{{$item->name }}"width="100px" height="100px" src="{{url('dataimg/noimage/no-image.png')}}">
                      @endif
                    </div>
                    <div class="card-body p-4">
                      <h6 class="text-muted small mb-1 text-uppercase">{{$item->name}}</h6>
                      <h5 class="card-title fw-bold">{{$item->name_model}}</h5>
                      <div class="d-flex justify-content-between text-muted mb-3 small border-bottom pb-2">
                        <span><i class="fas fa-calendar-alt text-primary me-1"></i> {{$item->date_out}}</span>
                        <span><i class="fas fa-road text-primary me-1"></i> {{$cars->distance_km}} KM</span>
                        <span><i class="fa-solid fa-gear text-primary me-1"></i> {{$cars->Gearboxe}}</span>
                        <span><i class="fas fa-gas-pump text-primary me-1"></i> {{$item->motor}}</span>
                      </div>
                      <div class="d-flex justify-content-between align-items-center">
                        <span class="h5 mb-0 fw-bold text-primary">{{$item->price}} DH</span>
                        <a href="{{url('show')}}/{{$item->id}}" class="btn btn-dark btn-sm rounded-0">Détails</a>
                      </div>
                    </div>
                  </div>
                </div>
          @endforeach
      </div>
    </div>
  </section>
   <script>
    function changeImg(src) {
      document.getElementById('mainView').src = src;
    }
  </script>
@endsection
