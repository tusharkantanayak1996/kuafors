@extends('owner.layout.app')

@section('content')


    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div id="content" class="content">
                    <div id="status"></div>
                    <div class="row">
                        <div class="card col-md-12">
                            <form method="POST" action="{{url('/owner/location/save')}}" enctype="multipart/form-data">
                                @csrf
                                &nbsp;
                                <div class="form-group"><label for="form_name">Add Location</label> <input type="text"
                                        name="location" placeholder="Enter Location" required="required" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label>Total Number Of Chair</label><br />
                                    <input type="number" placeholder="Enter Total Number Of Chair" name="total_no_of_chair" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label>Total Number Of Room</label><br />
                                    <input type="number" placeholder="Enter Total Number Of Room" name="total_no_of_room" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label>Total Number Of Space</label><br />
                                    <input type="number" placeholder="Enter Total Number Of Space" name="total_no_of_space" class="form-control" />
                                </div>
                                <div class="form-group text-right"><button type="submit"
                                        class="btn btn-primary">Submit</button></div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
