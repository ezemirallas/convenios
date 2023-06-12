@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <a class="btn btn-secondary btn-sm float-right" href="{{route('admin.roles.create')}}">Nuevo rol</a>
    <h1 class="m-0 text-dark">Lista de Roles</h1>
@stop

@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            {{session('info')}}
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped" id="roles">
                        <tbody>
                            @php
                            $heads = [
                            'ID',
                            'Role',
                            ['label' => 'Editar', 'no-export' => true, 'width' => 5],
                            ['label' => 'Eliminar', 'no-export' => true, 'width' => 5],
                            ];
                            @endphp

                            {{-- Minimal example / fill data using the component slot --}}
                            <x-adminlte-datatable id="table1" :heads="$heads" {{--striped with-buttons--}}>
                                @foreach($roles as $role)
                                <tr>
                                    <td>{{$role->id}}</td>
                                    <td>{{$role->name}}</td>
                                    <td>
                                        <a class="btn btn-xs btn-default text-primary mx-1 shadow" href="{{route('admin.roles.edit', $role)}}" title="Editar">
                                        <i class="fa fa-lg fa-fw fa-pen"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{route('admin.roles.destroy', $role)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar">
                                        <i class="fa fa-lg fa-fw fa-trash"></i>
                                        </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </x-adminlte-datatable>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
