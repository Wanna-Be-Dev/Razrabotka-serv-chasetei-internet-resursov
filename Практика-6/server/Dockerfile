FROM php:7.4-apache
RUN docker-php-ext-install mysqli &&\
    docker-php-ext-enable mysqli
    #installing zip
RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libzip-dev
RUN docker-php-ext-install zip

RUN ["apt-get", "update"]
RUN ["apt-get", "install", "-y", "zip"]
RUN ["apt-get", "install", "-y", "unzip"]

#installing gd 
RUN apt-get update && \
apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev && \
docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ && \
docker-php-ext-install gd



#installing composer
#COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

#CMD bash -c  "composer remove image-charts/image-charts"
#CMD bash -c "composer require amenadiel/jpgraph:^4"