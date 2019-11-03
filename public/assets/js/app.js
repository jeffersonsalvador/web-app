
$(document).ready(function() {

    autoFill()

    $('.btnNext').click(function () {
        $('.nav-tabs .active').parent().next('li').find('a').trigger('click')
    })

    $('.btnPrevious').click(function () {
        $('.nav-tabs .active').parent().prev('li').find('a').trigger('click')
    })

    $('.btnSubmit').click(function (e) {
        $('.errors').removeClass('show')
        e.preventDefault()
        if (validateForm()) {
            $('.errors').removeClass('show')
            save()
        } else {
            $('.errors').addClass('show')
        }
    })

    $(".form-register")
        .on("change", function() {
            saveLocal( JSON.stringify($( this ).serializeArray()) )
    })

})

function saveLocal(form) {

    this.localStorage.setItem('form', form)
}

function autoFill() {
    let form = this.localStorage.getItem('form')
    if (form) {
        form = JSON.parse(form)
        form.forEach( function(el) {
            let item = document.getElementById(el.name)
            item.value = el.value
        })
    }
}

function validateForm() {
    let isValid = true
    $('.form-control').each(function() {
        if ( $(this).val() === '' ) {
            isValid = false
       }
    });
    return isValid
}

function getPaymentId(user) {
    $.ajax({
        type: "POST",
        url: "https://37f32cl571.execute-api.eu-central-1.amazonaws.com/default/wunderfleet-recruiting-backend-dev-save-payment-data",
        date: {
            "customerId": user.id,
            "iban": user.iban,
            "owner": user.owner
        },
        contentType: "application/json"
    }).done(function(result){
        console.log(result)
    });
}

function save(form) {
    // save
    $.ajax({
        type: "POST",
        url: "/user",
        data: $('#form-register').serializeArray(),
    }).done(function(user) {
        if (user !== false) {
            getPaymentId(JSON.parse(user))
        } else {
            $('.errors').html('Error, please try later.');
            $('.errors').addClass('show')
        }
    });
    // get PaymentId
}