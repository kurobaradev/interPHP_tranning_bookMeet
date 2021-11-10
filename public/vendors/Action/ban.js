function ban(event) {
    event.preventDefault();
    let urlRequest = $(this).data('url');
    let that = $(this);
    Swal.fire({
        title: 'Bạn có thật sự muốn xóa?',
        text: "Bạn sẽ không thể hoàn tác nếu xóa!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Đồng ý!'
    }).then((result) => {
        if (result.value) {

            $.ajax({
                type: 'GET',
                url: urlRequest,
                success: function(data) {
                    if (data.code == 200) {
                        console.log(that)
                    }
                },
                error: function() {

                }
            })
            Swal.fire(
                'Đã xóa!',
                'Thành công'
            )
        }
    });
}

$(function() {
    $(document).on('click', '.ban', ban);

});