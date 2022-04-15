<?php

namespace App\Http\Controllers;
use Auth;
use Validator;

use Illuminate\Http\Request;

class AdminViewController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function home()
    {
        return view('admin.index');
    }

    
    function adminLogin(Request $request){
        if(Auth::guard('admin')->user()) return redirect()->route('home');
       
        if($request->isMethod('post')){
            $success = false ;
            $data = $request->all();
            $message = array('error'=>array('something went wrong')) ;
            $rules = [
                'email'=>'required|email',
                'password'=>'required|min:6',
             ];
             $validator = Validator::make($data,$rules);
             if($validator->fails()){
                 $success = false;
                 $result = '';
                 $message = $validator->errors();
             }else{
                 if(Auth::guard('admin')->attempt(['email' => $data['email'],'password' => $data['password']])){
                    $message = array('success'=>array('Logged in successfully!!'));
                    $success = true;
                 }else{
                    $message = array('error'=>array('Email or password incorrect.'));
                    $success = false;
                 }
             }
           
            return response()->json(['success'=>$success,'message'=>$message]);
        }
        return view('admin.login');
    }

    function logout(Request $request){
        Auth::guard('admin')->logout();
        $request->session()->flush();
        return redirect()->route('adminLogin');
    }
}
