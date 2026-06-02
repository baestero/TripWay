FROM php:8.1-apache

RUN apt-get update && apt-get install -y \
    unzip \
    zip \
    git \
    libpq-dev \
    libicu-dev \
    && docker-php-ext-install intl pdo pdo_pgsql

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install --optimize-autoloader

RUN a2enmod rewrite

COPY docker/apache.conf /etc/apache2/sites-available/000-default.conf

RUN mkdir -p logs tmp \
    && chown -R www-data:www-data logs tmp \
    && chmod -R 775 logs tmp


EXPOSE 80