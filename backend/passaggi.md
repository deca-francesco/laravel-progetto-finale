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

### crea la migration (snake_case) per creare la tabella games nel db
- php artisan make:migration create_games_table

### esegui le migrations
- php artisan migrate

### crea il seeder (PascalCase) e passalo al DatabaseSeeder
- php artisan make:seeder GamesTableSeeder

### esegui i seeder
- php artisan db:seed

### esegui tutti i rollback di tutte le migrations, poi le funzioni up di tutte le migrations e poi tutti i seeder
- php artisan migrate:refresh --seed

### crea un controller risorsa (PascalCase): conterrà già tutte le funzioni vuote per le CRUD
- php artisan make:controller --resource Admin/GameController

### crea il componente per avere più ordine nel codice della index
- php artisan make:component card_index

### dopo aver scritto le funzioni CRUD crea la migration (snake_case) per la tabella genres
- php artisan make:migration create_genres_table

### crea modello Genre
- php artisan make:model Genre

### crea seeder (PascalCase) tabella genres
- php artisan make:seeder GenresTableSeeder

### migration (snake_case) per inserire la foreign key genre_id nella tabella games
- php artisan make:migration add_genre_id_to_games_table

### esegui tutti i rollback di tutte le migrations, poi le funzioni up di tutte le migrations e poi tutti i seeder
- php artisan migrate:refresh --seed

### crea il controller risorsa per i genres
- php artisan make:controller --resource Admin/GenreController

### crea la migration (snake_case) della tabella platforms
- php artisan make:migration create_platforms_table

### crea il modello Platform
- php artisan make:model Platform

### crea il seeder (PascalCase) per la tabella platforms
- php artisan make:seeder PlatformsTableSeeder

### esegui tutti i rollback di tutte le migrations, poi le funzioni up di tutte le migrations e poi tutti i seeder
- php artisan migrate:refresh --seed

### crea la migration (snake_case) per la tabella pivot (ordine alfabetico)
- php artisan make:migration create_game_platform_table

### crea il seeder (PascalCase) per la tabella pivot
- php artisan make:seeder GamePlatformTableSeeder

### esegui tutti i rollback di tutte le migrations, poi le funzioni up di tutte le migrations e poi tutti i seeder
- php artisan migrate:refresh --seed

### crea il controller delle platforms
- php artisan make:controller --resource Admin/PlatformController