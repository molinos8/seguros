# Modelos de negocio.

Tratamos de diferenciar distintos modelos de negocio. Un modelo de negocio no es una representación 1 a 1 con una base de datos, si no algo representativo de nuestro negocio con sus acciones y relaciones.
Yo pienso en 5 modelos de negocio: Order, Product, Store, Supplier, Users. Esto es más un tema filosófico y habría que tener un ecosistema más grande para poder decidir si alguno de estos modelos no tienen entidad suficiente como para ser modelos de negocio por si mismos. Por ejemplo, los proveedores podrían no tener entidad suficiente y ser parte de los productos (el producto me lo sirve un proveedor).

El modelo de negocio debe quedar abstraido del resto del desarrollo, dependencias, framework, modelo de persistencia o cualquier ente que se comunique con él.
Por eso sus dependencias se le inyectan al constructor. 

Al modelo de negocio se le inyectan sus:
- Validadores: Estos no se implementan pues no hay tiempo y no se solicita.
- Repositorio: Repositorio que se comunica con el modelo de persistencia.
- Data: los datos necesarios formateados.