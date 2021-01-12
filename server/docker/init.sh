export user=$(id -u):$(id -g) && \
docker-compose up --build -d && \
cd ../laravel && \
composer install && \
cp .env.example .env && \
php artisan key:generate && \
# php artisan migrate && \
cd ../docker
