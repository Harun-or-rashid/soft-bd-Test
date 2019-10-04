@extends('master')
@section('main_content')

    <div class="row">
        <div class="text-center">
            <h2>Branch Details</h2>
        </div>
        <div class="col-md-6 col-md-offset-3">
            <table class="table table-bordered table-hover">

                <tr>
                    <td>Name</td>
                    <td>:</td>
                    <td>{{ $branch->name }}</td>
                </tr>

                <tr>
                    <td>Company</td>
                    <td>:</td>
                    <td>{{ $branch->company->name }}</td>
                </tr>

                <tr>
                    <td>Location</td>
                    <td>:</td>
                    <td>{{ $branch->location }}</td>
                </tr>

                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td>
                        @if($branch->status == 1)
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

