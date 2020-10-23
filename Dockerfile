FROM ubuntu:18.04

# install php
RUN apt-get update && apt-get install -y \
  php \
  php-mysql \
  mysql-server

#innnstall composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN mkdir ~/krakatau
COPY . ~/krakatau

EXPOSE 8080