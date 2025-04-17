@include('dashboard.header')

<div class="card-header">
    <h2 class="card-title text-center">Create Lecturer</h2>
</div>
<div class="d-flex justify-content-center vh-100">
   <div class="p-4" style="width: 500px;">
        <form method="POST" action="{{route('lecturer.store')}}">
            @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" required value="{{old('name')}}">
                </div>

                @error('name')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                   @enderror

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required value="{{old('email')}}">
 
                    @error('email')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                   @enderror
                </div> 

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required value="{{old('password')}}">

                    @error('password')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                   @enderror
               

                   <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required value="{{old('password_confirmation')}}">

                    @error('password_confirmation')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                   @enderror
                </div> 

                <div class="form-group">
                    <label for="phone_number">phone</label>
                    <input type="text" name="phone_number" id="phone_number" class="form-control" required value="{{old('phone_number')}}">
                </div>

                @error('phone_number')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
               @enderror

                <div class="text-center">
                    <button type="submit" class="btn btn-primary waves-effect waves-light"> Save</button>
                    <a href="{{route('lecturer.index')}}" class="btn btn-primary waves-effect waves-light">Back</a>
                </div>
        </form>  
    </div>      
</div>

