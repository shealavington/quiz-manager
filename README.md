# Quiz Manager
Software Developer L4 — Synoptic Project

## Getting Started

Install PHP packages: `composer install`
Install Javascript packages: `npm install`

## Serving the website

Populate the database: `php artisan migrate:fresh --seed`

Serve the HTTP pages: `php artisan serve`

## Tests:

Run Tests: `php artisan dusk`

### Login
- All roles can login

### Actions
Each role should have their individual permissions for each of the following actions.
- Create
- Read
- Update
- Delete
