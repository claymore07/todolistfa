<div class="modal fade" id="confirm-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="confirm-title">تایید حذف لیست</h4>
            </div>
            <div class="modal-body" id="confirm-body">
                <form>
                    {{csrf_field()}}
                </form>
                <p></p>
            </div>
            <div class="modal-footer" >
                <button type="button" class="btn btn-default" data-dismiss="modal">لغو</button>
                <button type="button" class="btn btn-danger" id="confirm-remove-btn">حذف</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->