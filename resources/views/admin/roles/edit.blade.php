@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
	<h1 class="m-0 text-dark">Editar rol</h1>
@stop

@section('content')

@if (session('info'))
	<div class="alert alert-success">
		{{session('info')}}
	</div>
@endif

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				{!! Form::model($role, ['route'=>['admin.roles.update',$role],'method'=>'put']) !!}
					@include('admin.roles.partials.form')

				    {!! Form::submit('Actualizar rol', ['class'=>'btn btn-primary']) !!}
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@stop
