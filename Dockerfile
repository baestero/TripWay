FROM php:8.1-apache

# =========================
# Sistema + dependências
# =========================
RUN apt-get update && apt-get install -y \
    unzip \
    zip \
    git \
    libicu-dev \
    libpq-dev \
    && rm -rf /var/lib/apt/lists/*

# =========================
# Extensões PHP (CORRETO E LIMPO)
# =========================
RUN apt-get update && apt-get install -y \
    libpq-dev libicu-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql intl \
    && docker-php-ext-enable pdo_pgsql pgsql
RUN ls /usr/local/etc/php/conf.d/ | grep pgsql
# Após instalar as extensões
RUN php -m | grep -E "pdo|pgsql"
RUN php -r "var_dump(extension_loaded('pdo_pgsql'));"

# =========================
# Composer
# =========================
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# =========================
# App
# =========================
COPY . .

RUN chmod +x bin/cake

RUN composer install --no-dev --optimize-autoloader

# =========================
# Apache
# =========================
RUN a2enmod rewrite
COPY docker/apache.conf /etc/apache2/sites-available/000-default.conf

# =========================
# Permissões
# =========================
RUN mkdir -p logs tmp \
    && chown -R www-data:www-data logs tmp \
    && chmod -R 775 logs tmp

# =========================
# EntryPoint
# =========================
COPY docker/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

EXPOSE 80

CMD ["/entrypoint.sh"]