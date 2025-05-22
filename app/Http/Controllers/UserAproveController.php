<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserAproveController extends Controller
{
    public function index(){
        $users = User::where('status', 'pending')->get();
        return view('dashboard.guru.Approve.index', compact('users'));
    }

    public function approve($id){
        $user = User::findOrFail($id);
        $user->status = 'approved';
        $user->save();
        return redirect()->route('guru.approved')->with('success', 'User berhasil disetujui');
    }

    public function reject($id){
        $user = User::findOrFail($id);
        $user->status = 'rejected';
        $user->save();
        return redirect()->route('guru.approved')->with('success', 'User berhasil ditolak');
    }
}
