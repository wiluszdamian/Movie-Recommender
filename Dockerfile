FROM serversideup/php:8.2-fpm-nginx
LABEL maintainer="Server Side Up <@serversideup>"

# Copy the application
COPY --chown=9999:9999 . /var/www/html/
RUN chmod -R 777 /var/www/html/storage
RUN npm install