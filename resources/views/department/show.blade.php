@extends('master')
@section('main_content')

    <div class="row">
        <div class="text-center">
            <h2>Department Details</h2>
        </div>


        @include('partial.message')

        <div class="col-md-6 col-md-offset-3">
            <table class="table table-bordered table-hover">

                <tr>
                    <td>Name</td>
                    <td>:</td>
                    <td>{{ $department->name }}</td>
                </tr>

                <tr>
                    <td>Branch</td>
                    <td>:</td>
                    <td>{{ $department->branch->name }}</td>
                </tr>

                <tr>
                    <td>Company</td>
                    <td>:</td>
                    <td>{{ $department->branch->company->name }}</td>
                </tr>

                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td>
                        @if($department->status == 1)
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

