FROM php:8.1-apache

# Dependências do sistema + extensões PHP
RUN apt-get update && apt-get install -y \
    unzip \
    zip \
    git \
    libpq-dev \
    libicu-dev \
    && docker-php-ext-install intl pdo pdo_pgsql

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copia projeto
COPY . .

# Dependências PHP
RUN composer install --no-dev --optimize-autoloader

# Apache rewrite (CakePHP precisa disso)
RUN a2enmod rewrite

# Config Apache custom
COPY docker/apache.conf /etc/apache2/sites-available/000-default.conf

# Permissões básicas
RUN mkdir -p logs tmp \
    && chown -R www-data:www-data logs tmp \
    && chmod -R 775 logs tmp

# EntryPoint (IMPORTANTE)
COPY docker/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

EXPOSE 80

CMD ["/entrypoint.sh"]