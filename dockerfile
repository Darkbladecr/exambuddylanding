FROM wordpress:5.7.2-fpm-alpine
COPY --chown=www-data:www-data wp-content /var/www/html/wp-content
