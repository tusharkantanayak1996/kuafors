@extends('admin.layout.app')
@section('content')
    <div class="dashboard">
        <div class=" p-3">
            <div class="card mt-5">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <h4>Add Question</h4>
                        </div>
                        <div class="col-md-4">
                        </div>
                    </div>


                    <form class="form-horizontal" action="{{ url('/admin/save-question') }}" method="POST" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label> Category Type:</label>
                            <select class="form-control" name="category">
                                <option value="">Select Category...</option>
                                <option value="hair">Hair</option>
                                <option value="beauty">Beauty</option>
                                <option value="both">Both</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Question</label>
                            <input type="text" name="question" class="form-control">
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
