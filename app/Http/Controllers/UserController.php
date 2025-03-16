<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\models\User;
class UserController extends Controller
{
    public function index()
    {
        // $users = DB::table('users')->get();
        $users = User::all();
        return view('users', compact('users'));
    }

    public function create(Request $request)
    {
        // DB::table('users')->insert([
        //     'name' => $request->input('name'),
        //     'email' => $request->input('email'),
        //     'password' => Hash::make($request->input('password'))

        // ]);
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        // DB::table('users')->where('id', $id)->delete();
        User::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function edit($id)
    {
        // $user = DB::table('users')->where('id', $id)->first();
        // $users = DB::table('users')->get();
        $user = User::findOrFail($id);
        $users = User::all();
        return view('users', compact('user', 'users'));
    }

    public function update(Request $request, $id)
    {
        // DB::table('users')
        //     ->where('id', $request->input('id'))
        //     ->update([
        //         'name' => $request->input('name'),
        //         'email' => $request->input('email')
        //     ]);
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
        return redirect('users');
    }
}
