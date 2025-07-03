FROM php:8.2-fpm-alpine

# Instalar extensões e ferramentas
RUN apk add --no-cache \
        oniguruma-dev \
        postgresql-dev \
        libxml2-dev \
        libpng-dev \
        zip \
        unzip \
        curl \
        git \
        icu-dev \
        libzip-dev \
        php-tokenizer \
        php-dom

# Instalar extensões PHP
RUN docker-php-ext-install pdo pdo_mysql gd zip

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php && \
        mv composer.phar /usr/bin/composer

# Diretório de trabalho
WORKDIR /app/back-viacep

# Copiar projeto
COPY . .

# Variáveis do Composer
ENV COMPOSER_ALLOW_SUPERUSER=1

# Instalar dependências PHP
RUN composer install --no-interaction --no-scripts --ignore-platform-reqs

# Gerar documentação do Swagger
RUN php artisan l5-swagger:generate

# Comando de inicialização
CMD php artisan serve --host=0.0.0.0 --port=8000
