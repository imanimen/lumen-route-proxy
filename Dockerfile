FROM php:8.1-fpm-alpine

WORKDIR /home/iman/Desktop/Projects/php/framework

RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer

COPY . .

RUN composer install