@extends('adminlte::page')

@section('title', 'Areas')

@section('content_header')
    {{--@can('admin.categories.create')--}}
        <a class="btn btn-secondary float-right" href="{{route('admin.areas.create')}}">Nueva Area</a>
    {{--@endcan--}}

    <h1>Lista de Areas</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    @livewire('admin.areas-index')


@stop
