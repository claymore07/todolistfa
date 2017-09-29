<div class="modal fade" id="task-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">لیست کارها</h4>
            </div>
            <div class="modal-body">
                <div class="panel panel-default">
                    <table class="table">
                        <thread>
                            <td style="width: 50px; vertical-align: middle"><input type="checkbox" name="check_all" id="check-all"></td>
                            <td><input type="text" placeholder="عنوان کار جدید را وارد کنید..." class="task-input"></td>

                        </thread>


                        <tbody>
                        <tr class="task-item">
                            <td style="width: 50px; vertical-align: middle">
                                <input type="checkbox" class="check-item"></td>
                            <td  class="task-item-title done">
                                کار اول
                                <div class="row-buttons">
                                    <a href="" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                </div>
                            </td>

                        </tr>
                        <tr class="task-item">
                            <td style="width: 50px; vertical-align: middle">
                                <input type="checkbox" class="check-item"></td>
                            <td  class="task-item-title">
                                کار اول
                                <div class="row-buttons">
                                    <a href="" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                </div>
                            </td>

                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer clearfix" >
                <div class="pull-left">
                    <small>3 کار مانده است.</small>
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