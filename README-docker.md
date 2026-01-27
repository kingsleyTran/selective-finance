## Laravel Docker (docker-compose)

### What you get
- **nginx** on `http://localhost:8080`
- **php-fpm** (Laravel runtime + Composer)
- **mysql** on `localhost:3306`
- **redis** on `localhost:6379`
- Optional **queue** worker + **scheduler**
- Optional **node** (Vite) on `http://localhost:5173`

### Project layout
This workspace generates Laravel into `./laravel` and mounts that into the containers.

### 1) Set Laravel `.env` values
In `laravel/.env`, set:

```env
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=laravel

REDIS_HOST=redis
REDIS_PORT=6379
```

### 2) Build and start

```bash
docker compose up -d --build
```

### 3) Install PHP dependencies & app key

```bash
docker compose exec app composer install
docker compose exec app php artisan key:generate
docker compose exec app php artisan migrate
```

### 4) Frontend (optional)
If you use Vite:

```bash
docker compose up -d node
```

