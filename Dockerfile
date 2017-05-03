FROM yudhaputrama/php-oracle

MAINTAINER Kurniawan Yudha Putrama <yudhaputrama.edu@gmail.com>

# RUN apt-get install git

# WORKDIR /tmp
# RUN curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer
RUN a2enmod rewrite
RUN mv index.php index2.php

COPY . /var/www/html
# RUN cd application | composer install