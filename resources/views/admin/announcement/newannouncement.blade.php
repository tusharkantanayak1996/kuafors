@extends('admin.layout.app')
@section('content')
    <div class="dashboard">
        <div class=" p-3">
            <div class="card mt-5">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <h4>Add Annoucement</h4>
                        </div>
                        <div class="col-md-4">
                        </div>
                    </div>


                    <form class="form-horizontal" action="{{ url('/admin/save-announcement') }}" method="POST" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label> Accouncement:</label>
                            <textarea type="text" name="message" id="name" value="" class="form-control" required></textarea>
                        </div><br>

                        <div class="form-group">
                            <label> Select Technician:</label>
                            <select class="form-control" name="technician_id">
                                <option value="0">All</option>
                                @foreach($technicians as $technician)
                                <option value="{{ $technician->id}}">{{ $technician->business_name}}</option>
                                @endforeach
                            </select>
                        </div><br>

                        <div class="form-group">
                            <label> Select Salon Owner:</label>
                            <select class="form-control" name="owner_id">
                                <option value="0">All</option>
                                @foreach($owners as $owner)
                                <option value="{{ $owner->id}}">{{ $owner->business_name}}</option>
                                @endforeach
                            </select>
                        </div><br>
                       

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
