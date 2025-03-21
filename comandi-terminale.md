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

### crea un controller risorsa: conterrà già tutte le funzioni vuote per le CRUD
- php artisan make:controller --resource Admin/ProjectController

### per vedere quali flag possiamo inserire
- php artisan make:controller --help

### crea un componente
- php artisan make:component card_index

### crea tabella types
- php artisan make:migration create_types_table

### crea seeder tabella types
- php artisan make:seeder TypesTableSeeder  

### crea modello type
- php artisan make:model Type

### esegui tutti i rollback di tutte le migrations, poi le funzioni up di tutte le migrations e poi tutti i seeder
- php artisan migrate:refresh --seed

### migrazione per togliere la stringa fake type e inserire la foreign key type id nella tabella projects
- php artisan make:migration add_type_id_to_projects_table

### controlliamo lo stato delle migrations
- php artisan migrate:status

### creo il controller risorsa per i types
- php artisan make:controller --resource Admin/TypeController

### creo la migrazione della tabella technologies
- php artisan make:migration create_technologies_table

### creo il modello Technology
- php artisan make:model Technology

### creo il seeder
- php artisan make:seeder TechnologiesTableSeeder

### creo la migration per tabella pivot
- php artisan make:migration create_project_technology_table

### creo il seeder per la tabella pivot
- php artisan make:seeder ProjectTechnologyTableSeeder

### creo il controller delle technologies
- php artisan make:controller --resource Admin/TechnologyController

### creo il file api.php per esporre le api per il framework frontend frontoffice
- php artisan install:api

### creo il controller Api
- php artisan make:controller Api/ProjectController

### pubblico il file routes/api.php (da eseguire) COMANDO NON RICONOSCIUTO (creo manualmente il file config/cors.php)
- php artisan route:publish api

### creo il collegamento su public alla cartella storage/app/public
- php artisan storage:link