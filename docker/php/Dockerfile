FROM php:8.1.0-fpm
COPY php.ini /usr/local/etc/php/

RUN apt-get update \
    && apt-get install -y vim zlib1g-dev libzip-dev mariadb-client git libfreetype6-dev \
    && docker-php-ext-install zip pdo_mysql gd bcmath

RUN docker-php-source extract
RUN pecl install redis && docker-php-ext-enable  redis

RUN curl -sL https://deb.nodesource.com/setup_14.x | bash - \ 
    && apt-get update \
    && apt-get install -y nodejs    

# install composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin
RUN composer self-update

# install xdebug
ARG INSTALL_XDEBUG=false
ARG HOST_IP
RUN if [ ${INSTALL_XDEBUG} = true ]; then \
    pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_host=${HOST_IP}" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    # && echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.log=/tmp/xdebug.log" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini ; fi

ENV LANG=C.UTF-8
ENV LANGUAGE=en_US
RUN adduser --quiet --disabled-password \
    --shell /bin/bash --home /var/www/server \
    --gecos "User" devuser && \
    echo "devuser:<a href="mailto://p@ssword1">p@ssword1</a>" | chpasswd &&  usermod -aG sudo devuser
USER devuser
RUN chown -R devuser:devuser /var/www/server
WORKDIR /var/www/server
