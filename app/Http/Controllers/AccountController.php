<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    //

    //create
    public function create()
    {
        return view('register');
    }


    //save
    public function store(Request $request)
    {
        $valdata = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $valdata['password'] = Hash::make($valdata['password']);

        $cek = Account::where('username', $valdata['username'])->first();
        if($cek){
            return redirect('/account/create')->with('error','username telah digunakan');

        }

        $account = new Account();
        $account->username = $valdata['username'];
        $account->password = $valdata['password'];
        // dd($account);
        $berhasil = DB::insert('INSERT INTO accounts (username, password) VALUES (?, ?)', [
            $account->username,
            $account->password
        ]);
        if($berhasil){
            return redirect('/account/login');
        } else {
            return redirect('/account/create')->with('error','regist gagal');
        }
    }

    public function Accountlogin(){
        return view('login');
    }

    public function login(Request $request)
{
    $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    $username = $request->input('username');
    $password = $request->input('password');

    // Lakukan validasi kredensial pengguna secara manual
    if ($this->validateCredentials($username, $password)) {
        // Kredensial valid, lakukan sesuatu seperti menyimpan sesi dan redirect
        $account = $this->getUserByUsername($username);
        session(['account' => $account]);
        return redirect('/dashboard');
    }

    // Kredensial tidak valid, redirect kembali ke halaman login
    return redirect('/login')->with('error', 'Login failed');
}

// Fungsi untuk memvalidasi kredensial
private function validateCredentials($username, $password)
{
    // Implementasi validasi kredensial sesuai kebutuhan aplikasi, misalnya dengan query ke database
    $user = Account::where('username', $username)->first();

    if ($user && Hash::check($password, $user->password)) {
        return true; // Kredensial valid
    }

    return false; // Kredensial tidak valid
}

// Fungsi untuk mendapatkan pengguna berdasarkan nama pengguna (username)
private function getUserByUsername($username)
{
    return Account::where('username', $username)->first();
}



    public function logout()
    {
        if (session()->has('account')) {
            session()->flush();
        }
        return redirect('/');
    }
}
