# TPE3-API
Tercera entrega del TPE.

## Endpoints de la API

### **Listar Películas**
Para listar las películas utilizamos el verbo `GET` con el siguiente endpoint:  
`TPE3/api/peliculas`

**Ejemplo:**  
[http://localhost/TPE3/api/peliculas/](http://localhost/TPE3/api/peliculas/)

---

### **Listar Películas Ordenadas**
#### Por Nombre
Para listar las películas ordenadamente por `nombre`, utilizamos el verbo `GET` con el siguiente endpoint:  
`TPE3/api/peliculas?orderBy=nombre`

**Ejemplo:**  
[http://localhost/TPE3/api/peliculas?orderBy=nombre](http://localhost/TPE3/api/peliculas?orderBy=nombre)

#### Por Director
Para listar las películas ordenadamente por `director`, utilizamos el verbo `GET` con el siguiente endpoint:  
`TPE3/api/peliculas?orderBy=director`

**Ejemplo:**  
[http://localhost/TPE3/api/peliculas?orderBy=director](http://localhost/TPE3/api/peliculas?orderBy=director)

---

### **Obtener Película por ID**
Para obtener una película seleccionada por su `id`, utilizamos el verbo `GET` con el siguiente endpoint:  
`TPE3/api/peliculas/:id`

**Ejemplo:**  
[http://localhost/TPE3/api/peliculas/5](http://localhost/TPE3/api/peliculas/5)

---

### **Agregar una Nueva Película**
Para agregar una nueva película, utilizamos el verbo `POST` con el siguiente endpoint:  
`TPE3/api/peliculas`

**Ejemplo:**  
[http://localhost/TPE3/api/peliculas](http://localhost/TPE3/api/peliculas)

**Body del Request:**
```json
{
    "nombre": "nueva peli",
    "director": "nuevo director",
    "fecha_estreno": "2024-11-17"
}
```
---

### **Editar una Película**
Para editar una película, utilizamos el verbo `PUT` con el siguiente endpoint:  
`TPE3/api/peliculas/:id`

**Ejemplo:**  
[http://localhost/TPE3/api/peliculas/9](http://localhost/TPE3/api/peliculas/9)

**Body del Request:**
```json
{
    "nombre": "nueva peli modificada",
    "director": "nuevo director modificado",
    "fecha_estreno": "2024-11-17"
}
