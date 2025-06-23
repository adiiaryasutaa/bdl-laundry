# Laundry DB

Laundry DB is a web application built with Laravel and PostgreSQL, designed to manage laundry business operations efficiently. The project uses Docker for easy local development and deployment.

## Features
- User management
- Modern Laravel 12+ backend
- PostgreSQL database
- Dockerized environment (PHP, Nginx, PostgreSQL)
- Vite, Tailwind CSS, and modern JS tooling

## Prerequisites
- [Docker](https://www.docker.com/products/docker-desktop) & Docker Compose
- (Optional) [Node.js](https://nodejs.org/) & [npm](https://www.npmjs.com/) for frontend development

## Getting Started

### 1. Clone the Repository
```bash
git clone <your-repo-url>
cd laundry-db
```

### 2. Configure Environment Variables
Create a `.env` file in the `src/` directory. Example variables required:

```
APP_NAME=LaundryDB
APP_ENV=local
APP_KEY= # Generate after container is up
APP_DEBUG=true
APP_URL=http://localhost:8080

DB_CONNECTION=pgsql
DB_HOST=db
DB_PORT=5432
DB_DATABASE=your_db_name
DB_USERNAME=your_db_user
DB_PASSWORD=your_db_password
```

> **Note:** The database credentials must match those in `docker-compose.yml` under the `db` service environment.

### 3. Start the Application with Docker
```bash
docker-compose up --build
```
- The app will be available at [http://localhost:8080](http://localhost:8080)
- PHP runs in the `app` container, Nginx in `webserver`, and PostgreSQL in `db`.

### 4. Install Composer & NPM Dependencies
Open a shell in the app container:
```bash
docker-compose exec app bash
composer install
npm install
```

### 5. Generate Application Key
```bash
php artisan key:generate
```

### 6. Run Migrations & Seeders
```bash
php artisan migrate --seed
```

### 7. Build Frontend Assets (Optional)
For development (auto-reload):
```bash
npm run dev
```
For production build:
```bash
npm run build
```

## Useful Commands
- `docker-compose up -d` — Start containers in the background
- `docker-compose down` — Stop and remove containers
- `docker-compose exec app bash` — Shell into the PHP container
- `php artisan` — Laravel CLI

## Directory Structure
- `src/` — Laravel application source code
- `docker/` — Docker configuration (Nginx, PHP)
- `docker-compose.yml` — Multi-container orchestration

## Troubleshooting
- Ensure Docker Desktop is running
- If you change `.env`, rebuild containers or restart services
- Database connection errors? Check credentials and service names
