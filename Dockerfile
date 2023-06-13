# Usa a imagem oficial do PHP como base
FROM php:7.4-fpm-alpine3.15

#Script de instalação otimizada
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions && sync

#Utilitários
RUN apk add bash --no-cache && \
    apk add ca-certificates --no-cache && \
    apk add libwebp-dev --no-cache && \
    apk add libzip-dev --no-cache && \
    apk add nginx --no-cache && \
    apk add npm --no-cache && \
    apk add ssmtp --no-cache && \
    apk add icu-dev --no-cache

#Dependências php
RUN install-php-extensions mysqli && \
    install-php-extensions pdo_mysql


# Define o diretório de trabalho dentro do container
WORKDIR /var/www/html

# Copia os arquivos do seu projeto para o diretório de trabalho
COPY . .

# Instala as dependências do PHP necessárias para o Laravel
#RUN apt-get update && \
#    apt-get install -y --no-install-recommends \
#        git \
#        libzip-dev \
#        zip \
#        unzip

# Instala o Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer install

RUN chown -R www-data:www-data ./public ./storage ./bootstrap/cache && \
    chown -R 750 ./public ./storage ./bootstrap/cache

# Define a porta em que o container irá expor o aplicativo Laravel
EXPOSE 8000

# Inicia o servidor web do PHP para o aplicativo Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
