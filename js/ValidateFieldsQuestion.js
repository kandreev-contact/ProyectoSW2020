function validarFormulario(){
    
    $("form :input").each(function(){
        var input = $(this);
        if(input.val()==""){
            alert("El campo "+ "\' "+ input.attr("name")+"\'"+" esta vacio.");
            return false;
        }else{
            if(input.attr("id")=="dirCorreo"){
                if(!validarCorreo(input.val())){
                    alert("El correo electronico introducido no es correcto.");
                    return false;
                }
            }else if(input.attr("id")=="nombrePregunta"){
                if(input.val().length<10){
                    alert("El enunciado de la pregunta es demasiado corto. Minimo 10 caracteres.");
                    return false;
                }
            }
        }
    });
    return true;
}
/*
function validarFormulario(){
    
    var resul = true;
    $("form :input").each(function(){
        var input = $(this);
        if(input.val()==""){
            resul = false;
            alert("El campo "+ "\' "+ input.attr("name")+"\'"+" esta vacio.");

        }else{
            if(input.attr("id")=="dirCorreo"){
                resul = validarCorreo(input.val());
                if(!resul){
                    alert("El correo electronico introducido no es correcto.");
                }
            }else if(input.attr("id")=="nombrePregunta"){
                if(input.val().length<10){
                    alert("El enunciado de la pregunta es demasiado corto.");
                    resul = false;
                }
            }
        }
    });
    return resul;
}
*/
function validarCorreo(correo){

    var correoAlumno = /^[a-zA-Z]+(([0-9]{3})+@ikasle\.ehu\.(eus|es))$/;
    var correoProfesor = /^[a-zA-Z]+(\.[a-zA-Z]+@ehu\.(eus|es)|@ehu\.(eus|es))$/;
    
    if(correoAlumno.test(correo) || correoProfesor.test(correo))
        return true;
    else
        return false;
}

$('document').ready(function(){
    $('#submit').click(function(){
        return validarFormulario();
    });
});

// El boton reset (input type="reset") no necesita funcion de atencion, ya que por defecto resetea el form