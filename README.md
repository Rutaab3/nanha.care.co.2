# NanhaCare

## Prerequisites
- PHP 8.1+
- Composer
- Node.js & npm
- MySQL (phpMyAdmin active)

## Setup Steps

### 1. Clone the repository

```bash
git clone <repo-url> nanhacare
cd nanhacare
```

### 2. Install PHP dependencies

```bash
composer install --no-interaction
```

### 3. Install NPM dependencies & build assets

```bash
npm install
npm run build
```

### 4. Configure .env

```bash
copy .env.example .env
```

Update database and admin credentials in `.env`:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nanhacare
DB_USERNAME=root
DB_PASSWORD=

ADMIN_EMAIL=admin@nanhacare.pk
ADMIN_NAME=Admin
ADMIN_PASSWORD=admin123
```

### 5. Generate app key & run migrations

```bash
php artisan key:generate
php artisan migrate --seed
```

### 6. Storage link & start server

```bash
php artisan storage:link
php artisan serve
php artisan serve --no-reload
```

Visit **http://127.0.0.1:8000**.

## Default Admin Credentials

| Field    | Value              |
|----------|--------------------|
| Email    | admin@nanhacare.pk |
| Password | admin123           |

> These can be customized via `ADMIN_EMAIL`, `ADMIN_NAME`, and `ADMIN_PASSWORD` in `.env`.

## Notes
- Default XAMPP MySQL: `root` / empty password
- Create `nanhacare` database in phpMyAdmin before migrations if it doesn't exist
- To re-run all seeders (roles, admin user, etc.) after initial setup:
  ```bash
  php artisan db:seed
  ```
- **Important:** `AdminUserSeeder` depends on `RoleSeeder` (roles must exist before assigning). Always use `php artisan db:seed` (or `php artisan migrate --seed`) instead of running individual seeders alone.
