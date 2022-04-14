<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Company;

use Validator;

use Session;
use Illuminate\Support\Facades\Redirect;


class CompanyController extends Controller
{
   
    public function index()
    {
                
        $companies = Company::paginate(10);
        return view('admin.company.index', compact('companies'));
    }
   
    public function create()
    {
        return view('admin.company.create');
    }

   
    public function store(Request $request)
    {
        $response_code = 200;
        $message = array('error'=>array('something went wrong'));
        $success = false ;
        $data = $request->all();

        $rules = [
            'company_name' => 'required',
            'company_email' => 'required|email',
            'company_website' => 'required',
            
            'company_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];


        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            $response_code = 400;
            $message = array('error'=>$validator->errors()->all());
        } else {
            $company = new Company();
            $company->company_name = $request->company_name;
            $company->company_email = $request->company_email;
            $company->company_website = $request->company_website;
            $company->company_logo = $request->company_logo;
            $company->save();
            $success = true;
            $message = array('success'=>'Company added successfully');
        }

        return response()->json(['success'=>$success,'message'=>$message], $response_code);



        
    }

   
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $company = Company::where('company_id',$id)->first();

        return view('admin.company.edit',compact('company'));     
    }

   
    public function update(Request $request,$id)
    {
    
        $response_code = 200;
        $message = array('error'=>array('something went wrong'));
        $success = false ;
        $data = $request->all();

       

  
            $rules=[

               

                'company_name' => 'required',
                'company_email' => 'required|email',
                'company_website' => 'required',
               
                'company_logo' => 'nullable|max:10000|mimes:jpeg,jpg,png,webp',
               
               
            ];
            $validator = Validator::make($data,$rules);
            if($validator->fails()){
                $success = false;
                $message = $validator->errors();
            }else{

                $mdata = array(
                    'company_name' => $request->company_name,
                    'company_email' => $request->company_email,
                    'company_website' => $request->company_website,
                   
                );

                if(isset($data['company_logo']) && $data['company_logo'] != ''){
                    $path = $request->file('company_logo')->store('Gallery/company/'.$company->company_id,'public');
                    $mdata['company_logo']=$path;
                }


               $company = Company::where('company_id',$request->company_id);
                $company->update($mdata);

                $success = true;
                $message = array('success'=>'Company updated successfully');
                


                
                
             
              
            }
            
            Session::flash('message', 'Successfully updated Companies!');
            return Redirect::to('companies');
       

    }

   
    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();
        Session::flash('message', 'Successfully deleted Company!');
        return Redirect::to('companies');
    }
}
