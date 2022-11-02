@extends('owner.layout.app')

@section('page-titles','Lessons')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        
        <div class="mx-4">
           
            <a class="btn btn-primary" href="{{url('/owner/locations')}}" style="margin-top: 10px; float: right;">Add Location</a>
            
        </div>
        <div class="card-body">
            
            <!-- <h4 class="card-title">Severus Snape</h4> -->
          
                <table class="table table-bordered table-striped ">
                    <thead>
                        <tr>
                            <th>Location</th>
                            <th>Total Number Of Chair</th>
                            <th>Total Number Of Room </th>
                            <th>Total Number Of Space </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($locations as $location)
                      <tr>
                        <td>{{$location->location}}</td>
                        <td>{{$location->total_no_of_chair}}</td>
                        <td>{{$location->total_no_of_room}}</td>
                        <td>{{$location->total_no_of_space}}</td>
                        <td> <a href="{{url('/owner/editlocation',$location->id)}}"
                            class="btn btn-success">Edit</a>
                        ||| <a href="{{url('/owner/delete/location',$location->id)}}"
                            class="btn btn-danger">Delete</a></span></td>
                        
                      </tr>  
                      @endforeach
                      
                    </tbody>
                </table>
              
         
       
        </div>
    </div>
</div>
@endsection