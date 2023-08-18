
# Laravel Vapor RESTful API with Redis Queue Worker

This repository contains a RESTful API built with Laravel Vapor, utilizing a Redis queue worker for background job processing. The API provides endpoints for managing users and leverages MySQL for data storage.

## Table of Contents

- [Requirements](#requirements)
- [Installation](#installation)
- [API Endpoints](#api-endpoints)
- [Redis Queue Worker](#redis-queue-worker)
- [Deployment](#deployment)
- [Contributing](#contributing)
- [License](#license)

## Requirements

To run this application, you need the following:

- PHP (version 7.4 or higher)
- Composer
- Laravel Vapor account
- AWS account with appropriate IAM permissions
- Redis instance
- MySQL database

## Installation

1. Clone the repository:

   ```shell
   git clone <repository-url>
```

2. Install dependencies:

   ```shell
   composer install
   ```

3. Configure the environment variables:

   - Duplicate the `.env.example` file and rename it to `.env`.
   - Update the `.env` file with your Redis and MySQL database connection details.

4. Migrate the database:

   ```shell
   php artisan migrate
   ```

## API Endpoints

The following endpoints are available in the API:

- `GET /users`: Returns a list of all users.
- `GET /users/{id}`: Returns a specific user by ID.
- `POST /users`: Creates a new user.
- `PUT /users/{id}`: Updates an existing user by ID.
- `DELETE /users/{id}`: Deletes a user by ID.

Refer to the Postman collection for detailed documentation and examples of using these endpoints.

## Redis Queue Worker

This application utilizes a Redis queue worker for processing background jobs. It includes a welcome email queue, which sends welcome emails to newly registered users.

To start the Redis queue worker, run the following command:

```shell
php artisan queue:work redis
```

Ensure that your Laravel Vapor environment is properly configured with the Redis connection details.

## Deployment

To deploy the application on Laravel Vapor:

1. Set up your Laravel Vapor environment according to the Laravel Vapor documentation.
1. Configure the necessary environment variables in your Vapor environment.
1. Deploy the application using the `vapor deploy` command.

For detailed deployment instructions, refer to the Laravel Vapor documentation.

## Contributing

Contributions to this project are welcome! If you find any issues or have suggestions for improvements, please submit a pull request.

## License

This project is licensed under the [MIT License](LICENSE).

```

Copy the above code and replace the existing content in your README file with it. Feel free to adjust the formatting or add more sections as needed.

If you have any more questions, feel free to ask!```
