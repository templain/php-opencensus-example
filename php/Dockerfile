FROM php:7.4-fpm-alpine

RUN apk add --no-cache --virtual=.build-deps zlib-dev autoconf gcc g++ make linux-headers \
  && pecl install opencensus-alpha \
  && docker-php-ext-install opcache \
  && docker-php-ext-enable opencensus \
  && apk del .build-deps \
  && apk del *-dev

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . /src
WORKDIR /src/app
ENV COMPOSER_ALLOW_SUPERUSER 1
RUN composer install 
