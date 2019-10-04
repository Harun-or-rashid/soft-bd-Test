<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Company;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches=Branch::all();

        return view('branch.list',compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies=Company::all();
        return view('branch.create')->with('companies', $companies);
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
            'company'=>'required|exists:companies,id',
            'name'=>'required',
            'location'=>'required',
        ]);

        try {
            $data = [
                'company_id' => $request->company,
                'name' => $request->name,
                'location' => $request->location,
                'status' => 1,
            ];

            Branch::create($data);
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
    public function show($branch)
    {
        $data=Branch::find($branch);
        return view('branch.show')->with('branch',$data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $branch = Branch::find($id);

        if (!empty($branch)) {

            $companies = Company::all();
            return view('branch.edit', compact('branch', 'companies'));
        }

        session()->flash('type', 'danger');
        session()->flash('message', 'Invalid Company');
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
            'company'=>'required|exists:companies,id',
            'name'=>'required',
            'location'=>'required',
        ]);

        $branch = Branch::find($id);

        if (!empty($branch)) {

            $branch->company_id = $request->company;
            $branch->name = $request->name;
            $branch->location = $request->location;
            $branch->status = $request->status;

            $branch->save();

            session()->flash('type', 'success');
            session()->flash('message', 'Branch Update Successfully');
            return redirect()->back();

        } else {

            session()->flash('type', 'danger');
            session()->flash('message', 'Invalid Branch');
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
        $branch = Branch::find($id);

        if (!empty($branch)) {

            $branch->delete();

            session()->flash('type', 'success');
            session()->flash('message', 'Branch Deleted Successfully');
            return redirect()->back();
        }

        session()->flash('type', 'danger');
        session()->flash('message', 'Invalid Branch');
        return redirect()->back();

    }
}
