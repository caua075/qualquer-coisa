FROM php:8.1-apache

RUN docker-php-ext-install mysqli

COPY ./crud-roupa /var/www/html/
RUN chmod -R 755 /var/www/html/
RUN chown -R www-data:www-data /var/www/html/

EXPOSE 80
CMD ["php", "-d", "memory_limit=300M", "/usr/local/bin/apache2-foreground"]
