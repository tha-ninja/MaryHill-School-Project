<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cases;
use App\Merits;
use App\User;
use Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Home";
        $data['names'] = ['Merits','Demerits'];
        $data['merits'] = Merits::where('type',0)->sum('points');
        $data['demerits'] = Merits::where('type',1)->sum('points');

        return view('Home.index',$data);
    }

    public function cases(Request $request){

      $data['title'] = "Cases & Points";
      $data['cases'] = Cases::where('status',1)->get();

      return view("Manage.cases", $data);
    }

    public function storeCase(Request $request){

      $case = $request->case_id ? Cases::find($request->case_id) : new Cases;
      $case->case = $request->case;
      $case->type = $request->type;
      $case->points = $request->points;
      $res = $case->save() ? back()->with('status','success') : back()->with('error','failed');

      return $res;
    }

    public function get_case(Request $request){

         return $data = Cases::find($request->case_id);

         
    }

    public function getCase($val){
       $data = Cases::find($val);
       return $data->points;
    }

    public function destroyCase(Request $request){

      $case = Cases::find($request->case_id);
      $case->status = 0;
      $case->save();

      return back();
    }

    public function merits(Request $request){

      $data['title'] = "Record Merit";
      $data['list'] = Merits::with('user_info')->with('admin')->with('cases')->where('type',0)->orderBy('id','DESC')->get();
      $data['cases'] = Cases::where('type','0')->where('status',1)->get();

      return view('Manage.merits',$data);

    }

    public function demerits(Request $request){

      $data['title'] = "Record Demerit";
      $data['list'] = Merits::with('user_info')->with('admin')->with('cases')->where('type',1)->orderBy('id','DESC')->get();
      $data['cases'] = Cases::where('type','1')->where('status',1)->get();

      return view('Manage.demerits',$data);

    }

    public function storeMerit(Request $request){

      $user = new User;
      $user->name = $request->name;
      $user->id_no = $request->id_no;
      $user->huduma_no = $request->huduma_no;
      $user->adm_no = $request->adm_no;
      $user->level = '0';
      $user->save();

      $admin = Auth::user();

      $merit = new Merits;
      $merit->user_id = $user->id;
      $merit->admin_id = $admin->id;
      $merit->case_id = $request->case_id;
      $merit->points = $this->getCase($request->case_id);
      $merit->type = '0';
      $res = $merit->save() ? back()->with('status','success') : back()->with('error','failed');

      return $res;

    }

    public function storeDemerit(Request $request){
      
      $user = new User;
      $user->name = $request->name;
      $user->id_no = $request->id_no;
      $user->huduma_no = $request->huduma_no;
      $user->adm_no = $request->adm_no;
      $user->level = '0';
      $user->save();

      $admin = Auth::user();

      $merit = new Merits;
      $merit->user_id = $user->id;
      $merit->admin_id = $admin->id;
      $merit->case_id = $request->case_id;
      $merit->points = $this->getCase($request->case_id);
      $merit->type = '1';
      $res = $merit->save() ? back()->with('status','success') : back()->with('error','failed');

      return $res;

    }
}
