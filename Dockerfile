# Gunakan image PHP dengan Apache
FROM php:8.2-apache

# Salin semua isi folder `public` ke dalam folder /var/www/html di container
COPY public/ /var/www/html/

# Aktifkan mod_rewrite jika perlu
RUN a2enmod rewrite
