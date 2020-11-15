<!DOCTYPE html>
<html>

<head>
    <title> Insertar pregunta con AJAX </title>

    <?php include '../html/Head.html' ?>
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/AddQuestionsAjax.js"></script>
    <script src="../js/ShowQuestionsAjax.js"></script>
    <script src="../js/CountQuestionsAjax.js"></script>
    <script src="../js/ValidateFieldsQuestion.js"></script>
    <style>
        .table_QuestionForm {
            margin: auto;
            text-align: center;
        }

        sup {
            color: red;
        }

        h2 {
            color: darkblue;
        }
        #div1 {
            overflow: scroll;
            height: 100%;
            width: 100%;
        }
        #contadores,
        #div1 table {
            width: 95%;
            background-color: lightgray;
            margin: auto;
            text-align: center;
        }

        .table_QuestionsXML {
            margin: auto;
            border-collapse: collapse;
            text-align: center;
        }

        td,
        th {
        padding: 5px;
        }

        #thQ {
            background-color: #dbd2c3;
        }
    </style>
</head>

<body>
    <?php include '../php/Menus.php' ?>
    <?php include '../php/CountXMLQuestions.php' ?>
    <section class="main" id="s1">
        <div id="div1">
            <?php echo "<form id='fquestion' name='fquestion' method='GET' enctype='multipart/form-data'>"; ?>
            <table class="table_QuestionForm">
                <tr>
                    <th>
                        <h2>Insertar pregunta</h2><br />
                    </th>
                </tr>
                <tr>
                    <td>Direccion de correo<sup>*</sup> <input type="text" size="75" id="dirCorreo" name="Direccion de correo" value="<?php echo $logInMail; ?>" readonly></td>
                </tr>
                <tr>
                    <td>Enunciado de pregunta<sup>*</sup> <input type="text" size="75" id="pregunta" name="Pregunta"></td>
                </tr>
                <tr>
                    <td>Respuesta correcta<sup>*</sup> <input type="text" size="75" id="respuestaCorrecta" name="Respuesta correcta"></td>
                </tr>
                <tr>
                    <td>Respuesta incorrecta 1<sup>*</sup> <input type="text" size="75" id="respuestaIncorrecta1" name="Respuesta incorrecta 1"></td>
                </tr>
                <tr>
                    <td>Respuesta incorrecta 2<sup>*</sup> <input type="text" size="75" id="respuestaIncorrecta2" name="Respuesta incorrecta 2"></td>
                </tr>
                <tr>
                    <td>Respuesta incorrecta 3<sup>*</sup> <input type="text" size="75" id="respuestaIncorrecta3" name="Respuesta incorrecta 3"></td>
                </tr>
                <tr>
                    <td>Tema<sup>*</sup> <input type="text" size="50" id="tema" name="tema"></td>
                </tr>
                <tr>
                    <td>
                        Complejidad<sup>*</sup>
                        <select id="complejidad" name="complejidad">
                            <option value="1">Baja</option>
                            <option value="2" selected>Media</option>
                            <option value="3">Alta</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><input type="button" id="insertar" value="Insertar Pregunta"> <input type="button" id="Show" onClick="VerPreguntas()" value="Ver preguntas"> <input type="reset" id="reset" value="Limpiar"></td>
                </tr>
            </table>
            </form>
            <br/>
            <div id="contadores">
                <h4>TOTAL PREGUNTAS / TUS PREGUNTAS</h4>
                <div id="contPreguntas"></div>
            </div>
            <img id="cargando" src="../images/cargando.gif" height="30">
            <div id="res">

            </div>
        </div>
    </section>
    <?php include '../html/Footer.html' ?>
</body>

</html>