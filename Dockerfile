FROM php:7.4-apache as php_container
RUN apt update && apt install -y vim
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions gd xdebug csv exif gnupg imagick imap ldap mcrypt memcached mongodb mysqli oauth pdo_mysql pdo_sqlite \
    pdo_pgsql pdo_sqlite pgsql phar redis soap sockets soap xmlreader xmlrpc xmlwriter zip
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
RUN sed -i "s/post_max_size = .*/post_max_size = 1G/" "$PHP_INI_DIR/php.ini"
RUN sed -i "s/upload_max_filesize = .*/upload_max_filesize = 1G/" "$PHP_INI_DIR/php.ini"
RUN sed -i "s/max_file_uploads = .*/max_file_uploads = 100/" "$PHP_INI_DIR/php.ini"
RUN sed -i "s/max_execution_time = .*/max_execution_time = 300/" "$PHP_INI_DIR/php.ini"
RUN sed -i "s/max_input_time = .*/max_input_time = 300/" "$PHP_INI_DIR/php.ini"
RUN sed -i "s/memory_limit = .*/memory_limit = 1G/" "$PHP_INI_DIR/php.ini"