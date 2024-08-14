FROM php:8.1-apache
RUN docker-php-ext-install mysqli
COPY ./crud /var/www/html/
RUN chmod -R 755 /var/www/html/
RUN chown -R www-data:www-data /var/www/html/
EXPOSE 80