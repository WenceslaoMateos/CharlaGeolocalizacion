/**
 * Vector que va a ser utilizado como capa para el dibujado de nuestra posición dentro del mapa.
 */
var vectorLayer = new ol.layer.Vector({
    source: new ol.source.Vector(),
    style: new ol.style.Style({
        image: new ol.style.Icon({
            src: 'marker.png',
            anchor: [0.5, 1],
            scale: 0.1
        })
    })
})

/**
 * Objeto de tipo View que nos va a dar las configuraciones iniciales para ver el mapa.
 */
var miView = new ol.View({
    maxZoom: 18,
    center: [-6409852, -4571211],
    zoom: 2
})

/**
 * Callback que dada una posición, crea un feature y lo introduce en el layer del vector. 
 * Tambien anima la vista para centrarla en el punto deseado.
 * @param {*} position Objeto posición que contiene latitud y longitud.
 */
function mark(position) {
    var miPos = ol.proj.transform([position.coords.longitude, position.coords.latitude], 'EPSG:4326', 'EPSG:3857');
    vectorLayer.getSource().addFeature(new ol.Feature({ geometry: new ol.geom.Point(miPos) }))
    miView.animate({
        center: miPos,
        zoom: 15,
        duration: 1000
    });
};

/**
 * Enlaza el callback para el dibujado de la posicion, para que se ejecute con el cambio de la posición.
 */
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.watchPosition(mark);
    } else {
        alert("Geolocation is not supported by this browser.");
    }
}


getLocation();

/**
 * Mapa completo con todos sus elementos, los layers se muestran por orden y se superponen uno arriba
 * de otro de izquierda a derecha.
 */
var map = new ol.Map({
    layers: [openStreetMap, vectorLayer],
    target: 'map',
    loadTilesWhileAnimating: true,
    view: miView
});