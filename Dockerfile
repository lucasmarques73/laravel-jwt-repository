FROM php:7.2-fpm

LABEL maintainer 'Lucas Marques <lucasmarques73@hotmail.com>'

RUN apt-get update  

RUN apt-get install -y libpq-dev \
        			   zlib1g-dev \
        			   curl \
        			   libcurl3 \
                       libcurl3-dev

RUN docker-php-ext-install pdo pdo_pgsql zip mbstring curl

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

ADD . /api

WORKDIR /api

RUN [ ! -d 'vendor' ] && composer install || echo 'Directory already exists'