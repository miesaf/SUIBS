# CLAUDE.md

**SUIBS** — Sport Unit Inventory Borrowing System, a 2018 student project (Laravel 5.7) kept in the owner's
project archive. Upgraded to **Laravel 13 / PHP 8.5** in November 2026 (ClickUp `86d4e29q6`, under `86d4e29pu`).

## Shape

- Auth: `laravel/ui` traits and `Auth::routes()` (login with remember me, register, password reset; no email
  verification). Logout is both `POST /logout` and the sidebar's plain `GET /logout` link.
- `InventoryController`, `BorrowerController`: resource routes (no `show`) plus `GET inventory-delete/{id}` and
  `borrower-delete/{id}` (the list pages' Delete buttons), all behind `auth`.
- Models `App\Models\{User,Inventory,Borrower}`; tables `users`, `password_resets`, `inventories`, `borrowers`
  (column `inventoriy_id`, typo kept), `borrower_inventory` and `gmaps_geocache` (both unused).
- Views: AdminLTE layout `layouts.master` (flash + validation messages from `inc.messages`), auth pages on
  `layouts.app`, the published 5.7 illustrated error pages. Compiled CSS/JS are committed in `public/`; there is no
  Node tooling.
- Maps: Google Maps JS on `/` and `/home`, key from `GOOGLE_MAP_KEY` (`config('services.google_maps.key')`).

## History

- 2018 original by group ASAS (ITT544). Production ran commit `0485865` (Feb 2021) with no local edits.
- 2026-11 upgrade: moved onto a fresh Laravel 13 skeleton. Replaced laravelcollective/html (plain Blade forms),
  fideloper/proxy (framework TrustProxies), farhanwazir/laravelgooglemaps (inline map script), dropped Laravel Mix.
  The 2018 migrations are unchanged (only a wrong table name in one `down()` was fixed), so `migrate --force` on the
  existing database has nothing to run. `Schema::defaultStringLength(191)` stays so fresh installs match.
- Config falls back to the old `.env` keys `CACHE_DRIVER` and `MAIL_DRIVER`; sessions and cache default to files,
  queue to sync.

## Status (2026-11-27)

- Deployed on 2026-11-26 (PR #55, Laravel 13, PHP 8.5.13). ClickUp `86d4e29q6` is complete.
- `GOOGLE_MAP_KEY` is not set on production. Open: the owner revokes or restricts the old Google Maps key, which is
  in the public repo's history.
- The archive's root `.htaccess` (not in this repo) also refuses `..` requests and serves no `connectDB.php`, `config.json`,
  `*.sql`, `*.log`, `*.md`, `error_log`, `LICENSE*` or composer/package files in any folder.

## Deploy

Served from the archive host as `<docroot>/SUIBS/` at `https://app.dimensikini.xyz/SUIBS/public/` (the archive's
root `.htaccess` blocks everything outside `public/`; no path overrides). `APP_URL` ends in `/SUIBS/public`.
Never use root-relative links (`/borrower`) in views: use `route()` / `url()`.

On the server, in the app folder, with the PHP 8.5 CLI `/opt/alt/php85/usr/bin/php`:

```bash
git pull --ff-only origin master
/opt/alt/php85/usr/bin/php $(which composer) install --no-dev --optimize-autoloader --no-scripts
/opt/alt/php85/usr/bin/php artisan package:discover
/opt/alt/php85/usr/bin/php artisan migrate --force
/opt/alt/php85/usr/bin/php artisan optimize
```

## Commands

```bash
php artisan migrate --seed   # local DB; seeder = admin@example.com / password + sample rows
php vendor/bin/phpunit       # tests/Feature/ExampleTest.php, sqlite in memory
composer audit
```

## Conventions

Public repo: never commit credentials, API keys, hosting account names, DB names or personal data.
Commit messages short imperative English, no AI attribution lines.
