<option value="">--select--</option>
@foreach($branches as $branch)
    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
@endforeach