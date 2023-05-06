# GRIM RECKONING - PROYECTO FINAL FSD BACKEND PHP LARAVEL

![image](https://user-images.githubusercontent.com/122631261/236619730-24806d4c-fb0f-40a0-83e6-4623ac1ac2b3.png)

<details>
  <summary>Contenido 📝</summary>
  <ol>
    <li><a href="#objetivo">Objetivo</a></li>
    <li><a href="#sobre-el-proyecto">Sobre el proyecto</a></li>
    <!-- <li><a href="#deploy-🚀">Deploy</a></li> -->
    <li><a href="#stack">Stack</a></li>
    <li><a href="#diagrama-bd">Diagrama</a></li>
    <li><a href="#instalación-en-local">Instalación</a></li>
    <li><a href="#endpoints">Endpoints</a></li>
    <li><a href="#futuras-funcionalidades">Futuras funcionalidades</a></li>
    <li><a href="#contribuciones">Contribuciones</a></li>
    <li><a href="#licencia">Licencia</a></li>
    <li><a href="#webgrafia">Webgrafia</a></li>
    <li><a href="#desarrollo">Desarrollo</a></li>
    <li><a href="#agradecimientos">Agradecimientos</a></li>
    <li><a href="#contacto">Contacto</a></li>
  </ol>
</details>

## Objetivo

En este proyecto he desarrollado una API funcional para un videojuego web llamado Grim Reckoning - the shattered kingdom. Este sirve tanto los datos de héroes, monstruos, objetos y personajes, como la mayoría de funciones para la creación de las batallas, la asignación de objetos y las subidas de nivel. También nos permite gestionar los datos de usuarios, como registros y modificación del perfil, además de proporcionar el acceso a una zona de administrador donde podemos eliminar usuarios y actualizar sus roles.

## Sobre el proyecto

A través de la API, los usuarios pueden registrarse mediante un formulario en el que se les pedirán datos personales. Con el registro, se les asigna un rol de usuario y se les logea directamente, asignándoles un token. El administrador podrá asignar roles a los usuarios, para que, en caso de necesitar ayuda para gestionar la web, tenga una herramienta a mano preparada. Con el reparto de roles realizado, la API dispone de barreras para que, de forma orgánica, los usuarios puedan acceder a su perfil, crear héroes, iniciar batallas y revisar datos de interés en función de los roles.

## Deploy 🚀
<div align="center">
    <a href="https://master.d5blyjw0pih23.amplifyapp.com/"><strong>Url a producción </strong></a>🚀🚀🚀
</div>

## Stack
Tecnologías utilizadas:
<div align="center">
<a href="https://www.php.net/">
    <img src= "https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white"/>
</a>
<a href="https://nodejs.org/es/">
    <img src= "https://img.shields.io/badge/node.js-026E00?style=for-the-badge&logo=node.js&logoColor=white"/>
</a>
<a href="https://laravel.com/">
    <img src= "https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white"/>
</a>
 </div>


## Diagrama BD
![image](https://user-images.githubusercontent.com/122631261/236614709-71472034-44a6-469b-be86-f039e4ded5fb.png)

## Instalación en local
1. Clonar el repositorio
2. ` $ npm install `
3. `composer install`
4. Instalamos las dependencias listadas en composer.json
5. Copiamos el archivo .env.example y lo renombramos a .env
6. Conectamos nuestro repositorio con la base de datos 
7. ``` $ Ejecutamos las migraciones con el comando de terminal: php artisan migrate``` 
8. ``` $ Ejecutamos los seeders con el comando de terminal: php artisan db:seed``` 
9. ``` $ npm run dev ```

## Endpoints
<details>
<summary>Endpoints</summary>

- AUTH
    - REGISTRO

            POST http://localhost:8000/api/register
        body:
        ``` js
            {
                "name": "Felipe",
                "email": "felipe@felipe.com",
                "password": "ClaveEjemplo.1"
            }
        ```

    - LOGIN

            POST http://localhost:8000/api/login
        body:
        ``` js
            {
                "email": "felipe@felipe.com",
                "password": "ClaveEjemplo.1"
            }
        ```

    - LOGOUT
    
         ` $ Requiere token (login).`
    
            POST http://localhost:8000/api/logout

    - PERFIL

        ` $ Requiere token (login).`

            GET http://localhost:8000/api/profile


    - ACTUALIZAR PERFIL DE USUARIO

        ` $ Requiere token (login).`


            PUT http://localhost:8000/api/profile
        body:
        ``` js
              {
                  "name": "Felipe Update",
                  "password": "NuevaClave.1"
              }
        ```

- USERS
    - VER USUARIOS
    
        ` $ Requiere token (login) y rol de admin.`

            GET http://localhost:8000/api/users
       
    - VER USUARIO POR ID

        ` $ Requiere token (login) y rol de admin.`
        
            GET http://localhost:8000/api/users/{:id}
            
    - BORRAR USUARIO POR ID

        ` $ Requiere token (login) y rol de admin.`
        
            DELETE http://localhost:8000/api/users/{:userId}
       
    - CAMBIAR ROL DE USUARIO

        ` $ Requiere token (login) y rol de admin.`


            POST http://localhost:8000/api/user/{:userId}/change-role/{:roleId}
            
- HÉROES
    - CREAR HÉROE
    
        ` $ Requiere token (login).`

            POST http://localhost:8000/api/heroes
        body:
        ``` js
              {
              "name": "Heroe de Ejemplo",
              "story": "Esta es la historia del héroe de ejemplo",
              "image_id": 7
              }
        ```

    - AÑADIR ÍTEM A HÉROE

        ` $ Requiere token (login).`

            POST http://localhost:8000/api/heroes/{:heroId}/items/{:itemId}

    - ELIMINAR ÍTEM DE HÉROE

        ` $ Requiere token (login).`

            DELETE http://localhost:8000/api/heroes/{:heroId}/items/{:itemId}

    - SUBIR DE NIVEL A HÉROE

            PUT http://localhost:8000/api/heroes/{:heroId}/level-up
            
    - ELIMINAR HÉROE

        ` $ Requiere token (login).`

            DELETE http://localhost:8000/api/heroes/{:heroId}

    - SELECCIONAR HÉROE

        ` $ Requiere token (login).`

            POST http://localhost:8000/api/heroes/{:heroId}/select
    
    - VER MIS HÉROE

        ` $ Requiere token (login).`

            GET http://localhost:8000/api/profile/heroes

    - VER ÍTEMS DEL HÉROE

        ` $ Requiere token (login).`

            GET http://localhost:8000/api/hero/{:heroId}/items
            
            
    - VER IMAGEN DEL HÉROE

            GET http://localhost:8000/api/hero/image/{:imageHeroId}

    - VER TODAS LAS IMÁGENES DE HÉROES

            GET http://localhost:8000/api/hero-images

    - VER MONSTRUOS DERROTADOS POR EL HÉROE

        `$ Requiere token (login).`

            GET http://localhost:8000/api/heroes/defeated-monsters/{:heroId}
            
    - VER RANKING DE HÉROES

            GET http://localhost:8000/api/top-heroes
            
- MONSTRUOS
    - VER MONSTRUOS

            GET http://localhost:8000/api/monsters
            
    - ACTUALIZAR DATOS DE MONSTRUOS

        ` $ Requiere token (login) y rol de admin.`

            PUT http://localhost:8000/api/monsters/{:monsterId}
        body:
        ``` js
              {
                  "name" : "Monstruo de ejemplo",
                  "attack" : 15,
                  "defense" : 13,
                  "health" : 130,
                  "description" : "Descripción de ejemplo."
              }
        ```
    - ACTUALIZAR DATOS DE MONSTRUOS

        ` $ Requiere token (login) y rol de admin.`

            POST http://localhost:8000/api/monsters/{:monsterId}
        body:
        ``` js
              {
                  "name" : "Monstruo de ejemplo",
                  "attack" : 15,
                  "defense" : 13,
                  "health" : 130,
                  "description" : "Descripción de ejemplo."
              }
        ```

    - BORRAR MONSTRUO

        ` $ Requiere token (login) y rol de admin.`

            POST http://localhost:8000/api/monsters/{:monsterId}
            
     - VER IMAGEN DE MONSTRUO

            GET http://localhost:8000/api/monster/image/{:monsterImageId}

- ESCENARIOS
    - VER ESCENARIOS

            GET http://localhost:8000/api/stages
            
    - CREAR ESCENARIO

        ` $ Requiere token (login) y rol de admin.`

            POST http://localhost:8000/api/stages
        body:
        ``` js
              {
                  "name": "Escenario de Prueba",
                  "attack_modifier": 1,
                  "defense_modifier": 3,
                  "health_modifier": 20,
                  "image": "prueba.jpg"
              }
        ```
        
    - ACTUALIZAR ESCENARIO

        ` $ Requiere token (login) y rol de admin.`

            PUT http://localhost:8000/api/stages/{:stageId}
        body:
        ``` js
              {
                  "name": "Escenario de Prueba",
                  "attack_modifier": 1,
                  "defense_modifier": 3,
                  "health_modifier": 20,
                  "image": "prueba.jpg"
              }
        ```
        
    - BORRAR ESCENARIO

        ` $ Requiere token (login) y rol de admin.`

            DELETE http://localhost:8000/api/stages/{:stageId}

           
- ÍTEMS
    - VER ÍTEMS

            GET http://localhost:8000/api/items

    - VER ÍTEM POR ID

            GET http://localhost:8000/api/items/{:itemId}
            
    - CREAR ÍTEM

        ` $ Requiere token (login) y rol de admin.`

            POST http://localhost:8000/api/items
        body:
        ``` js
              {
                  "name": "Espada de prueba",
                  "description": "Descripción de la legendaria espada de prueba",
                  "attack_modifier": 4,
                  "defense_modifier": 6,
                  "health_modifier": 25,
                  "rare": "legendario"
              }
        ```

    - ACTUALIZAR ÍTEM

        ` $ Requiere token (login) y rol de admin.`

            PUT http://localhost:8000/api/items/{:itemId}
        body:
        ``` js
              {
                  "name": "Espada de prueba",
                  "description": "Descripción de la legendaria espada de prueba",
                  "attack_modifier": 4,
                  "defense_modifier": 6,
                  "health_modifier": 25,
                  "rare": "legendario"
              }
        ```

    - BORRAR ÍTEM POR ID

        ` $ Requiere token (login) y rol de admin.`

            DELETE http://localhost:8000/api/items/{:itemId}

    - AÑADIR ÍTEM ALEATORIO A HÉROE

        ` $ Requiere token (login) y rol de admin.`

            POST http://localhost:8000/api/add-item-to-hero/{:heroId}

- BATALLAS
    - CREAR BATALLA

        ` $ Requiere token (login).`

            POST http://localhost:8000/api/battles

    - ACTUALIZAR BATALLA

        ` $ Requiere token (login).`

            POST http://localhost:8000/api/battles/{:battleId}
        body:
        ``` js
              {
                  "hero_victory": 1
              }
        ```
            

- ROLES
    - VER ROLES

        ` $ Requiere token (login) y rol de admin.`

            GET http://localhost:8000/api/roles

- ALDEANOS
    - VER ALDEANO POR ID

            GET http://localhost:8000/api/villager/image/{:villagerId}
            
            
</details>

## Futuras funcionalidades
[ ] Este proyecto está planteado para funcionar con un frontend desarrollado en React.
[ ] En el futuro, esperamos implementar los servicios para limpiar la lógica del código de los controladores.  
[ ] Un sistema de validación por correo electrónico. 

## Contribuciones
Las sugerencias y aportaciones son siempre bienvenidas.  

Puedes hacerlo de dos maneras:

1. Abriendo una issue
2. Crea un fork del repositorio
    - Crea una nueva rama  
        ```
        $ git checkout -b feature/nombreUsuario-mejora
        ```
    - Haz un commit con tus cambios 
        ```
        $ git commit -m 'feat: mejora X cosa'
        ```
    - Haz push a la rama 
        ```
        $ git push origin feature/nombreUsuario-mejora
        ```
    - Abre una solicitud de Pull Request

## Licencia
Este proyecto se encuentra bajo licencia de Felipe Báguena Peña.

## Webgrafia:
Para el desarrollo del proyecto se ha consultado en:
- <a href="https://www.php.net/docs.php"><strong>Documentación de PHP</strong></a>
- <a href="https://laravel.com/docs/10.x/readme"><strong>Documentación de Laravel</strong></a>

## Desarrollo:

Todo el proyecto ha sido desarrollado por Felipe Báguena Peña.

## Agradecimientos:

Agradezco a mis compañeros el tiempo dedicado a este proyecto:

- **Jose**  
<a href="https://github.com/JoseMarin" target="_blank"><img src="https://img.shields.io/badge/github-24292F?style=for-the-badge&logo=github&logoColor=white" target="_blank"></a> 

- **David**  
<a href="https://github.com/Dave86dev" target="_blank"><img src="https://img.shields.io/badge/github-24292F?style=for-the-badge&logo=github&logoColor=red" target="_blank"></a>

- ***Mara***  
<a href="https://github.com/MaraScampini" target="_blank"><img src="https://img.shields.io/badge/github-24292F?style=for-the-badge&logo=github&logoColor=green" target="_blank"></a> 

- ***Dani***  
<a href="https://github.com/datata" target="_blank"><img src="https://img.shields.io/badge/github-24292F?style=for-the-badge&logo=github&logoColor=green" target="_blank"></a> 

## Contacto

- ***Felipe Báguena***  
<a href = "mailto:felipebaguena@gmail.com"><img src="https://img.shields.io/badge/Gmail-C6362C?style=for-the-badge&logo=gmail&logoColor=white" target="_blank"></a>
<a href="https://github.com/felipebaguena" target="_blank"><img src="https://img.shields.io/badge/github-24292F?style=for-the-badge&logo=github&logoColor=green" target="_blank"></a> 
