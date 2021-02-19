FROM php:8.0.1-fpm-alpine
WORKDIR /app

RUN apk --update upgrade \
    && apk add --no-cache bash

RUN curl -sS https://get.symfony.com/cli/installer | bash && mv /root/.symfony/bin/symfony /usr/local/bin/symfony