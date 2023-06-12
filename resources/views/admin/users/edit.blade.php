@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
	<h1 class="m-0 text-dark">Asignar Rol</h1>
@stop

@section('content')
	<div class="row">
		<div class="col-12">
			@if(session('info'))
				<div class="alert alert-success">
					<strong>{{session('info')}}</strong>
				</div>
			@endif

	<div class="card">
		<div class="card-body">
			<p class="h5">Nombre:</p>
			<p class="form-control">{{$user->name}}</p>
		</div>
	</div>

	{{--Laravel Colective--}}
	<h2 class="h5">Listado de Roles</h2>
		{!! Form::model($user, ['route'=>['admin.users.update',$user], 'method'=> 'put']) !!}
			@foreach ($roles as $role)
				<div>
					<label>
						{!! Form::checkbox('roles[]', $role->id, null, ['class'=>'mr-1']) !!}
						{{$role->name}}
					</label>
				</div>
			@endforeach
			{!! Form::submit('Asignar rol', ['class'=>'btn btn-primary mt-2']) !!}
			{!! Form::close() !!}
		</div>
	</div>
@stop
