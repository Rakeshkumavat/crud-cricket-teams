<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Famlily;

class FamilyController extends Controller
{
    public function index(){
        return view('frontend.index');
    }

    public function ourstory(){
        return view('frontend.our-story');
    }

    public function gallery(){
        return view('frontend.gallery');
    }

    public function contact(){
        return view('frontend.contact');
    }

    public function events(){
        return view('frontend.events');
    }

    public function userAdd(){
        return view('employee.user');
    }
    // public function insertUser(Request $request){
    //     $users = DB::table('famlilies')
    //                ->insert(['name'  =>$request->name,
    //                          'gender'=>$request->gender,
    //                          'mobile'=>$request->mobile,
    //                          'city'  =>$request->city]);
    //                         //  dd($users);
    //     return redirect()->route('user-list')->with('success','data enter successfully');
    // }

    // public function userList(){
    //     $users = DB::table('famlilies')->get();
    //     return view('employee.user_list', compact('users'));
    // }


    // public function postStore(Request $request){
    //     $input = $request->all();
    //     $users = new
    // }
}


