<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function index () {
return view('users.index', ['users' => Client::all()]);
    }

    public function show (Client $user) {
return view('users.show', ['user' => $user]);
    }

    public function create() {
        return view('users.create');
    }

    public function store(Request $request) {
// dd($request);
$formFields = $request->validate([
    // 'prefixname' =>'required',
    'firstname' =>'required',
    // 'middlename' =>'required',
    'lastname' =>'required',
    // 'suffixname' =>'required',
    'username' =>'required',
    'email' =>['required', 'email', Rule::unique('users', 'email')],
    'password' =>'required',
    // 'photo' =>'required',
    // 'name' => 'required'
]);
if($request->hasFile('photo')) {
    $formFields['photo'] = $request->file('photo')->store('photos', 'public');
}
// dd($formFields);

Client::create($formFields);
return redirect('/index')->with('message', 'Client created successfully!');
    }

    public function edit(Client $user) {
        return view('users.edit', ['user' => $user]);
    }

    public function update(Request $request, Client $user) {
        $formFields = $request->validate([
            // 'prefixname' =>'required',
            // 'firstname' =>'required',
            // 'middlename' =>'required',
            // 'lastname' =>'required',
            // 'suffixname' =>'required',
            // 'username' =>'required',
            // 'email' =>['required', 'email', Rule::unique('users', 'email')],
            'password' => 'sometimes',
            'photo' =>'sometimes',
            'name' => 'sometimes']);

            if($request->hasFile('photo')) {
                $formFields['photo'] = $request->file('photo')->store('photos', 'public');
            } else {
                $formFields['photo'] = $user->photo;
            }
            if($request->hasFile('password')){
                $formFields['password'] = Hash::make($request->password);
            } else {
                $formFields['password'] = $user->password;
            }
            $user->update($formFields);
            return redirect('/index')->with('message', 'User updated successfully!');    
    }

    public function showDeleted () {
        return view('users.showDeleted', ['users' => Client::onlyTrashed()->get()]);
    }

    public function restoreClient (Client $user) {
        $user->restore();
        return view('users.showDeleted', ['users' => Client::onlyTrashed()->get()]);
    }

    public function delete (Client $user) {
        $user->delete();
        return redirect('/index')->with('message', 'User deleted successfully');
    }

    public function destroy(Client $user) {
        $user->forceDelete();;
        return redirect('/index')->with('message', 'User softDeleted successfully');
    }
}
