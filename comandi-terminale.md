# Comandi terminale

### crea il progetto
- composer create-project --prefer-dist laravel/laravel:^11.0 nome-folder

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

### crea il controller
- php artisan make:controller Admin/DashboardController

### controlla la lista delle rotte
- php artisan route:list

### non è un comando, ma ricordati come va nel controller
- ( return Auth->user() )		// devi importare auth facciata nel controller, non auth attributi

### crea il modello per interagire col db
- php artisan make:model Project

### crea la migration per creare la tabella nel db
- php artisan make:migration create_projects_table

### esegui le migrazioni
- php artisan migrate

### crea il seeder
- php artisan make:seeder ProjectsTableSeeder

### esegui i seeder
- php artisan db:seed

### esegui tutti i rollback di tutte le migrations, poi le funzioni up di tutte le migrations e poi tutti i seeder
- php artisan migrate:refresh --seed