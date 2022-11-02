@extends('owner.layout.app')

@section('content')
    <div class="content-wrapper">

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="row">
                            @foreach($ownerplan as $plan)
                            <div class="col-md-4">
                                <div class="pricing-area p-3">
                                    <div class="pr-img">
                                        <img src="{{ asset('owner/assets/images/chair1.png') }}" />
                                    </div>
                                    <h3 class="mt-5">{{$plan->name}}</h3>
                                    @if($plan->type = 'month')
                                    <p>28 Days</p>
                                    @elseif($plan->type = 'year')
                                    <p>365 Day</p>
                                    @elseif($plan->type = 'day')
                                    <p>1 Day</p>
                                    @endif

                                    <div>
                                        <span style="font-size: 40px">${{$plan->price}}</span><br />
                                        <small>Per {{$plan->type}}</small>
                                    </div>
                                    <br />
                                    <button type="submit" class="btn btn-primary">Subscribe</button>
                                </div>
                            </div>
                            @endforeach
                           
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
