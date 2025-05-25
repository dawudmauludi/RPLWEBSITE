<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class addPoinController extends Controller
{

    public function index(){
        $users = User::where('status', 'approved')->whereHasRole('siswa')->get();
        return view('dashboard.guru.addPoin.index', compact('users'));
    }
    public function addPoin(Request $request, User $user){
         $request->validate([
        'poin' => 'required|integer|min:1',
    ]);

    $user->increment('poin', $request->poin);

    return back()->with('success', 'Poin berhasil ditambahkan ke siswa.');
    }
}
