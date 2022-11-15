var taller = new Taller();
window.addEventListener("DOMContentLoaded", cargaScript);
window.addEventListener("unload", guardar);


function cargaScript() {

    
fetch("../servidor/empleados.php", {method:'GET'})
.then(function (response) {
  return response.json();
})
.then(function (data) {
    dibujaEmpleados(data);
})
.catch(function (error) {
  console.error(error);
});

if (localStorage.getItem("tareas") != null) {
    
    var t = JSON.parse(localStorage.getItem("tareas"));
    console.log("Hay un taller anterior"+t);
  
    dibujaTareas(t);
}
else{
    fetch("../servidor/tareas.php", {method:'GET'})
    .then(function (response) {
      return response.json();
    })
    .then(function (data) {
        dibujaTareas(data);
    })
    .catch(function (error) {
      console.error(error);
    });
}
if (localStorage.getItem("asignacion") != null){
    var a = JSON.parse(localStorage.getItem("asignacion"));
    console.log("length"+a.length);
    for (let i=0;i<a.length;i++){
        taller._asignacion.set(a[i][0], a[i][1]);
    }
}
}


function dibujaEmpleados(respuesta) {
        let divEmpleados=document.createElement("div");
        divEmpleados.id="divEmpleados";
        divEmpleados.className="operarios";
        document.body.appendChild(divEmpleados);
        
        for (var i = 0; i < respuesta.length; i++) {
            var operario = new Operario(respuesta[i].id,respuesta[i].nombre,respuesta[i].foto, respuesta[i].tipo);

            taller.insertaOperario(operario);

            if (respuesta[i].tipo === "operario") {
                var divEmpleado=document.createElement("div");
                divEmpleado.id="divEmpleado" + respuesta[i].id;
                divEmpleado.className="operario";
                divEmpleados.appendChild(divEmpleado);

                var nombreEmpleado=document.createElement("h1");
                nombreEmpleado.appendChild(document.createTextNode(respuesta[i].nombre));
                nombreEmpleado.id="nombreEmpleado" + respuesta[i].id;
                divEmpleado.appendChild(nombreEmpleado);

                var fotoEmpleado=document.createElement("img");
                fotoEmpleado.id="fotoEmpleado" + respuesta[i].id;
                fotoEmpleado.src="imagenes/" + respuesta[i].foto;
                divEmpleado.appendChild(fotoEmpleado)

                var botonesEmpleado=document.createElement("div");
                botonesEmpleado.id="botonesEmpleado" + respuesta[i].id;
                botonesEmpleado.className="botones";
                divEmpleado.appendChild(botonesEmpleado);

                var botonPedir=document.createElement("input");
                botonPedir.type="button";
                botonPedir.id="botonPedir" + respuesta[i].id;
                botonPedir.value= "Pedir Tarea";
                botonPedir.addEventListener("click", pedir);
                botonesEmpleado.appendChild(botonPedir);

                var botonFinalizar=document.createElement("input");
                botonFinalizar.type="button";
                botonFinalizar.id="botonFinalizar" + respuesta[i].id;
                botonFinalizar.disabled=true;
                botonFinalizar.value="Finalizar Tarea";
                botonFinalizar.addEventListener("click", finalizar);
                botonesEmpleado.appendChild(botonFinalizar);

                var tareaEmpleado=document.createElement("p");
                if (taller._asignacion.has(respuesta[i].id)){
                    tareaEmpleado.appendChild(document.createTextNode("Tarea: "+taller._asignacion.get(respuesta[i].id).titulo));
                    botonPedir.setAttribute("disabled", true);
                    botonFinalizar.removeAttribute("disabled");
                }
                else
                    tareaEmpleado.appendChild(document.createTextNode("Tarea: Sin asignar"));
                tareaEmpleado.id="tareaEmpleado" + respuesta[i].id;
                divEmpleado.appendChild(tareaEmpleado);
            }
        }
    }

    function dibujaTareas(respuesta) {
        let divTareas=document.createElement("div");
        divTareas.id="divTareas";
        divTareas.className="tareas";
        document.body.appendChild(divTareas);

        for (var i = 0; i < respuesta.length; i++) {
            var tarea = new Tarea (respuesta[i].id,respuesta[i].titulo,respuesta[i].fecha,respuesta[i].descripcion);

            taller.insertaTarea(tarea);

            var divTarea=document.createElement("div");
            divTarea.id="divTarea" + respuesta[i].id;
            divTarea.className="tarea";
            divTareas.appendChild(divTarea);
    
            var tituloTarea=document.createElement("h1");
            tituloTarea.id="tituloTarea";
            tituloTarea.appendChild(document.createTextNode(respuesta[i].titulo));
            divTarea.appendChild(tituloTarea);
    
            var descripcionTarea=document.createElement("p");
            descripcionTarea.id="descripcionTarea";
            descripcionTarea.appendChild(document.createTextNode(respuesta[i].descripcion));
            divTarea.appendChild(descripcionTarea);
    
            var fechaTarea=document.createElement("p");
            fechaTarea.id="fechaTarea";
            fechaTarea.appendChild(document.createTextNode(respuesta[i].fecha));
            divTarea.appendChild(fechaTarea);
        }
    }

function guardar() {
    localStorage.removeItem("tareas");
    if (taller._tareas.length>0)
         localStorage.setItem("tareas", JSON.stringify(taller._tareas));
    localStorage.removeItem("asignacion");
    if (taller._asignacion.size>0)
        localStorage.setItem("asignacion", JSON.stringify(Array.from(taller._asignacion.entries())));
}

function pedir(evento) {
    var id = evento.target.id.substring(10);
    document.querySelector("#botonPedir" + id).setAttribute("disabled", true);
    document.querySelector("#botonFinalizar" + id).removeAttribute("disabled");

    if (taller.asignaTarea(id)!=-1){

    document.querySelector("#" + "tareaEmpleado" + id).innerHTML="Tarea: " + taller._asignacion.get(id).titulo;

    var idTarea=taller._asignacion.get(id).id;
    var divTarea=document.querySelector("#divTarea"+idTarea);
    divTarea.parentNode.removeChild(divTarea);
    }
    else    
        console.log("No se pudo asignar tarea al operario "+id);
}

function finalizar() {
    var id = this.id.substring(14);
    document.querySelector("#" + "tareaEmpleado" + id).innerHTML="Tarea: Sin asignar";

    taller.finalizaTarea(id);

    if (taller._tareas.length === 0) {
        document.querySelector("#botonPedir" + id).setAttribute("disabled", true);
        document.querySelector("#botonFinalizar" + id).setAttribute("disabled", true);
    } else {
        document.querySelector("#botonPedir" + id).removeAttribute("disabled");
        document.querySelector("#botonFinalizar" + id).setAttribute("disabled", true);
    }
}