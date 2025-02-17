# Laravel Leaderboard System

This is a Laravel-based leaderboard system that tracks user activities and assigns points based on their completed activities. Users are ranked based on their total points, and the ranking is stored in the database without using `GROUP BY` or `COUNT`. The leaderboard supports filtering by **Day, Month, and Year**, searching by user ID, and recalculating ranks when new data is added.

---

## 📌 Features
- Tracks user activity and awards **+20 points** per completed action.
- **Leaderboard Sorting**: Displays users ranked by their total points.
- **Filters**: View leaderboard by **Day, Month, or Year**.
- **Search**: Find a user by **User ID**.
- **Recalculate Rankings**: Update user ranks when new data is added.
- **Seeder**: Populate the database with dummy user activity data.

---

## 🚀 Installation Guide

### **Step 1: Clone the Repository**
```bash
  git clone https://github.com/NayanRaval00/leaderboard.git
  cd leaderboard
```

### **Step 2: Install Dependencies**
```bash
  composer install
```

### **Step 3: Configure Environment**
1. Copy the `.env.example` file and rename it to `.env`
```bash
  cp .env.example .env
```
2. Generate an application key:
```bash
  php artisan key:generate
```
3. Set up the database in the `.env` file:
```
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=leaderboard_db
  DB_USERNAME=root
  DB_PASSWORD=your_password
```

### **Step 4: Set Up Database**
```bash
  php artisan migrate --seed
```
This will create the necessary tables and populate them with dummy data.

### **Step 5: Start the Server**
```bash
  php artisan serve
```
Visit `http://127.0.0.1:8000/leaderboard` in your browser.

---

## 📊 Usage

### **1️⃣ Viewing the Leaderboard**
- The leaderboard shows **users sorted by total points**.
- Users with the same points share the same rank.

### **2️⃣ Filtering Options**
You can filter the leaderboard by:
- **Day**: Shows points earned today.
- **Month**: Shows points earned in the current month.
- **Year**: Shows points earned in the current year.

### **3️⃣ Searching for a User**
- Enter a **User ID** in the search bar to find a specific user.

### **4️⃣ Recalculating Ranks**
- Click the **Recalculate** button to update user rankings when new activities are added.

---

## 📜 API Endpoints

| Method | Endpoint | Description |
|--------|---------|-------------|
| GET | `/leaderboard` | View the leaderboard |
| GET | `/leaderboard?filter=day` | View today's rankings |
| GET | `/leaderboard?filter=month` | View monthly rankings |
| GET | `/leaderboard?filter=year` | View yearly rankings |
| POST | `/recalculate` | Recalculate ranks |

---

## 🛠️ Technologies Used
- **Laravel** (Backend Framework)
- **Blade Templates** (Frontend View)
- **MySQL** (Database)
- **Bootstrap/Tailwind** (Styling)
