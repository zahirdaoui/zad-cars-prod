@extends('layouts.layout')

@section('content')
 <!-- start section Selection -->
 {{--  --}}
  <div class="page-header">
    <div class="container">
      <h1 class="fw-bold">Nos Voitures d'Occasion</h1>
      <p class="mb-0">Explorez notre sélection de véhicules révisés et garantis à Casablanca.</p>
    </div>
  </div>

<section>


</section>
<div class="container mb-5">
    <div class="row g-4">
      
      <aside class="col-lg-3">
        <div class="filter-sidebar">
          <span class="filter-title text-uppercase">faire votre recherche</span>
          
          <form action="{{ route('all-cars')}}" method="GET" id="filterForm">
            <div class="mb-3">
              <label class="form-label">Marque</label>
              <select class="form-select" name="search_name_cars">
              <option  selected disabled>Sélectionnez une marque</option>
               @foreach($data_search_cars['data_cars_name'] as $data )
                    <option value="{{$data->name}}">{{$data->name}}</option>
                @endforeach
              </select>
            </div>

            <div class="mb-3">
              <label class="form-label">Ville</label>
              <select class="form-select" name="search_ville">
                <option  selected disabled>Sélectionnez une ville</option>
                @forEach($data_search_cars['data_cars_ville'] as $data )
                    <option value="{{$data->ville}}">{{$data->ville}}</option>
                @endforeach
              </select>
            </div>

            <div class="mb-3">
              <label class="form-label">Prix Max (DH)</label>
              <input type="range" name="price_max" value="{{$data_search_cars['max_price'] /2 }}" class="form-range" max="{{$data_search_cars['max_price']}}" min="{{$data_search_cars['min_price']}}" step="10000" id="priceRange">
              <div class="d-flex justify-content-between small text-muted">
                <span>{{$data_search_cars['min_price']}}DH</span>
                <span id="priceVal">{{$data_search_cars['max_price']}}</span>
              </div>
            </div>
            <div class="mb-4">
              <label class="form-label">Année minimum</label>
              <select class="form-select">
                <?php echo $data_search_cars['year']?>
                @forEach($data_search_cars['year'] as $data )
                    <option value="{{$data->date_out}}">{{$data->date_out}}</option>
                @endforeach
              </select>
            </div>

            <button type="submit" class="btn btn-primary w-100 mb-2">APPLIQUER LES FILTRES</button>
            <button type="reset" class="btn btn-link w-100 text-muted text-decoration-none small">Réinitialiser</button>
          </form>
        </div>
      </aside>

      <main class="col-lg-9">
        <div class="d-flex justify-content-between align-items-center mb-4 bg-white p-3 rounded shadow-sm">
          <span class="text-muted"><strong class="text-dark">{{ $cars->count() }}</strong> véhicules disponibles</span>
        </div>

        <div class="row g-4">
        @foreach($cars as $item)
          <div class="col-md-6 col-xl-4">
            <div class="car-card-list shadow-sm">
               @if (file_exists('dataimg/covercars/'.$item->cover))
                  <img src="{{url('dataimg/covercars/')}}/{{$item->cover}}" class="card-img-top" alt="{{$item->name}}">
              @else
                <img class="card-img-top"  src="{{url('dataimg/noimage/no-image.png')}}">
              @endif
              <div class="p-3">
                <h6 class="fw-bold mb-1">{{$item->name}}</h6>
                <p class="small text-muted mb-3">{{$item->name_model}}</p>
                <div class="d-flex flex-wrap gap-2 mb-3">
                  <span class="spec-badge">{{$item->date_out}}</span>
                  <span class="spec-badge">{{$item->motor}}</span>
                  <span class="spec-badge">{{$item->distance_km}}K KM</span>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="price-tag">{{$item->price}} DH</span>
                  <a href="{{url('show')}}/{{$item->id}}" class="btn btn-outline-dark btn-sm">Détails</a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
          
          <div class="col-12 mt-4">
            <nav>
                {{ $cars->links('pagination::bootstrap-4') }}
            </nav>
          </div>
        </div>
      </main>

    </div>
  </div>
<script>
    // Mise à jour de la valeur du budget dynamiquement
    const priceRange = document.getElementById('priceRange');
    const priceVal = document.getElementById('priceVal');
    
    priceRange.addEventListener('input', (e) => {
      
      const val = e.target.value;
      if(val > 1000){
            priceVal.textContent = (val/1000) + 'k DH';
      }else{
         priceVal.textContent = val + 'DH';
      }
     
    });
  </script>
@endsection
