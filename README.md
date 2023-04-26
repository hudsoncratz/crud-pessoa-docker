<h1 align="center">Backend Internship Challenge</h1>

## Introduction

The test consists of developing a small system for managing people (CRUD).

## Requirements

- Name
- CPF
- Birthdate
- Email
- Phone
- Location
- Location
- State

States and cities can be consumed from the IBGE APIs

## Run Project

- Git Clone

```
git clone https://github.com/hudsoncratz/desafioBackendUppersoft.git
```

- CD into the project

```
cd desafioBackendUppersoft
```

- Install Composer Dependencies

```
composer install
```

- copy .env.example

```
cp .env.example .env
```

- Generate an app encryption key

```
php artisan key:generate
```

- Create an empty database (crud-pessoa)

- Migarate Database

```
php artisan migrate
```

- Start server

```
php artisan serve
```
