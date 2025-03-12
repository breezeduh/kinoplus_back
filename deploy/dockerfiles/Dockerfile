FROM phpdockerio/php:8.4-fpm

RUN apt update 
RUN apt install php8.4-pgsql -y
RUN apt install php8.4-cli -y
RUN apt install php8.4-curl -y
RUN apt install php8.4-mbstring -y
RUN apt install php8.4-xml -y
RUN apt install php8.4-xmlreader -y
RUN apt install php8.4-zip -y
RUN apt install php8.4-gd -y
RUN apt install nano -y

RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash
RUN apt-get install -y nodejs
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY ./deploy/laravel/entrypoint.sh /
COPY ./deploy/laravel/.env /
RUN chmod +x /entrypoint.sh

ENTRYPOINT ["/entrypoint.sh"]