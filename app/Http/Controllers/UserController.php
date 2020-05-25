<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class UserController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function users(){

    	$data['title'] = "Users";
    	$data['users'] = User::where('level',1)->get();

    	return view('Users.index',$data);
    }

    public function storeUser(Request $request){

    	$check = User::where('email',trim($request->email))->count();
    	if($check > 0){
    		return back()->with('error','failed! user exists');
    	}

    	$pass = rand(100000,9999999);

    	$user = new User;
    	$user->name = $request->name;
    	$user->email = $request->email;
    	//$user->phone = $request->phone;
    	$user->password = $pass;
    	$res = $user->save() ? back()->with('status','success') : back()->with('error','failed');

    	$this->notice($request->name,$pass,$request->email,$request->phone);

    	return $res;
    }

    public function destroy(Request $request){

    	$user = User::find($request->id);
    	$user->status = 0;
    	$user->password = rand(100,8889);
    	$user->save();

    	return back();
    }

    public function notice($name,$password,$email,$phone){
		$username   = env('USN');
		$apikey     = env('AKEY');
		$from       = env('SMSID');
		$to = $this->sanitize_phone($phone);
		$link = url('/');
		$signature = "Merit and demerit system for Behavioural Training";
		$message = urlencode("Dear ".$name."\n Your account details are;\nPassword: ".$password."\nEmail: ".$email."\nLink: ".$link."\n".$signature);

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.africastalking.com/restless/send?username=$username&Apikey=$apikey&to=$to&message=$message&from=$from",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
            "Accept: application/json",
            "Cache-Control: no-cache",
            "Postman-Token: f875758b-be44-9b78-14fc-f5f8f7322871"
            //'Content-Type:application/json',
            ),
            ));

             $response = curl_exec($curl);
            $err = curl_error($curl);
    }

     public function sanitize_phone($phone)
  {
    # code...
    $length = strlen($phone);
    $new_phone = $phone;
    if ($length==13) {
    $new_phone = '254'.substr($phone, 4);
    }
    if ($length == 12) {
    $new_phone = '254'.substr($phone, 3);
    }
    if ($length == 10) {
    $new_phone = '254'.substr($phone, 1);
    }
    if ($length == 9) {
    $new_phone = '254'.($phone);
    }
    return $new_phone;
  }
}
