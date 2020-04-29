$(function () {
    let zipcode = $('#crud input[name="zipcode"]');
    let picture = $('#crud input[name="picture"]');
    let phone = $('#crud input[name="phone"]');
    let website = $('#crud input[name="website"]');
    let btn = $('#crud button[type="submit"]');
    
    function checkZipcode () {
        if (zipcode.val().length == 5 && zipcode.val().match(/^[\d]{5}$/)) {
            zipcode.removeClass('is-invalid').addClass('is-valid');
        } else {
            zipcode.removeClass('is-valid').addClass('is-invalid');
        }
    }

    function checkPhone () {
        if (phone.val().length == 10 && phone.val().match(/^0[1-9]\d{8}$/)) {
            phone.removeClass('is-invalid').addClass('is-valid');
        } else {
            phone.removeClass('is-valid').addClass('is-invalid');
        }
    }
    
    function checkWebsite () {
        if (website.val().length > 0 && website.val().match(/^http[s]?:\/\/[a-z\d]+.[a-z\d]+.[a-z\d]+$/)) {
            website.removeClass('is-invalid').addClass('is-valid');
        } else {
            website.removeClass('is-valid').addClass('is-invalid');
        }
    }

    function checkPicture () {
        if (picture.val().length > 0 && picture.val().match(/^http[s]?:\/\/[a-z\d]+.[a-z\d]+.[a-z\d]+$/)) {
            picture.removeClass('is-invalid').addClass('is-valid');
        } else {
            picture.removeClass('is-valid').addClass('is-invalid');
        }
    }

    zipcode.on('blur', function (event) {
        checkZipcode();
    })

    phone.on('blur', function (event) {
        checkPhone();
    })

    website.on('blur', function (event) {
        checkWebsite();
    })

    picture.on('blur', function (event) {
        checkPicture();
    })

    btn.on('click', function (event) {
        event.preventDefault();

        $('input:text').each(function(){
            if ($(this).val().length == 0){
                $(this).removeClass('is-valid').addClass('is-invalid');
            }
        });

        checkZipcode ();
        checkPhone ();
        checkWebsite();
        checkPicture();

        if ($('.is-invalid').length == 0) {
            $('#crud').submit();
        }
    })
});

