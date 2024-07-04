<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $roles = ['Admin', 'User'];
        $status = ['Active','Inactive' ];
        //dd($users);
        return view('pages.user.index', compact('users', 'roles', 'status'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|string|in:User,Admin', // Assuming these are the roles
            'status' => 'required|string|in:Active,Inactive', // Assuming these are the statuses
            'password' => 'required|string|min:8|confirmed',
            'avatar' => 'sometimes|file|image|max:5000', // Assuming max 5MB for images
        ]);

        // Create user
		$user = User::create($validatedData);

		// custom file name
		$extension = $validatedData['avatar']->getClientOriginalExtension(); //Extension .png
		$avatarFileName =  $user->id . '.' . $extension;

		// Store file in storage
		Storage::putFileAs('public/avatar', new File($validatedData['avatar']), $avatarFileName);

		// store avatar file name
		$user->avatar = $avatarFileName;
		$user->save();

		return redirect()->route('user.index')->with('success', 'User created successfully.');
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
