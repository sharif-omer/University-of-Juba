@include('dashboard.header')
    <h2 class="text-center">Create New Assignmen</h2>

 <div class="d-flex justify-content-center vh-100">
    <div class="p-4" style="width: 500px;">
<form action="{{ route('assignment.store') }}" method="POST">
    @csrf
    
    <label for="title">Assignment Title :</label>
    <input type="text" name="title" class="form-control" id="title" required value="{{old('title')}}">

    <label for="description">Description:</label>
    <textarea name="description" class="form-control" id="description"  required></textarea>

    <label for="deadline">Deadline:</label>
    <input type="date" name="deadline" class="form-control" id="deadline" required value="{{old('deadline')}}">

    <label for="students">Choose Student:</label>
    <select name="students[]" class="form-control" id="deadline" multiple required>
        @foreach($students as $student)
            <option value="{{ $student->id }}">{{ $student->name }}</option>
        @endforeach
    </select>

        <button type="submit" class="btn btn-primary waves-effect waves-light mt-2"> Save</button>
        <a href="{{route('lecturer')}}" class="btn btn-primary waves-effect waves-light mt-2">Back</a>
</form>
    </div>
 </div>





