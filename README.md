# CredoWeb Backend Task Solution

This solution is a mix of a prototype MVC framework and its usage.

## Install

Currently tested only on Windows 10(and git bash)!

- Install the dependencies `composer install`
- Requires a working postgres instance with database "hospitals" grated access to user "postgres" and password "postgres"

## Commands

- Sync the database structure `php bin/dbsync`
- Tests `composer run-script test`
- List routes `php bin/routes`
- Run the server `composer run-script serve`

## Priority TODOs

- [x] Container/DI
- [ ] Data
- - [x] Migration SQL
- - [x] Running migrations on app run or cli
- - [ ] Entities
- - [ ] Seed
- - [x] DSN config
- - [x] ORM install
- [ ] Config loading
- [ ] Env handling mechanism
- [ ] Routing/Http
- - [x] Core
- - [ ] Handling JSON requests
- - [x] JSON Responses
- - [ ] Upgrade to PHP8 attribute parsing instead of plain php array
- [ ] Endpoints
- - [ ] Hospital
- - - [ ] Create
- - - [ ] Read
- - - [ ] Update
- - - [ ] Delete
- - - [ ] List hopsitals - ability to order them by employees count
- - [ ] Users
- - - [ ] Create
- - - [ ] Read
- - - [ ] Update
- - - [ ] Delete
- - - [ ] List hopsitals - ability to search them by workplace and title

## Improvements

- [ ] Logger
- [ ] Exceptions
- [ ] Better namespace structure
- [ ] Validations and sanitization
- [ ] Swagger
- [ ] Tests
- - [x] Units tests
- - [ ] Endpoint tests
- [ ] Containerize using Docker
