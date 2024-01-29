FROM php:8.0-apache

RUN docker-php-ext-install mysqli

# Copier les fichiers de l'application
COPY . /var/www/html/

# Donner les permissions adéquates
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

EXPOSE 80

CMD ["apache2-foreground"]
