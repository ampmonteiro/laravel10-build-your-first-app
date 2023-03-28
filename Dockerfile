FROM php:8.1-apache

#Change Document Root to html -> public (which will exist when framework is installed) 
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# install the os lib needed
#install php extensions requeried from the framework
RUN apt-get update && apt-get install -y \
    zlib1g-dev libzip-dev libicu-dev g++ unzip git \
    && docker-php-ext-install zip mysqli pdo_mysql intl \ 
    && a2enmod rewrite && service apache2 restart

# -m -> create home
# -s -> shell acess
RUN useradd -ms /bin/bash app

USER app

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

EXPOSE 80

# docker build -t  php:8.1 .
# docker run -d -v $(pwd)/proj:/var/www/html --name lara10-app -p 80:80 php:8.1

# docker run --name db_lara \ 
#     -e MYSQL_ROOT_PASSWORD=secret \
#     -e MYSQL_DATABASE=lara_10 \
#     -e MYSQL_USER=root \
#     -e MYSQL_PASSWORD=secret \
#     -dp 3306:3306 mysql;


# NOTE verify which ip Address / host has the mysql container, you are not using docker compose
# usually: 172.17.0.3