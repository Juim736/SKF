@extends('layouts.master')
@section('main-content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-header card-header-tabs card-header-danger">
                            <div class="nav-tabs-navigation">
                                <div class="nav-tabs-wrapper">
                                    <span class="nav-tabs-title">This Mounth :</span>
                                    <ul class="nav nav-tabs" data-tabs="tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#present" data-toggle="tab">
                                                <i class="material-icons">person_add</i> Present
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#messages" data-toggle="tab">
                                                <i class="material-icons">person_add_disabled</i>Absent
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#settings" data-toggle="tab">
                                                <i class="material-icons">message</i> Comment
                                                <div class="ripple-container"></div>
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="present">
                                    <table class="table" id="present_attend">
                                        <thead>
                                        <th>Name</th>
                                        <th>Present</th>
                                        <th>Action</th>
                                        </thead>

                                        <tbody>

                                        @foreach($empAttendance as $key => $present)
                                            @php
                                                $emp_id = Encryption::encodeId($present->employee_id);
                                            @endphp

                                            <tr>
                                                <td>{{ CF::getEmployeeName($emp_id) }}</td>
                                                <td>{{ $present->total }}</td>
                                                <td class="td-actions text-right">
                                                    <a href="{{ url('employee/attendance-details/'.$emp_id) }}">
                                                        <button type="button" rel="tooltip" title=""
                                                                class="btn btn-primary btn-link btn-sm"
                                                                data-original-title="Details">
                                                            <i class="material-icons">more</i>
                                                        </button>
                                                    </a>

                                                </td>
                                            </tr>

                                        @endforeach

                                        </tbody>

                                        <!-- <tbody>
                                          <tr>
                                            <td>
                                              <div class="form-check">
                                                <label class="form-check-label">
                                                  <input class="form-check-input" type="checkbox" value="" checked="">
                                                  <span class="form-check-sign">
                                                    <span class="check"></span>
                                                  </span>
                                                </label>
                                              </div>
                                            </td>
                                            <td>Sign contract for "What are conference organizers afraid of?"</td>
                                            <td class="td-actions text-right">
                                              <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" data-original-title="Edit Task">
                                                <i class="material-icons">edit</i>
                                              </button>
                                              <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" data-original-title="Remove">
                                                <i class="material-icons">close</i>
                                              </button>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td>
                                              <div class="form-check">
                                                <label class="form-check-label">
                                                  <input class="form-check-input" type="checkbox" value="">
                                                  <span class="form-check-sign">
                                                    <span class="check"></span>
                                                  </span>
                                                </label>
                                              </div>
                                            </td>
                                            <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                                            <td class="td-actions text-right">
                                              <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" data-original-title="Edit Task">
                                                <i class="material-icons">edit</i>
                                              <div class="ripple-container"></div></button>
                                              <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" data-original-title="Remove">
                                                <i class="material-icons">close</i>
                                              </button>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td>
                                              <div class="form-check">
                                                <label class="form-check-label">
                                                  <input class="form-check-input" type="checkbox" value="">
                                                  <span class="form-check-sign">
                                                    <span class="check"></span>
                                                  </span>
                                                </label>
                                              </div>
                                            </td>
                                            <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                                            </td>
                                            <td class="td-actions text-right">
                                              <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" data-original-title="Edit Task">
                                                <i class="material-icons">edit</i>
                                              </button>
                                              <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" data-original-title="Remove">
                                                <i class="material-icons">close</i>
                                              </button>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td>
                                              <div class="form-check">
                                                <label class="form-check-label">
                                                  <input class="form-check-input" type="checkbox" value="" checked="">
                                                  <span class="form-check-sign">
                                                    <span class="check"></span>
                                                  </span>
                                                </label>
                                              </div>
                                            </td>
                                            <td>Create 4 Invisible User Experiences you Never Knew About</td>
                                            <td class="td-actions text-right">
                                              <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" data-original-title="Edit Task">
                                                <i class="material-icons">edit</i>
                                              </button>
                                              <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" data-original-title="Remove">
                                                <i class="material-icons">close</i>
                                              </button>
                                            </td>
                                          </tr>
                                        </tbody> -->
                                    </table>
                                </div>
                                <div class="tab-pane" id="messages">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                               checked="">
                                                        <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>Flooded: One year later, assessing what was lost and what was found when
                                                a ravaging rain swept through metro Detroit
                                            </td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title=""
                                                        class="btn btn-primary btn-link btn-sm"
                                                        data-original-title="Edit Task">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                                <button type="button" rel="tooltip" title=""
                                                        class="btn btn-danger btn-link btn-sm"
                                                        data-original-title="Remove">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="">
                                                        <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>Sign contract for "What are conference organizers afraid of?"</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title=""
                                                        class="btn btn-primary btn-link btn-sm"
                                                        data-original-title="Edit Task">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                                <button type="button" rel="tooltip" title=""
                                                        class="btn btn-danger btn-link btn-sm"
                                                        data-original-title="Remove">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="settings">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="">
                                                        <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title=""
                                                        class="btn btn-primary btn-link btn-sm"
                                                        data-original-title="Edit Task">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                                <button type="button" rel="tooltip" title=""
                                                        class="btn btn-danger btn-link btn-sm"
                                                        data-original-title="Remove">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                               checked="">
                                                        <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>Flooded: One year later, assessing what was lost and what was found when
                                                a ravaging rain swept through metro Detroit
                                            </td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title=""
                                                        class="btn btn-primary btn-link btn-sm"
                                                        data-original-title="Edit Task">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                                <button type="button" rel="tooltip" title=""
                                                        class="btn btn-danger btn-link btn-sm"
                                                        data-original-title="Remove">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                               checked="">
                                                        <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>Sign contract for "What are conference organizers afraid of?"</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title=""
                                                        class="btn btn-primary btn-link btn-sm"
                                                        data-original-title="Edit Task">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                                <button type="button" rel="tooltip" title=""
                                                        class="btn btn-danger btn-link btn-sm"
                                                        data-original-title="Remove">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>
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
    </div>

@endsection




@section('footer_script')

    <script>
        $(function () {
            // $('#present_attend').DataTable({})
        })
    </script>

@endsection