## Laravel Create Scaffold Context Laravel 10.x

## Features

Paquete de [Packagist](https://packagist.org/packages/baezeta/scaffold) para crear la estructura de carpetas *Domain Drive Desing* en tu proyecto Laravel.

# Requerimientos
Tener instalado Laravel  minimo version ```"laravel/framework": "^10.0"```.


# Instalacion

```bash
composer require baezeta/scaffold
```

# Configuracion

Una vez instalado el paquete, necesitaremos incluirlo en el archivo ```Kernel.php``` .
``` App\Console\Kernel::class``` para que pueda ser invocado a traves de **Artisan**

Tal y como se muestra en la imagen incluiremos las tres clases del paquete
```php
protected $commands = [
    CreateScaffoldind::class,
    CreateFolderContext::class,
    SeleccionarContextos::class
];
```
![alt text](./docs/img/kernel.png)

Una vez conofigurado buscara una carpeta principal **src/** que tomara como raiz del proyecto, en caso de no tenerla, crear manualmente para tener una base similar a:


![alt text](./docs/img/skeleton.png)

# Formas de Uso

Una vez configurado podemos hacer uso de el con el comando 
```bash
php artisan zeta:crear-contexto 
```
#
## Crear estructura de forma Manual con *Parametro*
El comando acepta un *parametro* como **contexto** para que puedas crear directamente la estructura de carpetas segun tu entrada.

**A tener en cuenta es que los separadores de carpetas tendran que ser el mismo en el comando lanzado**

El comando acepta los siguientes separadores en la entrada del **parametro**
```php
protected array $separadores = ["\\", "/", ".", " ", "_", "-"];
```

```bash
php artisan zeta:crear-contexto Zeta.admnistracion.usuarios.escritura.datos

Carpeta creada correctamente: Zeta
Carpeta creada correctamente: Admnistracion
Carpeta creada correctamente: Usuarios
Carpeta creada correctamente: Escritura
Carpeta creada correctamente: Datos
Zeta/Admnistracion/Usuarios/Escritura/Datos creado correctamente!
```
![alt text](./docs/img/image.png)


Tambien podras usarlo sin pasarle **parametro** en el comando y la consola te guiara en la eleccion de las carpetas disponibles.

#
## Crear estructura de forma Interactiva a traves de la *Consola*

```bash
php artisan zeta:crear-contexto 
```
![alt text](./docs/img/image-1.png)

![alt text](./docs/img/image-2.png)

![alt text](./docs/img/image-3.png)


**Voila** la estructura de carpetas esta creada!
#


Espero que te sea de utlidad esta primera version del paquete, link 
[repositorio](https://github.com/ferbaeza/Laravel-Context-Scaffolding).

<div align="center">
    <a href="https://github.com/ferbaeza/Laravel-Context-Scaffolding">
    <img style="max-height:150px" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQP4jFB-CRdUfIHz_otJrxBY-sBc3k9wOqzxkJFzatnZlCtlGCWePgmaGyHYWomad1RMes&usqp=CAU">
    </a>
</div>


<p align="center">
    <a href="https://packagist.org/packages/baezeta/scaffold"><img src="https://img.shields.io/packagist/dt/baezeta/scaffold" alt="Total Downloads"></a>
    <a href="https://packagist.org/packages/baezeta/scaffold"><img src="https://img.shields.io/packagist/v/baezeta/scaffold" alt="Latest Stable Version"></a>
    <a href="https://packagist.org/packages/baezeta/scaffold"><img src="https://img.shields.io/packagist/l/baezeta/scaffold" alt="License"></a>
</p>


**Fernando Baeza**
*fbaezahurtado@gmail.com* o 
*baezacode@gmail.com*# Laravel-9-Scaffolding
