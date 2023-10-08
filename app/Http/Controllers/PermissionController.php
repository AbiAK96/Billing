<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function assignPermission($id)
    {
        $permissions = Permission::all();

        $user = User::find($id);
        foreach ($permissions as $permission) {
            $user->givePermissionTo($permission);
        }
    }
}
