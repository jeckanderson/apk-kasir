<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $user = User::latest();

        if(request('search')) {
            $user->where('username', 'like', '%' . request('search') . '%')
                    ->orWhere('nama', 'like', '%' . request('search') . '%')
                    ->orWhere('akses', 'like', '%' . request('search') . '%');
        }

        return view('dashboard.user.index', [
            'title' => 'Data User',
            'users' => $user->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.user.create', [
            'title' => 'Tambah Data User'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attr = $request->validate([
            'username' => ['required', 'min:3', 'unique:users'],
            'nama' => ['required', 'max:255'],
            'email' => ['required', 'email', 'unique:users'],
            'akses' => ['required'],
            'password' => ['required', 'min:5', 'max:255']
        ]);

        // $attr['password'] = Hash::make($attr['password']);

        User::create($attr);

        return redirect('dashboard/user')->with('success', 'Data User di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.user.edit', [
            'title' => 'Edit Data User',
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $attr = $request->validate([
            'username' => ['required','unique:users'],
            'nama' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'akses' => ['required'],
            'password' => ['required', 'min:5', 'max:255']
        ]);

        User::where('id', $user->id)->update($attr);

        return redirect('dashboard/user')->with('success', 'Data User di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // User::destroy($user->id);
        $user->delete();

        return redirect('dashboard/user')->with('success', 'Data User di Hapus');
    }
}
