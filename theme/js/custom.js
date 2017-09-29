$('body').on('click', '.show-todolist-modal', function (e) {
    e.preventDefault();
    $('#todolist-modal').modal('show');
});
$('body').on('click', '.show-task-modal', function (e) {
    e.preventDefault();
    $('#task-modal').modal('show');
});

$(function () {
    $('input[type=checkbox]').iCheck({
        checkboxClass: 'icheckbox_square-green',
        increaseArea: '20%'
    });
    $('#check-all').on('ifChecked', function(e) {
        $('.check-item').iCheck('check');
    });

    $('#check-all').on('ifUnchecked', function(e) {
        $('.check-item').iCheck('uncheck');
    });

});

$('.filter-btn').click(function (event) {
    event.preventDefault();

    var id = this.id;
    $(this).addClass('active')
        .parent()
        .children()
        .not(event.target)
        .removeClass('active');
    if(id == "all-tasks"){
        $('tr.task-item').show();
    }
    else if(id == "active-tasks"){
        $('tr.task-item:has(td.done)').hide();
        $('tr.task-item:not(:has(td.done))').show();
    }
    else if(id == "completed-tasks"){
        $('tr.task-item:has(td.done)').show();
        $('tr.task-item:not(:has(td.done))').hide();
    }
});