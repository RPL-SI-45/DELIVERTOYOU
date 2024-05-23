<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Validation\Rule;



class ProfileController extends Controller
{
    public function index(){
        return view('/profil');
    }

    public function updateProfile(Request $request)
{
    $user = User::find(auth()->user()->id);

    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => [
            'required',
            'string',
            'email',
            'max:255',
            Rule::unique('users')->ignore($user->id),
        ],
        'alamat' => 'nullable|string|max:255',
        'nomor_telepon' => 'nullable|string|max:15',
        'old-password' => 'required_with:new-password',
        'new-password' => 'nullable|min:8',
    ]);
    // $data = $request->all();
    // dd($data);

    // if ($validator->fails()) {
    //     return redirect()->back()->withErrors($validator)->withInput();
    // }
    if($validator->fails()){

        return response()->json([
        'status' => false,
        'message' => 'validation error',
        'errors' => $validator->errors()
    ], 401);
}

    // Check if old password matches
    if ($request->filled('old-password')) {
        if (!Hash::check($request->input('old-password'), $user->password)) {
            return redirect()->back()->withErrors(['old-password' => 'Old password is incorrect'])->withInput();
        }

        // Update password
        $user->password = Hash::make($request->input('new-password'));
    }

    // Update other fields
    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'nomor_telepon' => $request->nomor_telepon,
        'alamat' => $request->alamat,
    ]);

    return redirect('/home')->with('success', 'Profile updated successfully');
}
}
