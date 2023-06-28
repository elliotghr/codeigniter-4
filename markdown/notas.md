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

```conf
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

## 4-. [Controladores y PSR-4](https://www.codeigniter.com/user_guide/incoming/controllers.html)

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

## 5-. [Rutas](https://www.codeigniter.com/user_guide/incoming/routing.html)

La definición de las rutas las encotramos en app\Config\Routes.php
Tenemos dos tipos de enrutamiento. Uno es Enrutamiento de ruta definida y el otro es Enrutamiento automático . Con Enrutamiento de ruta definida, puede definir rutas manualmente. Permite URL flexible. El enrutamiento automático enruta automáticamente las solicitudes HTTP según las convenciones y ejecuta los métodos de controlador correspondientes. No hay necesidad de definir rutas manualmente.

Cuando especifica una ruta, elige un método correspondiente a los verbos HTTP (método de solicitud). Si espera una solicitud GET, utilice el get()método:

Configuración de reglas de enrutamiento

```php
$routes->get('/', 'Home::index');
```

Una ruta toma la ruta de ruta (ruta URI relativa a la URL base /) a la izquierda y la asigna al controlador de ruta (controlador y método Home::index) a la derecha, junto con los parámetros que deben pasarse al controlador.

Si ese método requiere que se le pasen parámetros, se enumerarán después del nombre del método, separados por barras diagonales:

```php
// Calls $Users->list()
$routes->get('users', 'Users::list');

// Calls $Users->list(1, 23)
$routes->get('users/1/23', 'Users::list/1/23');
```

Una URL con producto como primer segmento y un número en el segundo se asignará a la \App\Controllers\Catalogclase y el método productLookupByID() pasará la coincidencia como una variable al método:

```php
$routes->get('product/(:num)', 'Catalog::productLookupByID/$1');
```

Rutas de verbos HTTP
Puede usar cualquier verbo HTTP estándar (GET, POST, PUT, DELETE, OPTIONS, etc.):

```php
$routes->post('products', 'Product::feature');
$routes->put('products/1', 'Product::feature');
$routes->delete('products/1', 'Product::feature');
```

Ver Rutas

Si solo desea representar una vista que no tiene lógica asociada, puede usar el view()método. Esto siempre se trata como una solicitud GET. Este método acepta el nombre de la vista a cargar como segundo parámetro.

```php
// Displays the view in /app/Views/pages/about.php
$routes->view('about', 'pages/about');
Si usa marcadores de posición dentro de su ruta, puede acceder a ellos dentro de la vista en una variable especial, $segments. Están disponibles como una matriz, indexados en el orden en que aparecen en la ruta.
```

```php
// Displays the view in /app/Views/map.php
$routes->view('map/(:segment)/(:segment)', 'map');

// Within the view, you can access the segments with
// $segments[0] and $segments[1] respectively.
```

Agrupamientos

Podemos agrupar rutas bajo un nombre en común, esto con el método group(). El nombre del grupo se convierte en un segmento que aparece antes de las rutas definidas dentro del grupo. Esto le permite reducir la escritura necesaria para crear un amplio conjunto de rutas que comparten la cadena de apertura, como cuando se crea un área de administración:

```php
// Podemos agrupar rutas bajo un nombre común
// El prefijo aparecerá antes de cada ruta definida
// dentro de los corchetes podemos definir un namespace (en donde buscará los controladores)
$routes->group('home', ["namespace" => "App\Controllers\Front"], function ($routes) {
    $routes->get('/', 'Home::index');
    $routes->get('/libreria', 'Home::sayHola');
});
```

Con esto nuestra ruta quedaría de la siguiente manera
"http://blog.test/home"
Y se estará renderizando el método index

## 6-. Vistas

Generamos vistas en la carpeta app\Views y las renderizamos en el controlador con el método view();
Es preferible agrupar las vistas en carpetas para tener un mayor orden

## 7-. [Layouts](https://www.codeigniter.com/user_guide/outgoing/view_layouts.html?highlight=rendersection)

Los Layouts nos sirven para modularizar y reutilizar elementos en diferentes vistas
Vamos a separar el header y el footer, además tendremos un main que renderizará todo el contenido HMTL

En nuestro archivo main vamos a incluir el header y el footer con el método:

```php
    $this->include();
```

El cual carga elementos **estaticos**
Sin embargo, el contenido y el title del documento es algo dinamico, por tanto, usaremos el método:

```php
    $this->renderSection();
```

El cual tendrá que especificarse en cada vista

En este mismo archivo podemos incluir las hojas de estilos y archivos js que necesitemos en todas las vistas. Este es el resultado de nuestro main.php

```html
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= $this->renderSection('title') ?></title>
    <!-- Bulma -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css"
    />
  </head>

  <body>
    <!-- Busca a partir de la carpeta Views -->
    <?= $this->include('Front/layout/header.php') ?>
    <!-- renderSection actúa como un marcador de posición para el contenido -->
    <?= $this->renderSection('content') ?>
    <?= $this->include('Front/layout/footer.php') ?>
  </body>
</html>
```

Ahora en nuestra vista home.php vamos a definir los contenidos dinamicos
![layouts](./assets/layouts.png)

- En la parte de arriba usamos el método extend() para traer ese layout
- Ahora entre los métodos section y endSection especificamos el nombre de la sección dinamica y su contenido:
  ```php
    <?php $this->section('title') ?>
    Home
    <?php $this->endSection() ?>
  ```

Con esto estaremos reutilizando layouts en nuestras vistas, obteniendo archivos HTML estaticos y también renderizando estructuras dinamicas

## 8-. [Migraciones](https://www.codeigniter.com/user_guide/dbmgmt/migration.html)

Las migraciones son una forma conveniente de modificar su base de datos de manera estructurada y organizada. Podría editar fragmentos de SQL a mano, pero luego sería responsable de decirles a otros desarrolladores que necesitan ir y ejecutarlos. También tendría que realizar un seguimiento de los cambios que deben ejecutarse en las máquinas de producción la próxima vez que implemente.

Las migraciones de la tabla de la base de datos rastrean qué migraciones ya se han ejecutado, por lo que todo lo que tiene que hacer es asegurarse de que sus migraciones estén en su lugar y llamar $migration->latest()para actualizar la base de datos al estado más reciente. También puede usar $migration->setNamespace(null)->latest()para incluir migraciones de todos los espacios de nombres.

Las migraciones se almacenan en la ruta: app/Database/Migrations/

Para crear una ruta en Laragon por terminal de comandos escribiremos los siguientes comandos:

```CLI
php spark make:migration
```

Posterior a esto escrbiiremos el nombre de la clase y tendremos nuestro archivo creado:

```php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Countries extends Migration
{
    public function up()
    {
        //
    }

    public function down()
    {
        //
    }
}
```

El metodo up sirve para crear nuestra tabla
El metodo down sirve para las instrucciones de eliminar o hacer un rollback de la tabla

Ahora, en nuestro administrador de Laragon crearemos una DB en blanco antes de trabajar con las Migraciones:

![DB](./assets/db.png)

En nuestro archivo .evn especificamos los datos de la DB

```conf
 database.default.hostname = localhost
 database.default.database = blog
 database.default.username = root
 database.default.password =
 database.default.DBDriver = MySQLi
```

Una vez que definamos la estructura de nuestra tabla en la migración dentro de los métodos up() y down() creamos la migración en la terminal de laragon con el comando

```CLI
php spark migrate
```

Si todo sale correcto obtendremos lo siguiente:

![create migrate](./assets/migrate.png)

Con esto habremos creado nuestra tabla
