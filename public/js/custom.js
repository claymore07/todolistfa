// create Or Update Todolist Modal show

$('body').on('click', '.show-todolist-modal', function (e) {
    e.preventDefault();

    var me = $(this),
        url = me.attr('href'),
        title = me.attr('title');

    $('#todo-list-title').text(title);
    $('#todo-list-save-btn').text(me.hasClass('edit')?'بروزرسانی': 'ایجاد لیست جدید');
    console.log(url);
    $.ajax({
        url:url,
        dataType:'html',
        success:function(response){
            $('#todo-list-body').html(response);
        }
    });

    $('#todolist-modal').modal('show');
});

//store or update Todolist Modal event handler
function showMessage(message , element) {
    var alert = (element == undefined)?'#add-new-alert':element;
    
    $(alert).text(message).fadeTo(1000,500).slideUp(800, function () {
        $(this).hide();
    })
}

function updateTodoListCounter() {
    var total = $('.list-group-item').length;
    console.log(total);
    $('#todo-list-counter').text(total);
    showNowRecordMessage(total);
}

function showNowRecordMessage(total) {
    console.log(total);
    if(total>0){
        $('#todo-list').closest('.panel').removeClass('hidden');
        $('#no-record-alert').addClass('hidden');
    }else {
        $('#todo-list').closest('.panel').addClass('hidden');
        $('#no-record-alert').removeClass('hidden');
    }
}
$('#todolist-modal').on('keypress', ":input:not(textarea)", function (event) {
    return event.keyCode !=13;
});

$('body').on('click','#todo-list-save-btn', function (e) {
   e.preventDefault();
   var form = $('#todo-list-body form'),
       url = form.attr('action'),
       method = $('input[name=_method]').val()== undefined?'POST':'PUT';
   form.find('.help-block').remove();
   form.find('.form-group').removeClass('has-error');

   $.ajax({
       url:url,
       method:method,
       data:form.serialize(),
       success:function (response) {
           if(method == 'POST'){
               $('#todo-list').prepend(response);
               showMessage("لیست جدید با موفقیت ایجاد شد.");
               form.trigger('reset');
               $('#title').focus();
               updateTodoListCounter();
           }else{
               var id=$('input[name=id]').val();
               if(id){
                   $('#todo-list-'+id).replaceWith(response);
               }
               $('#todolist-modal').modal('hide');
               showMessage("بروزرسانی با موفقیت انجام شد!", '#update-alert');
           }
       },
       error:function (xhr) {
          var errors = xhr.responseJSON;
          if($.isEmptyObject(errors)==false){
              $.each(errors, function (key, value) {
                  $('#'+key)
                      .closest('.form-group')
                      .addClass('has-error')
                      .append('<span class="help-block"><strong>'+value+'</strong></span>') ;
              })
          }

       }
   })
});

// delete modal management

$('body').on('click', '.show-confirm-modal', function (e) {
    e.preventDefault();
console.log('fuck');
    var me = $(this),
        action = me.attr('href'),
        title = me.attr('data-title');

    $('#confirm-body form').attr('action', action);
    $('#confirm-body p').html(
        'آیا مطمئن به حذف لیست :' +
        '<strong>' +
        title +
        '</strong>'
    );


    $('#confirm-modal').modal('show');
});

$('#confirm-remove-btn').click(function (e) {
   e.preventDefault();

   var form =$('#confirm-body form'),
       url = form.attr('action');

   $.ajax({
       url : url,
       method: 'DELETE',
       data: form.serialize(),

       success:function (data) {
           $('#confirm-modal').modal('hide');

           $('#todo-list-'+data.id).fadeOut(function () {
               $(this).remove();
               updateTodoListCounter();
               showMessage("حذف لیست با موفقیت انجام شد!", '#update-alert');
           })

       }
   });
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