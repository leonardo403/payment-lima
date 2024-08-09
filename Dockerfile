# Usar a imagem oficial do PHP com Apache
FROM php:8.1-apache

# Configurar o diretório de trabalho
WORKDIR /var/www/html

# Instalar dependências do sistema
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    libzip-dev \
    && docker-php-ext-install pdo pdo_mysql

# Instalar o Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Copiar os arquivos do projeto para o container
COPY . .

# Instalar dependências do PHP
RUN composer install --no-dev --optimize-autoloader

# Definir permissões corretas para o storage e cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Ativar o módulo de regravação do Apache
RUN a2enmod rewrite

# Expor a porta 80
EXPOSE 80

# Comando padrão para iniciar o servidor
CMD ["apache2-foreground"]
