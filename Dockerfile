# Use the official PHP 8.1 image as the base image
FROM php:8.2

# Install system dependencies
RUN apt-get update && \
    apt-get install -y \
    git \
    zip \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set the working directory in the container
WORKDIR /var/www/html

# Copy the project files into the container
COPY . /var/www/html

# Install dependencies using Composer
RUN composer install

# Expose port 80 to access the web server
EXPOSE 80

# Start PHP's built-in web server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=80"]
