@include('dashboard.header')
        
            <h2 class="text-center">Update <span class="text-info"> {{$lecturer->name}}</span> Information</h2>
        
<div class="d-flex justify-content-center vh-100">
    <div class="p-4" style="width: 500px;">
        <form method="POST" action="{{route('lecturer.update', $lecturer->id)}}">
            @csrf
            @method('PUT')
                {{-- <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $lecturer->name)}}">
                </div>
    
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $lecturer->email)}}">
                </div>  --}}

                <div class="form-group">
                    <label for="phone_number">phone</label>
                    <input type="text" name="phone_number" id="phone_number" class="form-control"value="{{ old('phone_number', $lecturer->phone_number)}}">
                </div>
              <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
              <a class="btn btn-primary waves-effect waves-light" href="{{route('lecturer.index')}}">Back</a>
        </form>        
    </div>
</div>

