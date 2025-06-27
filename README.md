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

En el archivo `jetstream.php` descomentar la linea `Features::profilePhotos()` para que en el menu de navegacion en lugar del nombre se muestre la foto del usuario.
