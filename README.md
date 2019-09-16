# CharlaGeolocalizacion
## LOS MAPAS NOS CUENTAN HISTORIAS
### Disertante: Marcelo Farenga
## ENCONTRAR Y SER ENCONTRADO
### Disertantes: Evans Felipe, Mutti Pilar, Mateos Wenceslao

Hoy en día la computación ubicua es un tema fundamental para el desarrollo de aplicaciones y servicios informáticos cada vez mas efectivas, mejorando la calidad de vida. Es por esto, como informáticos el entender el sensor de localización (el sensor mas importante para la computación ubicua) se hace imprescindibles para el desarrollo de nuestros servicios a nuestros usuarios.
    
Durante las dos charlas del encuentro se va a recorrer las virtudes y problemas de los sistemas de representación de mapas y tecnologías necesarias para la determinación de la ubicación de un dispositivo/persona en un mapa digital.

Estos ejemplos buscan orientar al programador con herramientas basicas y sencillas con una potencialidad muy grande.

## Instalación
### Offline
Para la instalación, es preciso que se descarguen:
    - Jquery
    - OpenLayers
    - PolyFill
    - Bootstrap

Una vez hecho esto, es preciso cambiar los head de los html para que incluyan lo ya descargado.

### Online
Es preciso cambiar los head de todos los html por los correspondientes para la herramienta usada.

### Base de datos
Es crucial crear una base de datos e importar el sql ya armado, con esto nos aseguramos la estructura y una serie de datos de prueba.

Una vez realizado esto, es importante cambiar el archivo "conexion.php" para que utilice la BD recien creada y un usuario y contraseña con permisos para INSERT y SELECT para poder utilizar la misma.

### Permisos
Una vez realizado todo, el servidor tiene que tener los permisos necesarios para poder acceder y guardar las fotos subidas a la carpeta utilizada, por lo que en caso de no funcionar esta caracteristica, recomiendo fervientemente revisar los permisos.