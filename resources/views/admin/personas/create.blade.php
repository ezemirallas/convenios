@extends('adminlte::page')

@section('title', 'Persona')

@section('content_header')
    <h1>Crear Persona</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.personas.store','autocomplete'=>'off']) !!}

                {!! Form::hidden('user_id', auth()->user()->id) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Ingrese el nombre de la persona']) !!}

                    @error('name')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('cuit', 'Cuit') !!}
                    {!! Form::text('cuit', null, ['class'=>'form-control', 'placeholder'=>'Ingrese el cuit de la persona']) !!}

                    @error('cuit')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('domicilio', 'Domicilio') !!}
                    {!! Form::text('domicilio', null, ['class'=>'form-control', 'placeholder'=>'Ingrese el domicilio de la persona']) !!}

                    @error('domicilio')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'email') !!}
                    {!! Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'Ingrese el email de la persona']) !!}

                    @error('email')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('tipo_id', 'Clase de Persona') !!}
                    {!! Form::select('tipo_id', $tipos, null, ['class'=>'form-control']) !!}

                    @error('tipo_id')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                {!! Form::submit('Crear persona', ['class'=>'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop
