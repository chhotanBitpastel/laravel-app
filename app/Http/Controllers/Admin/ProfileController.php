<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class ProfileController extends Controller
{
    public function dashboard(){
        $totalStudents = Student::count();
        $data=[
            'title' => 'Dashboard',
            'totalStudents' => $totalStudents
        ];
        return view('admin.dashboard', $data);
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('getLogin')->with('success', 'You have been successfully logged out');
    }
}
