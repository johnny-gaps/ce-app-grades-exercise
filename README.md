# CE `app:grades` COMMAND EXERCISE

## SET UP
1. You need to have PHP and Postgres Database installed in your machine. Or you can use Docker instead.
2. Download this repository.
3. If using docker run this command: `docker volume create --name=ce-db-volume` 
4. If using docker run: `docker-compose build` and `docker-compose up -d`
5. If not using docker: Create a local environment file (`cp .env .env.local`) to customize parameters like DB connection.

## INSTALL DEPENDENCIES
Run `composer install`

## SET UP DATABASE
1. If using docker run `docker exec -it ce-app /bin/bash`
2. Run `php bin/console doctrine:migrations:migrate`
3. To populate database run `php bin/console doctrine:fixtures:load`

##  USAGE
`php bin/console app:grades [NAME] [TERM] [OPTION]`

Arguments | Description
------------ | -------------
[NAME] | Student name
[TERM] | School Term (Number: [1, 2, 3])

Options | Alias | Description
------------ | ------------- | -------------
--description | -d | Show describable grade (as String not as Number)

## TECHNOLOGY USED
I tried to solve this exercise using hexagonal architecture (DDD approach).
Repository pattern is used to separate Infrastructure from Domain, and of course, Dependency Injection.

The chosen framework is _Symfony_. 
This framework is modular, so you can install only the needed components for your application.
Also, Symfony can easily become infrastructure on an hexagonal architecture.

_Doctrine_ library is used to perform all database operations, it integrates well with _Symfony_.
Also, separation from Domain is possible using this library.

For testing _PHP Unit_ is the chosen library. 
Although more testing can be done in this exercise, I only tested the main use case, which is basically the whole business functionality of this command.

As a database I chose _Postgres_ as is the database I use the most. However, _MySQL_ or _MariaDB_ can be used instead.

