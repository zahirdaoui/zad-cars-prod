@extends('layouts.dashboard')

@section('ContentDashboard')
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">bienvenu {{Auth::user()->name}}</h2>
            <a class="au-btn au-btn-icon au-btn--blue" href="{{ URL::route('admin.add') }}">
                <i class="zmdi zmdi-plus"></i>ajouter une voiture</a>
        </div>
    </div>
</div>
<div class="row m-t-25">
    <div class="col-sm-6 col-lg-6">
        <div class="overview-item overview-item--c4">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="icon">
                        <i class="zmdi zmdi-car"></i>
                    </div>
                    <div class="text">
                        <h2>{{$data->count()}}</h2>
                        <span>Total des voitures actives</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-6">
        <div class="overview-item overview-item--c1">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="icon">
                        <i class="zmdi zmdi-delete"></i>
                    </div>
                    <div class="text">
                        <h2>{{$dataTrash}}</h2>
                        <span>Voitures supprimées</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="">
    <div class="">
        <h2 class="title-1 m-b-25">Toutes les voitures</h2>
        <div class="table-responsive table--no-card m-b-40">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                        <th>image</th>
                        <th>nome de voiture</th>
                        <th>modèle de voiture</th>
                        <th class="text-right">le prix</th>
                        <th class="text-right">ville</th>
                        <th class="text-right">afficher</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>
                            @if ($item->cover !== ' ')
                              <img width="50px" height="50px" src="{{url('dataimg/covercars/')}}/{{$item->cover}}">
                           @else
                              <img width="50px" height="50px" src="{{url('dataimg/noimage/no-image.png')}}">
                            @endif
                        </td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->name_model}}</td>
                        <td class="text-right">{{$item->price}}DH</td>
                        <td class="text-right">{{$item->ville}}</td>
                        <td class="text-right"><a href="{{route('show',"$item->id")}}" target="_blank" type="button" class="btn btn-success text-white"> afficher</a></td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection

