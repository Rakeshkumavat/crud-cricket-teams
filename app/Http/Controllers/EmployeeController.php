<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Employee;
use App\EmployeeAddress;

class EmployeeController extends Controller
{
    public function employeeForm(){
        return view('employee.employee_form');
    }

    public function employeeInsert(Request $request){

        $request->validate([
            'first_name'=>'required|min:3',
            'last_name'=>'required|min:3',
            'mobile'=>'required|numeric|digits:10|unique:employees',
            'email'=>'required|email|unique:employees,email',
            'employee_address'=>'required',
            'hobby'=>'required',
            'gender'=>'required',
            'image'=>'required|mimes:jpeg,jpg,png,gif|max:1000',
        ],[
            // 'mobile.required'=>'hduycxxsxuyuyg',
        ]);
        // dd($request->all());
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('employees'),$imageName);
        // dd($request);
        // dd($request->all());
        // $data=Employee::all();
        $employee = new Employee;
        // dd($employee);

        // dd($employee_address);
        $employee->image = $imageName;
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->mobile = $request->mobile;
        $employee->email = $request->email;

        $employee->country_id = $request->country_id;
        $employee->hobby = implode(',', $request->hobby);
        $employee->gender = $request->gender;

        $employee->save();
        // EmployeeAddress
        $employee_address = new EmployeeAddress;
        $employee_address->employee_address = $request->employee_address;
        $employee_address->employee_id = $employee->id;
        $employee_address->save();

        return redirect()->route('employee-data')->with('success','data enter successfully');


    }
    public function employeeList(Request $request){
        $email = $request->input('email');
        $mobile = $request->input('mobile');

        // $employee_address = employee_address::with('employee_address')->get();
        // dd($employee_address);
        // $employee_address =  Employee_address::all();
        $query = Employee::with('employee');
        // dd($query);
        $query->when($email, function ($q) use ($email) {
            return $q->where('email', 'LIKE', "{$email}%");
        });
        $query->when($mobile, function ($q) use ($mobile) {
            return $q->where('mobile', 'LIKE', "{$mobile}%");
        });

        $users = $query->orderBy("id", "desc")->paginate(10);

        return view('employee.employee_list', compact('users','email','mobile'));
    }

    public function employeeEdit($id){
        $users = Employee::with('employee')->find($id);
        // dd($users->employee->employee_address);
        // $employee_address = EmployeeAddress::find($users->id);
        // dd($employee_address);

        return view('employee.employee_edit',compact('users'));
    }

    public function employeeUpdate(Request $request){

        $request->validate([
            'first_name'=>'required|min:3',
            'last_name'=>'required|min:3',
            'mobile'=>'required|numeric|digits:10|unique:employees,mobile,'.$request->id,
            'email'=>'required|email|unique:employees,email,'.$request->id,
            // 'employee_address'=>'required',
            'hobby'=>'required',
            'gender'=>'required',
            'image'=>'nullable|mimes:jpeg,jpg,png,gif|max:1000'
        ],[
            // 'mobile.required'=>'hduycxxsxuyuyg',
        ]);



        $users = Employee::find($request->id);

        // dd($users);
        if(isset($request->image)){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('employees'),$imageName);
            $users->image = $imageName;
            }
        $users->first_name = $request->first_name;
        $users->last_name = $request->last_name;
        $users->mobile = $request->mobile;
        $users->email = $request->email;
        $users->country_id = $request->country_id;
        $users->hobby = implode(',', $request->hobby);
        $users->gender = $request->gender;

        $users->save();
        $employee_address = EmployeeAddress::where('employee_id',$users->id)->first();
        $employee_address->employee_address = $request->employee_address;
        $employee_address->employee_id = $users->id;
        $employee_address->save();
        // dd($employee_address);
        return redirect()->route('employee-list')->with('success','data update successfully');
    }

    public function deleteData($id){
        $users = Employee::find($id);
        $users->delete();
        return redirect()->route('employee-list');
    }

    // public function search(Request $request){
    //     // Get the search value from the request
    //     $search = $request->input('search');

    //     // Search in the title and body columns from the posts table
    //     $posts = Employee::query()
    //         ->where('first_name', 'LIKE', "%{$search}%")
    //         ->orWhere('last_name', 'LIKE', "%{$search}%")
    //         ->get();

    //     // Return the search view with the resluts compacted
    //     return view('search', compact('posts'));
    // }

    public function employeeData(Request $request){




        // $users = Employee::with('employee')->first();
        $users = Employee::with('employee')->get();
        // $users->where('employee_address')->get();
        // dd($users);

        // $users = Employee::with('employee');
        // $users = Employee::where('mobile','LIKE','%'.'99'.'%')->get();
        // $users = Employee::whereDate('created_at', date('2023-12-04'))->get();

        // dd($users);
        // echo"<pre>";
        // print_r($users->employee->employee_address);
        // echo"</pre>";
        // dd($users->employee->employee_address);
        dd($users->toArray());
        // $employee_address = EmployeeAddress::find($users->id);
        // dd($employee_address);

        return view('employee.employee_list_dd',compact('users'));
    }



     public function showEmployee(){
        $users = DB::table('employees')
                     ->select('first_name','mobile')
                     ->get();
        // return $users;
        dd($users->toArray());
     }










}
