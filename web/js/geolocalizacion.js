
function comenzar(){

    var miBoton = document.getElementById("dame_ubicacion");
    miBoton.addEventListener("click", obtener, false);

}

function obtener(){

    navigator.geolocation.getCurrentPosition(mostrar_posicion);

}

function mostrar_posicion(posicion){

    var latitud = document.getElementById("latitud");
    var longitud = document.getElementById("longitud");
    var input_lat = document.getElementById("input_lat");
    var input_lon = document.getElementById("input_lon");
    var lat = "Latitud: " + posicion.coords.latitude;
    var lon = "Longitud: " + posicion.coords.longitude;
    latitud.innerHTML=lat;
    longitud.innerHTML=lon;
    input_lat.value = posicion.coords.latitude;
    input_lon.value = posicion.coords.longitude;


    //var btn_link = document.getElementById('btn-link');
    //var link = "https://www.google.com/maps/d/u/0/edit?hl=es&mid=1YotwVqsXyNKRXwLZnZz38rDDcDQfstdu&ll=" + posicion.coords.latitude + "%2C" + posicion.coords.longitude + "&z=15"
    //btn_link.href = link;
    //btn_link.target = "_blank";
}


window.addEventListener("load", comenzar, false);
