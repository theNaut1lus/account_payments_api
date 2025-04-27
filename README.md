## Installation & Configuration

1. Clone the repository:
    ```bash
    git clone <repository-url>
    cd account_payments_api
    ```

2. Install dependencies:
    ```bash
    composer install
    ```

3. Copy and configure environment file:
    ```bash
    cp .env.example .env
    # Edit .env to set your database and other settings
    ```

4. Generate application key:
    ```bash
    php artisan key:generate
    ```

5. Run database migrations:
    ```bash
    php artisan migrate
    ```

6. Start the development server:
    ```bash
    php artisan serve
    ```

7. (Optional) Install frontend dependencies:
    ```bash
    npm install && npm run dev
    ```