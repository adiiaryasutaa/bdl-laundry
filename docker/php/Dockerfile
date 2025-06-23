# docker/php/Dockerfile

# Gunakan image resmi PHP 8.2 dengan FPM (FastCGI Process Manager)
FROM php:8.2-fpm-alpine

# Set direktori kerja
WORKDIR /var/www/html

# Install dependensi sistem yang dibutuhkan untuk ekstensi PHP
RUN apk add --no-cache \
  build-base \
  libpng-dev \
  libzip-dev \
  zip \
  unzip \
  postgresql-dev \
  oniguruma-dev \
  libxml2-dev

# Install ekstensi PHP yang umum digunakan oleh Laravel
RUN docker-php-ext-install \
  pdo \
  pdo_pgsql \
  bcmath \
  gd \
  mbstring \
  exif \
  pcntl \
  zip \
  xml

# Install Composer (dependency manager untuk PHP)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Salin kode aplikasi yang sudah ada
COPY ./src .

# Install dependensi Composer
RUN composer install --no-interaction --no-plugins --no-scripts --prefer-dist

# Ubah kepemilikan file ke user www-data (user yang menjalankan php-fpm)
# Ini sangat penting untuk izin folder storage dan cache Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Ekspos port 9000 untuk komunikasi dengan Nginx
EXPOSE 9000

# Perintah default untuk menjalankan PHP-FPM
CMD ["php-fpm"]