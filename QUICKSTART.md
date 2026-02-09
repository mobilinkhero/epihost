# ⚡ QUICKSTART - Get Running in 30 Seconds!

## 🎯 Your API is Already Set Up!

Everything is done! Just start the server:

```bash
cd d:\project\event_planner_server\event_planner_fresh
php artisan serve
```

## ✅ What's Already Done:

- ✅ Laravel installed
- ✅ Database created (SQLite)
- ✅ Migrations run
- ✅ Sample data seeded (8 categories, 12 vendors)
- ✅ API routes configured
- ✅ Controllers created
- ✅ Models with relationships

## 🧪 Test Your API (3 Ways)

### 1. Visual Dashboard (Easiest!)
```
http://localhost:8000/test-api.html
```
Click buttons to test! 🎯

### 2. Browser
```
http://localhost:8000/api/v1/vendors
http://localhost:8000/api/v1/categories
http://localhost:8000/api/v1/vendors/city/Lahore
```

### 3. Command Line
```bash
curl http://localhost:8000/api/v1/vendors
```

## 📊 What's Inside?

### Categories (8)
- Venue, Makeup, Photographers, Decor
- Catering, Henna Artist, Car Rental, Stationery

### Vendors (12)
- Across Lahore, Karachi, Islamabad, Faisalabad, Multan
- With ratings, prices, and services

## 🔥 Popular Endpoints

```
GET /api/v1/categories           - All categories
GET /api/v1/vendors              - All vendors
GET /api/v1/vendors/city/Lahore  - Lahore vendors
GET /api/v1/vendors/featured     - Top vendors
GET /api/v1/search?q=makeup      - Search
```

## 📱 Connect Flutter App

```dart
static const String baseUrl = 'http://YOUR_IP:8000/api/v1';

// Find your IP:
// Windows: ipconfig
// Mac: ifconfig
```

## 🚀 Deploy to cPanel?

See: `../CPANEL_DEPLOYMENT.md`

## 🐛 Problems?

**Port busy?**
```bash
php artisan serve --port=8001
```

**Need to reset?**
```bash
php artisan migrate:fresh --seed
```

---

## 🎉 That's It!

Your EventWally API is running!

**Next:** Open http://localhost:8000/test-api.html and start testing! 🚀
