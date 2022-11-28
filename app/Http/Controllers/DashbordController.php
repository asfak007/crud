<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class DashbordController extends Controller
{
    public $studnets;
    public function home(){
        $this->studnets = Student::all();
        return view('dashboard.home',['students' => $this->studnets]);
    }
}
