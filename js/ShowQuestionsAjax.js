function VerPreguntas() {
  xhr = new XMLHttpRequest();
  xhr.open("GET", "ShowXMLQuestions.php", true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200)
      document.getElementById("res").innerHTML = xhr.responseText;
  };
  xhr.send("");
}
