# Wingie Enuygun (WEG)

#### To-Do Planning App

---
## Installation

### Step 1: Clone the repository
```bash
git clone git@github.com:ahmetbedir/enuygun.git
```

### Step 2: Install dependencies
```bash
cd enuygun

composer install
```

### Step 3: Create .env file
```bash
cp .env.example .env
```

### Step 4: Generate application key
```bash
php artisan key:generate
```

### Step 5: Create database
```bash
mysql -u root -p
```
```sql
CREATE DATABASE enuygun;
```

### Step 6: Migrate database and seed
```bash
php artisan migrate --seed
```

### Step 7: Fetch tasks from Provider APIs
```bash
php artisan app:fetch-tasks
```

### Step 8: Run the application
```bash
php artisan serve
```
