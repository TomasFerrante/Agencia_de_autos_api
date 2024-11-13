
# Agencia de autos - API REST


## Integrantes

- Ferrante, Tomas Abel (44048410)
- Denot, Mayra Andrea (45539846)


## Documentación API - Endpoints


## Autenticación
La autenticación utilizada es JWT.

Pasos a seguir:  

- Primero se debe obtener el token con Basic Auth a través de:

```http
  GET http://localhost/agencia-autos-api/api/usuarios/token
```

- Luego ingrese los siguientes datos:
    - Usuario: webadmin
    - Contraseña: admin
**Nos devuelve nuestro token.**

Luego en los métodos que requieran de una autorización elegimos el Bearer Auth, ingresando el token que nos brindó el Basic.
```
    Authorization: Bearer <mi_token>
```

#### BASE URL

```http
  GET http://localhost/agencia-autos-api/api/
```

#### GET RESEÑAS

```http
  GET http://localhost/agencia-autos-api/api/reseñas
```

Devuelve una lista de reseñas disponibles en el sistema. Se pueden incluir filtros opcionales para obtener reseñas específicas y ordenarlas por cualquiera de sus campos de manera ascendente.

#### Parámetros de consulta opcionales:
- **Valoracion** (opcional) - Filtra las reseñas por la valoración que le indique el usuario. 

    #### Ejemplo de solicitud:
    ```http
        GET http://localhost/agencia-autos-api/api/reseñas?Valoracion=3
    ```
- **orderBy** (opcional) - Ordena las reseñas por el campo indicado.

    #### Ejemplos de solicitudes:
    ```http
        GET http://localhost/agencia-autos-api/api/reseñas?orderBy=Valoracion
    ```
    ```http
        GET http://localhost/agencia-autos-api/api/reseñas?orderBy=Comentario
    ```

#### Ejemplo de respuesta
```json
    {
        "status": "success",
        "data": [
            {
                "Id": 1,
                "Titulo": "¡Excelente producto!",
                "Comentario": "La mejor calidad.",
                "Valoracion": 5,
                "created_at": "2023-11-12T10:30:00Z"
            },
            {
                "Id": 2,
                "Titulo": "Muy recomendado.",
                "Comentario": "Vale cada centavo.",
                "Valoracion": 5,
                "created_at": "2023-11-11T14:15:00Z"
            }
        ]
    }
```

#### GET RESEÑA

```http
  GET http://localhost/agencia-autos-api/api/reseñas/:id
```

Devuelve una reseña existente.

#### Parámetros de Ruta
- Id (int, requerido) - ID de la reseña que se desea obtener.

#### Ejemplo de solicitud
```http
  GET http://localhost/agencia-autos-api/api/reseñas/1
```

#### Ejemplo de respuesta
```json
    {
        "status": "success",
        "data": [
            {
                "Id": 1,
                "Titulo": "¡Excelente producto!",
                "Comentario": "La mejor calidad.",
                "Valoracion": 5,
                "created_at": "2023-11-12T10:30:00Z"
            },
        ]
    }
```
#### POST RESEÑA

```http
  POST http://localhost/agencia-autos-api/api/reseñas
```
Añade una reseña al sistema. **Requiere autorización.**

#### Headers Requeridos
- Content-Type: application/json - Indica que el cuerpo de la solicitud está en formato JSON.
- Authorization: Bearer <token> - Token JWT para autenticar la creación de la reseña.

#### Ejemplo de solicitud
```json 
    POST http://localhost/agencia-autos-api/api/reseñas
    Content-Type: application/json
    Authorization: Bearer your_access_token

    {
        "Id": 200,
        "Titulo": "Me encanto!!",
        "Comentario": "¡De gran calidad!",
        "Valoracion": 5,
    }
```

#### Ejemplo de solicitud
```json 
    {
        "status": "success",
        "data": {
            "id": 3,
            "valoracion": 5,
            "titulo": "¡Producto de gran calidad!",
            "comentario": "Lo recomendaría sin dudarlo.",
            "created_at": "2023-11-12T12:45:00Z"
        }
    }
```

#### PUT RESEÑA

```http
  PUT http://localhost/agencia-autos-api/api/reseñas/:id
```

Actualiza o modifica una reseña existente. **Requiere autorización.**

#### Headers Requeridos
- Content-Type: application/json - Indica que el cuerpo de la solicitud está en formato JSON.
- Authorization: Bearer <token> - Token JWT para autenticar la actualización de la reseña.

#### Parámetros de Ruta
- Id (int, requerido) - ID de la reseña que se desea actualizar.

#### Ejemplo de solicitud
```json 
    PUT http://localhost/agencia-autos-api/api/reseñas/3
    Content-Type: application/json
    Authorization: Bearer your_access_token

    {
        "Titulo": "No me gustó",
        "Comentario": "¡De muy mala calidad!",
        "Valoracion": 1,
    }
```

#### Ejemplo de respuesta
```json
    {
        "status": "success",
        "data": [
            {
                "Id": 3,
                "Titulo": "Inconforme",
                "Comentario": "No me convence, demasiado caro",
                "Valoracion": 2,
                "updated_at": "2023-11-12T15:00:00Z"
            },
        ]
    }
```

### Posibles Códigos de Respuesta en la API
- 200 OK - Reseña obtenida/actualizada correctamente.
- 201 Created - Reseña creada correctamente.
- 400 Bad Request - Faltan datos o están mal formateados.
- 401 Unauthorized - El token de autorización es inválido o no fue enviado.
- 404 Not Found - La reseña con el ID especificado no existe.
- 500 Internal Server Error - Error del servidor al obtener/crear/actualizar la reseña.
