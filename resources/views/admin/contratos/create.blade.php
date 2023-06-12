@extends('adminlte::page')

@section('title', 'Documentos')

@section('content_header')
<h1>Crear Documento</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.contratos.store','autocomplete'=>'off', 'files' => true]) !!}

                {!! Form::hidden('user_id', auth()->user()->id) !!}

                <div class="row">
                    <div class="col">
                        {!! Form::label('objeto', 'Objeto') !!}
                        {!! Form::text('objeto', null, ['class'=>'form-control', 'placeholder'=>'Ingrese el objeto del documento']) !!}

                        @error('objeto')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col">
                        {!! Form::label('numeroresolucion', '#Res.') !!}
                        {!! Form::text('numeroresolucion', null, ['class'=>'form-control', 'placeholder'=>'Ingrese el Número de Resolución del documento']) !!}

                        @error('numeroresolucion')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col">
                        {!! Form::label('anioresolucion', 'Año Res.') !!}
                        {!! Form::text('anioresolucion', null, ['class'=>'form-control', 'placeholder'=>'Ingrese el Año de Resolución del documento']) !!}

                        @error('anioresolucion')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                {!! Form::label('category_id', 'Categoria') !!}
                                {{ Form::select('category_id', $categories, null, array('class'=>'form-control', 'placeholder'=>'Por favor seleccione una categoría ...')) }}

                                @error('category_id')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        {!! Form::label('fechainicio', 'Fecha Inicio') !!}
                        <br>
                        {!! Form::date('fechainicio', null, ['class' => 'form-control']) !!}

                        @error('fechainicio')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col">
                        {!! Form::label('fechafinalizacion', 'Fecha Finalización') !!}
                        <br>
                        {!! Form::date('fechafinalizacion', null, ['class' => 'form-control']) !!}

                        @error('fechafinalizacion')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col">
                        {!! Form::label('areageneradora_id', 'Area generadora') !!}
                        {{ Form::select('areageneradora_id', $areasgeneradoras, null, array('class'=>'form-control', 'placeholder'=>'Por favor seleccione un área generadora ...')) }}

                        @error('areageneradora_id')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col">
                        {!! Form::label('arearesponsable_id', 'Area responsable') !!}
                        {{ Form::select('arearesponsable_id', $areasresponsables, null, array('class'=>'form-control', 'placeholder'=>'Por favor seleccione un área responsable ...')) }}


                        @error('arearesponsable_id')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="form-group">
                    {!! Form::label('observacion', 'Observación') !!}
                    {!! Form::textarea('observacion', null, ['class'=> 'form-control']) !!}
                </div>
                @section('plugins.Select2', true)
                @php
                $config = [
                    "placeholder" => "Selecciones opciones ...",
                    "allowClear" => true,
                ];
                @endphp
                <div class="row">
                    <div class="col">
                        <x-adminlte-select2 id="personas" name="personas[]" label="Contraparte"
                            label-class="text-default" igroup-size="sm" :config="$config" multiple>
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-black">
                                    <i class="fas fa-user"></i>
                                </div>
                            </x-slot>
                            <x-slot name="appendSlot">
                                <x-adminlte-button theme="outline-dark" label="Limpiar" icon="fas fa-sm fa-ban text-danger"/>
                            </x-slot>
                            @foreach ($personas as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </x-adminlte-select2>
                        @error('personas')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col">
                        <div class="col">
                            {!! Form::label('parte_id', 'Parte') !!}
                            {{ Form::select('parte_id', $personas, null, array('class'=>'form-control', 'placeholder'=>'Por favor seleccione una parte ...')) }}

                            @error('parte_id')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <x-adminlte-select2 name="convenios" label="Convenio Padre" label-class="text-black"
                    igroup-size="sm" data-placeholder="Seleccione una opción ...">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-file"></i>
                        </div>
                    </x-slot>
                    <option/>
                    @foreach ($convenios as $key => $value)
                        <option value="{{$key}}">{{$value}}</option>
                    @endforeach
                </x-adminlte-select2>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            {!! Form::label('file', 'Archivo de la resolución vinculado al documento') !!}
                            {!! Form::file('file', ['class'=>'form-control-file','accept' => '.pdf']) !!}

                            @error('file')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        Resolución en formato pdf que se asignará al documento.
                    </div>
                    <div class="col">
                        <p class="font-weight-bold">Renovación automática</p>
                        <label>
                            {!! Form::radio('renovacionautomatica', 1, true) !!}
                            Si
                        </label>
                        <label>
                            {!! Form::radio('renovacionautomatica', 0) !!}
                            No
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-1">
                        <div class="image-wrapper">
                            @isset ($contrato->image)
                                <img id="picture" src="{{Storage::url($contrato->image->url)}}" alt="" height="100px" width="100px">
                            @else
                                <img id="picture" src="https://www.softzone.es/app/uploads-softzone.es/2017/01/buscar.jpg?x=480&y=375&quality=40" alt="" height="100px" width="100px">
                            @endisset
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            {!! Form::label('image', 'Imagen que se mostrará en el buscador de convenios público') !!}
                            {!! Form::file('image', ['class'=>'form-control-file','accept' => 'image/*']) !!}

                        </div>

                        Imagen opcional para buscador público de convenios.
                    </div>
                </div>
                <br>

                {!! Form::submit('Crear documento', ['class'=>'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/37.0.1/classic/ckeditor.js"></script>

    <script>
        $(document).ready( function() {
            ClassicEditor
                .create( document.querySelector( '#observacion' ) )
                .catch( error => {
                console.error( error );
            } );
            //Cambiar Imagen
            document.getElementById('image').addEventListener('change', cambiarImagen);

            function cambiarImagen(event){
                var file = event.target.files[0];

                var reader = new FileReader();
                reader.onload = (event) => {
                document.getElementById('picture').setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
