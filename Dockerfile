FROM php:8.0-apache

RUN apt-get update && apt-get install -y zip unzip libpng-dev libicu-dev

RUN docker-php-ext-install mysqli gd intl

# Install composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');"

WORKDIR /var/www/html

COPY composer.json composer.lock ./

RUN composer install --no-scripts --no-autoloader 

RUN composer dump-autoload --optimize 