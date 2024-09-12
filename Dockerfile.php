# Usa PHP 7.4 con Apache come base
FROM php:7.4-apache

# Installa l'estensione PHP necessaria per MySQL
RUN docker-php-ext-install mysqli

# Copia i file dell'applicazione nella directory di lavoro
COPY ./html /var/www/html/

# Imposta le autorizzazioni corrette
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html

# Espone la porta di Apache
EXPOSE 80
