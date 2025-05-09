# 📚 Laravel Book Management API

This is a simple Laravel-based API for managing books, built with a clean architecture using a `BookController`, `BookRequest`, `BookResource`, and a `BookManagerInterface`.

---

## 🚀 Requirements

- PHP >= 8.1
- Composer
- MySQL
- Laravel >= 10

---

## 🛠️ Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/your-username/book-api.git
   cd book-api
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Copy and configure `.env`**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

   Edit `.env` to match your database settings:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database
   DB_USERNAME=your_user
   DB_PASSWORD=your_password
   ```

4. **Run database migrations and seeders**
   ```bash
   php artisan migrate --seed
   ```

5. **Run the development server**
   ```bash
   php artisan serve
   ```

---

## 🔍 API Endpoints

| Method | Endpoint        | Description             |
|--------|-----------------|-------------------------|
| GET    | `/api/books`    | List all books          |
| POST   | `/api/books`    | Create a new book       |
| GET    | `/api/books/{id}` | Get a specific book     |
| PUT    | `/api/books/{id}` | Update a specific book  |
| DELETE | `/api/books/{id}` | Delete a specific book  |

---

## ✅ Running Tests

```bash
php artisan test
```

---

## 🧪 Seeder

To populate the database with sample data:

```bash
php artisan db:seed
```

---

## 📁 Directory Overview

- `app/Http/Controllers/BookController.php` – Main controller for book routes
- `app/Http/Requests/BookRequest.php` – Request validation
- `app/Http/Resources/BookResource.php` – API resource formatting
- `app/Models/Book.php` – Eloquent model for books
- `app/Contracts/BookManagerInterface.php` – Service contract for business logic
- `app/Managers/BookManager.php` - Implementation of contract
- `tests/Feature/` - HTTP & validation tests
- `database/seeders/` - Example data population
