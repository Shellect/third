FROM php:8.2-fpm

# Установка необходимых расширений PHP
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    && docker-php-ext-install pdo_mysql zip xdebug

# Установка Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY composer.json .

# Установка Monolog
RUN composer install

# Рабочая директория
WORKDIR /var/www/html