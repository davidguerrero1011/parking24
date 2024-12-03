$(document).ready(function () {

    $('.burger').click(function () {
        $('header').toggleClass('clicked');
    });

    $('nav ul li').click(function () {
        $('nav ul li').removeClass('selected');
        $('nav ul li').addClass('notselected');
        $(this).toggleClass('selected');
        $(this).removeClass('notselected');
    });

});


function logOut() {
    
    axios.post('logOut')
        .then(function (response) {
            console.log(response);
        })
        .catch(function (error) {
            console.log(error);
        });
        
}