FROM php:8.0-apache

# Updating and installing necessary dependencies
RUN apt-get update && apt-get install -y zip unzip libpng-dev libicu-dev
RUN docker-php-ext-install mysqli gd intl

# Create a user "app"
RUN useradd -ms /bin/bash app

# Copy across dependencies and install them
RUN chown -R app:app /var/www/html && chmod 755 /var/www/html
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');"
COPY composer.json composer.lock ./

# Switch to user "app"
USER app
