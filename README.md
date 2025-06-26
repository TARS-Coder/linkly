# 🔗 Linkly - Laravel URL Shortener

**Linkly** is a multi-tenant URL shortening platform built in Laravel. It supports role-based access, company separation, and public link redirection.

---
## ✨ Features

- 🔐 Role-based access (SuperAdmin, Admin, Member)
- 🏢 Company-specific user and URL isolation
- 🔗 URL shortening with public redirection
- 📩 User invitation flow via token

- 📊 Link click tracking (basic)

- 📜 Clean and simple UI (Tailwind CSS)
---

## ⚙️ Requirements

- PHP >= 8.1
- Composer >= 2.8
- Node.js & NPM (for frontend assets, optional)
- Git

---

## 🚀 Quick Setup (Recommended)

```bash
# 1. Clone the repository
git clone https://github.com/TARS-Coder/linkly.git
cd linkly

# 2. Make the setup script executable
chmod +x setup.sh

# 3. Run the setup script (migrates & seeds the DB, generates APP_KEY, etc.)
./setup.sh

# 4. Serve the application (optional if not handled in setup.sh)
php artisan serve

```
---
## For Manual Setup 
Use the following commands 
```bash
git clone https://github.com/TARS-Coder/linkly.git

# Step 1: Install Composer
composer install

# Step 2: Copy exampl .env file
cp .env.example .env

# Step 3: Generate app key
php artisan key:generate

# Step 4: Run migrations and seeders
php artisan migrate --seed

# Step 5: Install npm dependencies
npm install

# Step 6: Build assets
npm run build
```
---

## To Start the installed program
```bash
# Starting Server
php artisan serve
``` 

---

## 🧪 Default Super Admin Credentials

These credentials are seeded automatically on fresh setup:

    Email: superadmin@example.com
    Password: SuperAdmin123


🔒 You can log in and change the credentials from the profile settings after login.

### ✅ Notes:
- Make sure your `setup.sh` file is executable (`chmod +x setup.sh`)

