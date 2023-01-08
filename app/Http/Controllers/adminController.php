<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index()
    {
        return view('admin.manage-users',[
            'users' => User::all()
        ]);
    }

    // update Post data
    public function update(Request $request, User $user)
    {

            $data = $request([
            'name' => 'required',
            'email' => 'required',
            'department' => 'required',
            'password' => 'required',
            'type' => 'required',
        ]);

        

        $user->update($data);

        return back()->with('message', 'data updated successfully!');
    }
}
