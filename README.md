# WordPress with Docker stack

This repository contains a Docker Compose file for running a WordPress website with MySQL, PHP, and Nginx using Docker. The `.env` file is used to set environment variables for MySQL and WordPress.

## Prerequisites

- Docker installed on your system.
- Basic knowledge of Docker and Docker Compose.

## Usage

1. Clone this repository to your local system.
2. Create a `.env` file in the root directory of the repository and set the following environment variables:

   ```env
   MYSQL_ROOT_PASSWORD=<your_root_password>
   MYSQL_USER=<your_wordpress_database_user>
   MYSQL_PASSWORD=<your_wordpress_database_password>
   MYSQL_DB_NAME=wordpress

   WORDPRESS_TABLE_PREFIX=wp_
   WORDPRESS_AUTH_KEY=<your_auth_key>
   WORDPRESS_SECURE_KEY=<your_secure_key>
   WORDPRESS_LOGGED_IN_KEY=<your_logged_in_key>
   WORDPRESS_NONCE_KEY=<your_nonce_key>
   WORDPRESS_SECURE_AUTH_SALT=<your_secure_auth_salt>
   WORDPRESS_LOGGED_IN_SALT=<your_logged_in_salt>
   WORDPRESS_NONCE_SALT=<your_nonce_salt>
   WORDPRESS_DEBUG=local

Replace the placeholders <your_root_password>, <your_wordpress_database_user>, <your_wordpress_database_password>, <your_auth_key>, <your_secure_key>, <your_logged_in_key>, <your_nonce_key>, <your_secure_auth_salt>, <your_logged_in_salt>, and <your_nonce_salt> with your desired values.

3. Copy your nginx.conf file to the nginx-conf directory.

4. Copy error-logging.ini and uploads.ini files to the config directory.

5. Run the following command to start the WordPress website:

```shell
docker-compose up
```

This command will start MySQL, PHP, Nginx, and PHPMyAdmin containers, and the WordPress website will be accessible at http://localhost:8080.

## Docker Stack
This repository uses the following Docker images:

* MySQL:8.0.32
* WordPress:6.1.1-php8.0-fpm-alpine
* Nginx:1.23.3-alpine
* PHPMyAdmin

## Configuration
The following environment variables can be set in the .env file:

* MYSQL_ROOT_PASSWORD: The root password for MySQL.
* MYSQL_USER: The username for the WordPress database.
* MYSQL_PASSWORD: The password for the WordPress database.
* MYSQL_DB_NAME: The name of the WordPress database.
* WORDPRESS_TABLE_PREFIX: The prefix for WordPress database tables.
* WORDPRESS_AUTH_KEY, WORDPRESS_SECURE_KEY, WORDPRESS_LOGGED_IN_KEY, WORDPRESS_NONCE_KEY, WORDPRESS_SECURE_AUTH_SALT, WORDPRESS_LOGGED_IN_SALT, WORDPRESS_NONCE_SALT: WordPress security keys and salts. These can be generated using the WordPress Salt Keys Generator.
* WORDPRESS_DEBUG: The debug mode for WordPress. Set to local to enable debugging.

## Contributing
Please feel free to contribute to this project by submitting a pull request with any changes or improvements you would like to make.

## License
This project is licensed under the MIT License - see the LICENSE file for details.