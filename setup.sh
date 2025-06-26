echo "🚀 Starting Laravel Setup..."

# Step 1: Install Composer
composer install

# Step 2: Copy .env
cp .env.example .env

# Step 3: Generate app key
php artisan key:generate

# Step 4: Run migrations and seeders
php artisan migrate --seed