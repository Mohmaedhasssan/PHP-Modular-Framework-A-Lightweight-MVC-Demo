# PHP Modular Framework: A Lightweight MVC Demo

## Overview
This repository is a lightweight PHP-based Model-View-Controller (MVC) framework. It provides a modular structure for building scalable web applications, focusing on simplicity and core functionality.

## Features
- **Modular Components**: Includes Controllers, Views, Middleware, and a Core framework.
- **Routing**: Built-in routing for handling requests.
- **Database Support**: Configuration for database integration with PHP Data Objects (PDO).
- **Scalable Architecture**: Designed for easy extension and modular development.

## Directory Structure

```plaintext
├── Core
│   ├── App.php            # Main application class
│   ├── Container.php      # Dependency injection container
│   ├── Database.php       # Database connection management
│   ├── Middleware         # Middleware handlers
│   ├── Response.php       # Response handling
│   ├── Validator.php      # Input validation
│   ├── functions.php      # Helper functions
│   ├── router.php         # Routing logic
├── controllers
│   ├── login              # Login controllers
│   ├── notes              # Notes-related logic
│   ├── register           # Registration logic
│   ├── about.php          # About page controller
│   ├── contact.php        # Contact page controller
│   ├── index.php          # Home page controller
├── public
│   └── index.php          # Entry point for the application
├── views
│   └── Templates for rendering HTML
├── bootstrap.php          # Application bootstrap logic
├── config.php             # Database configuration
├── routes.php             # Application routes
```

## Getting Started

### Prerequisites
- PHP 7.4 or higher
- Composer (optional, for dependency management)
- MySQL or any PDO-supported database

### Installation
1. Clone the repository:
   ```bash
   git clone https://github.com/Mohmaedhasssan/PHP-Demo.git
   cd PHP-Demo
   ```
2. Configure the database:
   - Update `config.php` with your database credentials:
     ```php
     return [
         "database" => [
             "host" => "localhost",
             "port" => 3306,
             "dbname" => "myapp",
             "charset" => "utf8mb4",
         ]
     ];
     ```

3. Start a local PHP server:
   ```bash
   php -S localhost:8000 -t public
   ```
4. Access the application in your browser at `http://localhost:8000`.

## Usage
- Add new controllers in the `controllers` directory.
- Define application routes in `routes.php`.
- Create templates in the `views` directory.
- Use the `Core\Container` for dependency injection.

## Contributing
Contributions are welcome! Feel free to fork the repository, make improvements, and open a pull request.

## License
This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

---

For questions or support, please open an issue on the [GitHub repository](https://github.com/Mohmaedhasssan/PHP-Demo).

