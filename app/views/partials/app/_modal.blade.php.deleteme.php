
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="small-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">
                    {{ $modalTitle }}
                </h4>
            </div>

            <div  class="alert-error modal-fail hide">
                <div class="alert alert-danger">
                    Uh oh. Something went wrong. Please try again.
                </div>
            </div>
            <div class="modal-loader"></div>
            <div class="modal-body">
                <!-- The rest of the form is added in modal window -->
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel (without saving)</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal --> 