FROM php:8.2-apache

# Activer mod_rewrite
RUN a2enmod rewrite

# Copier les fichiers
COPY . /var/www/html
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Installer les dépendances
RUN composer install --no-dev --optimize-autoloader

# Configurer Apache
COPY .docker/apache.conf /etc/apache2/sites-available/000-default.conf

# Définir les permissions
RUN chown -R www-data:www-data /var/www/html/storage