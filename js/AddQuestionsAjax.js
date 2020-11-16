$(document).ready(function () {
  $("#insertar").click(function (event) {
    alert("This shit runs");
    event.preventDefault();

    //var form = $("#fquestion")[0];
    if (validarFormulario()) {
      var data = new FormData($("#fquestion")[0]);

<<<<<<< HEAD
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
=======
      $.ajax({
        type: "POST",
        enctype: "multipart/form-data",
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
        }
      });
    }
>>>>>>> 35d195404d93f6ba26493b6fecd503223a69e9a7
  });
});
