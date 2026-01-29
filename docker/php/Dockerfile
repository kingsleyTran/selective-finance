FROM php:8.4-fpm-alpine

# System deps + PHP extensions commonly needed by Laravel
RUN apk add --no-cache \
    bash \
    curl \
    git \
    icu-dev \
    libpng-dev \
    libzip-dev \
    oniguruma-dev \
    sqlite-dev \
    unzip \
    zip \
  && docker-php-ext-configure intl \
  && docker-php-ext-install -j"$(nproc)" \
    bcmath \
    intl \
    mbstring \
    opcache \
    pdo_mysql \
    pdo_sqlite \
    zip \
    gd \
  && rm -rf /tmp/*

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# PHP config (optional tweaks)
COPY docker/php/local.ini /usr/local/etc/php/conf.d/local.ini

WORKDIR /var/www/html

RUN mkdir -p storage/logs \
 storage/framework/sessions \
 storage/framework/cache \
 bootstrap/cache \
 && chown -R www-data:www-data /var/www/html

USER www-data
