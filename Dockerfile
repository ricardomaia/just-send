FROM php:7.4-apache as php_container
RUN apt update && apt install -y vim
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions gd xdebug csv exif gnupg imagick imap ldap mcrypt memcached mongodb mysqli oauth pdo_mysql pdo_sqlite \
    pdo_pgsql pdo_sqlite pgsql phar redis soap sockets soap xmlreader xmlrpc xmlwriter zip
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
RUN sed -i "s/post_max_size = .*/post_max_size = 100M/" "$PHP_INI_DIR/php.ini"
RUN sed -i "s/allow_url_include = .*/allow_url_include = On/" "$PHP_INI_DIR/php.ini"