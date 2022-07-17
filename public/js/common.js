$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
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
        let itemId = e.target.data.id;
        console.log(e)
    })
});

function success(msg = '成功', callback = null) {
    Swal.fire(
        msg || 'Good job!',
        '',
        'success'
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
