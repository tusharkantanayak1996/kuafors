@extends('owner.layout.app')

@section('content')
    <div class="content-wrapper">
        <div class="card1">
        <div class="card-body">
            <h3 class="page-title">Create Profile</h3>
            <p class="card-description">Neque porro quisquam est qui dolorem ipsum quia dolor sit
                amet, consectetur, adipisci velit.. </p>

            <form class="forms-sample">

                <div class="form-group">
                    <label for="exampleInputEmail1">Business Name</label>
                    <input type="text" class="form-control" >
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="exampleInputEmail1">First Name</label>
                            <input type="text" class="form-control" >
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputEmail1">Last Name</label>
                            <input type="text" class="form-control" >
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" >
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="exampleInputEmail1">Email Address</label>
                            <input type="text" class="form-control" >
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputEmail1"> Phone Number</label>
                            <input type="text" class="form-control" >
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label>ABN</label>
                            <input type="text" class="form-control" >
                        </div>
                        <div class="col-md-4">
                            <label>Year of Operation</label>
                            <input type="text" class="form-control" >
                        </div>
                        <div class="col-md-4">
                            <label>Website</label>
                            <input type="text" class="form-control" >
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <label>How many staff do you have?</label>
                    <input type="text" class="form-control" >
                </div>
                <div class="form-group">
                    <label>How many chairs do you have?</label>
                    <select class="form-control">
                        <option></option>
                    </select>
                </div>
                <div class="form-group">
                    <label>How many chairs would you like to rent out?</label>
                    <select class="form-control">
                        <option></option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Is there parking available for staff and customers?</label>
                    <select class="form-control">
                        <option></option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="exampleInputEmail1"> Business logo</label>
                            <input type="file" class="form-control" >
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputEmail1">Insurance</label>
                            <input type="file" class="form-control" >
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Accept bookings less then 24 hr notice</label>
                    <input type="text" class="form-control">
                </div>

                <div class="form-group">
                    <label>Social media links</label>
                    <div class="row mb-2">
                        <div class="col-md-2"><img src="assets/images/insta.png" class="w-100 mt-2"></div>
                        <div class="col-md-10">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-2"><img src="assets/images/fb.png" class="w-100 mt-2"></div>
                        <div class="col-md-10">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-2"><img src="assets/images/pin.png" class="w-100 mt-2"></div>
                        <div class="col-md-10">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-2"><img src="assets/images/link.png" class="w-100 mt-2"></div>
                        <div class="col-md-10">
                            <input type="text" class="form-control">
                        </div>
                    </div>

                </div><div class="form-group">
                    <label>Upload your salon images</label>
                    <input type="file" class="form-control">
                </div>

                
                <div class="row mt-5">
                    <div class="col-md-6">
                        <button class="btn btn-primary">Back</button>
                    </div>
                    <div class="col-md-6 text-end">
                        <button class="btn btn-primary">
                            Next</button>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>
@endsection
