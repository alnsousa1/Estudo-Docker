 FROM php:8.1.22-cli
 #upadte para atualizar a biblioteca do linux e o && para dizer que ainda não terminou a linha de código
 RUN apt-get update && apt-get install -y \
    libonig-dev \
    libzip-dev \
    unzip \
    && docker-php-ext-install pdo_mysql zip

#Vai rodar depois que instalar o php
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . /var/www

WORKDIR /var/www
#definindo o servidor que vai estar rodando
CMD [ "php", "-S", "0.0.0.0:8000"]