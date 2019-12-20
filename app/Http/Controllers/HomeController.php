<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
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

    public function settings()
    {
      $mm = DB::table('configurations')->where('name', '=', 'maintenance')->first();


        return view('settings', ['mmIsActive'=>($mm->value == "on")?true:false]);
    }

    public function postSettings(Request $request)
    {

      DB::update('update configurations set value = ? where name = "maintenance"', [(empty($request->mmIsActive))?"off":"on"]);


      return redirect('/settings');
    }

}
