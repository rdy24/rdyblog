Web dibuat dengan laravel 8
  - login register forgot password memakai laravel jetstream
  - dashboard memakai template sb admin 2



## Installation
1. Clone this project
    ```bash
    https://github.com/rdy24/rdyblog.git
    cd rdyblog
    ```
2. Install dependencies
    ```bash
    composer install
    ```
    And javascript dependencies
    ```bash
    yarn install && yarn dev

    #OR

    npm install && npm run dev
    ```

3. Set up Laravel configurations
    ```bash
    copy .env.example .env
    php artisan key:generate
    ```

4. Set your database in .env edit this line
   ```bash
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=root
    DB_PASSWORD=
    ```

5. Migrate database
    ```bash
    php artisan migrate
    ```

6. Serve the application
    ```bash
    php artisan serve
    ```
