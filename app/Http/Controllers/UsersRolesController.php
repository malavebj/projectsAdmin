<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersRolesController extends Controller
{
    public function update(Request $request, User $user)
    {
        $user->roles()->detach();
        if($request->filled('roles')){
            $user->assignRole($request->roles);
        }
        
        return back()->withFlash('Roles Updated');
    }
}
