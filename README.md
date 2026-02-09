# 🎉 EventWally - Event Planner API

A complete Laravel 10 REST API for event planning services. Built with clean architecture, easy to understand, and ready to deploy!

## ✨ Features

✅ **RESTful API** - Clean and consistent API design  
✅ **8 Event Categories** - Venue, Makeup, Photographers, Decor, Catering, Henna, Car Rental, Stationery  
✅ **12 Sample Vendors** - Pre-populated with realistic data  
✅ **Search & Filter** - By city, category, and keywords  
✅ **Featured Vendors** - Top-rated and verified vendors  
✅ **SQLite Database** - No MySQL setup needed!  
✅ **CORS Enabled** - Ready for Flutter/React apps  
✅ **Admin Routes** - Protected CRUD operations  

---

## 🚀 Quick Start (3 Steps!)

### 1. **Install Dependencies** (if not done)
```bash
cd d:\project\event_planner_fresh
composer install
```

### 2. **Setup Database**
```bash
# Database file already created!
# Migrations already run!
# Data already seeded!
```

### 3. **Start Server**
```bash
php artisan serve
```

**Server runs at:** `http://localhost:8000`

---

## 🧪 Test Your API

### Option 1: Visual Test Dashboard
Open in your browser:
```
http://localhost:8000/test-api.html
```
Click buttons to test each endpoint! 🎯

### Option 2: Browser
Just visit these URLs:
- http://localhost:8000/api/v1/categories
- http://localhost:8000/api/v1/vendors
- http://localhost:8000/api/v1/vendors/city/Lahore
- http://localhost:8000/api/v1/search?q=makeup

### Option 3: Command Line
```bash
curl http://localhost:8000/api/v1/vendors
```

---

## 📚 API Endpoints

### Base URL
```
http://localhost:8000/api/v1
```

### Public Endpoints (No Auth Required)

| Method | Endpoint | Description | Example |
|--------|----------|-------------|---------|
| GET | `/categories` | Get all categories | All event categories |
| GET | `/categories/{id}` | Get category by ID | Category #1 details |
| GET | `/vendors` | Get all vendors | All vendors with details |
| GET | `/vendors/{id}` | Get vendor by ID | Vendor #1 details |
| GET | `/vendors/city/{city}` | Filter by city | Lahore vendors |
| GET | `/vendors/category/{id}` | Filter by category | All photographers |
| GET | `/vendors/featured` | Top 10 verified vendors | Featured vendors |
| GET | `/search?q={keyword}` | Search vendors | Search "makeup" |

### Admin Endpoints (Require Authentication)

| Method | Endpoint | Description |
|--------|----------|-------------|
| POST | `/admin/vendors` | Create new vendor |
| PUT | `/admin/vendors/{id}` | Update vendor |
| DELETE | `/admin/vendors/{id}` | Delete vendor |
| POST | `/admin/categories` | Create new category |
| PUT | `/admin/categories/{id}` | Update category |
| DELETE | `/admin/categories/{id}` | Delete category |

---

## 📊 Database Structure

### Categories Table
```
- id
- name (Venue, Makeup, etc.)
- icon (Material icon name)
- color (Hex color code)
- slug (URL-friendly name)
- timestamps
```

### Vendors Table
```
- id
- name
- email (unique)
- phone
- image (URL)
- rating (0-5)
- is_verified (boolean)
- city
- price
- category_id (foreign key)
- description
- timestamps
```

### Services Table
```
- id
- name
- description
- timestamps
```

### Service_Vendor (Pivot Table)
```
- service_id
- vendor_id
```

---

## 🎨 Sample Data

### Categories (8)
1. 🏛️ Venue - #FF6B6B
2. 💄 Makeup - #FF9EBE
3. 📷 Photographers - #FFC107
4. 🎨 Decor - #E91E63
5. 🍽️ Catering - #FF8C42
6. ✋ Henna Artist - #8B4513
7. 🚗 Car Rental - #3498DB
8. 💌 Wedding Stationery - #F8BBD0

### Vendors (12)
- **Lahore:** Royal Banquet, Moment Captures, Mehndi Magic, Elegant Decor
- **Karachi:** Dream Palace, Royal Feast
- **Islamabad:** Glam Studio, Luxury Cars
- **Faisalabad:** Beauty Angels
- **Multan:** Lens Magic, Paper Dreams

---

## 📱 Connect Flutter App

Update your Flutter app's API service:

```dart
class ApiService {
  // For emulator/device, use your machine's IP
  static const String baseUrl = 'http://192.168.1.X:8000/api/v1';
  
  // Find your IP:
  // Windows: ipconfig
  // Mac/Linux: ifconfig
}
```

---

## 🔧 Useful Commands

```bash
# View all routes
php artisan route:list

# Clear cache
php artisan cache:clear

# Reset database (WARNING: Deletes all data!)
php artisan migrate:fresh --seed

# View data in tinker
php artisan tinker
>>> App\Models\Vendor::count()
>>> App\Models\Category::all()

# Create new model
php artisan make:model ModelName -m

# Create new controller
php artisan make:controller Api/ControllerName
```

---

## 📂 Project Structure

```
event_planner_fresh/
├── app/
│   ├── Http/Controllers/Api/
│   │   ├── VendorController.php    (9 methods)
│   │   └── CategoryController.php  (5 methods)
│   └── Models/
│       ├── Vendor.php
│       ├── Category.php
│       └── Service.php
├── database/
│   ├── migrations/
│   │   ├── create_categories_table.php
│   │   ├── create_vendors_table.php
│   │   ├── create_services_table.php
│   │   └── create_service_vendor_table.php
│   ├── seeders/
│   │   └── DatabaseSeeder.php
│   └── database.sqlite            (Your database file)
├── routes/
│   └── api.php                    (All API routes)
├── public/
│   └── test-api.html              (API test dashboard)
└── .env                           (Configuration)
```

---

## 🌐 Deploy to cPanel

See the detailed guide: `../CPANEL_DEPLOYMENT.md`

Quick steps:
1. Upload project to cPanel
2. Move `public` folder contents to `public_html`
3. Update `index.php` paths
4. Create `.env` file
5. Run migrations

---

## 🔒 Security Notes

**For Production:**
1. Change `APP_DEBUG=false` in `.env`
2. Change `APP_ENV=production`
3. Use strong `APP_KEY`
4. Enable HTTPS
5. Implement proper authentication
6. Validate all inputs

---

## 📖 API Response Format

### Success Response
```json
{
  "success": true,
  "data": [...],
  "message": "Success message"
}
```

### Error Response
```json
{
  "success": false,
  "message": "Error message"
}
```

---

## 🐛 Troubleshooting

### Port 8000 already in use
```bash
php artisan serve --port=8001
```

### Database not found
```bash
# Create the file
New-Item -Path "database\database.sqlite" -ItemType File
php artisan migrate
```

### CORS errors
Already configured! Check `config/cors.php`

### Can't connect from Flutter
- Use your machine's IP, not `localhost`
- Make sure server is running
- Check firewall settings

---

## 📝 Example API Calls

### Get All Vendors
```bash
curl http://localhost:8000/api/v1/vendors
```

### Get Lahore Vendors
```bash
curl http://localhost:8000/api/v1/vendors/city/Lahore
```

### Search for Makeup
```bash
curl "http://localhost:8000/api/v1/search?q=makeup"
```

### Create New Vendor (Admin)
```bash
curl -X POST http://localhost:8000/api/v1/admin/vendors \
  -H "Content-Type: application/json" \
  -H "Authorization: Bearer YOUR_TOKEN" \
  -d '{
    "name": "New Vendor",
    "email": "new@vendor.com",
    "phone": "03001234567",
    "city": "Lahore",
    "price": 50000,
    "category_id": 1,
    "description": "Amazing services"
  }'
```

---

## 🎯 Next Steps

1. ✅ **Test the API** - Use the test dashboard
2. ✅ **Connect Flutter App** - Update API URL
3. 📱 **Add Authentication** - Laravel Sanctum
4. 🖼️ **Image Upload** - Add file upload
5. ⭐ **Reviews System** - User ratings
6. 💳 **Payment Integration** - Stripe/PayPal
7. 🚀 **Deploy** - cPanel or cloud hosting

---

## 💡 Tips

- **Database Location:** `database/database.sqlite`
- **Logs Location:** `storage/logs/laravel.log`
- **Environment:** `.env` file
- **Routes:** `routes/api.php`
- **Models:** `app/Models/`
- **Controllers:** `app/Http/Controllers/Api/`

---

## 📞 Support

- Laravel Docs: https://laravel.com/docs/10.x
- API Testing: http://localhost:8000/test-api.html
- Deployment Guide: `../CPANEL_DEPLOYMENT.md`

---

## 🎉 You're All Set!

Your EventWally API is ready to use! 

**Quick Test:**
1. Make sure server is running: `php artisan serve`
2. Open: http://localhost:8000/test-api.html
3. Click any "Test" button
4. See the magic happen! ✨

---

**Built with ❤️ using Laravel 10**
