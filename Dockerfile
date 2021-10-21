
#
# This Dockerfile is used to run the tests
#

ARG PHPV=8.0

FROM php:${PHPV}-cli

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
