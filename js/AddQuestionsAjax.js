$(document).ready(function () {

  $('#DO_IT').click( function( event ) {  
    event.preventDefault();
    if (validarFormulario()) {
      VerPreguntas();
    }
  });
  $('#insertar').click( function( event ) {

    alert("This shit runs");
    event.preventDefault();

    if (validarFormulario()) {

      var data = new FormData( $("#fquestion")[0] );

      $.ajax({
        type: "POST",
        enctype: "multipart/form-data",
        url: "../php/AddQuestionsAjax.php?logInMail=$logInMail",
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 800000,
        success: function (data) { alert("SUCCESS: "); },
        error: function (e) { alert("ERROR : "); }
      });

    }

  });

});
//$("#res").text(data); $("#res").text(e.responseText); 