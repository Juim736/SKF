<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel"><b>Cost Change</b></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form action="{{ url('account/cost-update',App\Libraries\Encryption::encodeId($dataById->id)) }}" method="POST" enctype="multipart/form-data" id="cost-form">
    {{ csrf_field() }}
    <div class="modal-body">

        <div class="form-group bmd-form-group">
            <input type="text" class="form-control" value="{{ $dataById->cost_title }}" name="cost_title" id="cost_title" required="true">
        </div>
        <div class="form-group bmd-form-group">
            <input type="text" class="form-control" name="cost_details"
                   value="{{ $dataById->cost_details }}"   id="cost_details" required="true">
        </div>
        <div class="form-group bmd-form-group">
            <input class="form-control" name="cost_amount" id="cost_amount" min='0'
                   type="number" required="true" value="{{ $dataById->cost_amount }}"
                   onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-info btn-xs btn-sm" data-dismiss="modal">Close
        </button>
        <button type="submit" class="btn btn-primary btn-xs btn-sm">Save changes</button>
    </div>
</form>