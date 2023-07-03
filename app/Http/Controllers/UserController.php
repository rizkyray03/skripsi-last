<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('role')->get();
        return view('admin.user.user-view', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim' => ['required', 'unique:users,nim_mhs', 'min:10', 'max:10'],
        ]);

        $nim = $request->input('nim');
        $username = $nim . '@stikom22j.com';
        $password = 'password123';
        $roleId = $request->input('role_id');

        // $user = new User();
        // $user->username = $username;
        // $user->password = Hash::make($password);
        // $user->role_id = $roleId;
        // $user->save();
        User::create([
            'nim_mhs' => $nim,
            'username' => $username,
            'password' => Hash::make($password),
            'role_id' => $roleId
        ]);
        Session::flash('success');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}