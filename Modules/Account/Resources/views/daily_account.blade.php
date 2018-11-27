@extends('layouts.master')
@section('main-content')
    <div class="content">
        {!! Session::has('success') ? '<div class="alert alert-success alert-dismissible"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'. Session::get("success") .'</div>' : '' !!}
        {!! Session::has('error') ? '<div class="alert alert-danger alert-dismissible"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'. Session::get("error") .'</div>' : '' !!}
        <div class="container-fluid">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header card-header-tabs card-header-primary">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <span class="nav-tabs-title">Tasks:</span>
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#profile" data-toggle="tab">
                                            <i class="material-icons">bug_report</i> Today
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#messages" data-toggle="tab">
                                            <i class="material-icons">code</i>Last 7 Days
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#settings" data-toggle="tab">
                                            <i class="material-icons">cloud</i> This month
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#totalCost" data-toggle="tab">
                                            <i class="material-icons">money</i> This Month Total
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="profile">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Cost Title</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($todayData as $key=> $value)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $value->cost_title }}</td>
                                            <td>{{ $value->cost_amount }}</td>
                                            <td> {{ \Carbon\Carbon::parse($value->created_at)->format('jS \\of F ') }}</td>
                                            <td class="td-actions text-right">
                                                <button type="button" id="{{ \App\Libraries\Encryption::encodeId($value->id) }}" mode="edit" rel="tooltip" title="Edit Task"
                                                        class="btn btn-primary cost_details btn-link btn-sm">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                                <button type="button" mode="view" id="{{ \App\Libraries\Encryption::encodeId($value->id) }}" rel="tooltip" title="Details"
                                                        class="btn btn-danger btn-link btn-sm cost_details">
                                                    <i class="material-icons">details</i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="messages">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Cost Title</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($weekData as $key=> $value)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $value->cost_title }}</td>
                                            <td>{{ $value->cost_amount }}</td>
                                            <td> {{ \Carbon\Carbon::parse($value->created_at)->format('jS \\of F ') }}</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task"
                                                        class="btn btn-primary btn-link btn-sm">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove"
                                                        class="btn btn-danger btn-link btn-sm">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="settings">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Cost Title</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($monthData as $key=>  $value)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $value->cost_title }}</td>
                                            <td>{{ $value->cost_amount }}</td>
                                            <td> {{ \Carbon\Carbon::parse($value->created_at)->format('jS \\of F ') }}</td>
                                             <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task"
                                                        class="btn btn-primary btn-link btn-sm">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove"
                                                        class="btn btn-danger btn-link btn-sm">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="totalCost">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Month</th>
                                        <th>First Date</th>
                                        <th>Current Date</th>
                                        <th>Total Cost</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                    $today = \Carbon\Carbon::now();
                                    @endphp
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($firstDayOfMonth)->format('F') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($firstDayOfMonth)->format('jS \\of F') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($today)->format('jS \\of F') }}</td>
                                            <td>৳{{ $allCostData[2]->amount }}</td>
                                            <td>Details</td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--Modal Start--}}

    <div class="modal fade" id="costEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="modal_content">

            </div>
        </div>
    </div>

    {{--Modal End--}}
@endsection

@section('footer_script')
    <script src="{{ asset('/assets')}}/script/jquery-validate.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function () {

            $('#cost-form').validate({
                rules: {
                    cost_title: {
                        required: true,
                        minlength: 2,
                    },
                    cost_details: {
                        required: true,
                        minlength: 2,
                    },
                    cost_amount: {
                        required: true,
                        minlength: 1,
                        digits: true
                    },

                },
                messages: {
                    cost_title: {
                        required: "Cost title filed is required",
                        minlength: "Cost title at least 2 Character",
                    },
                    cost_details: {
                        required: "Cost details field is required",
                        minlength: "Cost title at least 2 Character",
                    },
                    cost_amount: {
                        required: "Cost amount field is required",
                        digits: "Only Number input",
                    },

                }
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('.cost_details').on('click',function(){
               var cost_id =  $(this).attr('id');
               var mode =  $(this).attr('mode');
               var _token =  $('#token').val();
               $.ajax({
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
                   method: 'POST',
                   url:  '{{ url('/account/cost-edit') }}',
                   data : {
                       cost_id : cost_id,
                        mode : mode,
                       _token : _token,
                   },
                   dataTye : 'json',
                   success: function (response) {
                       console.log(response);
                       if(response.responseCode === 1){
                          $('#modal_content').html(response.html);
                           $('#costEditModal').modal();
                       }

                   },
                   error: function () {

                   }

               });

            });
        });
    </script>

@endsection