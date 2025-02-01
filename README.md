# Laravel CRM

## Project Overview

This project is a **Laravel-based Project Management application** designed for managing users, clients, projects, and tasks for SaaS and remote teams. It includes basic **CRUD functionality** for each model, user permission management, and seeded fake data for testing. The application now also exposes API endpoints for project management, integrates with Twitter Trends using Livewire, and includes automated tests.

### Features

- **User Management**: CRUD functionality for managing users.
- **Client Management**: CRUD functionality for managing clients.
- **Project Management**: CRUD functionality for managing projects, including dedicated API endpoints for external integrations.
- **Task Management**: CRUD functionality for managing tasks.
- **Permission-Based Access Control**: Admin and User permissions with specific restrictions (permission-based, not role-based).
- **Soft Deletes**: All models support soft deletes.
- **Pagination**: CRUD operations are paginated for improved user experience.
- **Factories & Seeders**: Factories generate fake data for testing purposes.
- **API Endpoints**: Exposes RESTful API endpoints for managing projects.
- **Twitter Trends Integration**: Consumes the [Twitter Trends API](https://rapidapi.com/alexanderxbx/api/twitter-api45) using Livewire. Trends are displayed dynamically with robust error handling and fallback messages.
- **Automated Testing**: A suite of automated tests is included (note: not all tests are passing yet).

---

## Deployment and Infrastructure

- **Custom Domain**: The site is deployed on a custom domain: [checkthis.page](https://checkthis.page).
- **Branching Strategy**:
  - **Main Branch**: For ongoing development.
  - **Prod Branch**: Only deployments are made from the prod branch.
- **Daily Backups**: Backups are managed daily by DigitalOcean to ensure data safety and quick recovery.

---

## Installation

Follow these steps to set up the project on your local environment:

### Prerequisites

- PHP 8.0+
- Laravel 11+
- Composer
- Node.js & npm (for frontend asset compilation)
- SQLite (or configure another database in your `.env` file)

### Steps

1. **Clone the repository:**

   ```bash
   git clone https://github.com/programmerinyourarea/yet-another-crm.git
   cd yet-another-crm
   composer install
   php artisan key:generate
   npm install && npm run dev
   ```

2. **Configure Your Database:**

   Update your `.env` file with your database connection details.

3. **Run Migrations and Seed the Database:**

   ```bash
   php artisan migrate:fresh --seed
   ```

4. **Serve the Application:**

   ```bash
   php artisan serve
   ```

5. **Generate the ERD (Optional):**

   ```bash
   php artisan erd:generate
   ```

---

## API Usage

The application exposes RESTful API endpoints for managing projects. Below are example cURL commands:

### List All Projects

```bash
curl -X GET http://localhost:8000/api/projects \
  -H "Accept: application/json"
```

### Create a New Project

```bash
curl -X POST http://localhost:8000/api/projects \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -d '{
        "title": "Test Project",
        "description": "This is a test project.",
        "user_id": 1,
        "client_id": 2,
        "deadline_at": "2025-12-31",
        "status": "open"
      }'
```

### Show a Specific Project

```bash
curl -X GET http://localhost:8000/api/projects/1 \
  -H "Accept: application/json"
```

### Update a Project

```bash
curl -X PATCH http://localhost:8000/api/projects/1 \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -d '{"title": "Updated Project Title", "status": "in progress"}'
```

### Delete a Project

```bash
curl -X DELETE http://localhost:8000/api/projects/1 \
  -H "Accept: application/json"
```

---

## Twitter Trends Integration

The project integrates with the [Twitter Trends API](https://rapidapi.com/alexanderxbx/api/twitter-api45) using Livewire. Trending topics are displayed dynamically on the dashboard. In case of API errors, the application gracefully displays fallback messages, ensuring a seamless user experience.

---

## Testing

Automated tests are included to ensure functionality and quality. Note that not all tests are passing at the moment, but work is ongoing to improve test coverage and stability.

Run tests with:

```bash
php artisan test
```

---

## License

This project is open-source under the [MIT License](LICENSE).

---

Feel free to contribute, open issues, or provide feedback!
```
