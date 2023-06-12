@extends('adminlte::page')

@section('title', 'Personas')

@section('content_header')
    <h1>Editar Persona</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($persona,['route' => ['admin.personas.update', $persona],'autocomplete'=>'off', 'method' => 'put']) !!}

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

                {!! Form::submit('Editar persona', ['class'=>'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <style>
        .image-wrapper {
            position: relative;
            padding-bottom: 56.25%;
        }

        .image-wrapper img {
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
@endsection
