@extends('admin.layout.app')

@section('content')
    <div class="dashboard">
        <div class=" p-3">
            <div class="card mt-5">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <h3>Technician</h3>
                        </div>
                        <div class="col-md-4">
                            <input type="search" placeholder="Search now..." class="form-control">
                        </div>
                    </div>


                    <table class="table">
                        <thead class="bg-white">
                            <tr>
                                <th class="text-center">First Name</th>
                                <th class="text-center">Last Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                @foreach ($technician as $data)
                                <tr>
                                    <td class="text-center">{{ $data->first_name }}</td>
                                    <td class="text-center">{{ $data->last_name }}</td>
                                    <td class="text-center">{{ $data->email }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('admin/edit-technician', $data->id) }}" class="btn btn-outline-info"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
                                                viewBox="0 0 1101.688 979.443">
                                                <path id="edit-regular"
                                                    d="M769.477,659.757l61.206-61.206c9.564-9.563,26.2-2.869,26.2,10.9V887.559a91.833,91.833,0,0,1-91.809,91.809H91.809A91.833,91.833,0,0,1,0,887.559V214.29a91.833,91.833,0,0,1,91.809-91.809H614.931c13.58,0,20.466,16.449,10.9,26.2l-61.206,61.206a15.164,15.164,0,0,1-10.9,4.4H91.809V887.559H765.078V670.468A15.044,15.044,0,0,1,769.477,659.757Zm299.528-385.982L566.732,776.049,393.824,795.176A79.017,79.017,0,0,1,306.6,707.957l19.127-172.908L828.006,32.776a111.632,111.632,0,0,1,158.18,0l82.628,82.628c43.8,43.8,43.8,114.762.191,158.371Zm-188.974,59.1L768.9,221.75,413.525,577.32l-13.963,124.9,124.9-13.963Zm123.943-152.442L921.345,97.807a19.971,19.971,0,0,0-28.308,0l-59.1,59.1L945.063,268.037l59.1-59.1A20.38,20.38,0,0,0,1003.974,180.436Z"
                                                    transform="translate(0 0.075)" />
                                            </svg></a>
                                        <a href="{{ url('admin/delete-technician', $data->id) }}"
                                            class="btn btn-outline-danger"><svg xmlns="http://www.w3.org/2000/svg" width="20px"
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
