FROM php:8.2-apache

# dist を DocumentRoot にする
WORKDIR /var/www/html

# Apache 設定を書き換えて DocumentRoot を dist に変更
RUN sed -i 's|/var/www/html|/var/www/html/dist|g' /etc/apache2/sites-available/000-default.conf \
 && sed -i 's|/var/www/html|/var/www/html/dist|g' /etc/apache2/apache2.conf

# mod_rewrite など必要なら有効化
RUN a2enmod rewrite
