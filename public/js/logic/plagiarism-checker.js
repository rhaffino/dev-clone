$( "#button-checker" ).on( "click", function() {
    $.post({
        url: PLAGIARISM_CHECK_URL,
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            text: $('#text-check').val()
        },
        success: (res) => {
            if (res.statusCode === 200) {
                console.log(res.data)
            } else {
                toastr.error(res.message)
            }
        },
        error: (err) => {
            toastr.error(err.responseJSON.message)
        }
    });
});