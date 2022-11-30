FROM php:7.4-apache
RUN docker-php-ext-install mysqli &&\
    docker-php-ext-enable mysqli

#RUN { \
#    echo 'session.save_handler = redis'; \
#    echo 'session.save_path = tcp://localhost:3336'; \
#} >> /usr/local/etc/php/conf.d/docker-php-ext-redis.ini