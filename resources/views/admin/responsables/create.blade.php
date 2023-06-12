@extends('adminlte::page')

@section('title', 'Responsables')

@section('content_header')
    <h1>Crear nuevo responsable</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.responsables.store','autocomplete'=>'off']) !!}

                {!! Form::hidden('user_id', auth()->user()->id) !!}

                <div class="form-group">
                    {!! Form::label('apellido', 'Apellido') !!}
                    {!! Form::text('apellido', null, ['class'=>'form-control', 'placeholder'=>'Ingrese el apellido del responsable']) !!}

                    @error('apellido')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('nombre', 'Nombre') !!}
                    {!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Ingrese el nombre del responsable']) !!}

                    @error('nombre')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'email') !!}
                    {!! Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'Ingrese el email del responsable']) !!}

                    @error('email')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                {!! Form::submit('Crear responsable', ['class'=>'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
