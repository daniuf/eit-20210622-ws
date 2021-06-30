
- Tenemos que construir un API REST

1) Metodos HTTP a utilizar (GET, POST, PUT, PATCH, DELETE)

2) Status Code a retornar

3) Recursos a consumir

	Funcion			Recurso				METODO				STATUSCODE
	crearUsuario 		crearUsuario			POST				201
	borrar			borrarUsuario/{ID}		DELETE
	obtenerUsuarios		obtenerUsuarios			GET
	actualizarUsuario	actualizarUsuario/{ID}		PUT / PATCH

===============================

[OPCIONAL]

Si quiero guardar cuantas peticiones realizo cada token

 - peticion-por-token
   - token
   - fechahora
