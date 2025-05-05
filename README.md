

### ✅ **README.md**

```markdown
# E-Commerce Backend API (Laravel)

This is a Laravel-based backend system for a basic e-commerce platform that supports product management with multiple images, cart functionality, and basic CMS dashboard views.

---

## 📌 Features

### Phase 1:
- ✅ Product CRUD (Create, Read, Update, Delete)
- ✅ Upload and manage multiple images for each product
- ✅ GET API to retrieve product listings with images

### Phase 2:
- ✅ Add product to cart (via POST API)
- ✅ Cart item listing in both API and CMS
- ✅ Backend CMS view to show products added to the cart

---

## 📦 Tech Stack

- **Backend Framework**: Laravel 10+
- **Database**: MySQL 8+
- **Language**: PHP 8+
- **Admin Panel**: Integrated with clean UI (AdminLTE/Bootstrap-based)
- **API Documentation**: Postman Collection Included
- **Payment Gateway Integration**: (Optional placeholder for future integration)

---

## 📂 Project Structure

```

ecommerce-backend1/
├── app/
│   ├── Http/
│   └── Models/
├── database/
│   └── migrations/
├── public/
├── resources/
│   └── views/
├── routes/
│   ├── api.php
│   └── web.php
├── .env.example
├── composer.json
└── README.md

````

---

## 🚀 API Endpoints

### 🔍 Product APIs
| Method | Endpoint | Description |
|--------|----------|-------------|
| GET    | `/api/products` | Fetch all products with multiple images |
| POST   | `/api/products` | Add a new product (with images) |
| PUT    | `/api/products/{id}` | Update a product |
| DELETE | `/api/products/{id}` | Delete a product |

### 🛒 Cart APIs (User ID is hardcoded to `1`)
| Method | Endpoint | Description |
|--------|----------|-------------|
| POST   | `/api/cart/add` | Add product to cart |
| GET    | `/api/cart` | View cart items |
| PUT    | `/api/cart/{id}` | Update quantity in cart |
| DELETE | `/api/cart/{id}` | Remove item from cart |

---

## 🛠️ Setup Instructions

### 1. Clone the repository:
```bash
git clone https://github.com/SandeepSDE-eng/ecommerce-backend1.git
cd ecommerce-backend1
````

### 2. Install dependencies:

```bash
composer install
```

### 3. Create `.env` file:

```bash
cp .env.example .env
```

Update DB credentials in `.env` file.

### 4. Run database migrations:

```bash
php artisan migrate
```

### 5. Import sample DB (optional):

Use provided SQL backup:
[Google Drive SQL File](https://drive.google.com/file/d/1vJ97EhtZyavqAuUEiK9rD8HBb125Awup/view?usp=sharing)

### 6. Start the server:

```bash
php artisan serve
```


Admin Credintial 

Username-admin@example.com
Passwrod-password123

---

## 📘 Postman Collection

You can find the full Postman API collection [here](https://drive.google.com/file/d/1vJ97EhtZyavqAuUEiK9rD8HBb125Awup/view?usp=sharing).

---

## 🔐 Admin CMS

* Login page for admin
* Manage Products (CRUD)
* View all Cart Items (User ID = 1)

---

## ⚠️ Notes

* Code follows Laravel best practices.
* Exception handling and validation implemented in API.
* File upload is handled securely and stored in public disk.
* Neat UI for admin panel with clear navigation and intuitive UX.

---


## 👨‍💻 Developed by

**Sandeep Yadav**
Backend Developer | Laravel & API Specialist
📧 [LinkedIn](https://linkedin.com) (Add yours)

---


