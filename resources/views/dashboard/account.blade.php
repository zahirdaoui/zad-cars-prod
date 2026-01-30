@extends('layouts.dashboard')

@section('ContentDashboard')
<div class="card">
    <div class="card-header text-center">
        <strong>edit compte admin </strong>
    </div>
    <div class="card-body card-block">
        <form action="{{route('admin.updatemyaccount')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">nom</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="nom" name="nom" value="{{Auth::user()->name}}" placeholder="nom" class="form-control">
                    <span style="color: red">@error('nom') <i class="fa-solid fa-star-of-life fa-1x"></i> Veuillez entrer des données correctes @enderror</span>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">phone</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="number" id="phone" value="{{Auth::user()->number_phone}}" name="phone" placeholder="phone" class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">email</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="email" id="email" name="email" value="{{Auth::user()->email}}" placeholder="email" class="form-control">
                   <span style="color: red">@error('email') <i class="fa-solid fa-star-of-life fa-1x"></i> Veuillez entrer des données correctes @enderror</span>
                </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">password</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="password" id="password" name="password" placeholder="password" class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Confirm password</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="password" id="confpassword" name="confpassword" placeholder="Confirm password" class="form-control">
                </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="file-multiple-input" class=" form-control-label">sélectionner photo</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="file" id="file-multiple-input" name="img_admin" multiple="" class="form-control-file">
                </div>
            </div>
            <input class="btn btn-success text-center" type="submit" value="save">
        </form>
    </div>
@endsection
