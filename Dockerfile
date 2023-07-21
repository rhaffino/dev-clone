FROM php:7.4-fpm

RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    npm

RUN docker-php-ext-install pdo pdo_mysql gd

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

COPY . .

RUN composer install --no-interaction --prefer-dist --ignore-platform-req=ext-zip

RUN php artisan key:gen

RUN chown www-data:www-data ./ -R

# RUN npm install

# RUN npm run dev

CMD ["php", "artisan", "serve", "--host=0.0.0.0"]
