# Sports Leasing System

A Laravel web application for leasing sports grounds and equipment. The platform allows users to browse available facilities and equipment, make bookings, and contact the administration.

## Features

- User authentication (login/registration)
- Browse available sports facilities and equipment
- Book facilities and equipment with date and time slot selection
- Prevent booking clashes
- Contact form for inquiries
- Admin panel for managing facilities, equipment, and bookings

## Requirements

- PHP >= 8.0
- MySQL >= 5.7
- Composer
- Node.js and NPM

## Installation

1. Clone the repository:
   ```
   git clone <repository-url>
   ```

2. Navigate to the project directory:
   ```
   cd SportsSystem
   ```

3. Install PHP dependencies:
   ```
   composer install
   ```

4. Install and compile frontend assets:
   ```
   npm install
   npm run dev
   ```

5. Create a copy of the `.env.example` file:
   ```
   cp .env.example .env
   ```

6. Generate application key:
   ```
   php artisan key:generate
   ```

7. Configure your database in the `.env` file:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=sports_leasing
   DB_USERNAME=root
   DB_PASSWORD=
   ```

8. Run migrations to create database tables:
   ```
   php artisan migrate
   ```

9. Seed the database with initial data:
   ```
   php artisan db:seed
   ```

10. Link storage for image uploads:
    ```
    php artisan storage:link
    ```

11. Start the development server:
    ```
    php artisan serve
    ```

Now you can access the application at `http://localhost:8000`.

## Admin Access

After running the database seeders, an admin user will be created with the following credentials:

- Email: admin@example.com
- Password: password

## Usage

### For Users:
1. Register a new account or login.
2. Browse available facilities and equipment on the homepage.
3. Click "Book Now" on any item to make a booking.
4. Select date and time slot for your booking.
5. View your bookings in the "My Bookings" section.
6. Cancel bookings if needed.
7. Use the "Contact Us" page for inquiries.

### For Admins:
1. Login with admin credentials.
2. Access the admin dashboard via the navigation menu.
3. Add, edit, or delete facilities and equipment.
4. View and manage all bookings.
5. Confirm or cancel booking requests.
6. View contact messages from users.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
