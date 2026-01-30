@extends('layouts.layout')

@section('content')
  <header class="about-header">
    <div class="container">
      <h1 class="display-4 fw-bold">Notre Histoire & Nos Engagements</h1>
      <p class="lead">Le leader de la voiture d'occasion certifiée à Casablanca depuis 2010.</p>
    </div>
  </header>

  <section class="py-5 container">
    <div class="row align-items-center g-5 py-5">
      <div class="col-lg-6">
        <h2 class="section-title fw-bold">Plus qu'un simple garage,<br>un partenaire de confiance</h2>
        <p class="lead text-muted">Fondé avec la vision de transformer le marché de l'occasion au Maroc, ZAD CARS s'est imposé comme une référence en matière de qualité et de transparence.</p>
        <p>Nous comprenons que l'achat d'une voiture est une étape importante. C'est pourquoi nous avons éliminé les incertitudes liées à l'occasion en instaurant des standards de contrôle rigoureux. Chaque véhicule qui entre dans notre showroom subit une inspection complète de 150 points.</p>
        <div class="mt-4">
            <div class="d-flex align-items-center mb-3">
                <i class="fas fa-check-circle text-primary me-3 fs-4"></i>
                <span class="fw-bold">Véhicules garantis de 6 à 24 mois</span>
            </div>
            <div class="d-flex align-items-center mb-3">
                <i class="fas fa-check-circle text-primary me-3 fs-4"></i>
                <span class="fw-bold">Solutions de financement sur mesure</span>
            </div>
            <div class="d-flex align-items-center">
                <i class="fas fa-check-circle text-primary me-3 fs-4"></i>
                <span class="fw-bold">Reprise immédiate de votre ancien véhicule</span>
            </div>
        </div>
      </div>
      <div class="col-lg-6">
        <img src="https://images.unsplash.com/photo-1552519507-da3b142c6e3d?auto=format&fit=crop&q=80&w=800" alt="Showroom Royal Cars" class="img-fluid rounded shadow-lg">
      </div>
    </div>
  </section>

  <section class="stat-box">
    <div class="container">
      <div class="row text-center g-4">
        <div class="col-md-3">
          <h2 class="display-5 fw-bold text-primary">15+</h2>
          <p class="mb-0 text-uppercase">Années d'expérience</p>
        </div>
        <div class="col-md-3">
          <h2 class="display-5 fw-bold text-primary">5000+</h2>
          <p class="mb-0 text-uppercase">Voitures vendues</p>
        </div>
        <div class="col-md-3">
          <h2 class="display-5 fw-bold text-primary">100%</h2>
          <p class="mb-0 text-uppercase">Clients satisfaits</p>
        </div>
        <div class="col-md-3">
          <h2 class="display-5 fw-bold text-primary">150</h2>
          <p class="mb-0 text-uppercase">Points de contrôle</p>
        </div>
      </div>
    </div>
  </section>

  <section class="py-5 bg-light">
    <div class="container py-5">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Nos Valeurs Fondamentales</h2>
        <p class="text-muted">Ce qui nous guide au quotidien pour mieux vous servir.</p>
      </div>
      <div class="row g-4">
        <div class="col-md-4 text-center">
          <div class="value-card">
            <div class="icon-box"><i class="fas fa-handshake"></i></div>
            <h4 class="fw-bold">Transparence</h4>
            <p class="text-muted small">Historique complet, kilométrage réel certifié et rapports d'expertise détaillés pour chaque voiture.</p>
          </div>
        </div>
        <div class="col-md-4 text-center">
          <div class="value-card">
            <div class="icon-box"><i class="fas fa-award"></i></div>
            <h4 class="fw-bold">Qualité Premium</h4>
            <p class="text-muted small">Nous ne sélectionnons que les véhicules dans un état irréprochable, avec un entretien suivi.</p>
          </div>
        </div>
        <div class="col-md-4 text-center">
          <div class="value-card">
            <div class="icon-box"><i class="fas fa-users-cog"></i></div>
            <h4 class="fw-bold">Service Client</h4>
            <p class="text-muted small">Un accompagnement de A à Z : de l'essai routier jusqu'à la mutation des documents administratifs.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="py-5 container text-center">
    <div class="py-5">
        <h2 class="fw-bold mb-4">Prêt à trouver votre prochaine voiture ?</h2>
        <p class="mb-5 lead text-muted">Notre équipe d'experts est à votre disposition pour vous conseiller.</p>
        <div class="d-flex justify-content-center gap-3">
            <a href="{{url('all-cars')}}" class="btn btn-primary btn-lg px-5">Voir notre stock</a>
            <a href="{{url('contact')}}" class="btn btn-outline-secondary btn-lg px-5">Nous contacter</a>
        </div>
    </div>
  </section>

@endsection
