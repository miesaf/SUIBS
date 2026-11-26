**Sport Unit Inventory Borrowing System (SUIBS)**
=====================

A small Laravel app for a university sport unit: staff register and log in, keep a list of
inventory items (item, location) and of borrowers (name, phone, position, inventory id, admin id),
and add, edit or delete both. The landing page and dashboard show a Google map of the unit.
`User_Manual_SUIBS.pdf` walks through every screen.

Built in 2018 on Laravel 5.7; upgraded to **Laravel 13 / PHP 8.5** in November 2026.

## Note

**This is a project required for `ITT544 - Web Technology` course under `CS251 - Bachelor of Netcentric Computing` program at `MARA University of Technology Malacca Branch Jasin Campus`.**

## Group Particulars

Group Name : `ASAS`<br/>
Class : `M3CS2514A`<br/>
Semester : `Sept 2018 - Jan 2019`

## Group Members

- Mohammad Shahzlee Bin Hasim
- Muhamad Amirul Ikhmal Bin Azman
- Mohammad Sharif Bin Ismail
- Muhammad Aiman Syazani Bin Zainalabideen

## Setup

Requires PHP 8.4.1+ (8.5 recommended) with `pdo_mysql`, `mbstring`, `openssl`, and MySQL/MariaDB.

```bash
composer install
cp .env.example .env          # set DB_* and, for the maps, GOOGLE_MAP_KEY
php artisan key:generate
php artisan migrate --seed    # the seeder adds admin@example.com / password and sample rows (local only)
php artisan serve
php vendor/bin/phpunit        # feature tests on sqlite in memory
```

There is no front-end build: the compiled `public/css/app.css` and `public/js/app.js`
(Bootstrap 4 + AdminLTE 3) are committed. `resources/js` and `resources/sass` are their sources.

## User Manual

User manual was included in this repository with the name [User_Manual_SUIBS.pdf](User_Manual_SUIBS.pdf) located at the parent directory.

## Hosted Project

The project is hosted at [https://app.dimensikini.xyz/SUIBS/public/](https://app.dimensikini.xyz/SUIBS/public/).
