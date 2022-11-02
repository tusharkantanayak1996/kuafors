@extends('owner.layout.app')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div id="content" class="content">
                    <div id="status"></div>
                    <h3>New Technical eTicket</h3>
                    <div class="row">
                        <div class="card col-md-12">
                            <form method="POST" action="{{url('/owner/storetickets')}}" enctype="multipart/form-data">
                                @csrf
                                &nbsp;
                                <div class="form-group"><label for="form_name">Subject</label> <input type="text"
                                        name="name" placeholder="" required="required"
                                        class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="comment">What's appear to be the Problem?:</label>
                                    <textarea class="form-control"  placeholder="" name="description"></textarea>
                                  </div>
                                <div class="form-group"><label for="form_name">When did you notice the issue?</label> <input
                                        type="text" name="start_of_issue" placeholder="" required="required"
                                        class="form-control" />
                                </div>
                                <div class="form-group"><label for="form_name">Ticket file</label> <input type="file"
                                        name="file" placeholder="" required="required"
                                        class="form-control" />
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" name="priority" class="form-check-input"
                                        id="exampleCheck1">
                                    <label class="form_name" for="exampleCheck1">Queue jump $8.98 <br>Place your eTicket
                                        at the queue to be looked sooner.</label>
                                </div>
                                <div class="form-group text-right"><button type="submit"
                                        class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
