<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        $users = User::where('role', '!=', 'customer')->get();

        return view('users.index', ['users' => $users]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request){
        // Validasi
        $request->validate([
            'name' =>  'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = bcrypt($request->password); // Mengenkripsi password menggunakan fungsi bcrypt

        $user->save();

        return redirect()->route('user.index')->with('success','Berhasil Tambah User');
    }

    public function edit($id)
    {
        $data = User::find($id);
        return view('users.edit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        // Validasi
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'required',
            'role' => 'required'

        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('user.index')->with('success', 'Berhasil Ubah Data');
    }


    public function destroy($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect()->route('user.index') ->with('success','Berhasil Hapus Data');
    }
}
