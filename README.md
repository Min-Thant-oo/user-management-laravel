# User Management System

Simple user management app using Laravel and Bootstrap.

### How to install

1.  Clone repo
    ```bash
    git clone https://github.com/Min-Thant-oo/user-management-laravel
    cd user-management-laravel
    ```

2.  Install dependencies
    ```bash
    composer install
    npm install
    ```

3.  Setup .env
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4.  Setup Database (SQLite)
    ```bash
    touch database/database.sqlite
    php artisan migrate --seed
    ```

### How to run

Start server:
```bash
php artisan serve
```

### Login

-   **Admin**: admin@example.com / password
-   **User**: test@example.com / password
