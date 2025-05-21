FROM php:8.1-apache

# Instala la extensión mysqli
RUN docker-php-ext-install mysqli

# Copia tu código al servidor
COPY . /var/www/html/

EXPOSE 80
