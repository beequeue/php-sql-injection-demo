FROM php
ADD app /app
RUN docker-php-ext-install mysqli
EXPOSE 8000
