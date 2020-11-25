function CheckEmail(){
		 
	if(XMLHttpRequest)
        xhr = new XMLHttpRequest();
    xhr.open('GET','ClientVerifyEnrollment.php?Email='+document.getElementById('dirCorreo').value,true);
    xhr.onreadystatechange = function(){
	if(xhr.readyState == 4 && xhr.status == 200)
		if (xhr.responseText == 'SI'){
			document.getElementById('CheckEmail').innerHTML = 'Email verificado';
			document.getElementById('CheckEmail').style.color = 'darkgreen';
		//	if (document.getElementById('CheckPass').innerHTML == 'Contraseña correcta'){
		//		document.getElementById('submit').disabled = false;
		//	}
		}else{
			document.getElementById('CheckEmail').style.color = 'darkred';
			document.getElementById('CheckEmail').innerHTML = 'Email no valido';
		}		
	}
	xhr.send('');
}

function CleanEmail(){
	document.getElementById('CheckEmail').innerHTML = "";
	// document.getElementById('submit').disabled = true;
}

function CheckPass(){
		 
	if(XMLHttpRequest)
        xhr = new XMLHttpRequest();
    xhr.open('GET','ClientVerifyPass.php?Pass='+document.getElementById("pass1").value);
    xhr.onreadystatechange = function(){
	if(xhr.readyState == 4 && xhr.status == 200)
		if (xhr.responseText == 'VALIDA'){
			document.getElementById('CheckPass').innerHTML = 'Contraseña correcta';
			document.getElementById('CheckPass').style.color = 'darkgreen';
		//	if (document.getElementById('CheckEmail').innerHTML == 'Email correcto'){
		//		document.getElementById('submit').disabled = false;
		//	}
		}else if(xhr.responseText == 'INVALIDA'){
			document.getElementById('CheckPass').innerHTML = 'Contraseña incorrecta';
			document.getElementById('CheckPass').style.color = 'darkred';
			
		}else{
			document.getElementById('CheckPass').innerHTML = 'Sin servicio';
		}		
	}
	xhr.send('');
}

function CleanPass(){
	document.getElementById('CheckPass').innerHTML = "";
	// document.getElementById('submit').disabled = true;
}

function validarFormularioRegistro() {
	alert("por hacer");
	return false;
}

$(document).ready(function () {
    $('#submit').click(function () {
        return validarFormularioRegistro();
    });
});