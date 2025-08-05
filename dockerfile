# Use official PHP image with Apache
FROM php:8.2-apache

# Copy your PHP files into the container
COPY . /var/www/html/

# Enable Apache rewrite module (optional, useful for routing)
RUN a2enmod rewrite
