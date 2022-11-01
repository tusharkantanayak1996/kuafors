@extends('admin.layout.app')
@section('content')
    <div class="dashboard">
        <div class=" p-3">
            <div class="card mt-5">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <h3>Annoucements</h3>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ url('admin/add-announcement') }}" style="float:right"><button
                                    class="btn btn-primary shadow-md mr-2">Add New Annoucement
                                </button>
                            </a>
                        </div>
                    </div>

                    <div id="result"></div>
                    <table class="table">
                        <thead class="bg-white">
                            <tr>
                                <th class="text-center">Annoucement</th>
                                <!-- <th class="text-center">Salon Owner</th>
                                <th class="text-center">Technician</th> -->
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            
                                @foreach ($announcements as $announcement)
                                <tr>
                                    <input name="owner_plan" type="hidden" class="ownerplan_del" value="{{ $announcement->id }}">
                                    <td class="text-center">{{ $announcement->message }}</td>
                                    <!-- @if($announcement->owner_id == 0)
                                    <td class="text-center">All</td>
                                    else
                                    <td class="text-center">{{ $announcement->owner_id }}</td>
                                    @endif
                                    @if($announcement->technician_id == 0)
                                    <td class="text-center">All</td>
                                    else
                                    <td class="text-center">{{ $announcement->technician_id }}</td>
                                    @endif -->

                                    <td class="text-center">
                                      
                                        <a href="{{ url('admin/delete-annoucement', $announcement->id) }}"
                                            class="btn btn-outline-danger show_confirm"><svg xmlns="http://www.w3.org/2000/svg" width="20px"
                                                height="20px" viewBox="0 0 857.5 980">
                                                <path id="trash-alt-solid"
                                                    d="M61.25,888.125A91.875,91.875,0,0,0,153.125,980h551.25a91.875,91.875,0,0,0,91.875-91.875V245h-735Zm520.625-490a30.625,30.625,0,0,1,61.25,0v428.75a30.625,30.625,0,1,1-61.25,0Zm-183.75,0a30.625,30.625,0,0,1,61.25,0v428.75a30.625,30.625,0,0,1-61.25,0Zm-183.75,0a30.625,30.625,0,0,1,61.25,0v428.75a30.625,30.625,0,1,1-61.25,0ZM826.875,61.25H597.187L579.2,25.457A45.937,45.937,0,0,0,538.043,0H319.266A45.4,45.4,0,0,0,278.3,25.457L260.312,61.25H30.625A30.625,30.625,0,0,0,0,91.875v61.25A30.625,30.625,0,0,0,30.625,183.75h796.25A30.625,30.625,0,0,0,857.5,153.125V91.875A30.625,30.625,0,0,0,826.875,61.25Z"
                                                    transform="translate(0 0)" />
                                            </svg></a>

                                    </td>
                                </tr>
                                @endforeach
                            

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.show_confirm').click(function(e) {
                e.preventDefault();
                var delete_id = $(this).closest("tr").find('.ownerplan_del').val();
                console.log(delete_id);
                swal({
                        title: "Are you sure?",
                        text: "If you delete this, it will be gone forever.",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            var data = {
                                "_token": $('input[name="csrf-token"]').val(),
                                "id": delete_id,
                            };
                            $.ajax({
                                type: "get",
                                url: '/admin/delete-ownerplan/' + delete_id,
                                data: data,
                                success: function(response) {
                                    swal(response.status, {
                                        icon: "success",
                                    })
                                    .then((result) => {
                                        location.reload();
                                    }); 
                                }
                            });
                        }
                    });

            });
        });
    </script>
@endsection
