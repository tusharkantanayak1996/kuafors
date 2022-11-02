@extends('owner.layout.app')
@section('content')
<div class="content-wrapper">

    <div class="page-header">
        <h3 class="page-title">Payment
          
        </h3>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <span></span><img src="assets/images/icon-10.png" alt="" style="width: 18px;">
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Payment
                </li>
            </ul>
        </nav>
    </div>


    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="mt-5">
                    
                    <div class="col-md-6">
                         <h4>Payment</h4>
                        <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                            <label>Amount</label>
                                <input type="text" class="form-control">
                            </div>
                            </div>
                        </div>
                        <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                            <label>Credit Card*</label>
                               
                            </div>
                            </div>
                        </div>
                        <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                            <label>Account Name</label>
                                <input type="text" class="form-control">
                            </div>
                            
                            </div>
                        </div>
                        <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                            <label>Account Number</label>
                               <input type="text" class="form-control">
                            </div>
                            
                            </div>
                        </div>
                        <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                            <label>Month</label>
                             <select class="form-control">
                                <option>0000</option>
                                </select>
                            </div>
                             <div class="col-md-6">
                            <label>CCV</label>
                              <input type="text" class="form-control">
                            </div>
                            
                            </div>
                        </div>
                        <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                            <label>Card Number</label>
                               <input type="text" class="form-control">
                            </div>
                            
                            </div>
                        </div>
                        
                        <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary">Send Payment</button>
                            </div>
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
