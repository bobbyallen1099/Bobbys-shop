<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminUsersController
{
    /**
     * Show all users
     * @return Response
     */
    public function index()
    {
        $users = User::latest()->get();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show create form
     * @return Response
     */
    public function create() {
        return view('admin.users.create');
    }

    /**
     * Store a new user
     * @param request $request
     * @return Response
     */
    public function store(request $request) {

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        
        Session::flash('message', 'Successfully added user'); 
        Session::flash('name', $user->email); 
        Session::flash('alert-class', 'alert-success');

        return redirect(route('admin.users.show', $user));
    }

    /**
     * Show user
     * @param User $user
     * @return Response
     */
    public function show(User $user) {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show edit user form
     * @param User $user
     * @return Response
     */
    public function edit(User $user) {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update user
     * @param request $request
     * @param User $user
     * @return Response
     */
    public function update(request $request, User $user) {
        // If the email has changed
        if($request->email != $user->email) {
            $validatedData = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            ]);
        } else {
            // Remove unique:users
            $validatedData = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            ]);   
        }

        $user->name = $request->name;
        $user->email = $request->email;

        // Change password if something is inputted
        if($request->password != '') {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        Session::flash('message', 'Successfully updated user'); 
        Session::flash('name', $user->name); 
        Session::flash('alert-class', 'alert-success');

        return redirect(route('admin.users.show', $user));
    }

    /**
     * Show confirm delete post
     * @param User $user
     * @return Response
     */
    public function confirmdelete(User $user) {
        return view('admin.users.confirmdelete', compact('user'));
    }
    
    /**
     * Delete user
     * @param User $user
     * @return Redirect
     */
    public function delete(User $user) {
        $user->delete();

        Session::flash('message', 'Successfully deleted user'); 
        Session::flash('name', $user->name); 
        Session::flash('alert-class', 'alert-success');

        return redirect(route('admin.users.index'));
    }
}