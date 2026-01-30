@extends('layouts.dashboard')

@section('ContentDashboard')
    <div class="card">
        <div class="card-header text-center">
            <strong> modifier</strong>
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
        </div>
        <div class="card-body card-block">
            <form action="{{route('admin.update',"$car->id")}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">nom de la voiture</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="nomVoiture" value="{{$car->name}}" name="nomVoiture" placeholder="nom de la voiture" class="form-control">
                        {{-- <small class="form-text text-muted">This is a help text</small> --}}
                        <span style="color: red">@error('nomVoiture') <i class="fa-solid fa-star-of-life fa-1x"></i> {{$message}} @enderror</span>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">modèle de voiture</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" value="{{$car->name_model}}"  id="modelVoiture" name="modelV" placeholder="modèle de voiture" class="form-control">
                        <span style="color: red">@error('modelV') <i class="fa-solid fa-star-of-life fa-1x"></i> {{$message}} @enderror</span>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">date de sortie de la voiture</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="number" value="{{$car->date_out}}"  id="text-input" name="dateVoiture" placeholder="date de sortie de la voiture" class="form-control">
                        <span style="color: red">@error('dateVoiture') <i class="fa-solid fa-star-of-life fa-1x"></i> {{$message}} @enderror</span>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">numéroter les chevaux</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="number" id="numch" value="{{$car->horses}}" name="numch" placeholder="numéroter les chevaux" class="form-control">
                        <span style="color: red">@error('numch') <i class="fa-solid fa-star-of-life fa-1x"></i> {{$message}} @enderror</span>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">la distance en KLM</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="kml" value="{{$car->distance_km}}" name="kml" placeholder="la distance en KLM" class="form-control">
                        <span style="color: red">@error('kml') <i class="fa-solid fa-star-of-life fa-1x"></i> {{$message}} @enderror</span>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input"  class=" form-control-label">le prix</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="number" id="prix" value="{{$car->price}}" name="prix" placeholder="le prix" class="form-control">
                        <span style="color: red">@error('prix') <i class="fa-solid fa-star-of-life fa-1x"></i> {{$message}} @enderror</span>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">TVA</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="number" id="tva" value="{{$car->tax}}" name="tva" placeholder="tva" class="form-control">
                        <span style="color: red">@error('tva') <i class="fa-solid fa-star-of-life fa-1x"></i> {{$message}} @enderror</span>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">ville</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="ville" value="{{$car->ville}}" name="ville" placeholder="ville" class="form-control">
                        <span style="color: red">@error('ville') <i class="fa-solid fa-star-of-life fa-1x"></i> {{$message}} @enderror</span>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="select" class=" form-control-label">Boîte de vitesses</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select name="vitesses" id="select" class="form-control">
                            <option value="0" disabled>Please select</option>
                            <option value="manuelle" {{ ($car->Gearboxe == "manuelle")? "selected" : "" }} >manuelle</option>
                            <option value="automatique" {{ ($car->Gearboxe == "automatique")? "selected" : "" }}>automatique</option>
                        </select>
                        <span style="color: red">@error('vitesses') <i class="fa-solid fa-star-of-life fa-1x"></i> {{$message}} @enderror</span>

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
                                    <input type="radio" id="Essence" name="motor" {{ ($car->motor == "Essence")? "checked" : "" }} value="Essence" class="form-check-input">Essence
                                </label>
                            </div>
                            <div class="radio">
                                <label for="radio2" class="form-check-label">
                                    <input type="radio" id="Diesel" {{ ($car->motor == "Diesel")? "checked" : "" }} name="motor" value="Diesel" class="form-check-input">Diesel
                                </label>
                            </div>
                            <span style="color: red"> @error('motor') <i class="fa-solid fa-star-of-life fa-1x"></i> {{$message}} @enderror</span>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="textarea-input" class=" form-control-label">la description </label>
                    </div>
                    <div class="col-12 col-md-9">
                        <textarea name="details" id="description" rows="9" placeholder="la description..." class="form-control">{{$car->details}}</textarea>
                        <span style="color: red">@error('details') <i class="fa-solid fa-star-of-life fa-1x"></i> {{$message}} @enderror</span>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="file-multiple-input" class=" form-control-label">photo cover</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="file" id="file-multiple-input" name="coverphoto" class="form-control-file">
                        <span style="color: red">@error('img_p') <i class="fa-solid fa-star-of-life fa-1x"></i> {{$message}} @enderror</span>

                    </div>
                </div>
               <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="file-multiple-input" class=" form-control-label">sélectionner des photos</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="file" id="file-multiple-input" name="img_p[]" multiple class="form-control-file">
                        <span style="color: red">@error('img_p') <i class="fa-solid fa-star-of-life fa-1x"></i> {{$message}} @enderror</span>

                    </div>
                </div>
                <button type="submit" class="btn btn-success btn-sm">
                    <i class="fas fa-save"></i> Save
                </button>
            </form>
        </div>
        <h3 class="images-edit-cars text-center">supprimer des images</h3>
        <div>
            <p class="text-info text-center my-4">S'il vous plaît, avant de supprimer une image, enregistrez les données précédentes</p>
            <div class="image-cover-cars-delete ml-5 py-5">
                <h2 class="py-4">couverture d'image</h2>
                <table class="table table-hover table-dark">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">image</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <form action="{{route('admin.cars_cover.delete',"$car->id")}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                             @if (file_exists('dataimg/covercars/'.$car->cover))
                                 <th scope="row">
                                     <button type="submit" style="color: red" title="supprimer"><i class="fa-solid fa-trash"></i></button>
                                  </th>
                                  <td colspan="2">
                                      <img width="100px" height="100px" src="{{url('dataimg/covercars/')}}/{{$car->cover}}">
                                  </td>
                             @else
                                <img width="100px" height="100px" src="{{url('dataimg/noimage/no-image.png')}}">
                             @endif
                        </form>
                      </tr>
                    </tbody>
                  </table>

            </div>
        </div>
        <h1 class="pb-2">pour supprimer des images </h1>
        <table class="table table-hover table-dark">
            <thead>
              <tr>
                <th scope="col">supprimer</th>
                <th scope="col">image</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($car->images as $image)
                <form action="{{route('admin.cars_img.delete',"$image->id")}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @if (file_exists('dataimg/imgcars/'.$image->img))
                    <tr>
                        <th scope="row"> <button type="submit" style="color: red" title="supprimer"><i class="fa-solid fa-trash"></i></button></th>
                        <td> <img width="250x" height="250px" src="{{url('dataimg/imgcars/')}}/{{$image->img}}"></td>
                      </tr>

                    @else
                        <img width="100px" height="100px" src="{{url('dataimg/noimage/no-image.png')}}">
                     @endif

                </form>
                @empty
                <h1 class="text-primary">Il n'y a pas d'images à afficher</h1>
                <img width="100px" height="100px" src="{{url('dataimg/noimage/no-image.png')}}">

                @endforelse
            </tbody>
          </table>

        <div class="card-footer">
        </div>
    </div>
    </div>
@endsection
