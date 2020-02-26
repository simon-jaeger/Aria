# Aria

A music streaming app for soundtracks.

## Setup

```bash
[create a database for aria]

composer install
npm install

cp .env.example .env
vim .env # add database credentials
php artisan key:generate
php artisan config:cache

php artisan migrate:fresh --seed
```

[//]: # (TODO: für abgabe: .env und config cache bereits generiert, public generiert mit production script)
