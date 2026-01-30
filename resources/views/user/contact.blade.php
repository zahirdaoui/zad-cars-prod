@extends('layouts.layout')

@section('content')


  <header class="contact-header">
    <div class="container">
      <h1 class="display-4 fw-bold">Contactez-nous</h1>
      <p class="lead">Une question ? Un essai ? Notre équipe est à votre écoute.</p>
    </div>
  </header>

  <section class="py-5 mt-n5">
    <div class="container">
      <div class="row g-4 justify-content-center">
        <div class="col-md-4">
          <div class="info-box text-center shadow-sm">
            <div class="icon-circle mx-auto"><i class="fas fa-map-marker-alt"></i></div>
            <h5 class="fw-bold">Notre Siège</h5>
            <p class="text-muted">Casablanca, 20250, Maroc
          </div>
        </div>
        <div class="col-md-4">
          <div class="info-box text-center shadow-sm">
            <div class="icon-circle mx-auto"><i class="fas fa-phone-alt"></i></div>
            <h5 class="fw-bold">Téléphone</h5>
            <p class="text-muted">Fixe: +212 5 00 00 00 00<br>WhatsApp: +212 6 00 00 00 00</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="info-box text-center shadow-sm">
            <div class="icon-circle mx-auto"><i class="fas fa-envelope"></i></div>
            <h5 class="fw-bold">Email</h5>
            <p class="text-muted">contact@ezzahir.com<br>support@ezzahir.com</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="py-5 mb-5">
    <div class="container">
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

@endsection