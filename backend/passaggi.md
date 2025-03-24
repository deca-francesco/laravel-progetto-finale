# Comandi terminale e passaggi

### crea il progetto
- composer create-project --prefer-dist laravel/laravel:^11.0 backend

### installa breeze
- composer require laravel/breeze --dev

### scaffolding di default blade
- php artisan breeze:install

### modifica scaffolding per usare bootstrap anziché tailwind
- composer require pacificdev/laravel_9_preset
- php artisan preset:ui bootstrap --auth
- npm i

### fai partire il server backend e frontend
- php artisan serve
- npm run dev

### crea il modello per interagire con la tabella nel db
- php artisan make:model Game

### crea la migration per creare la tabella nel db
- php artisan make:migration create_games_table

### esegui le migrazioni
- php artisan migrate

### crea il seeder e passalo al DatabaseSeeder
- php artisan make:seeder GamesTableSeeder

### esegui i seeder
- php artisan db:seed

### esegui tutti i rollback di tutte le migrations, poi le funzioni up di tutte le migrations e poi tutti i seeder
- php artisan migrate:refresh --seed