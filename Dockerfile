FROM php:8.3-cli

# 1. Installer les dépendances système
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libpng-dev libonig-dev \
    && docker-php-ext-install pdo pdo_mysql zip gd

# 2. Installer Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# 3. Configurer l'utilisateur non-root
RUN useradd -m -u 1000 renderuser
USER renderuser
WORKDIR /home/renderuser/app

# 4. Copier les fichiers essentiels d'abord
COPY --chown=renderuser:renderuser composer.json composer.lock ./
COPY --chown=renderuser:renderuser .env.example ./


# 6. Copier le reste des fichiers
COPY --chown=renderuser:renderuser . .

# 7. Créer les dossiers manquants
RUN mkdir -p storage/framework/{cache,sessions,views} \
    && mkdir -p storage/logs \
    && mkdir -p bootstrap/cache

# 8. Vérifier la présence de .env.example
RUN echo "=== Contenu du répertoire avant copie ===" && ls -la

# 9. Créer .env si manquant
RUN if [ ! -f ".env" ]; then \
        if [ -f ".env.example" ]; then \
            cp .env.example .env; \
            echo ".env créé à partir de .env.example"; \
        else \
            touch .env; \
            echo ".env.example non trouvé, fichier .env vide créé"; \
        fi \
    fi

# 10. Générer la clé d'application
RUN php artisan key:generate

# 11. Optimiser l'application
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

# 12. Exposer le port
EXPOSE 8000

# 13. Commande de démarrage
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]