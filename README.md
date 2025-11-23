# Laravel + React Content Management System (CMS)

This project is a mini Content Management System built using:

- **Laravel 12** — Backend REST API + Public Website (Blade)
- **React 18+** — Admin Panel (Dashboard)
- **MySQL** — Database

The system includes authentication, post management, page management, media uploading, and a public-facing website.

---

## ✅ Deliverables Checklist

- [x] `/backend` — Laravel API + Blade UI  
- [x] `/admin` — React Admin Panel  
- [x] Database migrations  
- [ ] `.env.example` (to be added)  
- [x] README file  

---

# 🚀 Project Setup Guide

This system contains **two separate applications**.

---

# 1️⃣ Backend Setup (Laravel 12)

### Step 1 — Go to backend folder
```bash
cd backend
```

### Step 2 — Install PHP dependencies
```bash
composer install
```

### Step 3 — Install Node dependencies
```bash
npm install
```

### Step 4 — Create `.env`
```bash
cp .env.example .env
```

Update these fields in `.env`:
```
DB_DATABASE=cms_db
DB_USERNAME=root
DB_PASSWORD=
```

### Step 5 — Generate App Key
```bash
php artisan key:generate
```

### Step 6 — Migrate + Seed
```bash
php artisan migrate --seed
```

Default Admin User:
- Email: **admin@cms.com**
- Password: **password**

### Step 7 — Start Laravel Server
```bash
php artisan serve
```

Backend URL → **http://127.0.0.1:8000**

---

# 2️⃣ React Admin Panel Setup (React 18+)

### Step 1 — Navigate to admin
```bash
cd admin
```

### Step 2 — Install dependencies
```bash
npm install
```

### Step 3 — Create `.env`
Create file at: `/admin/.env`

Add:
```
REACT_APP_API_BASE_URL=http://127.0.0.1:8000/api
```

### Step 4 — Start React Server
```bash
npm run dev
```

Admin Panel URL → **http://localhost:5173**

---

# 🔐 Login Credentials

| Panel | URL | Email | Password |
|-------|------|--------|-----------|
| Admin Panel | http://localhost:5173/login | admin@example.com | password |
| Public Website | http://127.0.0.1:8000 | N/A | N/A |

---

# 📂 Folder Structure

```
cms-project/
│
├── backend/      # Laravel API + Blade public site
│   ├── app/
│   ├── database/
│   ├── routes/
│   └── ...
│
└── admin/        # React Admin Panel
    ├── src/
    ├── pages/
    ├── components/
    └── ...
```

---

# 📤 Push to GitHub

```bash
git add .
git commit -m "Added README.md"
git push
```

---

# 🎉 Done!
Your project is fully documented and ready to submit.
