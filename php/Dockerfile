FROM php:7.4-fpm-alpine

RUN apk add --no-cache --virtual=.build-deps zlib-dev autoconf gcc g++ make linux-headers \
  && pecl install grpc protobuf opencensus-alpha \
  && docker-php-ext-install sysvshm opcache \
  && docker-php-ext-enable grpc protobuf opencensus \
  && apk del .build-deps \
  && apk del *-dev

RUN apk add --no-cache libstdc++

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . /src
WORKDIR /src/app
ENV COMPOSER_ALLOW_SUPERUSER 1
RUN composer install 
