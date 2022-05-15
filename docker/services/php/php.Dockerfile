#-----------dev--------------#
FROM undabot/php_dev:8 AS dev

ENV APP_ENV=dev

USER root

ARG XDEBUG_ENABLED=true
RUN if [[ $XDEBUG_ENABLED = false ]]; then echo "xdebug.mode=off" > /usr/local/etc/php/conf.d/xdebug.ini; fi

COPY --chown=app:app . /opt/app

USER app

RUN composer install -o
