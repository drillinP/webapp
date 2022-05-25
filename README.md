# WebApp `Work in progress for a real name`
**New webapp to manage spatial data and create maps**

## Command to launch and test this app
This app use a docker env to the database and mailer service.
* To build docker env:
````shell
make build
````
* To run docker env:
````shell
make run
````
* To stop docker env:
````shell
make down
````
* To start symfony server:
````shell
make server
````

## Command to check code quality
* To check composer validity
````shell
make validate
````
* PHP Code snifer:
````shell
make phpcs
````
* PHP-Stan:
````shell
make phpstan
````
* Twig lint:
````shell
make twig-lint
````
