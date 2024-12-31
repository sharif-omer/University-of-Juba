@include('dashboard.header') 
     <section>
          <div class="card-header">
              <a href="{{route('calendar.create')}}" class="text-center btn btn-primary waves-effect waves-light float-right">Create</a>
                <a href="{{route('dashboard')}}" class="text-center btn btn-primary waves-effect waves-light float-end">Back</a>
          </div> 
     <div class="card-body">
         <table class="table" id="table1">
                <thead>
                    <tr>
                        {{-- <th>ID</th> --}}
                        <th>Title</th>
                        <th>Description</th>
                        <th>Event Type</th>
                        <th>Academic Year</th>
                        <th>Semester</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                        @php($i = 1)
                        @foreach ($calendar as $item)
                        <tr>
                            {{-- <td>{{$i++}}</td> --}}
                            <td>{{$item->title}} </td>
                            <td>{{$item->description}} </td>
                            <td>{{$item->event_type}} </td>
                            <td>{{$item->academic_year}} </td>
                            <td>{{$item->semester}} </td>
                            <td>{{$item->start_time}} </td>
                            <td>{{$item->end_time}} </td>
                            <td>
                                <form action="{{route('calendar.edit', $item->id)}}" method="GET">
                                    @csrf
                                    @method('GET')
                                    <button type="submit" class="btn btn-primary sm">
                                     {{-- <i class="fas fa-trash-alt"></i>  --}}
                                     <i class="fas fa-trash-alt">
                                    </i> 
                                    </button>
                                 </form> 
                            </td>
                            <td>
                                 <form action="{{route('calendar.destroy', $item->id)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Calendar ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger sm">
                                     <i class="fas fa-trash-alt"></i> 
                                    </button>
                                 </form> 
                          </td>                                   
                            {{-- <td>
                                <form action="{{route('calendar.destroy', $calender->id)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this lecture ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger sm">
                                     <i class="fas fa-trash-alt"></i> 
                                    </button>
                                 </form>                           
                            </td>                                  --}}
                        </tr>
                        @endforeach   
                </table>
            </div>
    </section>

