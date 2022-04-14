<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employee;
use App\Models\Company;

use Validator;

use Session;
use Illuminate\Support\Facades\Redirect;



class EmployeeController extends Controller
{
  
    public function index()
    {
       
        $employees = Employee::paginate(10);
        $companies = Company::all();
        return view('admin.employee.index', compact('employees'), compact('companies'));
       
    }
   
   
    public function create()
    {
        $companies = Company::all();
        return view('admin.employee.create', compact('companies'));
    }

   
    public function store(Request $request)
    {
        $response_code = 200;
        $message = array('error'=>array('something went wrong'));
        $success = false ;
        $data = $request->all();

       

        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'company_id' => 'required',

        ];


        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            $response_code = 400;
            $message = array('error'=>$validator->errors()->all());
        } else {
            
            $employee = new Employee();
            $employee->first_name = $request->first_name;
            $employee->last_name = $request->last_name;
            $employee->email = $request->email;
            $employee->phone_number = $request->phone_number;
            $employee->company_id = $request->company_id;
            $employee->save();
            $success = true;
            $message = array('success'=>'Employee added successfully');
        }

        return response()->json(['success'=>$success,'message'=>$message], $response_code);



    }

   
    public function show($id)
    {
        
    }

   
    public function edit($id)
    {
        $employee = Employee::find($id);
        $companies = Company::all();
        return view('admin.employee.edit', compact('employee'), compact('companies'));
       
    }

    
    public function update(Request $request, $id)
    {
        $response_code = 200;
        $message = array('error'=>array('something went wrong'));
        $success = false ;
        $data = $request->all();

       

        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'company_id' => 'required',

        ];


        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            $response_code = 400;
            $message = array('error'=>$validator->errors()->all());
        } else {
            
            $employee = Employee::find($id);
            $employee->first_name = $request->first_name;
            $employee->last_name = $request->last_name;
            $employee->email = $request->email;
            $employee->phone_number = $request->phone_number;
            $employee->company_id = $request->company_id;
            $employee->save();
            $success = true;
            $message = array('success'=>'Employee updated successfully');
        }

        Session::flash('message', 'Employee updated successfully');
        return Redirect::to('employees');
        
    }

   
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        Session::flash('message', 'Employee deleted successfully');
        return Redirect::to('employees');
        
    }
}
