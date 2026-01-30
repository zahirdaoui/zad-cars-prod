@extends('layouts.dashboard')

@section('ContentDashboard')
<div class="">
    <!-- DATA TABLE -->
    <div class="success-message text-center">
        @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session()->get('message')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @elseif(session()->has('message_delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{session()->get('message_delete')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

        @endif
    </div>
    <div class="table-data__tool">
        <div class="table-data__tool-right">
            <a class="au-btn au-btn-icon au-btn--green au-btn--small" href="{{ URL::route('admin.add') }}">
                <i class="zmdi zmdi-plus"></i>ajouter une voiture</a>
        </div>
    </div>
    <div class="table-responsive table-responsive-data2">
       <table class="table table-data2">
            <thead>
                @if ($carsSf->count() > 0)
                <tr>
                    <th>nom de la voiture</th>
                    <th>modéle de voiture</th>
                    <th>anéé</th>
                    <th>id</th>
                    <th>date d'ajout de la voiture</th>
                    <th>prix</th>
                    <th></th>
                </tr>

                @endif

            </thead>
            <tbody>





                @forelse ($carsSf as $item)
                            <tr class="tr-shadow">
                                <td>{{$item->name}}</td>
                                <td>
                                    <span class="block-email">{{$item->name_model}}</span>
                                </td>
                                <td class="desc">{{$item->date_out}}</td>
                                <td>{{$item->id}}</td>
                                <td>
                                    <span class="status--process">{{$item->created_at}}</span>
                                </td>
                                <td>{{$item->price}} K(DH)</td>
                                <td>
                                    <div class="table-data-feature">
                                        <form action="{{route('admin.restore',$item->id)}}"  method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="item" data-toggle="tooltip" data-placement="top" title="restaurer">
                                                <i class="zmdi zmdi-mail-send"></i>
                                            </button>
                                        </form>
                                       {{--  <a type="submit" href="{{route('admin.restore',$item->id)}}" class="item" data-toggle="tooltip" data-placement="top" title="restaurer">
                                            <i class="zmdi zmdi-mail-send"></i>
                                        </a> --}}


                                        <form action="{{route('admin.destroy-cars',"$item->id")}}" id="form_ds_cars"  method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button class="item" type="submit" id="destroy_cars" data-toggle="tooltip" data-placement="top" title="Supprimer">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                            <tr class="spacer"></tr>
                @empty
                <h1 class="text-center"> Il n'y a pas de données</h1>
                @endforelse
         </tbody>
        </table>
    </div>
@endsection
