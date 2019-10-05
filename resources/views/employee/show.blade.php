@extends('master')
@section('main_content')

    <div class="row">
        <div class="text-center">
            <h2>Employee Details</h2>
        </div>

        @include('partial.message')

        <div class="col-md-6 col-md-offset-3">
            <table class="table table-bordered table-hover">

                <tr>
                    <td>Name</td>
                    <td>:</td>
                    <td>{{ $employee->name }}</td>
                </tr>

                <tr>
                    <td>Phone</td>
                    <td>:</td>
                    <td>{{ $employee->phone }}</td>
                </tr>

                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td>{{ $employee->email }}</td>
                </tr>

                <tr>
                    <td>Address</td>
                    <td>:</td>
                    <td>{{ $employee->address }}</td>
                </tr>

                <tr>
                    <td>Designation</td>
                    <td>:</td>
                    <td>{{ $employee->designation->title }}</td>
                </tr>

                <tr>
                    <td>Department</td>
                    <td>:</td>
                    <td>{{ $employee->designation->department->name }}</td>
                </tr>

                <tr>
                    <td>Branch</td>
                    <td>:</td>
                    <td>{{ $employee->designation->department->branch->name }}</td>
                </tr>

                <tr>
                    <td>Company</td>
                    <td>:</td>
                    <td>{{ $employee->designation->department->branch->company->name }}</td>
                </tr>

                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td>
                        @if($employee->status == 1)
                            <span class="text-success">Active</span>
                        @else
                            <span class="text-danger">Inactive</span>
                        @endif
                    </td>
                </tr>
            </table>

        </div>
    </div>

@endsection

