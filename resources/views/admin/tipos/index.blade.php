@extends('adminlte::page')

@section('title', 'Persona')

@section('content_header')
    {{--@can('admin.categories.create')--}}
        <a class="btn btn-secondary float-right" href="{{route('admin.tipos.create')}}">Nuevo clase Persona</a>
    {{--@endcan--}}

    <h1>Clasificación de Personas</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tipos as $tipo)
                        <tr>
                            <td>{{$tipo->id}}</td>
                            <td>{{$tipo->name}}</td>
                            <td width="10px">
                                @can('admin.tipos.edit')
                                    <a class="btn btn-primary btn-sm" href="{{route('admin.tipos.edit', $tipo)}}">
                                        <i class="fa fa-pen"></i>
                                    </a>
                                @endcan
                            </td>
                            <td width="10px">
                                @can('admin.tipos.destroy')
                                    <form action="{{route('admin.tipos.destroy',$tipo)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
