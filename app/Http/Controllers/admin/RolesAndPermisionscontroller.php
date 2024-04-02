<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\Admin\Roles\RolesStoreRequest;
class RolesAndPermisionscontroller extends Controller
{
public function store(RolesStoreRequest $request){

    $data = $request->validator();
    $role = Role::create(['name' =>$request->role, 'guard_name'])->givePermissionTo($request
    ->permissions);
    app()[\Spatie\Permission\Models\PermissionRegistrar::class]->forgetCachedPermissions();

    return response()->json(['success'=>true,'data'=>$role],200);
}
}
