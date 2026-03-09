FROM ghcr.io/roadrunner-server/roadrunner:2025.1.3 AS rr
FROM php:8.2-cli AS php

ADD --chmod=0755 \
    --checksum=sha256:f4e1518189d0edb8f9704044e03def06916c1b3975196bc5887a532b79043acf \
    https://github.com/mlocati/docker-php-extension-installer/releases/download/2.9.8/install-php-extensions \
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
        mongodb \
    ;

WORKDIR /app

COPY \
    assets \
    bin \
    config \
    migrations \
    public \
    src \
    templates \
    tests \
    translations \
    composer.* \
    symfony.* \
    importmap.php \
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
    php bin/console cache:warmup \
    && php bin/console assets:install \
    && php bin/console asset-map:compile

HEALTHCHECK --interval=15s --timeout=10s \
    CMD "curl -f http://127.0.0.1:2114/health || exit 1"

CMD [ "rr", "serve", "-c", "/app/.rr.yaml" ]