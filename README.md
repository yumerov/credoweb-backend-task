# CredoWeb Backend Task Solution

This solution is a mix of a prototype MVC framework and its usage.

## Install

Currently tested only on Windows 10(and git bash)!

- Install the dependencies `composer install`
- Requires a working postgres instance with database "hospitals" grated access to user "postgres" and password "postgres"

## Commands

- Sync the database structure `php bin/dbsync`
- Fill the database with some test data `php bin/dbseed`
- Tests `composer run-script test`
- List routes `php bin/routes`
- Run the server `composer run-script serve`

## Design decision:

- Using php instead of yaml to save dev time
- Using sql queries instead of Doctrine entities to save dev time
- Using same database for dev and testing purposes
- Using json for swagger instead of annotations to save dev time
- Not using transactions on save endpoints to save dev time

## Testing

- Swagger: http://localhost:8000/swagger/index.html
- cli: `composer run-script test`

## Priority TODOs

- [x] Container/DI
- [x] Data
- - [x] Migration SQL
- - [x] Running migrations on app run or cli
- - [x] Entities
- - [x] Seed
- - [x] DSN config
- - [x] ORM install
- [x] Routing/Http
- - [x] Core
- - [x] Handling JSON requests
- - [x] JSON Responses
- [ ] Endpoints
- - [x] Hospital
- - - [x] Create
- - - [x] Read
- - - [x] Update
- - - [x] Delete
- - - [x] List hopsitals - ability to order them by employees count
- - [x] Users
- - - [ ] Create
- - - [x] Read
- - - [ ] Update
- - - [x] Delete
- - - [x] List hopsitals - ability to search them by workplace and title

## Improvements

- [ ] Logger
- [ ] Config loading
- [ ] Exceptions
- [ ] Env handling mechanism
- [ ] Better namespace structure
- [ ] Validations and sanitization
- [x] Swagger
- [ ] Routing/Http
- - [ ] Upgrade to PHP8 attribute parsing instead of plain php array
- [ ] Tests
- - [x] Units tests
- - [ ] Endpoint tests
- [ ] Containerize using Docker
