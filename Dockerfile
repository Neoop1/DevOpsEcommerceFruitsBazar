FROM richarvey/nginx-php-fpm
WORKDIR /var/www/html/
COPY ./Data/ .
EXPOSE 80




