jQuery(document).ready(function ($) {
    $('#mclients').click(function () {
        $('#ant-capt2').text('СОЗДАНИЕ НОВОГО АККАУНТА');
        $('#ant-list-1').hide();
        $('#ant-create-2').show();
        $('#edit').val(0);
    });

    $('#ant-cancel-1').click(function () {
        $('.ant-errors').empty();
        $('#ant-list-1').show();
        $('#ant-create-2').hide();
    });

    var flag = 0;

    $('.ant-blocks').click(function () {
        flag = (flag == 0) ? 1 : 0;
        $(this).find('.ant-info-1').show();
        $('.ant-info-1').hide();

        if (flag == 1) {
            $(this).find('.ant-info-1').show();
            //$(this).find('.ant-clients').hide();
        } else {
            $(this).find('.ant-info-1').hide();
            //$(this).find('.ant-clients').show();
        }
    });

    selector = $('.ant-shadow');

    selector.mouseover(function () {
        $('.ant-icon-cog').hide();
        $(this).find('.ant-icon-cog').css('display', 'inline');
    });

    selector.mouseleave(function () {
        $('.ant-icon-cog').hide();
    });

    var username;
    var email;

    $('.ant-edit-1').click(function () {
        $('#ant-edit').val('1');
        var id = $(this).attr('id');

        //alert(id);
        $.get("/cabinet/get-client", {id: id}, function (data) {
            alert(data);
            //console.log(data);
            data = JSON.parse(data);

            for (var i in data) {
                if (data.hasOwnProperty(i)) {
//alert(i);
                    if (i == 'avatar') {
                        $('#ant-' + i + '-1').val(data[i]);
                    } else {
                        $('#ant-' + i).val(data[i]);
                    }


                    if (i == 'username') {
                        username = data[i];
                    }

                    if (i == 'email') {
                        email = data[i];
                    }
                }
            }
        });

        $('#ant-list-1').hide();
        $('#ant-create-2').show();
        $('#ant-capt2').text('РЕДАКТИРОВАНИЕ АККАУНТА');
        return false;
    });

    $('#ant-username').change(function () {
        //alert($(this).val());
        if (username == $(this).val()) {
            $('#ant-unique-username').val(0);
        } else {
            $('#ant-unique-username').val(1);
        }
    });

    $('#ant-email').change(function () {
        //alert($(this).val());
        if (email == $(this).val()) {
            $('#ant-unique-email').val(0);
        } else {
            $('#ant-unique-email').val(1);
        }
    });

    var filter = $('.ant-list-1 p');

    filter.mouseover(function () {
        $('.ant-list-1 p').css({'background': '#fff', 'color': '#999'});
        $(this).css({'background': '#39f', 'color': 'white', 'cursor': 'pointer'});
    });

    filter.click(function () {
        $('#ant-enter').empty().append($(this).text());
        $('#ant-angle-2').attr('class', 'uk-icon-angle-down');
        $('.ant-list-1').hide();

        $("#filter-input-1").val($(this).attr('filter'));
        $("#filter-form").submit();
    });

    $('.uk-icon-search').click(function () {
        $('#ant-token').appendTo('#search-form');
        if ($('#ant-search-1').val() == '') return false;
        $('#search-input-1').val($('#ant-search-1').val());
        $('#search-form').submit();
    });

    $('#ant-angle-1').click(function () {
        if ($('.ant-list-1').css('display') == 'none') {
            $('.ant-list-1').show();
            $('#ant-angle-2').attr('class', 'uk-icon-angle-up');
        } else {
            $('.ant-list-1').hide();
            $('#ant-angle-2').attr('class', 'uk-icon-angle-down');
        }
    });
});