# Laundry Balap Kuda

Laundry Balap Kuda is a modern REST API built with Laravel 12 and PostgreSQL, designed to manage laundry business operations efficiently. The project uses Docker for easy local development and deployment with a containerized architecture.

## 🚀 Features

- **Modern Laravel 12** - Latest Laravel framework with PHP 8.2+
- **REST API** - Clean and well-structured API endpoints
- **PostgreSQL Database** - Robust relational database
- **Docker Containerization** - Easy development and deployment
- **Nginx Web Server** - High-performance web server

## 📋 Prerequisites

- [Docker](https://www.docker.com/products/docker-desktop) & Docker Compose
- Git

## 🛠️ Getting Started

### 1. Clone the Repository
```bash
git clone <your-repo-url>
cd laundry-balap-kuda
```

### 2. Configure Environment Variables
Create a `.env` file in root directory for docker container. You can change config on that file

```bash
cp .env.example .env
```

Create a Laravel `.env` file in the `src/` directory.

```bash
cp src/.env.example src/.env
```

> **Note:** Everything you change on `.env`, needs to be matched in `/src/.env`.

Configure the following variables in `src/.env`:

```env
APP_NAME="Laundry Balap Kuda"
APP_ENV=local
APP_KEY= # Generate after container is up
APP_DEBUG=true
APP_URL=http://localhost:8080

DB_CONNECTION=pgsql
DB_HOST=db
DB_PORT=5432
DB_DATABASE=laundry_balap_kuda
DB_USERNAME=root
DB_PASSWORD=root
```

> **Note:** The database credentials must match those in `docker-compose.yml` under the `db` service environment.

### 3. Start the Application with Docker
```bash
docker compose up -d
```

This will start three containers:
- **app** - Laravel PHP application (PHP 8.2+ with Laravel 12)
- **webserver** - Nginx web server
- **db** - PostgreSQL 15 database

The API will be available at [http://localhost:8080](http://localhost:8080)

### 4. Install Dependencies and Setup Laravel
```bash
# Install PHP dependencies
docker compose exec app composer install

# Generate application key
docker compose exec app php artisan key:generate

# Run database migrations
docker compose exec app php artisan migrate
```

## 🎯 Development Commands

### Docker Commands
```bash
# Start containers in background
docker compose up -d

# Stop and remove containers
docker compose down

# View logs
docker compose logs -f

# Shell into PHP container
docker compose exec app bash

# Shell into database
docker compose exec db psql -U laundry_user -d laundry_db
```

### Laravel Commands
```bash
# Run Laravel commands inside container
docker compose exec app php artisan

# Clear caches
docker compose exec app php artisan config:clear
docker compose exec app php artisan cache:clear
docker compose exec app php artisan view:clear

# Run tests
docker compose exec app php artisan test

# Create new migration
docker compose exec app php artisan make:migration create_table_name

# Create new API controller
docker compose exec app php artisan make:controller Api/ControllerName --api
```

## 📁 Project Structure

```
laundry-balap-kuda/
├── src/                    # Laravel application
│   ├── app/               # Application logic
│   │   ├── Http/          # Controllers, Middleware
│   │   └── Models/        # Eloquent models
│   ├── config/            # Configuration files
│   ├── database/          # Migrations, seeders, factories
│   ├── public/            # Public assets
│   ├── routes/            # Route definitions
│   │   └── api.php        # API routes
│   ├── storage/           # File storage
│   ├── tests/             # Test files
│   └── composer.json      # PHP dependencies
├── docker/                # Docker configuration
│   ├── nginx/            # Nginx configuration
│   └── php/              # PHP Dockerfile
├── docker-compose.yml     # Multi-container orchestration
└── README.md             # This file
```

## 🔧 Technology Stack

- **Backend**: Laravel 12, PHP 8.2+
- **Database**: PostgreSQL 15
- **Web Server**: Nginx
- **Containerization**: Docker & Docker Compose
- **Package Manager**: Composer (PHP)

## 🐛 Troubleshooting

### Common Issues

1. **Port already in use**: If port 8080 is occupied, change it in `docker-compose.yml`
2. **Database connection errors**: 
   - Verify database credentials in `.env` match `docker-compose.yml`
   - Ensure the `db` container is running: `docker compose ps`
3. **Permission issues**: 
   - Run `docker compose exec app chmod -R 777 storage bootstrap/cache`
4. **Container not starting**: 
   - Check logs: `docker compose logs`
   - Rebuild containers: `docker compose up --build`

### Useful Debug Commands
```bash
# Check container status
docker compose ps

# View container logs
docker compose logs app
docker compose logs webserver
docker compose logs db

# Rebuild containers
docker compose down
docker compose up --build -d
```

## 🤝 Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request
