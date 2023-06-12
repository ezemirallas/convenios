@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
	<h1 class="m-0 text-dark">Crear nuevo rol.</h1>
@stop

@section('content')
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					{!! Form::open(['route'=>'admin.roles.store']) !!}

					    @include('admin.roles.partials.form')

					    {!! Form::submit('Crear rol', ['class'=>'btn btn-primary']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@stop
