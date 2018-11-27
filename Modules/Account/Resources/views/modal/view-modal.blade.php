<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel"><b>Cost View</b></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form action="#" method="POST" enctype="multipart/form-data" id="cost-form">
    <div class="modal-body">

        <div class="form-group bmd-form-group">
            <label for="">Cost Title</label>
            <input type="text" class="form-control" value="{{ $dataById->cost_title }}" name="cost_title" id="cost_title" readonly required="true">
        </div>
        <div class="form-group bmd-form-group">
            <label for="">Cost Description</label>
            <input type="text" class="form-control" name="cost_details"
                   value="{{ $dataById->cost_details }}"   id="cost_details" readonly required="true">
        </div>
        <div class="form-group bmd-form-group">
            <label for="">Cost Amount</label>
            <input class="form-control" name="cost_amount" id="cost_amount" min='0'
                   type="number" required="true" readonly value="{{ $dataById->cost_amount }}"
                   onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-info btn-xs btn-sm" data-dismiss="modal">Close
        </button>
    </div>
</form>