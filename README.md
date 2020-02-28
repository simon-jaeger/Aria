# Aria

A music streaming app for soundtracks.

## Requirements

- [Laravel 6](https://laravel.com/docs/6.x#server-requirements)
- [Vue 2](https://vuejs.org/v2/guide/installation.html#Compatibility-Note)

## Setup

```bash
mysql # create a database for aria

composer install
npm install

cp .env.example .env
vim .env # add database credentials
php artisan key:generate
php artisan config:cache

php artisan migrate:fresh --seed

npm run dev # or npm run prod
```

[//]: # (TODO: für abgabe: .env und config cache bereits generiert, public generiert mit production script)
