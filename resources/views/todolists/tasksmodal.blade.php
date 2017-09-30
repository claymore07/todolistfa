<div class="modal fade" id="task-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">لیست کارهای</h4>
                <p><strong id="task-modal-subtitle"></strong></p>
            </div>
            <div class="modal-body">
                <div class="panel panel-default">
                    <table class="table">
                        <thread>
                            <td width="50" style="vertical-align: middle;">
                                <input type="checkbox" name="check_all" id="check-all">
                            </td>
                            <td>
                                <div class="form-group">
                                    <form id="task-form">
                                        {{ csrf_field() }}
                                        <input type="hidden" id="selected-todo-list" >
                                        <input type="text" name="title" id="task-title" placeholder="عنوان کار جدید را وارد کنید..." class="task-input">
                                    </form>
                                </div>
                            </td>
                        </thread>
                        <tbody id="task-table-body">


                        </tbody>
                    </table>

                </div>
            </div>
            <div class="modal-footer clearfix" >
                <div class="pull-left">
                    <small id="active-counter">3</small><small> کار مانده است.</small>
                </div>
                <div class="pull-right">
                    <a href="#" id="all-tasks" class="btn btn-xs btn-default active  filter-btn">تمام کارها</a>
                    <a href="#" id="active-tasks" class="btn btn-xs btn-default filter-btn">در حال اجرا</a>
                    <a href="#" id="completed-tasks" class="btn btn-xs btn-default filter-btn">خاتمه یافته</a>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->