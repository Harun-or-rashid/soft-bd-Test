<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::all();

        return view('admin.user.list',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
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
            'email'=>'required',
            'phone'=>'required',
            'role'=>'required',
           'password'=>'required',
            'image'=>'required|file|image',

        ]);

       $data=[
           'name'=>$request->name,
           'email'=>$request->email,
           'phone'=>$request->phone,
           'role'=>$request->role,
           'password'=>bcrypt($request->password),
       ];

        if (request()->hasFile('image')){/**/
            if ($request->file('image')->isValid()) {//**
                $extension = $request->image->extension();
                $fileName=time().'.'.$extension;
                $path = $request->image->storeAs('images', $fileName);//***
                $data['image']=$fileName;
            }
        }

        User::create($data);
        return redirect('create.user');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {
        $data=User::find($user);

        return view('admin.user.show')->with('person',$data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



}
