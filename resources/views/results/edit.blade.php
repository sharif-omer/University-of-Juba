
@include('dashboard.header')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

<div class="container mt-2">
    <h2 class="card-title text-center">Update Result Of Student Id: <strong class="text-info"> {{$result->student->student_id}} </strong></h2>
<form method="POST" action="{{route('results.update',$result->id)}}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="marks">Marks</label>
        <input type="text" name="marks" id="marks" class="form-control" required value="{{ old('marks')}}">
        @error('marks')
        <div class="alert alert-danger">
            {{$message}}
        </div>
        @enderror   
    </div>  
    <button type="submit" class="btn btn-primary">Save</button>
</form>
</div>


