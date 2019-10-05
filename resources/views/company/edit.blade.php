@extends('master')
@section('main_content')

        <!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('dist')}}/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title> </title>
</head>
<body>

<div class="container pt-5">


    @include('partial.message')

    <form class="form-box" action="{{route('company.update', $company->id)}}" method="post" enctype="multipart/form-data">
        <h3 class="form-box success">Update Company</h3><br>
        @csrf
        <div class="form-group ">
            <label for="exampleFormControlInput1">Name</label>
            <input type="text" value="{{ $company->name }}" class="form-control" id="exampleFormControlInput1" placeholder="your name like 'Ringku Islam'" name="name">
            {{$errors->first('name')}}
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">Email address</label>
            <input type="email" value="{{ $company->email }}" class="form-control" id="exampleFormControlInput1" name="email" placeholder="name@example.com">
            {{$errors->first('email')}}
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">Phone</label>
            <input type="text" value="{{ $company->phone }}" class="form-control" id="exampleFormControlInput1" name="phone" placeholder="01700000000">
            {{$errors->first('phone')}}
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">Address</label>
            <input type="text" value="{{ $company->address }}" class="form-control" id="exampleFormControlInput1" name="address" placeholder="address like vill/Sub-dist/Dist">
            {{$errors->first('address')}}
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">Status</label>
            <input type="radio" id="status_active" value="1" {{($company->status == 1)?'checked':''}} name="status">
            <label for="status_active">Active</label>

            <input type="radio" id="status_inactive" value="0" {{($company->status == 0)?'checked':''}}  name="status">
            <label for="status_inactive">Inactive</label>
            {{$errors->first('status')}}
        </div>


        <br>


        <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" value="Update">
        </div>


    </form>

</div>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    @endsection