

   @extends('master')
   @section('main_content')

<table class="table table-bordered table-hover">
    <tr>
        <th>Name</th>
        <th>Position</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Blood Group</th>
    </tr>
    <tr>
        <td>{{$person->name}}</td>

        @if($person->role==1)
            <td>Super Admin</td>
        @elseif($person->role==2)
            <td>Authority</td>
        @elseif($person->role==3)
            <td>General Admin</td>
            @elseif($person->role==4)
                <td>Member</td>
                @endif
        <td>{{$person->email}}</td>
        <td>{{$person->phone}}</td>
        <td></td>
    </tr>
</table>
       @endsection

