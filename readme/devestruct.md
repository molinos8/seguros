# Estructura de desarrollo

## LA API HTTP

Decidimos basar nuestra API en acciones del modelo de negocio, por eso nos basta solo con el método POST.
Nuestra API se formará de la siguiente forma: [exportación de peticiones para probar](includes/Insomnia_2022-02-28.json)

URL_DESARROLLO/api/NOMBRE_MODELO_DE_NEGOCIO

{
	"action":"nombreDeLaAccion",
	"params": {
		"un_parametro": "un valor",
        "otro_parametro": "otro valor",
	}
}

## controllerProvider App\Providers;

Comenzamos con un proveedor para nuestro controlador Base. Este se encargará en base a la URL de la petición POST de sacar el modelo, su clase validadora, su repositorio y su request formateada. Así pasaremos precargados estos datos al controlador base que es un único controlador para todo el desarrollo.

## baseController.

El único controlador del desarrollo. Simplemente, como buen controlador recibe unos datos y los envía a 'la persona adecuada' y recibe una respuesta y la devuelve de igual modo a quién le toca, pero no hace más funciones. Por supuesto no tiene lógica de negocio, no valida datos, no hace de middleware ni de nada similar. Solo mueve datos de un lado a otro.

## Modelos de negocio (ver punto 2)

## Repositorios