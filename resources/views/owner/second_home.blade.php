@extends('owner.layout.app')

@section('content')
<div class="content-wrapper">
  
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body text-center">
                    <div class="p-5">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et<br>
                            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip<br>
                            ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore<br>
                            eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia<br>
                            deserunt mollit anim id est laborum.<br><br>

                            Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit<br>

                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>
                        <div class="row mt-5">
                        <div class="col-md-6"><div class="float-right"><a href="{{url('owner/choose-type')}}" class="btn btn-primary ">Click to Subscribe</a></div> </div>
                        <div class="col-md-6">
                            <div class="float-left">
                        <a href="#" class="btn btn-primary">Explore Kuafor Further</a>
                                </div>
                        </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
