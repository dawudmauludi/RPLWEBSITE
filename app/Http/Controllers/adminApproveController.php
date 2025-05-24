<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class adminApproveController extends Controller
{
     public function index(){
        $users = User::where('status', 'pending')
    ->whereHas('roles', function ($query) {
        $query->whereIn('name', ['siswa', 'guru']);
    })
    ->get();
        return view('dashboard.admin.approve.index', compact('users'));
    }

    public function approve($id){
        $user = User::findOrFail($id);
        $user->status = 'approved';
        $user->save();
        return redirect()->route('admin.approved')->with('success', 'User berhasil disetujui');
    }

    public function reject($id){
        $user = User::findOrFail($id);
        $user->status = 'rejected';
        $user->save();
        return redirect()->route('admin.approved')->with('success', 'User berhasil ditolak');
    }
}
