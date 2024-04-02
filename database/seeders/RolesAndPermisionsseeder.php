<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RolesAndPermisionsseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //app()[\Spatie\Permission\Models\PermissionRegistrar::class]->forgetCachedPermissions();
        $arrayOfPermissionNames =[
            'users create','users view','users edit','users delete',
        ];
        $permissions = collect($arrayOfPermissionNames)->map(function($permission){
            return['name' =>$permission,'guard_name' =>'web'];
        });
        $Permission::insert($permissions->toArray());
        $role = Role::create(['name' => 'super admin '])
        ->givePermissionTo($arrayOfPermissionNames);
    }
}
