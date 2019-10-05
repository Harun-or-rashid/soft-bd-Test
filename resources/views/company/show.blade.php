@extends('master')
@section('main_content')

    @include('partial.message')

    <div class="col-md-6 col-md-offset-3">
        <table class="table table-bordered table-hover">

            <tr>
                <td>Name</td>
                <td>:</td>
                <td>{{ $company->name }}</td>
            </tr>

            <tr>
                <td>Email</td>
                <td>:</td>
                <td>{{ $company->email }}</td>
            </tr>

            <tr>
                <td>Mobile Number</td>
                <td>:</td>
                <td>{{ $company->phone }}</td>
            </tr>

            <tr>
                <td>Address</td>
                <td>:</td>
                <td>{{ $company->address }}</td>
            </tr>

            <tr>
                <td>Status</td>
                <td>:</td>
                <td>
                    @if($company->status == 1)
                        <span class="text-success">Active</span>
                    @else
                        <span class="text-danger">Inactive</span>
                    @endif
                </td>
            </tr>
        </table>
        <div class="col-md-6 col-md-offset-3">
@endsection

