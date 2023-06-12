@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1 class="m-0 text-dark">Lista de Usuarios</h1>
@stop

@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped" name="usuarios">
                        <tbody>
                            @php
                                $heads = [
                                    'ID',
                                    'Nombre',
                                    ['label' => 'Email', 'width' => 40],
                                    ['label' => 'Actions', 'no-export' => true, 'width' => 5],
                                    ];
                            @endphp

                            {{-- Minimal example / fill data using the component slot --}}
                            <x-adminlte-datatable id="table1" :heads="$heads" {{--striped with-buttons--}}>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            <a class="btn btn-xs btn-default text-primary mx-1 shadow" href="{{route('admin.users.edit', $user)}}">
                                                <i class="fa fa-lg fa-fw fa-pen"></i>
                                            </a>
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
