# Recipe Management System

A web application built with Laravel that allows users to create, manage, and share recipes. This application provides a platform for food enthusiasts to document and share their favorite recipes with the community.

## Features

- Recipe Management (CRUD operations)
  - Create new recipes with title, description, ingredients, and instructions
  - Upload recipe images
  - Specify cooking time and difficulty level
  - View recipe details
  - Edit existing recipes
  - Delete recipes
- Responsive design for both desktop and mobile devices

## Technologies Used

- Laravel 10.x
- PHP 8.x
- MySQL
- Vite (for asset bundling)
- Blade Templates
- Laravel Mix
- Bootstrap/CSS for styling

## Prerequisites

Before setting up the project, make sure you have the following installed:
- PHP >= 8.1
- Composer
- Node.js & NPM
- MySQL
- Git

## Installation

1. Clone the repository:
```bash
git clone <repository-url>
cd WebAssignment
```

2. Install PHP dependencies:
```bash
composer install
```

3. Install Node.js dependencies:
```bash
npm install
```

4. Create environment file:
```bash
cp .env.example .env
```

5. Configure your database settings in the `.env` file:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

6. Generate application key:
```bash
php artisan key:generate
```

7. Run database migrations:
```bash
php artisan migrate
```

8. Create symbolic link for storage:
```bash
php artisan storage:link
```

9. Build assets:
```bash
npm run dev
```

10. Start the development server:
```bash
php artisan serve
```

The application will be available at `http://localhost:8000`

## Database Structure

### Users Table
- id (primary key)
- name
- email
- password
- timestamps

### Recipes Table
- id (primary key)
- title
- description
- ingredients
- instructions
- cooking_time
- difficulty
- image_path
- user_id (foreign key)
- timestamps

## File Structure Overview

- `app/Models/` - Contains Recipe and User models
- `app/Http/Controllers/` - Contains controllers for handling recipes
- `database/migrations/` - Database migration files
- `resources/views/` - Blade template files
- `routes/` - Application routes
- `public/` - Publicly accessible files
- `storage/app/public/` - Storage for uploaded images

## Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Security

If you discover any security-related issues, please email the project maintainers instead of using the issue tracker.

## Credits

- [Laravel](https://laravel.com)
- [Bootstrap](https://getbootstrap.com)
- All contributors