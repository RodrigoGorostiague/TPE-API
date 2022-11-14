Buscar Clases
Buscar a través de varias clases utilizando filtrado y clasificaciónes avanzados.
GET http://localhost/Web%20II/Rodo/TPE/Cursos/api/lessons

Parámetros
Nombre	Type	Ejemplo	    Descripción
sort	String	lessonId	Valor por defecto de consulta. Retorna las clases segun su id.
order   String  ASC         Valor por defecto de consulta. Retorna las clases ordenadas de manera ascendente.
tema    String  PHP         Retorna las clases cuyo tema coincidan. 
limit   Number  10          Retorna 10 clases. Recomendable uso conjunto con (offset).
offset  Number  1           Retorna la primer pagina. Recomendable uso conjunto con (limit).

Todos los parametros pueden conbinarse para una busqueda personalizada.

Buscar Clase
Buscar la informacion de una clase.
GET http://localhost/Web%20II/Rodo/TPE/Cursos/api/lessons/:ID

Buscar el detalle de un campo dentro de una clase.
GET http://localhost/Web%20II/Rodo/TPE/Cursos/api/lessons/:ID/:COLNAME
Ejemplo de :COLNAME (descripcion).

Crear una nueva clase. NOTA: se requiere ser usuaria y poseer un token valido.
POST http://localhost/Web%20II/Rodo/TPE/Cursos/api/lessons/:token

Editar una clase a partir de su :ID. NOTA: se requiere ser usuaria y poseer un token valido.
PUT http://localhost/Web%20II/Rodo/TPE/Cursos/api/lessons/:ID?:token
Para realizar la edicion los nuevos valores deben ser enviados dentro del Body con una sintaxis standar similar a:
{
        "tema": 1,
        "descripcion": "new-descripcion",
        "video_url": "new-video_url",
        "slide_url": "new-slide_url"
}

Eliminar un clase a partir de su :ID.  NOTA: se requiere ser usuaria y poseer un token valido.
DELETE http://localhost/Web%20II/Rodo/TPE/Cursos/api/lessons/:ID?:token

Autenticación
Para usar la API, necesita una Token. Puede obtener uno gratis simplemente registrándose.

Una vez que tenga su clave de API, debe colocarla en la URL de solicitud para cada solicitud que realice, como ?token=YOUR-TOKEN .

Atención: solo el primer parámetro de consulta tiene el prefijo ? (signo de interrogación), todos los siguientes tendrán el prefijo & (ampersand). Así funcionan las URLs y nada relacionado con nuestra API. Aquí hay un ejemplo completo con dos parámetros: http://localhost/Web%20II/Rodo/TPE/Cursos/api/lessons/:ID?:token=YOUR-TOKEN .

Tenga en cuenta además que los parámetros distinguen entre mayúsculas y minúsculas .

Alternativamente, puede usar como prueba:
Usuario con token valido sin expirar.

User: Rodo,
Pass: 1,
Token: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6MSwibmFtZSI6IlJvZG8iLCJpYXQiOjE2Njg0NDg2NjMsImV4cCI6MTY3MTA0MDY2MywiYWRtaW4iOnRydWV9.MGZiMTgyZWY4NTMxNmY2NThhNzlhMjJkZmNlY2RjMDc0YWYxNzNmYTI2NDVhMWMwZjQyZmQ1YmYxMTdhOWU2Mg ,

Usuario con token valido pero expirado.

User: Test,
Pass: 1,
Token: eyJeyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6MiwibmFtZSI6InRlc3QiLCJpYXQiOjE2Njg0NTMyNDIsImV4cCI6MTY2ODQ1MzI0MiwiYWRtaW4iOnRydWV9.NDk5MzU5ZmIxY2YzYjI1NmU2YjQ1MzJlYjk0Njc1NDhhOTkxZmY5OWZmYjY5M2NmNzdlNzZkOTJhZDAzYTIxNA ,

Usuario sin token.

User: Test2 ,
Pass: 1 ,