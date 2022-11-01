@extends('admin.layout.app')
@section('content')
<div class="dashboard">
    <div class=" p-3">
        <div class="card mt-5">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-8">
                        <h3>Edit Technician</h3>
                    </div>
                </div>

                <form class="form-horizontal" action="{{ url('/admin/update-technician',$technician->id) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group">
                            <label>First Name:</label>
                            <input type="text" name="first_name" id="name" value="{{$technician->first_name}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Last Name:</label>
                            <input type="text" name="last_name" id="name" value="{{$technician->last_name}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Business Name:</label>
                        <input type="text" name="businessname" id="businessname" value="{{$technician->business_name}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="text" name="email" id="name" value="{{$technician->email}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Phone:</label>
                        <input type="text" name="phone" id="name" value="{{$technician->phone}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>ABN:</label>
                        <input type="text" name="abn" id="name" value="{{$technician->abn}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Year Of Experience:</label>
                        <input type="text" name="yearofoperation" id="yearofoperation" value="{{$technician->years_of_operation}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Website:</label>
                        <input type="text" name="website" id="website" value="{{$technician->website}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Specialise In:</label>
                        <input type="text" name="specialise" id="name" value="{{$technician->specialize_in}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Address:</label>
                        <textarea type="text" name="address" id="name"  class="form-control">{{$technician->address}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Suburb:</label>
                        <input type="text" name="suburb" id="name" value="{{$technician->suburb}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>State:</label>
                        <input type="text" name="state" id="website" value="{{$technician->state}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>PostCode:</label>
                        <input type="text" name="postcode" id="website" value="{{$technician->postcode}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Country:</label>
                        <input type="text" name="country" id="website" value="{{$technician->country}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Description:</label>
                        <textarea type="text" name="description" id="website"  class="form-control">{{$technician->description}}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Image:</label>
                        <input type="file" name="file" id="imagePreview"  class="form-control">
                        <div  style="margin-top:10px;">
                            <img src="{{ $technician->image }}" alt="" id="imagePreviewSrc" style="width:20%">
                        </div> 
                    </div>
                    <div class="" style="margin-left:965px; margin-top:10px">
                        <button type="submit" class="btn btn-primary">Update<i class="icon-arrow-right14 "></i></button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection