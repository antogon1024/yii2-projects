jQuery(document).ready(function ($) {

    $('.acm-login').click(function (event) {
        event.preventDefault();
        $('#amc-popup-fon').show();
        $('#amc-popup-login').show();
    });

    $('.acm-register').click(function(event){
        event.preventDefault();
        $('input').val('');
        $('select').val(0);
        var fon = $('#amc-popup-fon');
        fon.show();
        var reg = $('#amc-popup-register');

        reg.show();

        var ht1 = $('body').height()*1;
        var ht2 = reg.outerHeight()*1+60;

        if(ht1 > ht2) fon.css('height', ht1+'px');
        if(ht1 < ht2) fon.css('height', ht2+'px');
    });

    $('.ant-close').click(function () {
        $('input').val('');
        $('select').val(0);
        $('.ant-errors').empty();
        $('#amc-popup-fon').hide();
        $('#amc-popup-login').hide();
        $('#amc-popup-register').hide();
    });

    $('#ant-registration-client').click(function () {
        $('.ant-errors').empty();
        var form = $('#ant-register-client').get(0);
        var formData = new FormData(form);
        console.log(formData);

        $.ajax({
            type: 'POST',
            url: '/cabinet/register-client',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
alert(data+' ss');
                if (data == 'admin') {
                    //window.location.href = '/cabinet/clients';
                } else if (data == 'client') {
                    window.location.href = '/cabinet/my-tariff';
                } else {
                    data = JSON.parse(data);
//console.log(data);
                    for (var i in data) {
                        if (data.hasOwnProperty(i)) {
                            //alert();
                            $('.error-' + i).text(data[i]);
                        }
                    }
                }
            }
        });
    });

    $('#ant-registration-club').click(function () {
        $('.ant-errors').empty();
        var form = $('#ant-register-club').get(0);
        var formData = new FormData(form);

        $.ajax({
            type: 'POST',
            url: '/cabinet/register-club',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {

                if (data == 'admin') {
                    window.location.href = '/cabinet/clubs';
                } else if (data == 'client') {
                    window.location.href = '/cabinet/clients';
                } else {
                    data = JSON.parse(data);

                    for (var i in data) {
                        if (data.hasOwnProperty(i)) {
                            $('.error-' + i).text(data[i]);
                        }
                    }
                }
            }
        });
    });

    var path = window.location.pathname;
    $('#ant-ul').find('a').each(function () {

        if ($(this).attr('href') == path) {

            $(this).parent().attr('id', 'ant-border-red');
            $(this).removeClass('ant-silver');
            $(this).addClass('ant-red');
            $(this).parent().find('.uk-icon-small').removeClass('ant-silver');
            $(this).parent().first().addClass('ant-red');
            return false;
        }
    });

    $('.ant-checkbox-a').click(function(){
        $('.ant-errors').empty();
        $('.ant-checkbox-a .ant-checkbox-b').css('background', '#fff');
        $(this).find('.ant-checkbox-b').css('background', '#0078e7');
        var id = $(this).find('.ant-checkbox-b').attr('id');
        var sel_client = $('#ant-register-client');
        var sel_club = $('#ant-register-club');

        if(id == 'ant-checkbox-1'){
            sel_client.show();
            sel_club.hide();
        }

        if(id == 'ant-checkbox-2'){
            sel_client.hide();
            sel_club.show();
        }

        var fon = $('#amc-popup-fon');
        var reg = $('#amc-popup-register');
        var ht1 = $('body').height()*1;
        var ht2 = reg.outerHeight()*1+60;

        if(ht1 > ht2) fon.css('height', ht1+'px');
        if(ht1 < ht2) fon.css('height', ht2+'px');
    });

    var i = 0;
    var phone = '';
    var ar1 = [];

    ar1[48] = 0;
    ar1[49] = 1;
    ar1[50] = 2;
    ar1[51] = 3;
    ar1[52] = 4;
    ar1[53] = 5;
    ar1[54] = 6;
    ar1[55] = 7;
    ar1[56] = 8;
    ar1[57] = 9;

    var sel_phone = $('#ant-phone-1');
    sel_phone.val('');

    function format(len) {
        if (phone == '')
            sel_phone.val('');

        if (phone.substr(0, 1) == 7) {
            if (len == 1) {
                sel_phone.val('+ ' + phone);
            } else if (len == 2) {
                var p = '+ ' + phone;
                var s = p.substr(0, 3) + ' ';
                var s1 = p.substr(3);
                sel_phone.val(s + s1);
            } else if (len == 3) {
                p = '+ ' + phone;
                s = p.substr(0, 3) + ' ';
                s1 = p.substr(3);
                sel_phone.val(s + s1);
            } else if (len == 4 || len == 5) {
                p = '+ ' + phone;
                s = p.substr(0, 3) + ' ';
                s1 = p.substr(3);
                p = s + s1;

                s = p.substr(0, 6) + '-';
                s1 = p.substr(6);
                p = s + s1;
                sel_phone.val(p);
            } else if (len == 6) {
                p = '+ ' + phone;
                s = p.substr(0, 3) + ' ';
                s1 = p.substr(3);
                p = s + s1;

                s = p.substr(0, 5) + '-';
                s1 = p.substr(5);
                p = s + s1;

                s = p.substr(0, 8) + '-';
                s1 = p.substr(8);
                p = s + s1;

                sel_phone.val(p);
            } else if (len == 7) {
                p = '+ ' + phone;
                s = p.substr(0, 3) + ' ';
                s1 = p.substr(3);
                p = s + s1;

                s = p.substr(0, 6) + '-';
                s1 = p.substr(6);
                p = s + s1;

                s = p.substr(0, 9) + '-';
                s1 = p.substr(9);
                p = s + s1;

                sel_phone.val(p);
            } else if (len == 8) {
                p = '+ ' + phone;
                s = p.substr(0, 3) + ' ';
                s1 = p.substr(3);
                p = s + s1;

                s = p.substr(0, 7) + '-';
                s1 = p.substr(7);
                p = s + s1;

                s = p.substr(0, 10) + '-';
                s1 = p.substr(10);
                p = s + s1;

                sel_phone.val(p);
            } else if (len == 9) {
                p = '+ ' + phone;
                s = p.substr(0, 3) + ' ';
                s1 = p.substr(3);
                p = s + s1;

                s = p.substr(0, 10) + '-';
                s1 = p.substr(10);
                p = s + s1;

                s = p.substr(0, 4) + '(';
                s1 = p.substr(4);
                p = s + s1;

                s = p.substr(0, 8) + ') ';
                s1 = p.substr(8);
                p = s + s1;

                sel_phone.val(p);
            } else if (len == 10 || len == 11) {
                p = '+ ' + phone;
                s = p.substr(0, 3) + ' ';
                s1 = p.substr(3);
                p = s + s1;

                s = p.substr(0, 10) + '-';
                s1 = p.substr(10);
                p = s + s1;

                s = p.substr(0, 4) + '(';
                s1 = p.substr(4);
                p = s + s1;

                s = p.substr(0, 8) + ') ';
                s1 = p.substr(8);
                p = s + s1;

                s = p.substr(0, 16) + '-';
                s1 = p.substr(16);
                p = s + s1;

                sel_phone.val(p);
            }
        } else {
            sel_phone.val(phone);
        }
    }


    sel_phone.keydown(function (event) {
        i++;
        if ((i > 1 && event.which != 8))return false;
        if ($(this).val().length >= 20 && event.which != 8)return false;

        if (event.which == 8) {
            var len = phone.length;
            phone = phone.substr(0, len - 1);
            format(len - 1);
            return false;
        }

        if ((47 < event.which && event.which < 58) || event.which == 8) {
            phone = phone + ar1[event.which];

            len = phone.length;
            if ((len > 11 && phone.substr(0, 1) == 7)) {
                phone = phone.substr(0, len - 1);
                len = len - 1;
            }
            if ((len > 15 && phone.substr(0, 1) != 7)) {
                phone = phone.substr(0, len - 1);
                len = len - 1;
            }

            format(len);
            return false;
        } else {
            return false;
        }
    });

    sel_phone.keyup(function () {
        i = 0;
    });

    var soc_button = $('.ant-sbutton img');

    soc_button.mouseover(function(){
        $(this).css('width', '34px');
    });

    soc_button.mouseout(function(){
        $(this).css('width', '32px');
    });

    $("#ant-register-client").on("change", "#upload-select", function(){
        alert();
        file = this.files[0].name;
        $('#ant-avatar-1').val(file);
    });
});