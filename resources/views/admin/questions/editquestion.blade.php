@extends('admin.layout.app')
@section('content')
    <div class="dashboard">
        <div class=" p-3">
            <div class="card mt-5">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <h4>Edit Question</h4>
                        </div>
                        <div class="col-md-4">
                        </div>
                    </div>


                    <form class="form-horizontal" action="{{ url('/admin/update-question',$question->id) }}" method="POST" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label> Category Type:</label>
                            <select class="form-control" name="plan_type" value={{$question->type}}>
                                <option value="monthly" @if($question->category == 'hair')selected @endif>Hair</option>
                                <option value="yearly" @if($question->category == 'beauty')selected @endif>Beauty</option>
                                <option value="yearly" @if($question->category == 'both')selected @endif>Both</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label> Question:</label>
                            <input type="text" name="question" class="form-control" value="{{$question->questions}}">
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
