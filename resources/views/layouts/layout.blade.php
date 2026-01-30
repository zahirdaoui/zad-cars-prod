
    {{-- =================================================================================================== --}}
<!DOCTYPE html>
<html lang="fr" data-bs-theme="light">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  {{-- cdn  --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    {{-- css file --}}
  <link href="{{url('frontapp/css/style.css')}}" rel="stylesheet">

  <title>ZAD CAR</title>
</head>
<body>

  <div class="d-none d-lg-block py-2 bg-dark text-white border-bottom border-secondary">
    <div class="container d-flex justify-content-between small">
      <div>
        <i class="fas fa-phone-alt me-2 text-primary"></i> +212 5 00 00 00 00
        <i class="fas fa-envelope ms-4 me-2 text-primary"></i> zadcars@ezzahir.com
      </div>
      <div>
        <a href="https://ezzahir.com/" class="text-white"><i class="fab fa-facebook-f me-3"></i></a>
        <a href="https://ezzahir.com/" class="text-white"><i class="fab fa-instagram me-3"></i></a>
        <a href="https://ezzahir.com/" class="text-white"><i class="fab fa-whatsapp"></i></a>
      </div>
    </div>
  </div>

  <nav class="navbar navbar-expand-lg sticky-top navbar-dark">
    <div class="container">
      <a class="navbar-brand text-white"href="{{url('index')}}"><span class="text-primary">ZAD</span> CARS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link active"href="{{url('index')}}">Accueil</a></li>
          <li class="nav-item"><a class="nav-link" href="{{url('all-cars')}}">Stock</a></li>
          <li class="nav-item"><a class="nav-link" href="{{url('contact')}}">Contact</a></li>
          <li class="nav-item"><a class="nav-link" href="{{url('about-us')}}">À propos</a></li>
          <li class="nav-item"><a class="nav-link" href="{{url('conditions')}}">conditions</a></li>
        </ul>
      </div>
    </div>
  </nav>
    {{-- 00================================================================== --}}

   @yield('content')

   <!-- start footer -->
  <footer>
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-5">
                <h4 class="text-white mb-4"><span class="text-primary">ZAD</span> CARS</h4>
                <p>Votre partenaire de confiance pour l'achat et la vente de véhicules d'occasion certifiés au Maroc.</p>
                <div class="d-flex gap-3">
                    <a href="#" class="btn btn-outline-light btn-sm rounded-circle"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="btn btn-outline-light btn-sm rounded-circle"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="btn btn-outline-light btn-sm rounded-circle"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-3">
                <h5>Liens Rapides</h5>
                <ul class="list-unstyled">
                    <li><a href="{{url('index')}}" class="text-decoration-none text-white mb-2 d-block">Accueil</a></li>
                    <li><a href="{{url('all-cars')}}" class="text-decoration-none text-white mb-2 d-block">Nos Voitures</a></li>
                    <li><a href="{{url('contact')}}" class="text-decoration-none text-white mb-2 d-block">Contact</a></li>
                    <li><a href="{{url('conditions')}}" class="text-decoration-none text-white mb-2 d-block">conditions</a></li>
                </ul>
            </div>
            <div class="col-lg-4">
                <h5>Galerie</h5>
                <div class="row g-2">
                    <div class="col-4"><img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?auto=format&fit=crop&q=60&w=150" class="img-fluid rounded" alt="car"></div>
                    <div class="col-4"><img src="https://images.unsplash.com/photo-1502877338535-766e1452684a?auto=format&fit=crop&q=60&w=150" class="img-fluid rounded" alt="car"></div>
                    <div class="col-4"><img src="https://images.unsplash.com/photo-1494976388531-d1058494cdd8?auto=format&fit=crop&q=60&w=150" class="img-fluid rounded" alt="car"></div>
                </div>
            </div>
        </div>
        <hr class="my-5 border-secondary">
        <div class="text-center small">
            &copy; 2026 Zad cars Casablanca. Tous droits réservés.
        </div>
    </div>
  </footer>

  <a href="https://wa.me/+212722560011" class="whatsapp-float" target="_blank">
    <i class="fab fa-whatsapp"></i>
  </a>



  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script>
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
  </script>
  
<script>
    $(document).ready(function(){
        $(".vendor-carousel").owlCarousel({
            loop: true,
            margin: 15,
            autoplay: true,
            autoplayTimeout: 2500,
            smartSpeed: 800,
            dots: true,
            responsive: {
                0: { items: 2 },
                576: { items: 3 },
                768: { items: 4 },
                992: { items: 6 }
            }
        });
    });
</script>

</body>
</html>
