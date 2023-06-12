@extends('adminlte::page')

@section('title', 'Areas')

@section('content_header')
    <h1>Editar Area</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($area,['route' => ['admin.areas.update',$area], 'method'=>'put', 'autocomplete' => 'off']) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Ingrese el nombre del area']) !!}

                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>

                <div class="form-group">
                    {!! Form::label('slug', 'Slug') !!}
                    {!! Form::text('slug', null, ['class'=>'form-control', 'placeholder'=>'Ingrese el slug del área', 'readonly']) !!}

                    @error('slug')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>

                @section('plugins.Select2', true)
                @php
                $config = [
                    "placeholder" => "Selecciones responsables ...",
                    "allowClear" => true,
                ];
                @endphp
                <x-adminlte-select2 id="responsables" name="responsables[]" label="Responsables"
                    label-class="text-default" igroup-size="sm" :config="$config" multiple>
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-black">
                            <i class="fas fa-user"></i>
                        </div>
                    </x-slot>
                    <x-slot name="appendSlot">
                        <x-adminlte-button theme="outline-dark" label="Limpiar" icon="fas fa-sm fa-ban text-danger"/>
                    </x-slot>
                    @foreach ($responsables as $key => $value)
                        <option value="{{$key}}">{{$value}}</option>
                    @endforeach
                    @foreach ($area->responsables as $responsable)
                        <option selected value="{{$responsable->id}}">{{$responsable->apellido}}, {{$responsable->nombre}}</option>
                    @endforeach
                </x-adminlte-select2>

                {!! Form::submit('Actualizar área', ['class'=>'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>

    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
@endsection
