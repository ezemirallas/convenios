@extends('adminlte::page')

@section('title', 'Responsables')

@section('content_header')
    {{--@can('admin.categories.create')--}}
        <a class="btn btn-secondary float-right" href="{{route('admin.responsables.create')}}">Nuevo Responsable</a>
    {{--@endcan--}}

    <h1>Listado de Responsables</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    @livewire('admin.responsable-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
