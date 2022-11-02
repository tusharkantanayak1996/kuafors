@extends('admin.layout.app')
@section('content')
    <div class="dashboard">
        <div class=" p-3">
            <div class="card mt-5">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <h4>Edit Plan</h4>
                        </div>
                        <div class="col-md-4">
                        </div>
                    </div>


                    <form class="form-horizontal" action="{{ url('/admin/update-ownerplan',$ownerplan->id) }}" method="POST" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label> Name:</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{$ownerplan->name}}" required>
                        </div>

                        <div class="form-group">
                            <label> Plan Type:</label>
                            <select class="form-control" name="plan_type" value={{$ownerplan->type}}>
                                <option value="day" @if($ownerplan->type == 'day')selected @endif>Daily</option>
                                <option value="month" @if($ownerplan->type == 'month')selected @endif>Monthly</option>
                                <option value="year" @if($ownerplan->type == 'year')selected @endif>Yearly</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label> Price:</label>
                            <input type="text" name="price" class="form-control" value="{{$ownerplan->price}}">
                        </div>
                        <div class="form-group">
                            <label> Description:</label>
                            <input type="text" name="description" value="{{$ownerplan->description}}" class="form-control">
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary" id="couponsave">Update<i
                                    class="icon-arrow-right14 position-right"></i></button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
