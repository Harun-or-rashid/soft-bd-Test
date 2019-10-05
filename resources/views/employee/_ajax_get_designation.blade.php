<option value="">--select--</option>
@foreach($designations as $designation)
    <option value="{{ $designation->id }}">{{ $designation->title }}</option>
@endforeach