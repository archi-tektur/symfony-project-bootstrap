FROM ghcr.io/archi-tektur/caddy-php:1.0.3 AS app

ENV VERSION="1.0.3"

COPY ./app /app

RUN composer install

RUN composer build \
&& chmod --recursive a+r /app \
&& chmod --recursive a+x /app/bin/* \
&& chown --recursive www-data:www-data /app/var \
&& chmod --recursive a+w /app/var

USER www-data:www-data