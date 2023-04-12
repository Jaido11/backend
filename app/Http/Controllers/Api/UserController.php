<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        {
            $validated  = $request->validated();
            $validated  ['password']= Hash::make($validated['password']);
            $users = User::create($validated);
    
            return $users;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return User::find($id);
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
    public function update(UserRequest $request, string $id)
    {
        $user = User::findorFail($id);
        
        $validated = $request->validated();
 
        $user->name = $validated['name'];
 
        $user->save();

        return $user;
    }
 /**
     * Update the email of the specified resource in storage.
     */
    public function email(UserRequest $request, string $id)
    {
        $user = User::findorFail($id);
        
        $validated = $request->validated();
 
        $user->email = $validated['email'];
 
        $user->save();

        return $user;
    }
 /**
     * Update the passsword of the specified resource in storage.
     */
    public function password(UserRequest $request, string $id)
    {
        $user = User::findorFail($id);
        
        $validated = $request->validated();
 
        $user->password = Hash::make($validated['password']);
        $user->save();

        return $user;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users = User::findOrFail($id);
        $users->delete();
 
        return   $users;
    }
}
