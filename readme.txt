git clone link repo

main dir
- cp .env.example .env

pindah ke dir laravel
- cd src
- cp .env.example .env

back to main dir
- docker compose exec app composer install
- docker compose exec app php artisan key:generate
- docker compose exec app php artisan migrate

kalau mau jalanin command untuk laravelnya

docker compose exec app php artisan [command]