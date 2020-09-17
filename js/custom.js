$(document).on('click', '.kashf:first', function () {
    $.ajax({
        url: "response.php",
        data : {
            type : 'kashf'
        },
        error : function (e) {
            console.log(e);
        },
        success: function(result){
            var data = JSON.parse(result);
            if (data['result']) {

                var planet = data['planet'];
                $('[data-info]').hide();
                if (planet == 'asood') {
                    $('#winner #code').html(data['code']);
                    $('#winner').slideDown();
                }else {
                    $('[data-info='+planet+']').slideDown();
                }

            }else {
                Swal.fire({
                    icon: 'error',
                    title: 'خطا...',
                    text: 'شما در 24 ساعت گذشته در قرعه کشی شرکت کرده اید!',
                })
            }
        }
    });
});

$(document).on('click', '.kashf:last', function () {
    $.ajax({
        url: "response.php",
        data : {
            type : 'clear'
        },
        error : function (e) {
            console.log(e);
        },
        success: function(result){
            if (result) {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'اطلاعات قبلی پاک شدند.',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        }
    });
});


$(document).on('click', '[data-copy]', function () {
    var target = $($(this).data('copy'));
    var value = target.text();
    textToClipboard(value);
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'کد مورد نظر کپی شد.',
        showConfirmButton: false,
        timer: 1500
    });
});

function textToClipboard (text) {
    var dummy = document.createElement("textarea");
    document.body.appendChild(dummy);
    dummy.value = text;
    dummy.select();
    document.execCommand("copy");
    document.body.removeChild(dummy);
}
