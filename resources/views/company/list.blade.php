@extends('master')
@section('main_content')


    @include('partial.message')

    <a href="{{ route('company.create') }}" class="btn btn-primary">Create</a>
    <table class="table text-purple table-bordered table-hover">
        <tr>
            <th style="font-size: 25px">Name</th>
            <th>Email</th>
            <th>Contact No</th>
            <th>Branches</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        @foreach($companies as $company)

            <tr>
                <td>
                    <a style="text-decoration: none;font-size: 20px"
                       href="{{route('company.show',$company->id)}}">{{$company->name}}</a>
                </td>
                <td>{{$company->email}}</td>
                <td>{{$company->phone}}</td>
                <td>{{$company->branches->count()}}</td>
                <td>@if($company->status == 1)
                        <span class="text-success">Active</span>
                    @else
                        <span class="text-danger">Inactive</span>
                    @endif</td>
                <td>
                    <a href="{{route('company.show',$company->id)}}" class="btn btn-xs btn-success" title="View"><i
                                class="fa fa-eye"></i></a>
                    <a href="{{route('company.edit',$company->id)}}" class="btn btn-xs btn-primary" title="Edit"><i
                                class="fa fa-pencil-square"></i></a>
                    <a href="{{route('company.destroy',$company->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-xs btn-danger" title="Edit"><i
                                class="fa fa-trash-o"></i></a>
                </td>
            </tr>
        @endforeach
    </table>


@endsection