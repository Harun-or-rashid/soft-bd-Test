<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Company;
use App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments=Department::all();

        return view('department.list',compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies=Company::all();
        return view('department.create')->with('companies', $companies);
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
            'branch'=>'required|exists:branches,id',
            'name'=>'required',
        ]);

        try {
            $data = [
                'branch_id' => $request->branch,
                'name' => $request->name,
                'status' => 1,
            ];

            Department::create($data);
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
    public function show($department)
    {
        $data=Department::find($department);
        return view('department.show')->with('department',$data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::find($id);

        if (!empty($department)) {

            $companies = Company::all();
            $branches = Branch::where('company_id', $department->branch->company_id)->get();
            return view('department.edit', compact('department', 'companies', 'branches'));
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
            'branch'=>'required|exists:branches,id',
            'name'=>'required',
        ]);

        $department = Department::find($id);

        if (!empty($department)) {

            $department->branch_id = $request->branch;
            $department->name = $request->name;
            $department->status = $request->status;

            $department->save();

            session()->flash('type', 'success');
            session()->flash('message', 'Department Update Successfully');
            return redirect()->back();

        } else {

            session()->flash('type', 'danger');
            session()->flash('message', 'Invalid Department');
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
        $department = Department::find($id);

        if (!empty($department)) {

            $department->delete();

            session()->flash('type', 'success');
            session()->flash('message', 'Department Deleted Successfully');
            return redirect()->back();
        }

        session()->flash('type', 'danger');
        session()->flash('message', 'Invalid Department');
        return redirect()->back();

    }

    public function getBranch(Request $request)
    {

        $company_id = $request->company_id;
        $branches = Branch::where('company_id', $company_id)->get();

        return view('department._ajax_get_branches', compact('branches'));
    }
}
