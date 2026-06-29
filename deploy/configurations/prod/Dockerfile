FROM ghcr.io/roadrunner-server/roadrunner:2025.1.14 AS rr
FROM php:8.5-cli AS php

ADD --chmod=0755 \
    --checksum=sha256:f94fd02d6a88a951ba2302f0a9a5e9ba3f06eb89640f54ca6043671f8a213c7e \
    https://github.com/mlocati/docker-php-extension-installer/releases/download/2.11.8/install-php-extensions \
    /usr/local/bin/install-php-extensions

COPY --from=rr /usr/bin/rr /usr/local/bin/rr

ENV COMPOSER_ALLOW_SUPERUSER=1

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini" \
    && rm "$PHP_INI_DIR/php.ini-development"

RUN set -eux; \
    install-php-extensions \
        @composer \
        sockets \
        opcache \
        intl \
        bcmath \
        gd
    ;

WORKDIR /app

COPY \
    bin \
    config \
    migrations \
    public \
    src \
    tests \
    composer.* \
    symfony.* \
    .rr.yaml \
    LICENSE \
    ./

RUN set -eux; \
    composer install --no-dev --prefer-dist --no-cache --no-autoloader --no-progress --no-scripts --no-interaction

# todo: configure symfony for reverse proxy
# todo: migrations
# todo: apcu support
# todo: don't forget to include apcu support for composer commands

RUN set -eux; \
    composer dump-autoload --optimize --no-dev --strict-psr --strict-ambiguous; \
    composer dump-env prod; \
    php bin/console cache:warmup

HEALTHCHECK --interval=15s --timeout=10s \
    CMD "curl -f http://127.0.0.1:2114/api/system/healthcheck|| exit 1"

CMD [ "rr", "serve", "-c", "/app/.rr.yaml" ]