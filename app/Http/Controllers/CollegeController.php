<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collage;

class CollegeController extends Controller
{

    public function showCollegePage(){
        $college = new Collage();
        return view('employee.user',compact('college'));
    }

    public function insertData(Request $request){

        $request->validate([
            'name'=>'required',
            'short_code'=>'required',
            'image'=>'required|mimes:jpeg,jpg,png,bmp|max:2048|',
            'signature_image'=>'required|mimes:jpeg,jpg,png,bmp|max:2048|',
        ]);


        $college = new Collage;
        // dd($college);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('employees'),$imageName);

        $signatureImage = time().'.'.$request->signature_image->extension();
        $request->signature_image->move(public_path('employees'),$signatureImage);

        $college->name = $request->name;
        $college->short_code = $request->short_code;
        $college->image = $imageName;
        $college->signature_image = $signatureImage;
        $college->save();

        // dd($college);

        return redirect()->route('user-list')->with('success','data enter successfully');

    }


    public function collegeList(Request $request){

        $search = $request ['search'] ?? "";
        // dd($search);
        if($search != ""){
            // dd($search );
            $colleges =Collage::where('name', 'LIKE', "{$search}%")->get();
            // dd($colleges);
        }else{
            $colleges = Collage::all();
            // dd($colleges);
        }

        return view('employee.user_list', compact('colleges','search'));
    }

    public function collegeEdit($id){
        $college = Collage::find($id);
        return view('employee.user_update', compact('college'));
    }

    public function updateData(Request $request ){

        $college = Collage::find($request->id);
        $request->validate([
            'name'=>'required',
            'short_code'=>'required',
            'image'=>'nullable|mimes:jpeg,jpg,png,bmp|max:2048|',
            'signature_image'=>'nullable|mimes:jpeg,jpg,png,bmp|max:2048|',
        ]);
        // $input = $request->all();

        if(isset($request->image)){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('employees'),$imageName);
            $college->image = $imageName;
            }
        if(isset($request->signature_image)){
            $signatureImage = time().'.'.$request->signature_image->extension();
            $request->signature_image->move(public_path('employees'),$signatureImage);
            $college->signature_image = $signatureImage;
            }

        $college->name = $request->name;
        $college->short_code = $request->short_code;
        $college->save();
        return redirect()->route('user-list')->with('success','data update successfully');
    }


    public function deleteData($id){
        $college = Collage::find($id);
        $college->delete();
        return redirect()->route('user-list');
    }

    // public function statusActive(Request $request){
    //     $college = Collage::find($id);
    //     if($college){

    //     }
    // }


    public function showForm(){
        return view('employee.use_ajax');
    }

    public function storeData(Request $request){
        $request->validate([
            'name'=>'required',
            'short_code'=>'required',
            'image'=>'required|mimes:jpeg,jpg,png,bmp|max:2048|',
            'signature_image'=>'required|mimes:jpeg,jpg,png,bmp|max:2048|',
        ]);

        $college = new Collage;
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('employees'),$imageName);

        $signatureImage = time().'.'.$request->signature_image->extension();
        $request->signature_image->move(public_path('employees'),$signatureImage);

        $college->name = $request->name;
        $college->short_code = $request->short_code;
        $college->image = $imageName;
        $college->signature_image = $signatureImage;
        $college->save();
        return response()->json();
    }

    public function showList(Request $request){
        $search = $request ['search'] ?? "";
        if($search != ""){
            $colleges =Collage::where('name', 'LIKE', "{$search}%")->get();
        }else{
            $colleges = Collage::all();
            if($request->ajax()){
                return view('employee.list_data',compact('colleges','search'))->render();
            }
        }

        return view('employee.use_ajax_list',compact('colleges','search'));
        // return response()->json(['list'=>$college]);
    }

    public function deleteListData($id){
        $response = array('status'=>false);
        if ($id) {
            $college = Collage::find($id);
            $college->delete();
            $response['status'] = true;
        }
        return response()->json($response);
    }

    public function inActive($id){
        $response = array('status'=>false);
        $college = Collage::find($id);
        if ($college){
            $college->status = $college->status == 1 ? 0 : 1;
            $college->save();
        }
        return response()->json($response);
    }


    // student

    public function studentForm(){
        return view('student.student_form');
    }



    public function studentData(Request $request){
        $request->validate([
            'name'=>'required',
            'short_code'=>'required',
            'image'=>'required|mimes:jpeg,jpg,png,bmp|max:2048|',
            'signature_image'=>'required|mimes:jpeg,jpg,png,bmp|max:2048|',
        ]);

        $student = new Collage;
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('employees'),$imageName);

        $signatureImage = time().'.'.$request->signature_image->extension();
        $request->signature_image->move(public_path('employees'),$signatureImage);

        $student->name = $request->name;
        $student->short_code = $request->short_code;
        $student->birthdate = $request->birthdate;
        $student->image = $imageName;
        $student->signature_image = $signatureImage;
        $student->save();
        // dd($student);
        return response()->json();
    }


    public function studentList(Request $request){
        $search = $request ['search'] ?? "";
        if($search != ""){
            $students = Collage::where('name', 'LIKE', "{$search}%")->get();
        }else{
            $students = Collage::all();
            if($request->ajax()){
                return view('student.student_list',compact('students','search'))->render();
            }
        }
        return view('student.student_list',compact('students','search'));
    }

    public function studentEdit($id){
        $student = Collage::find($id);
        return view('student.student_edit', compact('student'));
    }

    public function updateStudentData(Request $request ){

        $student = Collage::find($request->id);
        $request->validate([
            'name'=>'required',
            'short_code'=>'required',
            'image'=>'nullable|mimes:jpeg,jpg,png,bmp|max:2048|',
            'signature_image'=>'nullable|mimes:jpeg,jpg,png,bmp|max:2048|',
        ]);
        // $input = $request->all();

        if(isset($request->image)){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('employees'),$imageName);
            $student->image = $imageName;
            }
        if(isset($request->signature_image)){
            $signatureImage = time().'.'.$request->signature_image->extension();
            $request->signature_image->move(public_path('employees'),$signatureImage);
            $student->signature_image = $signatureImage;
            }

        $student->name = $request->name;
        $student->short_code = $request->short_code;
        $student->birthdate =$request->birthdate;
        $student->save();
        return response()->json();
    }

    public function deleteStudentData($id){
    $response = array('status'=>false);
    if ($id) {
        $student = Collage::find($id);
        $student->delete();
        $response['status'] = true;
    }
    return response()->json($response);
}

public function activeInActive($id){
    $response = array('status'=>false);
    $student = Collage::find($id);
    if ($student){
        $student->status = $student->status == 1 ? 0 : 0;
        $student->save();
    }
    return response()->json($response);

}









}
