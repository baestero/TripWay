FROM php:8.1-apache

# =========================
# Dependências do sistema
# =========================
RUN apt-get update && apt-get install -y \
    unzip \
    zip \
    git \
    libicu-dev \
    libpq-dev \
    && rm -rf /var/lib/apt/lists/*

# =========================
# Extensões PHP (IMPORTANTE: ordem separada)
# =========================
RUN docker-php-ext-install intl \
    && docker-php-ext-install pdo \
    && docker-php-ext-install pdo_pgsql \
    && docker-php-ext-install pgsql

# (debug opcional – pode remover depois)
RUN php -m | grep -E "pdo_pgsql|pgsql"

# =========================
# Composer
# =========================
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# =========================
# Copia projeto
# =========================
COPY . .

# Garante execução do Cake CLI
RUN chmod +x bin/cake

# =========================
# Dependências PHP
# =========================
RUN composer install --no-dev --optimize-autoloader

# =========================
# Apache config
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