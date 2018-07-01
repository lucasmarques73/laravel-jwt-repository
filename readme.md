# Setup Php 7.2 - Nginx - Composer - PostgreSQL - Adminer

Containers
- my-php | php7.2-fpm
- my-nginx | nginx
- my-database | postgres
- my-adminer | adminer
- composer

Creating Project Laravel
```
docker run -it --rm -u "$(id -u):$(id -g)" -v "$PWD":/api -w /api composer create-project laravel/laravel api 
```

Running commands with Composer
```
docker run -it --rm -u "$(id -u):$(id -g)" -v "$PWD":/api -w /api composer require prettus/l5-repository
```
```
