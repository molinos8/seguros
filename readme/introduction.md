# Objetivo.

El objetivo de este desarrollo ha sido mostrar más una forma alternativa de afrontar la prueba (debido en parte a mi desconocimiento de Lucid, aunque en un principio intenté abordarla con este patrón, al ver que iba a tardar un tiempo en conseguir entenderlo y que una vez entendido no iba a poder hacer algo interesante), por lo que se afronta este desarrollo con el objetivo de realizar una arquitectura hexagonal abstrayendo el modelo de negocio BM del resto de capas y del framework.
Así mismo se trata de hacer un desarrollo SOLID y usando el patrón de diseño de repositorio.

# Carencias.

Debido a la falta de tiempo no se realiza el desarrollo con TDD, solo un endpoint tiene el proceso completo de excepciones y formateadores de respuesta correcta y error. (createOrder() de BMOrder y su ejecución en orderRepository , sirve este de ejemplo para el proceso de exceptiones y respuestas del BM)

# Arquitectura hexagonal

El concepto más importante que tratamos de enseñar en este desarrollo es la estanqueidad del modelo de negocio y como queda 'protegido' de resto de factores como puede ser :
- El formato de peticiones de la API:
Para aislarlo de las peticiones Http hemos definido App\BMFormatters\Request\HttpApi\PostNormalizer, esta clase normaliza la petición Http a algo que nuestro modelo de negocio sea capaz de entender. PostNormalizer implementa App\BMFormatters\Interfaces\IBMRequest. Si hemos definido bien esta interface, el día de mañana, si decidimos cambiar el formato de las peticiones Http no habrá ningún problema. Solo tendremos que modificar PostNormalizer y nuestro modelo de negocio se habrá mantenido a salvo
- El modelo de persistencia.
Con la definición de los repositorios, esta capa de abstracción mantiene a salvo a nuestro BM del modelo de persistencia, el día de mañana se puede cambiar eloquent o incluso el mysql por otro modelo de persistencia y el BM se mantiene a salvo.
- El framework
Aunque el framework laravel es muy útil para grandes desarrollos, puede ser sustituido en cualquier momento, por ello hay que evitar usar helpers o similares del framework en el modelo de negocio  y así poder en un futuro cambiar el framework sin cambiar el modelo de negocio.
- La salida de datos.
La salida de datos del BM hacia el exterior también está normalizada y estandarizada con las clases BMError y BMActionOk. De nuevo la clave está en definir correctamente la interface que implementan ambos. Si la definimos correctamente mantendremos al BM nuevamente a salvo de las necesidades del receptor de datos.

# API
Definimos una API solo con peticiones POST que definen acciones del modelo de negocio ya sean de creación, borrado, actualizado o obtención de datos.

Veamos en el punto 4 todo esto más en detalle
