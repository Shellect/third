FROM php:8.2-fpm

# Установка необходимых расширений PHP
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    && docker-php-ext-install pdo_mysql zip

# Установка Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Установка Monolog
RUN composer require monolog/monolog

# Копирование исходного кода
COPY src /var/www/html

# Рабочая директория
WORKDIR /var/www/html