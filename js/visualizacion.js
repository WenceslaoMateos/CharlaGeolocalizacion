var vectorLayer;
/**
 * 
 */
var vecAux = [];
function creaFeatures(datos) {
    var i;
    var aux;
    var elemento;
    for (i = 0; i < datos.length; i++) {
        elemento = datos[i];
        aux = new ol.Feature({
            type: 'point',
            geometry: new ol.geom.Point(ol.proj.transform([elemento.lat, elemento.lon], 'EPSG:4326', 'EPSG:3857')),
            foto: elemento.foto,
            lat: elemento.lat,
            lon: elemento.lon,
            nombre: elemento.nombre,
            apellido: elemento.apellido,
            descripcion: elemento.descripcion
        });
        //console.log(aux);
        vecAux.push(aux);
    }

    vectorLayer = new ol.layer.Vector({
        source: new ol.source.Vector({
            features: vecAux
        })
    })
}

creaFeatures(datos);

var container = document.getElementById('popup');
var content = document.getElementById('popup-content');
var closer = document.getElementById('popup-closer');

/**
*Funcion que le da un estilo al vector correspondiente a los barcos.
*/
var styleFunction = function (feature) {
    var propiedades = feature.getProperties();
    var rotation = (propiedades['angulo'] * Math.PI) / 180;
    if (propiedades['type'] === 'point' && propiedades['angulo'] != "") {
        style = new ol.style.Style({
            image: new ol.style.Icon({
                src: './images/arrow.png',
                opacity: 1,
                scale: 0.1,
                rotateWithView: true,
                rotation: rotation
            })
        });
    }
    else {
        style = new ol.style.Style({
            stroke: new ol.style.Stroke({
                color: '#777777',
                width: 4
            })
        })
    }
    return [style]
};

/**
  *1-Hacer un mapa
  *2-Conseguir las pps
  *3-???????????
  *4-profit
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
  *Funcion que al hacer click en el closer se cierra en degradé.
  */
closer.onclick = function () {
    $("#popup").fadeOut();
    return false;
}

var select = new ol.interaction.Select({ condition: ol.events.condition.click });

/**
  *Funcion que al seleccionar "that" busca los atributos del "that" y los escribe dentro del popup.
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
        claves = claves.filter(item => item != "id");
        claves = claves.filter(item => item != "campaniaid");
        claves = claves.filter(item => item != "type");
        claves = claves.filter(item => item != "styleUrl");
        if (propiedades.tipo == "batimetria") {
            aux += '<form method="post" enctype="multipart/form-data">';
            aux += '  <input class="d-none" value="' + propiedades.nombre + '" id="batim" name="batim">';
            aux += '  <button type="submit" class="btn btn-success">';
            aux += '  Descargar';
            aux += '  </button>';
            aux += '</form>';
        }
        claves = claves.filter(item => item != "tipo");
        claves = claves.filter(item => item != "nombre");
        claves.forEach((clave) => {
            if (propiedades[clave] != "") {
                content.innerHTML += clave + ": " + propiedades[clave] + "<br>";
            }
        });
        content.innerHTML += aux;
    }
    select.getFeatures().clear();
}

//Al seleccionar un elemento este debe desplegar el popup
map.addInteraction(select);
select.on('select', hacerCuandoSeleccione, this);

