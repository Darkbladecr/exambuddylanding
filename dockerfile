FROM wordpress:5.4.0-fpm-alpine
COPY --chown=www-data:www-data wp-content /var/www/html/wp-content