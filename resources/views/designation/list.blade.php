@extends('master')
@section('main_content')

    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">

                @include('partial.message')

                <a href="{{ route('branch.create') }}" class="btn btn-primary">Create</a>
                <table class="table text-purple table-bordered table-hover">
                    <tr>
                        <th>Title</th>
                        <th>Department</th>
                        <th>Branch Name</th>
                        <th>Company Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    @foreach($designation as $designation)

                        <tr>
                            <td>
                                <a style="text-decoration: none;font-size: 20px"
                                   href="{{route('designation.show',$designation->id)}}">{{$designation->title}}</a>
                            </td>
                            <td>{{ $designation->department->name }}</td>
                            <td>{{ $designation->department->branch->name }}</td>
                            <td>{{ $designation->department->branch->company->name }}</td>
                            <td>@if($designation->status == 1)
                                    <span class="text-success">Active</span>
                                @else
                                    <span class="text-danger">Inactive</span>
                                @endif</td>
                            <td>
                                <a href="{{route('designation.show',$designation->id)}}" class="btn btn-xs btn-success"
                                   title="View"><i
                                            class="fa fa-eye"></i></a>
                                <a href="{{route('designation.edit',$designation->id)}}" class="btn btn-xs btn-primary"
                                   title="Edit"><i
                                            class="fa fa-pencil-square"></i></a>
                                <a href="{{route('designation.destroy',$designation->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-xs btn-danger" title="Edit"><i
                                            class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>


@endsection