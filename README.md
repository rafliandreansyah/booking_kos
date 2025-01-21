# Kos Booking Application

This is a Laravel-based application designed for managing and booking kos (rented rooms). The frontend uses Tailwind CSS for styling, ensuring a clean and responsive design. This documentation will guide you through the installation and running process on your local machine.

## Features
- Backend: Laravel
- Dashboard: Filament
- Frontend: Tailwind CSS
- User authentication and role management
- Room availability and booking management
- Design for mobile devices
- Payment Gateway with midtrans

---

## Requirements

Before starting, ensure you have:

1. **PHP** (v8.1 or newer)
2. **Composer** (v2.0 or newer)
3. **Node.js** (v16 or newer)
4. **NPM** or **Yarn**
5. **PostgreSQL** or another compatible database
6. **Git** (optional, for cloning the repository)

---

## Installation

1. **Clone the Repository**
   ```bash
   git clone https://github.com/rafliandreansyah/booking_kos.git
   cd kos-booking
   ```

2. **Install Backend Dependencies**
   Run the following command to install all Laravel dependencies:
   ```bash
   composer install
   ```

3. **Install Frontend Dependencies**
   Run the following command to install frontend dependencies:
   ```bash
   npm install
   ```

4. **Configure Environment**
   Copy the `.env.example` file to `.env`:
   ```bash
   cp .env.example .env
   ```
   Then update the `.env` file, especially the following section:
   ```env
   APP_NAME="Kos Booking"
   APP_URL=http://localhost

   DB_CONNECTION=pgsql
   DB_HOST=127.0.0.1
   DB_PORT=5432
   DB_DATABASE=booking_kos
   DB_USERNAME=your_username_db
   DB_PASSWORD=your_password_db
   MIDTRANS_SERVER_KEY=your_midtrans_server_key
   MIDTRANS_IS_PRODUCTION=false
   MIDTRANS_IS_SANITIZED=true
   MIDTRANS_IS_3DS=true
   ```

5. **Generate Application Key**
   Run the following command to generate the application key:
   ```bash
   php artisan key:generate
   ```

6. **Migrate and Seed Database**
   To create tables and seed initial data, run:
   ```bash
   php artisan migrate --seed
   ```

7. **Build Frontend**
   To compile frontend assets, run:
   ```bash
   npm run dev
   ```

---

## Running the Application

1. Start the Laravel server:
   ```bash
   php artisan serve
   ```
   The application will run at [http://localhost:8000](http://localhost:8000).

2. Ensure the frontend assets are compiled and running:
   ```bash
   npm run dev
   ```

---

## Deployment

To run the application in production:

1. Build production assets:
   ```bash
   npm run build
   ```

2. Optimize Laravel:
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

3. Use a web server like Apache or Nginx to host your application.

---

## Contribution

1. Fork this repository.
2. Create a new branch for your feature or fix: `git checkout -b feature-name`.
3. Commit your changes: `git commit -m 'Description of changes'`.
4. Push to the branch: `git push origin feature-name`.
5. Create a pull request on GitHub.

---

## License
This application is released under the MIT License. Please see the [LICENSE](./LICENSE) file for more details.

