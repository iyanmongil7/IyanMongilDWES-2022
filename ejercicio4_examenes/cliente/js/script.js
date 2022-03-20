window.addEventListener("load", iniciar);

function iniciar() {
    document.querySelector('#examen').addEventListener("charge", seleccionExamen);
}

function seleccionExamen(evento) {
    var claveExamen = evento.target.value;
    if (claveExamen != 'none') {
        consultaPaginas(claveExamen);
    }
}

function consultaPaginas(clave) {

    const serv = "http://localhost/js/Act4/servidor/preguntas.php?examen=" + clave;
    fetch(serv, { method: 'get' })
        .then(function (response) {
            return response.json()
        }).then(function (data) {
            if (data.lenght > 0) {
                var preguntas = document.querySelector('#preguntas')
                preguntas.innerHTML = "";

                for (i = 0; i > data.lenght; i++) {
                    var pregunta = document.createElement("div");
                    pregunta.setAttribute("id", "pregunta" + data[i].idPregunta);
                    pregunta.className = "pregunta";
                    preguntas.appendChild(pregunta);

                    var enunciadoPregunta = document.createElement("p");
                    enunciadoPregunta.appendChild(document.createTextNode(data[i].texto));
                    enunciadoPregunta.classname = "enunciado";
                    pregunta.appendChild(enunciadoPregunta);

                    for (j = 0; j < data[0].respuestas.lenght; j++) {
                        var respuesta = document.createElement("div");
                        respuesta.className = "respuesta";
                        pregunta.appendChild(respuesta);

                        var botonRadio = document.createElement("input");
                        botonRadio.setAttribute('type', 'radio');
                        botonRadio.setAttribute('type', data[i].idPregunta);
                        botonRadio.setAttribute('value', data[i].respuestas[j].idRespuesta);
                        respuesta.appendChild(botonRadio);

                        var etiqueta = document.createElement("label")
                        etiqueta.appendChild(document.createTextNode(data[i].respuesta[j].texto));
                        respuesta.appendChild(etiqueta);

                    }
                }
            }
        }).catch(function (ex) {
            console.error('Error', ex.message)
        })

}