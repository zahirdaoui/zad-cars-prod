@extends('layouts.layout')

@section('content')

  <header class="legal-header">
    <div class="container text-center">
      <h1 class="display-5 fw-bold text-secondary">Conditions & Mentions Légales</h1>
    </div>
  </header>

  <div class="container mb-5">
    <div class="row">
      <div class="col-lg-3 d-none d-lg-block">
        <nav class="sidebar-nav">
          <a href="#mentions" class="active">Mentions Légales</a>
          <a href="#utilisation">Conditions d'Utilisation</a>
          <a href="#ventes">Conditions de Vente</a>
          <a href="#donnees">Protection des Données</a>
        </nav>
      </div>

      <div class="col-lg-9">
        
        <section id="mentions">
          <h2 class="conditions-title">1. Mentions Légales</h2>
          <p>Conformément aux dispositions légales en vigueur au Maroc, nous portons à la connaissance des utilisateurs les informations suivantes :</p>
          <ul>
            <li><strong>Dénomination sociale :</strong> ZAD CARS Maroc SARL</li>
            <li><strong>Siège social :</strong>Casablanca, 20250, Maroc</li>
            <li><strong>Identifiant Commun de l’Entreprise (ICE) :</strong> 00000000000000000</li>
            <li><strong>Registre du Commerce :</strong> RC Casablanca n° --------</li>
            <li><strong>Directeur de la publication :</strong> M.----------------</li>
            <li><strong>Hébergement :</strong> Hostinger</li>
          </ul>
        </section>

        <hr>

        <section id="utilisation">
          <h2 class="conditions-title">2. Conditions d'Utilisation</h2>
          <p>L'accès et l'utilisation du site <strong>zad-cars.ezzahir.com</strong> sont soumis aux présentes conditions. En naviguant sur ce site, vous acceptez sans réserve les points suivants :</p>
          <h4 class="conditions-title-secondary">Propriété Intellectuelle</h4>
          <p>L'ensemble du contenu (photos de voitures, textes, logo, design) est la propriété exclusive de ZAD CARS. Toute reproduction, même partielle, sans autorisation préalable est strictement interdite.</p>
          <h4 class="conditions-title-secondary">Exactitude des Informations</h4>
          <p>Bien que nous nous efforcions de maintenir les annonces à jour, les photos et descriptions sont fournies à titre indicatif. Seul le bon de commande signé en agence fait foi.</p>
        </section>

        <hr>

        <section id="ventes">
          <h2 class="conditions-title">3. Conditions de Vente & Réservation</h2>
          <h4 class="conditions-title-secondary">Réservation en ligne</h4>
          <p>La réservation d'un véhicule via le site ne constitue pas une vente définitive. Elle bloque le véhicule pour une durée de 48 heures en attendant la visite physique du client et le versement d'un acompte en agence.</p>
          <h4 class="conditions-title-secondary">Garantie</h4>
          <p>Tous nos véhicules bénéficient d'une garantie minimale de 6 mois couvrant le moteur et la boîte de vitesse, sauf mention contraire précisée sur le contrat de vente.</p>
        </section>

        <hr>

        <section id="donnees">
          <h2 class="conditions-title">4. Protection des Données (loi 09-08)</h2>
          <p>Zad Cars s'engage à protéger vos données personnelles conformément à la <strong>loi marocaine 09-08</strong> relative à la protection des personnes physiques à l'égard du traitement des données à caractère personnel.</p>
          <p>Les informations collectées via nos formulaires (Nom, Téléphone, Email) sont destinées exclusivement à notre service commercial pour le traitement de vos demandes. Vous disposez d'un droit d'accès, de rectification et d'opposition en nous contactant par email.</p>
        </section>

      </div>
    </div>
  </div>

  @endsection