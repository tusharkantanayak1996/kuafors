@extends('owner.layout.app')

@section('content')
    <div class="content-wrapper">

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">

                <div class="card">
                    
                        <div class="card-body text-center">
                            <p class="card-description">Please select what type of salon you choose.</p>
                            <div class="row">

                                <div class="col-md-4">
                                    <a href="{{url('owner/choose-type/hair/subscribe')}}" class="btn btn-primary w-100">Hair Salon</a>
                                </div>
                                <div class="col-md-4">
                                    <a href="{{url('owner/choose-type/beauty/subscribe')}}" class="btn btn-primary w-100">Beauty Salon</a>
                                    
                                </div>
                                <div class="col-md-4">
                                    <a href="{{url('owner/choose-type/both/subscribe')}}" class="btn btn-primary w-100">Both</a>
                                </div>
                            </div>

                        </div>

                </div>

            </div>

        </div>
    </div>
@endsection
