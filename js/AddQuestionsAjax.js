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


    var data = new FormData(form);
    //$("form").serialize();

    $.ajax({
      url: "../php/AddQuestionsAjax.php",
      data: data,
      processData: false,
      contentType: false,
      cache: false,
      timeout: 500000,
      success: function (data) {
        $("#res").text(data);
        alert("SUCCESS: ", data);
        //console.log("SUCCESS : ", data);
      },
      error: function (e) {
        $("#res").text(e.responseText);
        alert("ERROR : ", e);
      },
    });

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