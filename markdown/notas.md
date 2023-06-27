# Codeigniter 4

[Curso CI 4](https://www.youtube.com/watch?v=ugs1_dvzfSY&list=PLQBsSZ4qJdGm-6HlrHB0H2xyCCmSPTJqo&index=2)

## 2-. instalación

Inciamos con Laragon, tras descargarlo vamos a la terminal y ejecutamos el comando de composer para realizar la instalación, esto lo hacemos siguiendo los pasos del siguiente [link](https://www.codeigniter.com/user_guide/installation/installing_composer.html)

Posterior a esto iniciamos los servicios de Laragon para crear nuestros virtual hosts
Inciamos y verificamos la ruta en el engranaje, en Hostname podemos ver el nombre del host virtual

![Virtual Host](./assets/virtual-host.png)

### Virtual Hosts

En el contexto de Laragon, un virtual host se refiere a una configuración que te permite asignar un nombre de dominio local a un proyecto específico en tu entorno de desarrollo. Básicamente, te permite acceder a un proyecto en tu máquina local utilizando un nombre de dominio personalizado en lugar de la típica ruta de acceso del proyecto.

Cuando configuras un virtual host, puedes acceder a tu proyecto local utilizando una URL como "http://mi-proyecto.local" en lugar de algo como "http://localhost/mi-proyecto". Esto puede ser útil para simular un entorno de producción local y facilitar el desarrollo y la prueba de proyectos que requieren nombres de dominio específicos.

Laragon es una herramienta de desarrollo local que simplifica la configuración y administración de servidores web en tu máquina. Proporciona un entorno de desarrollo completo con Apache, PHP, MySQL y otras herramientas relacionadas. Al utilizar Laragon, puedes configurar y administrar fácilmente virtual hosts para tus proyectos.

## 3-. Primeras Configuraciones

En la estructura del proyecto podemos ver un archivo env. Todos los frameworks modernos tiene un archivo env, se encarga de las variables de configuración que pueden cambiar cuando subimos nuestro sitio a producción o cuando hacemos testing de la app verificando varios parametros como la DB, BaseUrl (el cual cambia entre desarrollo y producción)

CI nos proporciona este template y de momento realizaremos ciertas configuraciones

```env
# ENVIRONMENT
#--------------------------------------------------------------------

# CI_ENVIRONMENT = production
CI_ENVIRONMENT = development

#--------------------------------------------------------------------
# APP
#--------------------------------------------------------------------

app.baseURL = 'http://blog.test/'
# If you have trouble with `.`, you could also use `_`.
# app_baseURL = ''
# app.forceGlobalSecureRequests = false
# app.CSPEnabled = false
```

- CI_ENVIRONMENT cambiamos a development
- app.baseURL escribimos la ruta de nuestro host virtual

Posteriormente agregamos un . al archivo env para que lo tome como configuración e ignoramos el archivo en la carpeta gitignore

En nuestro index de CI podremos ver en que entorno estamos
![Virtual Host](./assets/Environment.png)

Al estar en development podemos acceder a ciertas herramientas

![Virtual Host](./assets/Environment-tools.png)

Aqui podemos ver en que vista estamos, los tiempos de carga de los archivos, los archivos que se obtienen, las rutas, los eventos, un historial de peticiones y por último las variables que recibimos al cargar la vista, variables de sesión, consultas, etc.

## 4-. Controladores y PSR-4

Dentro de app\Controllers almacenaremos nuestros controlador.
Contamos con un BaseController que pertenece al core de CI. Aqui podemos cargar helpers, podemos pre cargar modelos, librerías, etc.

Además tenemos un Controlador Home.php que nos muestra la bienvenida de CI

### PSR-4

Estandar definido por la comunidad el cual ayuda a la carga de archivos (en PHP nativo se refiere a include/require), esto lo haremos haciendo uso de los namespace. CI utiliza la carga de archivos automatica con el objetivo de conastruir apps más modulares. Nosotros podemos llamar a otros modulos simplemente definiendo su namespace, estos namespaces los vemos en app\Config\Autoload.php

Un ejemplo de esto:

Creamos una archivo en la siguiente ruta: app\Libraries\Codigo.php
Dentro de este archivo generaremos un namespace y una clase

```php
namespace App\Libraries;

class Codigo
{
    public function sayHi()
    {
        return "hi";
    }
}
```

Ahora en nuestro Controlador Home haremos uso de este método de la siguiente manera

```php
namespace App\Controllers;
// Importamos la clase codigo
use App\Libraries\Codigo;

class Home extends BaseController
{
    public function index()
    {
        // Instanciamos un objeto de esta clase
        $instancia_codigo = new Codigo();
        // Llamamos al método
        echo $instancia_codigo->sayHi();
        return view('welcome_message');
    }
}
```

De esta manera podemos crear modulos y utilizarlos en cualquier parte de nuestra aplicación, facilitando el uso de componentes y agilizando el desarollo
