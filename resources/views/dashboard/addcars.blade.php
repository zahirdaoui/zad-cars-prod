@extends('layouts.dashboard')

@section('ContentDashboard')
<div class="card">
    <div class="card-header text-center">
        <div class="success-message text-center">
            @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session()->get('message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
        </div>


        <strong> Ajouter  Une Voiture</strong>
    </div>
    <div class="card-body card-block">
        <form action="{{ route('admin.add')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">nom de la voiture</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="nomVoiture" name="nomVoiture" placeholder="nom de la voiture" class="form-control">
                    {{-- <small class="form-text text-muted">This is a help text</small> --}}
                    <span style="color: red">@error('nomVoiture') <i class="fa-solid fa-star-of-life fa-1x"></i> Veuillez entrer des données correctes @enderror</span>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">modèle de la voiture</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="modelVoiture" name="modelV" placeholder="modèle de voiture" class="form-control">
                    <span style="color: red">@error('modelV') <i class="fa-solid fa-star-of-life fa-1x"></i> Veuillez entrer des données correctes @enderror</span>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">date de sortie de la voiture</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="number" id="text-input" name="dateVoiture" placeholder="date de sortie de la voiture" class="form-control">
                    <span style="color: red">@error('dateVoiture') <i class="fa-solid fa-star-of-life fa-1x"></i> Veuillez entrer des données correctes @enderror</span>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">numéroter les chevaux</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="number" id="numch" name="numch" placeholder="numéroter les chevaux" class="form-control">
                    <span style="color: red">@error('numch') <i class="fa-solid fa-star-of-life fa-1x"></i> Veuillez entrer des données correctes @enderror</span>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">la distance en KLM</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="number" id="kml" name="kml" placeholder="la distance en KLM" class="form-control">
                    <span style="color: red">@error('kml') <i class="fa-solid fa-star-of-life fa-1x"></i> Veuillez entrer des données correctes @enderror</span>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">le prix</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="number" id="prix" name="prix" placeholder="le prix" class="form-control">
                    <span style="color: red">@error('prix') <i class="fa-solid fa-star-of-life fa-1x"></i> Veuillez entrer des données correctes @enderror</span>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">TVA</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="number" id="tva" name="tva" placeholder="tva" class="form-control">
                    <span style="color: red">@error('tva') <i class="fa-solid fa-star-of-life fa-1x"></i> Veuillez entrer des données correctes @enderror</span>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">ville</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="ville" name="ville" placeholder="ville" class="form-control">
                    <span style="color: red">@error('ville') <i class="fa-solid fa-star-of-life fa-1x"></i> Veuillez entrer des données correctes @enderror</span>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="select" class=" form-control-label">Boîte de vitesses</label>
                </div>
                <div class="col-12 col-md-9">
                    <select name="vitesses" id="select" class="form-control">
                        <option value="0" disabled selected>Please select</option>
                        <option value="manuelle">manuelle</option>
                        <option value="automatique">automatique</option>
                    </select>
                    <span style="color: red">@error('vitesses') <i class="fa-solid fa-star-of-life fa-1x"></i> Veuillez entrer des données correctes @enderror</span>

                </div>
            </div>
           <div class="row form-group">
                <div class="col col-md-3">
                    <label class=" form-control-label">sélectionner </label>
                </div>
                <div class="col col-md-9">
                    <div class="form-check">
                        <div class="radio">
                            <label for="radio1" class="form-check-label ">
                                <input type="radio" id="Essence" name="motor" value="Essence" class="form-check-input">Essence
                            </label>
                        </div>
                        <div class="radio">
                            <label for="radio2" class="form-check-label ">
                                <input type="radio" id="Diesel" name="motor" value="Diesel" class="form-check-input">Diesel
                            </label>
                        </div>
                        <span style="color: red"> @error('motor') <i class="fa-solid fa-star-of-life fa-1x"></i> Veuillez entrer des données correctes @enderror</span>
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="textarea-input" class=" form-control-label">la description </label>
                </div>
                <div class="col-12 col-md-9">
                    <textarea name="details" id="description" rows="9" placeholder="la description..." class="form-control"></textarea>
                    <span style="color: red">@error('details') <i class="fa-solid fa-star-of-life fa-1x"></i> Veuillez entrer des données correctes @enderror</span>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="file-multiple-input" class=" form-control-label">photo cover</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="file" id="file-multiple-input" name="coverphoto" class="form-control-file">
                    <span style="color: red">@error('img_p') <i class="fa-solid fa-star-of-life fa-1x"></i> Veuillez sélectionner une photo de couverture @enderror</span>

                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="file-multiple-input" class=" form-control-label">sélectionner des photos</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="file" id="file-multiple-input" name="img_p[]" multiple class="form-control-file">

                </div>
            </div>
            <button type="submit" class="btn btn-success btn-sm">
                <i class="fa-solid fa-plus"></i> Ajouter
            </button>
        </form>
    </div>
    <div class="card-footer">
    </div>
</div>
</div>
@endsection
