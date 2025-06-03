<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class addPoinController extends Controller
{

    public function indexAddPoint(){
        $users = User::where('status', 'approved')->whereHasRole('siswa')->get();
        return view('dashboard.admin.addPoin.index', compact('users'));
    }
    public function addPoin(Request $request, User $user){
         $request->validate([
        'poin' => 'required|integer|min:1',
    ]);

    $user->increment('poin', $request->poin);

    return back()->with('success', 'Poin berhasil ditambahkan ke siswa.');
    }

    public function decrement(Request $request, User $user){
        
        
        if($user->poin <= 0){
            return back()->with('error', 'point siswa sudah kosong');
        }
        
        $user->decrement('poin', 1);

        return back()->with('success', 'Poin siswa berhasil di kurangi.');
    }
}
