@extends('layouts.dashboard')

@section('ContentDashboard')
                        <h3 class="text-center mb-5">toutes les voitures que vous pouvez modifier, supprimer ou afficher</h3>
                        <div class="success-message text-center">
                            @if(session()->has('message'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{session()->get('message')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <form action="{{ route('admin.cars')}}" method="GET" class="form-header pb-5" enctype="multipart/form-data">
                                                @csrf
                                            <input class="au-input au-input--xl" type="text" name="search_id" placeholder="identifiant" />
                                            <button class="au-btn--submit" type="submit">
                                                <i class="zmdi zmdi-search"></i>
                                            </button>
                                        </form>
                                    <form action="{{ route('admin.cars')}}" method="GET" class="form-header pb-5" enctype="multipart/form-data">
                                            @csrf
                                        <div class="rs-select2--light rs-select2--md mr-4">
                                            <select class="js-select2" name="search_name_cars">
                                                <option selected="selected" disabled>nome de voiture</option>
                                                @forelse($data_cars_name as $data )
                                                <option value="{{$data->name}}">{{$data->name}}</option>
                                                @empty
                                                <option selected="selected" disabled>no data</option>
                                                @endforelse
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>

                                        <div class="rs-select2--light rs-select2--sm mr-4">
                                           <select class="js-select2" name="search_ville">
                                                <option selected="selected" disabled>ville</option>
                                                @forelse($data_cars_ville as $data )
                                                <option value="{{$data->ville}}">{{$data->ville}}</option>
                                                @empty
                                                <option selected="selected" disabled>no data</option>
                                                @endforelse
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <button type="submit" class="au-btn-filter btn-success">
                                            <i class="zmdi zmdi-filter-list"></i>filtres</button>
                                    </div>
                                </form>
                                    <div class="table-data__tool-right">
                                        <a class="au-btn au-btn-icon au-btn--green au-btn-- text-white" href="{{ URL::route('admin.add') }}">
                                            <i class="zmdi zmdi-plus"></i>ajouter une voiture</a>
                                    </div>
                                </div>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            @if ($cars->count()>0)
                                            <tr>
                                                <th>image</th>
                                                <th>marque</th>
                                                <th>modéle</th>
                                                <th>anéé</th>
                                                <th>prix</th>
                                                <th>annonceur</th>
                                                <th></th>
                                            </tr>
                                            @endif
                                        </thead>
                                        <tbody>

                                            @forelse ($cars as $item)
                                            <tr class="tr-shadow">
                                                <td>
                                                    @if (file_exists('dataimg/covercars/'.$item->cover))
                                                        <img width="40px" height="40px" src="{{url('dataimg/covercars/')}}/{{$item->cover}}">
                                                    @else
                                                        <img width="40px" height="40px" src="{{url('dataimg/noimage/no-image.png')}}">
                                                    @endif
                                                </td>

                                                <td>
                                                    <span class="block-email">{{$item->name}}</span>
                                                </td>
                                                <td class="desc">{{$item->name_model}}</td>
                                                <td>{{$item->date_out}}</td>

                                                <td>
                                                    <span class="status--process">{{$item->price}}</span>
                                                </td>
                                                <td>zahir daui</td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <a href="{{route('show',"$item->id")}}" target="_blank" class="item" data-toggle="tooltip" data-placement="top" title="afficher">
                                                            <i class="zmdi zmdi-mail-send"></i>
                                                        </a>
                                                        <a href="{{route('admin.edit',"$item->id")}}" class="item" data-toggle="tooltip" data-placement="top" title="Éditer">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </a>
                                                        <form action="{{route('admin.softDelete',$item->id)}}" id="form_delete_cars" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <button class="item" id="ConfirmDeletCar" data-toggle="tooltip" data-placement="top" title="Supprimer">
                                                                <i class="zmdi zmdi-delete"></i>
                                                            </button>
                                                        </form>

                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                            @empty
                                            <h1 class="text-center">Il n'y a pas de données</h1>

                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>
@endsection
