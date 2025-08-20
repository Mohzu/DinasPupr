## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Local setup

1. Install dependencies:
   - `composer install`
   - `npm install`
2. Bootstrap environment and database:
   - `cp .env.example .env` (if `.env` is missing)
   - `php artisan key:generate`
   - `touch database/database.sqlite`
   - `php artisan migrate`
   - `php artisan storage:link`
3. Start dev servers:
   - `npm run dev`
   - `php artisan serve`

## Dokumen module

Manage public documents (PDF) via Filament and display them on the frontend:

- Admin: Filament `Dokumen` resource with fields: title, description, year, published_at, uploaded PDF
- Frontend: `pages/dokumen` lists documents with search and dynamic year sidebar from the database