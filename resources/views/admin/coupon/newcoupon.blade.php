@extends('admin.layout.app')
@section('content')
    <div class="dashboard">
        <div class=" p-3">
            <div class="card mt-5">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <h4>Add Coupon</h4>
                        </div>
                        <div class="col-md-4">
                        </div>
                    </div>


                    <form class="form-horizontal" action="{{ url('/admin/save-coupon') }}" method="POST" autocomplete="off">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label> Coupon Code:</label>
                                <input type="text" name="code" id="coupon_code" value="" class="form-control"
                                    required>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-primary btn-sm" style="margin-top: 26px; margin-left: -23px;" onClick="generateRandomCouponCode();">Generate</button>
                            </div>
                        </div>

                        <div class="form-group">
                            <label> Coupon Type:</label>
                            <select class="form-control" name="coupon_type">
                                <option value="">Select...</option>
                                <option value="fixed">Fixed</option>
                                <option value="percent">Percent</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label> Coupon Value:</label>
                            <input type="text" name="value" class="form-control">
                        </div>
                        <div class="form-group">
                            <label> Start Date:</label>
                            <input type="date" name="start_date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label> End Date:</label>
                            <input type="date" name="end_date" class="form-control">
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
@section('scripts')
    <script type="text/javascript">
        function generateRandomCouponCode() {
            var charsNumber = "0123456789";
            var charsUpper = "ABCDEFGHIJKLMNOPQRSTUVWXTZ";
            var charsAll = [charsNumber, charsUpper];
            var chars = charsAll.join('');
            // Check for number of characters to generate. Defauts to 8 characters
            var randomString = '';
            for (var i = 0; i < 10; i++) { // Get string length
                var randNum = Math.floor(Math.random() * chars.length); // and then
                randomString += chars.substring(randNum, randNum + 1); // randomize it
            }
            document.getElementById('coupon_code').value = randomString;
        }
    </script>
@endsection
