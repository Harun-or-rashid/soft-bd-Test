<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies=Company::all();

        return view('company.list',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
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
            'name'=>'required',
            'phone'=>'required',
            'email'=>'nullable|email',
            'address'=>'required',

        ]);

        $data=[
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'status'=>1,
        ];

        Company::create($data);
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($company)
    {
        $data=Company::find($company);
        return view('company.show')->with('company',$data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        if (!empty($company)) {
            return view('company.edit')->with('company',$company);
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
            'name'=>'required',
            'phone'=>'required',
            'email'=>'nullable|email',
            'address'=>'required',

        ]);

        $company = Company::find($id);

        if (!empty($company)) {

            $company->name = $request->name;
            $company->email = $request->email;
            $company->phone = $request->phone;
            $company->address = $request->address;
            $company->status = $request->status;

            $company->save();

            session()->flash('type', 'success');
            session()->flash('message', 'Company Update Successfully');
            return redirect()->back();

        } else {

            session()->flash('type', 'danger');
            session()->flash('message', 'Invalid Company');
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
        $company = Company::find($id);

        if (!empty($company)) {

            $company->delete();

            session()->flash('type', 'success');
            session()->flash('message', 'Company Deleted Successfully');
            return redirect()->back();
        }

        session()->flash('type', 'danger');
        session()->flash('message', 'Invalid Company');
        return redirect()->back();

    }

}
