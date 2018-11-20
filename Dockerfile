FROM php:7.2-apache

RUN apt-get update -y && apt-get upgrade -y
RUN apt-get install -y apt-utils
RUN apt-get install -y openssl zip unzip git
RUN apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev \
	&& docker-php-ext-install -j$(nproc) iconv \
	&& docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
	&& docker-php-ext-install -j$(nproc) gd
RUN docker-php-ext-install pdo_mysql
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ENV WORK_DIR=/var/www
ENV APACHE_DOCUMENT_ROOT=$WORK_DIR/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

WORKDIR $WORK_DIR
RUN rm -R $WORK_DIR/html

COPY . $WORK_DIR
RUN composer install
RUN chown -R www-data:www-data $WORK_DIR

EXPOSE 80
