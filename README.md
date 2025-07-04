# Laravel ecommerce

## Jetstream

Kit de inicio de Laravel que provee la implementacion de login, registro, verificacion de email, autenticacion de 2 factores, manejo de sesion, API via Sanctum.

```bash
composer require laravel/jetstream
```

### Livewire (frontend)

```bash
php artisan jetstream:install livewire
```

### navigation-photo

En el archivo `jetstream.php` descomentar la linea `Features::profilePhotos()` para que en el menu de navegacion en lugar del nombre del usuario se muestre la foto del mismo.

## Traducir aplicacion a español

```bash
composer require laravel-lang/common
```

Añadir nuevas localizaciones

```bash
php artisan lang:add es
```

En el archivo `.env` modificar el valor de la variable de entorno `APP_LOCALE`

```.env
APP_LOCALE=es
```
