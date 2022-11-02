@extends('owner.layout.app')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Booking Register</h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <span></span><img src="assets/images/icon-10.png" alt="" style="width: 18px" />
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <span></span>Booking Register
                    </li>
                </ul>
            </nav>
        </div>

        <div class="row">
            <div class="col-md-7 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Calender</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-5 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Booked Schedules</h4>

                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td class="p-0 pt-3">
                                        <h6 style="color: #49654e">November 22, 2021</h6>
                                        <b>John Smith</b>
                                        <p>08:00 AM - 05:00 PM</p>
                                    </td>
                                    <td>
                                        <button class="btn btn-primary btn-sm">View</button>
                                    </td>
                                    <td>
                                        <button class="btn btn-primary btn-sm">
                                            Cancel
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-0 pt-3">
                                        <h6 style="color: #49654e">November 22, 2021</h6>
                                        <b>John Smith</b>
                                        <p>08:00 AM - 05:00 PM</p>
                                    </td>
                                    <td>
                                        <button class="btn btn-primary btn-sm">View</button>
                                    </td>
                                    <td>
                                        <button class="btn btn-primary btn-sm">
                                            Cancel
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-0 pt-3">
                                        <h6 style="color: #49654e">November 22, 2021</h6>
                                        <b>John Smith</b>
                                        <p>08:00 AM - 05:00 PM</p>
                                    </td>
                                    <td>
                                        <button class="btn btn-primary btn-sm">View</button>
                                    </td>
                                    <td>
                                        <button class="btn btn-primary btn-sm">
                                            Cancel
                                        </button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
