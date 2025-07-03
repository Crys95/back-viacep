FROM php:8.2-fpm-alpine

# Instalar dependências do sistema e PHP
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

# Instalar extensões PHP necessárias
RUN docker-php-ext-install pdo pdo_mysql gd zip

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/bin/composer

# Definir diretório de trabalho
WORKDIR /app/back-viacep

# Copiar arquivos do projeto
COPY . .

# Definir variáveis do Composer
ENV COMPOSER_ALLOW_SUPERUSER=1

# Instalar dependências do PHP
RUN composer install --no-interaction --no-scripts --ignore-platform-reqs

# Garantir que o diretório de documentação exista
RUN mkdir -p storage/api-docs && chmod -R 775 storage

# Limpar e gerar os caches Laravel
RUN php artisan config:clear \
 && php artisan config:cache \
 && php artisan route:cache \
 && php artisan view:cache

# Gerar documentação do Swagger
RUN php artisan l5-swagger:generate

# Expor a porta
EXPOSE 8000

# Comando padrão
CMD php artisan serve --host=0.0.0.0 --port=8000
