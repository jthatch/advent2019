ARG PHP_VERSION=7.4

FROM php:${PHP_VERSION}-cli-alpine

# install composer and config our php.ini
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN cp /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini

# keep it simple for the workdir as we're using cli
WORKDIR /app

# install our stuff
# Optimize for Composer cache
COPY composer.json composer.lock ./
RUN composer install && composer dump-autoload -o

COPY src/ src/
COPY test/ test/
COPY resources/ resources/
COPY phpunit.xml.dist ./

CMD ["./bin/phpunit", '-c', 'phpunit.xml.dist']