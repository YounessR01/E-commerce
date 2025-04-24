<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }


public function update(Request $request)
{
    $user = Auth::user();

    $validator = Validator::make($request->all(), [
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'address' => 'nullable|string|max:255',
        'city' => 'nullable|string|max:255',
        'country' => 'nullable|string|max:255',
        'password' => 'nullable|string|min:8|confirmed',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $user->update([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'address' => $request->address,
        'city' => $request->city,
        'country' => $request->country,
    ]);

    if ($request->filled('password')) {
        $user->update([
            'password' => Hash::make($request->password),
        ]);
    }

    return back()->with('success', 'Profile updated successfully.');
}

}
