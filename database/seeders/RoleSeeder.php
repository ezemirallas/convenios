<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $role1 = Role::create(['name'=>'Admin']);
        $role2 = Role::create(['name'=>'Consulta de Listados']);
        $role3 = Role::create(['name'=>'crud responsables']);
        $role4 = Role::create(['name'=>'crud areas']);
        $role5 = Role::create(['name'=>'crud personas']);
        $role6 = Role::create(['name'=>'crud contratos, adendas y prórrogas']);

        Permission::create(['name'=>'admin.home','description'=>'Ver Panel administrativo'])->syncRoles([$role1,$role2]);

        Permission::create(['name'=>'admin.users.index','description'=>'Ver listado de usuarios'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.users.edit','description'=>'Asignar un rol'])->syncRoles([$role1]);

        Permission::create(['name'=>'admin.roles.index','description'=>'Ver listado de roles'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.roles.create','description'=>'Crear roles'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.roles.edit','description'=>'Editar roles'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.roles.destroy','description'=>'Eliminar roles'])->syncRoles([$role1]);

        Permission::create(['name'=>'admin.categories.index','description'=>'Ver listado de categorias'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'admin.categories.create','description'=>'Crear categorias'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.categories.edit','description'=>'Editar categorias'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.categories.destroy','description'=>'Eliminar categorias'])->syncRoles([$role1]);

        Permission::create(['name'=>'admin.tipos.index','description'=>'Ver listado de tipos de persona'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'admin.tipos.create','description'=>'Crear tipos de persona'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.tipos.edit','description'=>'Editar tipos de persona'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.tipos.destroy','description'=>'Eliminar tipos de persona'])->syncRoles([$role1]);

        Permission::create(['name'=>'admin.responsables.index','description'=>'Ver listado de responsables'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name'=>'admin.responsables.create','description'=>'Crear responsables'])->syncRoles([$role1,$role3]);
        Permission::create(['name'=>'admin.responsables.edit','description'=>'Editar responsables'])->syncRoles([$role1,$role3]);
        Permission::create(['name'=>'admin.responsables.destroy','description'=>'Eliminar responsables'])->syncRoles([$role1,$role3]);

        Permission::create(['name'=>'admin.areas.index','description'=>'Ver listado de areas'])->syncRoles([$role1,$role2,$role4]);
        Permission::create(['name'=>'admin.areas.create','description'=>'Crear areas'])->syncRoles([$role1,$role4]);
        Permission::create(['name'=>'admin.areas.edit','description'=>'Editar areas'])->syncRoles([$role1,$role4]);
        Permission::create(['name'=>'admin.areas.destroy','description'=>'Eliminar areas'])->syncRoles([$role1,$role4]);

        Permission::create(['name'=>'admin.personas.index','description'=>'Ver listado de personas'])->syncRoles([$role1,$role2,$role5]);
        Permission::create(['name'=>'admin.personas.create','description'=>'Crear personas'])->syncRoles([$role1,$role5]);
        Permission::create(['name'=>'admin.personas.edit','description'=>'Editar personas'])->syncRoles([$role1,$role5]);
        Permission::create(['name'=>'admin.personas.destroy','description'=>'Eliminar personas'])->syncRoles([$role1,$role5]);

        Permission::create(['name'=>'admin.contratos.index','description'=>'Ver listado de contratos'])->syncRoles([$role1,$role2,$role6]);
        Permission::create(['name'=>'admin.contratos.create','description'=>'Crear contratos'])->syncRoles([$role1,$role6]);
        Permission::create(['name'=>'admin.contratos.edit','description'=>'Editar contratos'])->syncRoles([$role1,$role6]);
        Permission::create(['name'=>'admin.contratos.destroy','description'=>'Eliminar contratos'])->syncRoles([$role1,$role6]);

        Permission::create(['name'=>'admin.adendas.index','description'=>'Ver listado de adendas'])->syncRoles([$role1,$role2,$role6]);
        Permission::create(['name'=>'admin.adendas.destroy','description'=>'Eliminar adendas'])->syncRoles([$role1,$role6]);

        Permission::create(['name'=>'admin.prorrogas.index','description'=>'Ver listado de prorrogas'])->syncRoles([$role1,$role2,$role6]);
        Permission::create(['name'=>'admin.prorrogas.destroy','description'=>'Eliminar prorrogas'])->syncRoles([$role1,$role6]);

        Permission::create(['name'=>'admin.vencimientos.index','description'=>'Ver listado de documentos a vencer'])->syncRoles([$role1,$role2]);

    }
}
