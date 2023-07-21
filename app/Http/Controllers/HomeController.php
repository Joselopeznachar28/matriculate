<?php

namespace App\Http\Controllers;

use App\Models\LapsoSchool;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use App\Models\YearSchool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {  
        $user = User::find(Auth::user()->id);
        return view('home',compact('user'));
    }

    public function dashboard(){
        $teachers = Teacher::all();
        $users = User::all();
        $year_schools = YearSchool::with('student_records')->get();
        $lapso_active = LapsoSchool::where('active', 1)->get();
        
        return view('dashboard',compact('teachers','users','year_schools','lapso_active'));
    }
}
