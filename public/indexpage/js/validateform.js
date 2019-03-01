// vaididate email
function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}


$(document).ready(function () {

    // validate Regisrer From
    $('#submit').on('click', function () {
        var name = $('#name').val();
        var username = $('#username').val();
        var email = $('#email').val();
        var password = $('#password').val();
        if (name === '' || name === undefined) {
            $('#error').html('Vui lòng nhập họ tên.');
            $('#name').css('border', 'solid 1px red');
            return false;
        }
        if (username === '' || username === undefined) {
            $('#error').html('Vui lòng nhập tên tài khoản.');
            $('#username').css('border', 'solid 1px red');
            return false;
        }
        if (email === '' || email === undefined) {
            $('#error').html('Vui lòng nhập email.');
            $('#email').css('border', 'solid 1px red');
            return false;
        }
        if (!validateEmail(email)) {
            $('#error').html('Email không đúng định dạng.');
            $('#email').css('border', 'solid 1px red');
            return false;
        }
        if (password === '' || password === undefined) {
            $('#error').html('Vui lòng nhập mật khẩu.');
            $('#password').css('border', 'solid 1px red');
            return false;
        }
        if (password.length < 8) {
            $('#error').html('Mật khẩu phải có ít nhất 8 kí tự');
            $('#email').css('border', 'solid 1px red');
            return false;
        }
        return true;
    })
    $('#reg').on('keyup', function () {
        var name = $('#name').val();
        var username = $('#username').val();
        var email = $('#email').val();
        var password = $('#password').val();
        if (name !== '') {
            $('#error').html('');
            $('#name').css('border', 'solid 1px white');
        }
        if (username !== '') {
            $('#error').html('');
            $('#username').css('border', 'solid 1px white');
        }
        if (email !== '') {
            $('#error').html('');
            $('#email').css('border', 'solid 1px white');
        }
        if (validateEmail(email)) {
            $('#error').html('');
            $('#email').css('border', 'solid 1px white');
        }
        if (password !== '') {
            $('#error').html('')
            $('#password').css('border', 'solid 1px white');
        }
        if (password.length >= 8) {
            $('#error').html('');
            $('#email').css('border', 'solid 1px white');
        }
        return true;
    });


    // validate Login Form
    $('#btnLoginsubmit').on('click', function () {
        var username1 = $('#usernamelg').val();
        var password1 = $('#passwordlg').val();
        if (username1 === '' || username1 === undefined) {
            $('#error').html('Vui lòng nhập tên tài khoản.');
            $('#usernamelg').css('border', 'solid 1px red');
            return false;
        }
        if (password1 === '' || password1 === undefined) {
            $('#error').html('Vui lòng nhập mật khẩu.');
            $('#passwordlg').css('border', 'solid 1px red');
            return false;
        }
        return true;
    });
    $('#loginss').on('keyup', function () {
        var username1 = $('#usernamelg').val();
        var password1 = $('#passwordlg').val();
        if (username1 !== '') {
            $('#error').html('');
            $('#err').html('');
            $('#usernamelg').css('border', 'solid 1px white');
        }
        if (password1 !== '') {
            $('#error').html('');
            $('#err').html('');
            $('#passwordlg').css('border', 'solid 1px white');
        }
        return true;
    });


    //Reset form
    $('#btnRe').on('click', function () {
        var email = $('#emailrs').val();
        if (email === '' || email === undefined) {
            $('#error').html('Vui lòng nhập email đăng kí tại khoản');
            $('#emailrs').css('border', 'solid 1px red');
            return false;
        }
        return true;
    });
    $('#reset').on('keyup', function () {
        var email = $('#emailrs').val();
        if (email !== '') {
            $('#error').html('');
            $('#emailrs').css('border', 'solid 1px white');
        }
        return true;
    });
 function addTotlaNumber(){
     var a = 10;
     var b = 25;
     alert(a+b);
 }
    //Changepass form validate
    $('#btnChange').on('click', function () {
        var old = $('#oldpass').val();
        var newp = $('#newpass').val();
        var cf = $('#confirm').val();

        if (old === '' || old === undefined) {
            $('#error').html('Vui lòng nhập mật khẩu cũ.');
            $('#oldpass').css('border', 'solid 1px red');
            return false;
        }
        if (newp === '' || newp === undefined) {
            $('#error').html('Vui lòng nhập mật khẩu mới.');
            $('#newpass').css('border', 'solid 1px red');
            return false;
        }
        if (newp.length < 8) {
            $('#error').html('Mật khẩu phải có độ dài lớn hơn 8 kí tự.');
            $('#newpass').css('border', 'solid 1px red');
            return false;
        }

        if (cf === '' || cf === undefined) {
            $('#error').html('Vui lòng xác nhận mật khẩu.');
            $('#confirm').css('border', 'solid 1px red');
            return false;
        }
        if (newp !== cf) {
            $('#error').html('Mật khẩu không khớp.');
            $('#confirm').css('border', 'solid 1px red');
            $('#newpass').css('border', 'solid 1px red');
            return false;
        }
        return true;
    });
    $('#change').on('keyup', function () {
        var old = $('#oldpass').val();
        var newp = $('#newpass').val();
        var cf = $('#confirm').val();
        if (old !== '') {
            $('#error').html('');
            $('#oldpass').css('border', 'solid 1px white');
        }
        if (newp !== '') {
            $('#error').html('');
            $('#newpass').css('border', 'solid 1px white');
        }
        if (cf !== '') {
            $('#error').html('');
            $('#confirm').css('border', 'solid 1px white');
        }
        return true;
    });

    //validate images

    function ValidateFileUpload() {
        var fuData = document.getElementById('images');
        var FileUploadPath = fuData.value;

//To check if user upload any file
        if (FileUploadPath == '') {
            $('#error').html("Please upload an image");

        } else {
            var Extension = FileUploadPath.substring(
                FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

//The file uploaded is an image

            if (Extension == "gif" || Extension == "png" || Extension == "bmp"
                || Extension == "jpeg" || Extension == "jpg") {

// To Display
                if (fuData.files && fuData.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#blah').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(fuData.files[0]);
                }

            }

//The file upload is NOT an image
            else {
                $('#error').html("Photo only allows file types of GIF, PNG, JPG, JPEG and BMP. ");

            }
        }
    }


    //validate form add question
    $('#upQues').on('click', function () {
        ValidateFileUpload();
        if (editor.getData()==='<p>&nbsp;</p>'){
            $('#error').html('Câu hỏi không được trống');
            return false;
        }
        if ($('#result1').val() === ''){
            $('#error').html('Đáp án không được trống');
            return false;
        }
        if ($('#result2').val() === ''){
            $('#error').html('Đáp án không được trống');
            return false;
        }
        if ($('#result3').val() === ''){
            $('#error').html('Đáp án không được trống');
            return false;
        }
        if ($('#result4').val() === ''){
            $('#error').html('Đáp án không được trống');
            return false;
        }
        return true;
    });
    $('#question').on('keyup',function () {
        if ($('#editor').val() !== '' || $('#editor').val() !== undefined) {
            $('#error').html('');
        }
        if ($('#result1').val() !== '') {
            $('#error').html('');
        }
        if ($('#result2').val() !== '') {
            $('#error').html('');
        }
        if ($('#result3').val() !== '') {
            $('#error').html('');
        }
        if ($('#result4').val() !== '') {
            $('#error').html('');
        }
        return true;
    });
});
