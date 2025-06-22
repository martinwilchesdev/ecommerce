## Host virtuales

Añadir un nuevo host virtual

```bash
c://windows/system32/drivers/etc/
```

```
hosts

127.0.0.1 ecommerce.test
```

Configurar hosts virtuales en apache (XAMPP)

```bash
c://xampp/apache/conf/extra/
```

```
http-vhosts.conf

<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs"
    ServerName localhost
</VirtualHost>

<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/laravel/ecommerce/public"
    ServerName ecommerce.test
</VirtualHost>
```