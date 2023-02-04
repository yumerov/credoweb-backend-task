# CredoWeb Backend Task Solution

This solution is a mix of a prototype MVC framework and its usage.

## Install

Currently tested only on Windows 10(and git bash)!

- Install the dependencies `composer install`
- Run the server `composer run-script serve`

## Commands

- Tests `composer run-script test`
- List routes `php bin/routes`

## Priority TODOs

- [x] Container/DI
- [ ] Data
- - [ ] Migration SQL
- - [ ] Running migrations on app run or cli
- - [ ] Seed
- - [ ] DSN config
- - [ ] ORM install
- [ ] Config loading
- [ ] Env handling mechanism
- [ ] Routing/Http
- - [x] Core
- - [ ] Handling JSON requests
- - [x] JSON Responses
- - [ ] Upgrade to PHP8 attribute parsing instead of plain php array

## Improvements

- [ ] Logger
- [ ] Validations and sanitization
- [ ] Swagger
- [ ] Tests
- - [x] Units tests
- - [ ] Endpoint tests
- [ ] Containerize using Docker
