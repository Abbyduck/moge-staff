<?php

namespace App\Http\Controllers;

use App\Models\Staffs;
use Illuminate\Http\Request;

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
        return view('home');
    }

    public function verifyEmail(Request $request){

        $staff = Staffs::find($request->route('id'));
        if(sha1($staff->email) === (string)$request->route('hash')){
            $staff->email_verified_at = date('Y-m-d H:i:s', time());
            $staff->save();
        }

        return redirect('/');
    }
}
