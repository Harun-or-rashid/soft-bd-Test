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

    <form class="form-box" action="{{route('department.store')}}" method="post" enctype="multipart/form-data">
        <h3 class="form-box success">Create New Department</h3><br>
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
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter Branch Title" name="name">
            {{$errors->first('name')}}
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


        });

    </script>
@endsection