FROM ghcr.io/archi-tektur/caddy-php:1.1.0 AS app

ENV VERSION="1.0.4"

# Copy all app, because Symfony requires bin/console to be working on install stage
COPY ./app /app
RUN composer install

# Run user-defined build tasks
RUN composer build

RUN chmod --recursive a+r /app \
&& chmod --recursive a+x /app/bin/* \
&& chown --recursive www-data:www-data /app/var/log

# Add write privileges for logs, cache and vendors
RUN chmod --recursive a+w /app/var/log \
&& chmod --recursive a+w /app/var/cache \
&& chmod --recursive a+w /app/vendor

USER www-data:www-data