FROM php:7.4-fpm

RUN apt-get update && apt-get install -y \
    git \
    libpq-dev \
    unzip \
    libzip-dev \
    && docker-php-ext-install iconv \
    && docker-php-ext-install zip \
    && docker-php-ext-install pgsql pdo pdo_pgsql

# Install composer globally
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN curl -sS https://get.symfony.com/cli/installer | bash && mv /root/.symfony/bin/symfony /usr/local/bin/symfony

 ## Set PHP running to allow persistent containers
 ## execute commands on persistent containers with
 ## docker exec container_name command flag1 flag2 value1 value2 ...
 CMD ["php-fpm"]
