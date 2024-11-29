# Laravel SaaS Project Management

## Project Overview

This project is a **Laravel-based Project Management application** designed for managing users, clients, projects, and tasks for SaaS and remote teams. It includes basic **CRUD functionality** for each model, user permission management, and seeded fake data for testing.

### Features:
- **User Management**: CRUD functionality for managing users.
- **Client Management**: CRUD functionality for managing clients.
- **Project Management**: CRUD functionality for managing projects.
- **Task Management**: CRUD functionality for managing tasks.
- **Permission-Based Access Control**: Admin and User permissions, with restrictions on what users can do based on their permissions (not role-based).
- **Soft Deletes**: All models support soft deletes.
- **Pagination**: All CRUD operations are paginated for better user experience.
- **Factories & Seeders**: Factories for generating fake data for testing purposes.

---

## Installation

Follow these steps to get the project up and running on your local environment:

### Prerequisites:
- PHP 8.0+ 
- Laravel 11+
- Composer
- SQLite (or configure another database in `.env`)

### Steps:

1. Clone the repository:

   ```bash
   git clone https://github.com/programmerinyourarea/yet-another-crm.git
   cd yet-another-crm
   composer install
   npm install && npm run dev
   ```
2. Connect db of your choice

3. Seed db and serve
 ```bash
    php artisan migrate:fesh --seed
    php artisan serve
```

4. Create ERD
    ```bash
    php artisan erd:generate
    ```
    

### Presentation/Website:
1. https://mwa-1-0ikbpb0.gamma.site/
