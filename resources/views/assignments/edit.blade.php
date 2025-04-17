@include('dashboard.header')
<div class="card-header">
    <h2 class="card-title text-center">Update  {{$assignment->title}} Assignmen</h2>
</div>

 <div class="d-flex justify-content-center vh-100">
    <div class="p-4" style="width: 500px;">
<form action="{{ route('assignment.update', $assignment->id ) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="title">Assignment Title :</label>
    <input type="text" name="title" class="form-control" id="title" value="{{old('title', $assignment->title)}}">

    <label for="description">Description:</label>
    <textarea name="description" class="form-control" id="description" value="{{old('description', $assignment->description)}}"></textarea>

    <label for="deadline">Deadline:</label>
    <input type="date" name="deadline" class="form-control" id="deadline" value="{{old('deadline' , $assignment->deadline)}}">

    <div class="text-center mt-2">
        <button type="submit" class="btn btn-primary waves-effect waves-light"> Save</button>
        <a href="{{route('assignment.index')}}" class="btn btn-primary waves-effect waves-light">Back</a>
    </div>
</form>
    </div>
 </div>





