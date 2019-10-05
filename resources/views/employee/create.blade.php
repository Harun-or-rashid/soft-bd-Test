@extends('master')
@section('main_content')

        <!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('dist')}}/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title></title>
</head>
<body>

<div class="container pt-5">

    @include('partial.message')

    <form class="form-box" action="{{route('employee.store')}}" method="post" enctype="multipart/form-data">
        <h3 class="form-box success">Create New Employee</h3><br>
        @csrf

        <div class="form-group ">
            <label for="company">Company</label>
            <select name="company" id="company" class="form-control">
                <option value="">--select--</option>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
            </select>
            {{$errors->first('company')}}
        </div>

        <div class="form-group ">
            <label for="branch">Branch</label>
            <select name="branch" id="branch" class="form-control">
                <option value="">--Select Company First--</option>
            </select>
            {{$errors->first('branch')}}
        </div>

        <div class="form-group ">
            <label for="department">Department</label>
            <select name="department" id="department" class="form-control">
                <option value="">--Select branch First--</option>
            </select>
            {{$errors->first('department')}}
        </div>

        <div class="form-group ">
            <label for="designation">Designation</label>
            <select name="designation" id="designation" class="form-control">
                <option value="">--Select Department First--</option>
            </select>
            {{$errors->first('designation')}}
        </div>



        <div class="form-group ">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter Employee Name" name="name">
            {{$errors->first('name')}}
        </div>

        <div class="form-group ">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" placeholder="Enter Employee Phone Number" name="phone">
            {{$errors->first('phone')}}
        </div>

        <div class="form-group ">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Enter Employee Email" name="email">
            {{$errors->first('email')}}
        </div>

        <div class="form-group ">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" placeholder="Enter Employee Address" name="address">
            {{$errors->first('address')}}
        </div>

        <div class="form-group ">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
            {{$errors->first('image')}}
        </div>


        <br>
        <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" value="Submit">
        </div>


    </form>
    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
</div>


@endsection


@section('custom_script')
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function () {


            $("#company").change(function () {

                let route = "{{ route('department.get-branch') }}";
                let _token = $("#_token").val();
                let company_id = this.value;


                $.ajax({
                    type: "POST",
                    url: route,
                    data: {company_id: company_id, _token: _token},
                    success: function (result) {
                        $("#branch").html(result);
                    }
                });



            });

            $("#branch").change(function () {

                let route = "{{ route('designation.get-department') }}";
                let _token = $("#_token").val();
                let branch_id = this.value;


                $.ajax({
                    type: "POST",
                    url: route,
                    data: {branch_id: branch_id, _token: _token},
                    success: function (result) {
                        $("#department").html(result);
                    }
                });
            });


            $("#department").change(function () {

                let route = "{{ route('employee.get-designation') }}";
                let _token = $("#_token").val();
                let department_id = this.value;


                $.ajax({
                    type: "POST",
                    url: route,
                    data: {department_id: department_id, _token: _token},
                    success: function (result) {
                        $("#designation").html(result);
                    }
                });
            });


        });

    </script>
@endsection