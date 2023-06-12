<div class="form-group">
	{!! Form::label('name', 'Nombre') !!}
	{!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Ingrese el nombre del rol']) !!}

	@error('name')
		<small class="text-danger">
			{{$message}}
		</small>
	@enderror
</div>

@php
    $roles = array(
                        'Panel Administrativo',
                        'Usuario',
                        'Rol',
                        'Categoria',
                        'Tipo',
                        'Responsables',
                        'Areas',
                        'Personas',
                        'Contratos',
                        'Adendas',
                        'Prorroga',
                        'Documentos'
                    );
@endphp

<div class="card">
    <div class="card-body">
      <h5 class="font-weight-bold mb-3">Lista de Permisos</h5>
      <p class="mb-0">
        Los roles proporcionan permisos a los usuarios.
        Un rol es un conjunto de permisos que definen una actividad concreta que puede realizar un usuario.
        Se concede permisos a los usuarios asignándoles roles.
        Los nuevos usuarios no tendrán permisos hasta que se asignen a un rol.
      </p>
    </div>
    <ul class="list-group list-group-flush">
    @foreach ($roles as $rol)
        <li class="list-group-item" style="color:blue;background-color: powderblue;">
            <h6 class="font-weight-bold">{{ $rol }}</h6>
        </li>
        <li class="list-group-item">
            @foreach ($permissions as $permission)
                @if(str_contains(strtoupper($permission->description), strtoupper($rol)) != false)
                    <label style="width:100%;">
                        {!! Form::checkbox('permissions[]', $permission->id, null, ['class'=>'mr-1 ml-4']) !!}
                        {{$permission->description}}
                    </label>
                @endif
            @endforeach
        </li>
    @endforeach
    </ul>
    <div class="card-body">
        <a href="{{ route('admin.roles.index') }}" class="card-link">Regresar al listado de roles</a>
    </div>
</div>
