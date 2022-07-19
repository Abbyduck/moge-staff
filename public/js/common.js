$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            console.log('ha')
            if (data.res === 1)
                success('成功');
        }
    });
    $("input:required").siblings('label').addClass('red-star');

    // $(".datepicker").datetimepicker();
    $('.datepicker').datepicker({icons: {time: 'far fa-clock'}});

    $(".action").on('click', '.edit', function () {
        let itemId = $(this).data('id');
        let url = currentRoute + '/' + itemId + '/edit';
        openWin(url,"编辑");
    }).on('click', '.del', function (e) {
        e.preventDefault();
        let itemId = $(this).data('id');
        let elem = $(this).parents('tr');

        let url = currentRoute + '/' + itemId;
        Swal.fire({
            title: 'Are you sure ?',
            text: "You won't be able to revert this !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                e.preventDefault();
                $.ajax({
                    type: 'delete',
                    url: url,
                    success: function (data) {
                        if(data.code === 1){
                            success('成功', (function () {
                                elem.remove();
                            }))
                        }else{
                            error();
                        }

                    },
                });
            }
        })
    })
    $(".card-tools").on('click','.create-item',function () {
        let url = currentRoute + '/create';
        openWin(url,"新增");
    });
});

function success(msg = '成功', callback = null) {
    Swal.fire(
        msg || 'Good job!',
        '',
        'success'
    ).then(callback)
}

function error(msg = '成功', callback = null) {
    Swal.fire(
        msg || 'Good job!',
        '',
        'error'
    ).then(callback)
}

function openWin(url,title, refresh = false) {
    $("#inner-frame").attr('src', url);
    $("#myModalLabel").text(title);
    $('#show-modal').trigger('click');
    if (refresh === true) {
        $('.modal-footer button').on('click', function () {
            window.location.reload();
        });
    }
}
