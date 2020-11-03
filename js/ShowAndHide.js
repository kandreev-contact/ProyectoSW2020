var login = false;

function logIn() {
    login = true;
}

function logOut() {
    login = false;
}
function showOnLogIn() {
    $('#registro').hide();
    $('#login').hide();
    $('#logout').show();
    $('#inicio').show();
    $('#insertar').show();
    $('#creditos').show();
    $('#verBD').show();
}

function showOnNotLogIn() {
    $('#registro').show();
    $('#login').show();
    $('#logout').hide();
    $('#inicio').show();
    $('#insertar').hide();
    $('#creditos').show();
    $('#verBD').hide();
}

$(document).ready(function () {
    //if(login == true) showOnLogIn();
    //else showOnNotLogIn();
});
