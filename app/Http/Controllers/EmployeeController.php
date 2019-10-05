<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Company;
use App\Department;
use App\Designation;
use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees=Employee::all();

        return view('employee.list',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies=Company::all();
        return view('employee.create')->with('companies', $companies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'designation'=>'required|exists:designations,id',
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required|email',
            'address'=>'required',
            'image'=>'required|file|image',
        ]);

        try {
            $data = [
                'designation_id' => $request->designation,
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
                'status' => 1,
            ];

            if (request()->hasFile('image')){/**/
                if ($request->file('image')->isValid()) {//**
                    $extension = $request->image->extension();
                    $fileName=time().'.'.$extension;
                    $path = $request->image->storeAs('images', $fileName);//***
                    $data['image']=$fileName;
                }
            }


            Employee::create($data);

            session()->flash('type', 'success');
            session()->flash('message', 'Company Created Successfully');

            return redirect()->back();

        } catch (\Exception $exception) {

            session()->flash('type', 'danger');
            session()->flash('message', 'Something Went Wrong. '.$exception->getMessage());
            return redirect()->back();
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($employee)
    {
        $data=Employee::find($employee);
        return view('employee.show')->with('employee',$data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);

        if (!empty($employee)) {

            $companies = Company::all();
            $branches = Branch::all();
            $departments=Department::all();
            $designations=Designation::all();
            return view('employee.edit', compact('designations', 'companies', 'branches','departments', 'employee'));
        }

        session()->flash('type', 'danger');
        session()->flash('message', 'Invalid Employee');
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'designation'=>'required|exists:designations,id',
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required|email',
            'address'=>'required',
            'image'=>'nullable|file|image',
        ]);

        $employee = Employee::find($id);

        if (!empty($employee)) {

            $employee->designation_id = $request->designation;
            $employee->name = $request->name;
            $employee->phone = $request->phone;
            $employee->email = $request->email;
            $employee->address = $request->address;
            $employee->status = $request->status;

            if (request()->hasFile('image')){/**/
                if ($request->file('image')->isValid()) {//**
                    $extension = $request->image->extension();
                    $fileName=time().'.'.$extension;
                    $path = $request->image->storeAs('images', $fileName);//***

                    $employee->image = $fileName;
                }
            }



            $employee->save();

            session()->flash('type', 'success');
            session()->flash('message', 'Employee Update Successfully');
            return redirect()->back();

        } else {

            session()->flash('type', 'danger');
            session()->flash('message', 'Invalid Employee');
            return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);

        if (!empty($employee)) {

            $employee->status = 0;

            $employee->save();

            session()->flash('type', 'success');
            session()->flash('message', 'Employee Deleted Successfully');
            return redirect()->back();
        }

        session()->flash('type', 'danger');
        session()->flash('message', 'Invalid Employee');
        return redirect()->back();

    }

    public function getDesignation(Request $request)
    {

        $department_id = $request->department_id;
        $designations = Designation::where('department_id', $department_id)->get();

        return view('employee._ajax_get_designation', compact('designations'));
    }

}
