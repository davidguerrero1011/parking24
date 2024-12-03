$(document).ready(function () {

    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });

    $('#btnPassword').attr('disabled');
});



function changePassword(value) {

    if (value == 1) {
        $('#changePassword').removeClass('d-none');
        $('#sendRequestPassword').addClass('d-none');
    } else {
        $('#sendRequestPassword').removeClass('d-none');
        $('#changePassword').addClass('d-none');
    }

}


function validatePassword(email) {

    let data = new FormData();
    data.append('email', email);

    axios.post('validate-password', data)
        .then(function (response) {

            let status = response.data[0];
            switch (status) {
                case 'success':
                    $('#passwordInput').removeAttr('disabled');
                    $('#emailMessageValidate').addClass('d-none');
                    $('#user').val(response.data[1]);
                    break;

                case 'warning':
                    $('#passwordInput').attr('disabled', 'disabled');
                    $('#emailMessageValidate').removeClass('d-none');
                    $('#userId').val(0);
                    break;

                case 'error':
                    $('#passwordInput').attr('disabled', 'disabled');
                    $('#emailMessageValidate').addClass('d-none');
                    $('#userId').val(0);
                    break;

                default:
                    break;
            }
        })
        .catch(function (error) {
            console.log(error);
        });

}


function checkPasswords(passwordd) {

    let lengt = passwordd.length;
    let upper = /[A-Z]/g;
    let lower = /[a-z]/g;
    let numbers = /[0-9]/g;

    if (passwordd !== '') {
        if (lengt >= 8) {
            $('#confirmInput').removeAttr('disabled');
            $('#passwordMessage').addClass('d-none');
        } else {
            $('#confirmInput').attr('disabled', 'disabled');
            $('#passwordMessage').removeClass('d-none');
        }

        if (passwordd.match(upper)) {
            $('#mayusculaMessage').addClass('d-none');
        } else {
            $('#mayusculaMessage').removeClass('d-none');
        }

        if (passwordd.match(lower)) {
            $('#minusculaMessage').addClass('d-none');
        } else {
            $('#minusculaMessage').removeClass('d-none');
        }

        if (passwordd.match(numbers)) {
            $('#numbersMessage').addClass('d-none');
        } else {
            $('#numbersMessage').removeClass('d-none');
        }
    } else {
        $('#confirmInput').attr('disabled', 'disabled');
    }
}

function validateConfirmPassword(secondPassword) {

    let passw = '';
    passw = document.getElementById('passwordInput').value;
    if (secondPassword == '' || passw.localeCompare(secondPassword) != 0) {
        $('#confirmMessage').removeClass('d-none');
    } else {
        $('#confirmMessage').addClass('d-none');

    }
}


$('#flexRadioDefault1').on('click', function() {
    $('#emailInput').val('');
    
    $('#passwordInput').val('');
    $('#passwordInput').attr('disabled', 'disabled');
    
    $('#confirmInput').val('');
    $('#confirmInput').attr('disabled', 'disabled');
});