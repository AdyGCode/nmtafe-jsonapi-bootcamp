<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $users = User::all();
        $users = User::orderByDesc('id')->paginate(2);
        return view('users.index', compact(['users']));
    }

    /**
     * Show the form for creating a new resource.
     * Create = Add
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = [
            'name' => [
                'required',
                'string',
                'max:250',
                'min:2',
            ],
            'email' => [
                'required',
                'email:rfc, spoof, dns',
                'unique:users,email'
            ],
            'password' => [
                'required',
                'same:confirm-password'
            ],
        ];

        $this->validate($request, $validation);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);

        return redirect()->route('users.index')
            ->with("success", __("User successfully created"));

    }

    /**
     * Display the specified user.
     */
    public function show(User $user)
    {
        //$user = User::whereID($id)->get();
        //$user = User::find($id);
        return view('users.show', compact(['user']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact(['user']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validation = [
            'name' => [
                'required',
                'string',
                'max:250',
                'min:2',
            ],
            'email' => [
                'required',
                'email:rfc, spoof, dns',
                'unique:users,email,'.$user->id,
            ],
            'password' => [
                'same:confirm-password'
            ],
        ];

        $this->validate($request, $validation);
        $input = $request->all();

        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        $user->update($input);

        return redirect()->route('users.index')
            ->with('success', __('User updated successfully'));
    }

    /**
     * Show confirmation to delete a resource.
     */
    public function delete(User $user)
    {
        return view('users.delete', compact(['user']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $oldUser = $user;
        $user->delete();
        return redirect()->route('users.index')
            ->with('success', "User {$oldUser->name} deleted successfully");
    }
}
