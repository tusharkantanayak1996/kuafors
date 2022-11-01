@extends('admin.layout.app')
@section('content')
    <div class="dashboard">
        <div class=" p-3">
            <div class="card mt-5">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <h4>Add Plan</h4>
                        </div>
                        <div class="col-md-4">
                        </div>
                    </div>


                    <form class="form-horizontal" action="{{ url('/admin/save-ownerplan') }}" method="POST" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label> Name:</label>
                            <input type="text" name="name" id="name" value="" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label> Plan Type:</label>
                            <select class="form-control" name="plan_type">
                                <option value="">Select Plan...</option>
                                <option value="day">Daily</option>
                                <option value="month">Monthly</option>
                                <option value="year">Yearly</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label> Price:</label>
                            <input type="text" name="price" class="form-control">
                        </div>
                        <!-- <div class="form-group">
                            <label> Location:</label>   
                            <select class="form-control" name="location">
                                <option value="">Select Location...</option>
                                <option value="1">1</option>
                                <option value="1-5">1-5</option>
                                <option value="5+">5+</option>
                            </select>
                        </div> -->
                        <div class="form-group">
                            <label> Description:</label>
                            <input type="text" name="description" class="form-control">
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary" id="couponsave">SAVE<i
                                    class="icon-arrow-right14 position-right"></i></button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
