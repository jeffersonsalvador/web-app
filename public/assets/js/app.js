
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
            $(this).attr("disabled", true)
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
    // CORS problem
    const proxy = "https://cors-anywhere.herokuapp.com/"
    const url = "https://37f32cl571.execute-api.eu-central-1.amazonaws.com/default/wunderfleet-recruiting-backend-dev-save-payment-data"; // site that doesn’t send Access-Control-*
    let userObj =   JSON.stringify({
        customerId: user.id,
        iban: user.iban,
        owner: user.owner
    })
    axios.post(proxy + url, userObj)
        .then(function (response) {
            let paymentId = response.data.paymentDataId
            update(user.id, paymentId)
            localStorage.clear()
            window.location.href = `/success/${paymentId}`
        })
        .catch(function (error) {
            $('.errors').html(error);
            $('.errors').addClass('show')
            destroy(user.id)
        });
    //update(222, 'JEFFERSON!(*@1982')
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
}

function update(id, paymentId) {
    $.ajax({
        type: "POST",
        url: "/user/update",
        data: { id: id, paymentId: paymentId }
    }).done(function(response) {
        return true
    });
}

function destroy(id) {
    $.ajax({
        type: 'DELETE',
        url: '/user',
        data: { id: id }
    })
}