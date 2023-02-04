# CredoWeb Backend Task Solution

This solution is a mix of a prototype MVC framework and its usage.

## Install

Currently tested only on Windows 10(and git bash)!

- Install the dependencies `composer install`
- Run the server `php -S localhost:8000`

## Commands

- Tests `./vendor/bin/phpunit --coverage-text`
- List routes `php bin/routes`

## TODO

- [ ] Logger
- [ ] Data
- - [ ] Migration SQL
- - [ ] Running migrations on app run or cli
- - [ ] Seed
- - [ ] DSN config
- - [ ] ORM install
- [ ] Config loading
- [ ] Routing
- - [ ] Core
- - [ ] Handling JSON requests
- - [ ] JSON Responses
- [ ] Validations and sanitization
- [ ] Swagger
- [ ] Containerize using Docker
- [ ] Tests
- - [x] Units tests
- - [ ] Endpoint tests