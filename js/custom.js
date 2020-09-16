$(document).on('click', '.kashf', function () {
    $.ajax({
        url: "/response.php",
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
