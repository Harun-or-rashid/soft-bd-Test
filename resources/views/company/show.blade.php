

   @extends('master')
   @section('main_content')

<table class="table table-bordered table-hover">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Mobile Number</th>
        <th>Address</th>
        <th>Status</th>
    </tr>
    <tr>
        <td>{{$company->name}}</td>
        <td>{{$company->email}}</td>
        <td>{{$company->phone}}</td>
        <td>{{$company->address}}</td>
        @if($company->status==1)
            <td class="text-success">Active</td>
        @else
            <td class="text-danger">Inactive</td>
        @endif

    </tr>
</table>
       @endsection

