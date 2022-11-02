@extends('admin.layout.app')
@section('content')
<div class="dashboard">
    <div class=" p-3">
        <div class="card mt-5">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-8">
                        <h3>Edit Owner</h3>
                    </div>
                </div>

                <form class="form-horizontal" action="{{ url('/admin/update-owner',$owner->id) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group">
                            <label>First Name:</label>
                            <input type="text" name="first_name" id="name" value="{{$owner->first_name}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Last Name:</label>
                            <input type="text" name="last_name" id="name" value="{{$owner->last_name}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Business Name:</label>
                        <input type="text" name="businessname" id="businessname" value="{{$owner->business_name}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="text" name="email" id="name" value="{{$owner->email}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Phone:</label>
                        <input type="text" name="phone" id="name" value="{{$owner->phone}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>ABN:</label>
                        <input type="text" name="abn" id="name" value="{{$owner->abn}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Year Of Experience:</label>
                        <input type="text" name="yearofoperation" id="yearofoperation" value="{{$owner->years_of_operation}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Website:</label>
                        <input type="text" name="website" id="website" value="{{$owner->website}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Specialise In:</label>
                        <input type="text" name="specialise" id="name" value="{{$owner->specialize_in}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Address:</label>
                        <textarea type="text" name="address" id="name"  class="form-control">{{$owner->address}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Suburb:</label>
                        <input type="text" name="suburb" id="name" value="{{$owner->suburb}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>State:</label>
                        <input type="text" name="state" id="website" value="{{$owner->state}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>PostCode:</label>
                        <input type="text" name="postcode" id="website" value="{{$owner->postcode}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Country:</label>
                        <input type="text" name="country" id="website" value="{{$owner->country}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Description:</label>
                        <textarea type="text" name="description" id="website"  class="form-control">{{$owner->description}}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Image:</label>
                        <input type="file" name="file" id="imagePreview"  class="form-control">
                        <div  style="margin-top:10px;">
                            <img src="{{ $owner->image }}" alt="" id="imagePreviewSrc" style="width:20%">
                        </div> 
                    </div>

                    <div class="">
                        <button style="margin-left:auto; margin-top:10px" type="submit" class="btn btn-primary">Update<i class="icon-arrow-right14 "></i></button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection