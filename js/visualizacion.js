/**
 * Variable de capa donde van a ir nuestros objetos.
 */
var vectorLayer = new ol.layer.Vector({
    source: new ol.source.Vector(),
    style: new ol.style.Style({
        image: new ol.style.Icon({
            src: 'marker.png',
            anchor:[0.5, 1],
            scale: 0.1
        })
    })
});

/**
 * Funcion que crea los features necesarios para luego ser mostrados en el mapa.
 * @param {Array} datos Vector de datos para poner en el mapa.
 */
function makeFeatures(datos) {
    var vecAux = [];
    var i;
    for (i = 0; i < datos.length; i++) {
        vecAux.push(new ol.Feature({
            type: 'point',
            geometry: new ol.geom.Point(ol.proj.transform([datos[i].lat, datos[i].lon], 'EPSG:4326', 'EPSG:3857')),
            foto: datos[i].foto,
            lat: datos[i].lat,
            lon: datos[i].lon,
            nombre: datos[i].nombre,
            apellido: datos[i].apellido,
            descripcion: datos[i].descripcion
        }));
    }
    vectorLayer.getSource().addFeatures(vecAux);
}

makeFeatures(datos);

/**
 * Variables necesarias para la creación del popup
 */
var container = document.getElementById('popup');
var content = document.getElementById('popup-content');
var closer = document.getElementById('popup-closer');

/**
 * Overlay para poder mostrar el popup dentro del mapa.
 */
var overlay = new ol.Overlay({
    element: container,
    autoPan: true,
    autoPanAnimation: { duration: 250 }
});

/**
  *Mapa completo con todos sus elementos, los layers se muestran por orden y se superponen uno arriba
  *de otro de izquierda a derecha.
  */
var map = new ol.Map({
    layers: [openStreetMap, vectorLayer],
    target: 'map',
    loadTilesWhileAnimating: true,
    overlays: [overlay],
    view: new ol.View({
        maxZoom: 18,
        center: [-6409852, -4571211],
        zoom: 2
    })
});

/**
 * Funcion que al hacer click en el closer lo cierra.
 */
closer.onclick = function () {
    $("#popup").fadeOut();
    return false;
}

/**
 * Variable de interaccion con el evento "click".
 */
var select = new ol.interaction.Select({ condition: ol.events.condition.click });

/**
 * Funcion que al seleccionar "that" busca los atributos del "that" y los escribe dentro del popup.
 */
function hacerCuandoSeleccione(that) {
    if (that.selected.length >= 1) {
        var geometria = that.selected[0].getGeometry();
        var posicion = geometria.getFirstCoordinate();
        var propiedades = that.selected[0].getProperties()
        var aux = "";
        $("#popup").fadeIn();
        overlay.setPosition(posicion);
        content.innerHTML = "";
        var claves = Object.keys(propiedades);
        claves = claves.filter(item => item != "geometry");
        claves = claves.filter(item => item != "type");
        claves = claves.filter(item => item != "foto");
        claves = claves.filter(item => item != "lat");
        claves = claves.filter(item => item != "lon");
        claves = claves.filter(item => item != "styleUrl");
        claves.forEach((clave) => {
            if (propiedades[clave] != "") {
                if (clave == "nombre") {
                    content.innerHTML += "Nombre" + ": " + propiedades[clave] + "<br>";
                }
                if (clave == "apellido") {
                    content.innerHTML += "Apellido" + ": " + propiedades[clave] + "<br>";
                }
                if (clave == "descripcion") {
                    content.innerHTML += "Descripcion" + ": " + propiedades[clave] + "<br>";
                }
            }
        });
        aux += '<form method="post" enctype="multipart/form-data">';
        aux += '  <input class="d-none" value="' + propiedades.foto + '" id="foto" name="foto">';
        aux += ' <br> <button type="submit" class="btn btn-success">';
        aux += '  Descargar imagen';
        aux += '  </button>';
        aux += '</form>';
        content.innerHTML += aux;
    }
    select.getFeatures().clear();
}

/**
 * Al seleccionar un elemento este debe desplegar el popup
 */
map.addInteraction(select);
select.on('select', hacerCuandoSeleccione, this);

