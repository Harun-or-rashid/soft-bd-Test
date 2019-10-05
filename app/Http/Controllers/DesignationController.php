<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Department;
use App\Designation;
use Illuminate\Http\Request;
use App\Company;

class DesignationController extends Controller
{
    public function index()
    {
        $designation=Designation::all();

        return view('designation.list',compact('designation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies=Company::all();
        return view('designation.create')->with('companies', $companies);
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
            'department'=>'required|exists:departments,id',
            'title'=>'required',
        ]);

        try {
            $data = [
                'department_id' => $request->department,
                'title' => $request->title,
                'status' => 1,
            ];

            Designation::create($data);

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
    public function show($designation)
    {
        $data=Designation::find($designation);
        return view('designation.show')->with('designation',$data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $designation = Designation::find($id);

        if (!empty($designation)) {

          $companies = Company::all();
            $branches = Branch::all();
            $departments=Department::all();
            return view('designation.edit', compact('designation', 'companies', 'branches','departments'));
        }

        session()->flash('type', 'danger');
        session()->flash('message', 'Invalid Department');
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
            'department'=>'required|exists:departments,id',
            'title'=>'required',
        ]);

        $designation = Designation::find($id);

        if (!empty($designation)) {

            $designation->department_id = $request->department;
            $designation->title = $request->title;
            $designation->status = $request->status;

            $designation->save();

            session()->flash('type', 'success');
            session()->flash('message', 'Designation Update Successfully');
            return redirect()->back();

        } else {

            session()->flash('type', 'danger');
            session()->flash('message', 'Invalid Designation');
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
        $designation = Designation::find($id);

        if (!empty($designation)) {

            $designation->status = 0;

            $designation->save();

            session()->flash('type', 'success');
            session()->flash('message', 'Designation Deleted Successfully');
            return redirect()->back();
        }

        session()->flash('type', 'danger');
        session()->flash('message', 'Invalid Designation');
        return redirect()->back();

    }

    public function getDepartment(Request $request)
    {

        $branch_id = $request->branch_id;
        $departments = Department::where('branch_id', $branch_id)->get();

        return view('designation._ajax_get_department', compact('departments'));
    }


}
