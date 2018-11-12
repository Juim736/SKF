@extends('layouts.master')
@section('main-content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header card-header-tabs card-header-danger">
                            <div class="nav-tabs-navigation">
                                <div class="nav-tabs-wrapper">
                                    <span class="nav-tabs-title"
                                          style="font-size: 22px;font-weight: bold;color: #EDFC04">{{ ucfirst($attenDancesDetails[0]->first_name) }}
                                        -{{ $attenDancesDetails[0]->last_name }} :</span>
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
                                    <table class="table" id="attend_details">
                                        <thead>
                                        <th>Day</th>
                                        <th>Date</th>
                                        <th>Entry Time</th>
                                        <th>Exit Time</th>
                                        </thead>

                                        <tbody>

                                        @foreach($attenDancesDetails as $key => $present)

                                            <tr>
                                                <td>{{ \Carbon\Carbon::parse($present->entry_time)->format('l') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($present->entry_time)->format('jS \\of F ') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($present->entry_time)->format('h:i:s A') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($present->exit_time)->format('h:i:s A') }}</td>

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
            // $('#attend_details').DataTable({})
        })
    </script>

@endsection