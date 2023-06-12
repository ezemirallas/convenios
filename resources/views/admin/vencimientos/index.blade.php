@extends('adminlte::page')

@section('title', 'Vencimientos')

@section('content_header')
    <h1>Próximos vencimientos</h1>
@stop

@section('content')
    @livewire('admin.vencimientos-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
