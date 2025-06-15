<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About This Application

This is a web application built with the Laravel framework. It serves as a contact management system, allowing users to organize and manage contacts, branches, and designations.

## Core Functionalities

The application provides the following key features:

*   **Contact Management:**
    *   Create, view, edit, and delete contacts.
    *   Upload and manage profile pictures for contacts.
*   **Branch Management:**
    *   Create, view, edit, and delete branches.
*   **Designation Management:**
    *   Create, view, edit, and delete designations.
*   **User Profile Management:**
    *   Users can edit their profile information.
    *   Users can delete their accounts.
*   **Authentication:**
    *   Standard user authentication features including login, registration, password reset, and email verification.

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Application Structure

The application follows the standard Laravel project structure:

*   **`app/Models`**: Contains the Eloquent models (`User.php`, `Contact.php`, `Branch.php`, `Designation.php`) that interact with the database.
*   **`app/Http/Controllers`**: Contains the controllers (`ContactController.php`, `BranchController.php`, `DesignationController.php`, `ProfileController.php`, etc.) that handle incoming HTTP requests and orchestrate responses.
*   **`app/Http/Requests`**: Contains custom request validation classes.
*   **`config`**: Stores configuration files for various aspects of the application (database, cache, services, etc.).
*   **`database/migrations`**: Contains the database migration files that define the application's schema.
*   **`public`**: The web server's document root. It contains the `index.php` entry point and publicly accessible assets (images, CSS, JavaScript).
*   **`resources/views`**: Contains the Blade templates used to render the application's user interface. Views are typically organized into subdirectories corresponding to controllers or resources (e.g., `resources/views/contacts`, `resources/views/branches`).
*   **`routes`**: Contains the route definitions.
    *   `routes/web.php`: Defines routes for the web interface, including all contact, branch, and designation management routes under the `/tp` prefix.
    *   `routes/auth.php`: Defines routes related to user authentication.
*   **`tests`**: Contains automated tests for the application (feature and unit tests).

The application leverages Laravel's conventions for routing, controllers, models, and views, making the codebase organized and maintainable.

## Database Schema

The database schema is defined by migration files located in the `database/migrations` directory. The main tables include:

*   **`users`**: Stores user account information, including name, email, password, and role.
*   **`contacts`**: Stores contact information. Key columns include:
    *   `name`, `email`, `mobile_number`, `additional_mobile_numbers`
    *   `title`
    *   `designation_id` (foreign key to `designations` table)
    *   `branch_id` (foreign key to `branches` table)
    *   `image_path` (path to the contact's profile picture)
    *   `active_status` (boolean indicating if the contact is active)
*   **`branches`**: Stores branch information, primarily the branch `name`.
*   **`designations`**: Stores designation information, primarily the designation `name`.
*   **`cache`**: Used by Laravel for caching.
*   **`jobs`**: Used by Laravel for queueing jobs.
*   **`password_reset_tokens`**: Used by Laravel for password reset functionality.

Relationships:
*   A `Contact` belongs to one `Designation`.
*   A `Contact` belongs to one `Branch`.
*   A `User` can have many `Contacts` (implicitly, though not explicitly defined via foreign keys in the provided migrations, this is a common pattern).

The schema is created and updated using Laravel's migration system (`php artisan migrate`).

## Request Lifecycle

A typical request to this Laravel application follows these steps:

1.  **Entry Point**: All web requests are directed to the `public/index.php` file by the web server (e.g., Nginx or Apache).
2.  **HTTP Kernel**: The `index.php` file loads the Composer-generated autoloader and then bootstraps the Laravel application by creating an instance of the application and its HTTP kernel (`app/Http/Kernel.php`).
3.  **Service Providers**: The kernel boots up the registered service providers (`config/app.php` and `bootstrap/providers.php`), which initialize various components of the framework (e.g., database, routing, validation).
4.  **Routing**: The router (`routes/web.php` and `routes/auth.php`) matches the incoming request URI and HTTP method to a defined route.
5.  **Middleware**: The request passes through any global middleware and then route-specific middleware (defined in `app/Http/Kernel.php` or directly on routes/route groups). Middleware can perform tasks like authentication, session handling, or request modification. For example, the `auth` middleware protects routes that require a logged-in user.
6.  **Controller**: If the route points to a controller action, the router dispatches the request to the appropriate controller method (e.g., `ContactController@store`).
7.  **Request Processing**:
    *   **Form Requests**: For actions like storing or updating data, a Form Request (e.g., in `app/Http/Requests/`) might be used to validate the incoming data before the controller action is executed.
    *   **Model Interaction**: The controller typically interacts with Eloquent models (`app/Models/`) to retrieve, create, update, or delete data from the database.
    *   **Business Logic**: The controller contains the application-specific logic to handle the request.
8.  **Response**:
    *   **View Rendering**: If the controller action returns a view, Laravel's view engine (Blade) compiles and renders the specified Blade template (from `resources/views/`). Data is passed from the controller to the view.
    *   **JSON Response**: For API-like interactions or AJAX requests, the controller might return a JSON response.
    *   **Redirect**: The controller might issue a redirect to another route.
9.  **Sending Response**: The HTTP kernel receives the response from the controller (or router, if it's a simple closure route) and sends it back to the client's browser.

## Setup and Installation

To set up and run this application locally, follow these steps:

1.  **Clone the Repository:**
    ```bash
    git clone <repository_url>
    cd <repository_directory>
    ```

2.  **Install Dependencies:**
    Install PHP dependencies using Composer:
    ```bash
    composer install
    ```
    Install JavaScript dependencies using npm (or yarn):
    ```bash
    npm install
    # or
    # yarn install
    ```

3.  **Environment Configuration:**
    *   Copy the example environment file:
        ```bash
        cp .env.example .env
        ```
    *   Generate an application key:
        ```bash
        php artisan key:generate
        ```
    *   Configure your database connection details in the `.env` file (e.g., `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`).
    *   Ensure you have a database created with the name specified in `DB_DATABASE`.

4.  **Run Database Migrations:**
    This will create the necessary tables in your database.
    ```bash
    php artisan migrate
    ```

5.  **Compile Assets (Optional but Recommended):**
    Compile frontend assets using Vite:
    ```bash
    npm run dev
    # or for production
    # npm run build
    ```

6.  **Serve the Application:**
    You can use Laravel's built-in development server:
    ```bash
    php artisan serve
    ```
    The application will typically be available at `http://127.0.0.1:8000`. The dashboard and application routes are prefixed with `/tp` (e.g., `http://127.0.0.1:8000/tp/dashboard`).

7.  **Storage Linking (If file uploads are used frequently):**
    To make files stored in `storage/app/public` accessible from the web, create a symbolic link:
    ```bash
    php artisan storage:link
    ```
    This is important for displaying uploaded contact images.

**Note:** You will need PHP, Composer, Node.js, npm/yarn, and a database server (like MySQL, PostgreSQL, or SQLite) installed on your system.
