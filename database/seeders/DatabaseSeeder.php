<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Service;
use App\Models\Vendor;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Categories
        $venue = Category::create([
            'name' => 'Venue',
            'icon' => 'location_on',
            'color' => '#FF6B6B',
            'slug' => 'venue',
        ]);

        $makeup = Category::create([
            'name' => 'Makeup',
            'icon' => 'face',
            'color' => '#FF9EBE',
            'slug' => 'makeup',
        ]);

        $photographer = Category::create([
            'name' => 'Photographers',
            'icon' => 'camera_alt',
            'color' => '#FFC107',
            'slug' => 'photographers',
        ]);

        $decor = Category::create([
            'name' => 'Decor',
            'icon' => 'favorite',
            'color' => '#E91E63',
            'slug' => 'decor',
        ]);

        $catering = Category::create([
            'name' => 'Catering',
            'icon' => 'restaurant',
            'color' => '#FF8C42',
            'slug' => 'catering',
        ]);

        $henna = Category::create([
            'name' => 'Henna Artist',
            'icon' => 'brush',
            'color' => '#8B4513',
            'slug' => 'henna-artist',
        ]);

        $carRental = Category::create([
            'name' => 'Car Rental',
            'icon' => 'directions_car',
            'color' => '#3498DB',
            'slug' => 'car-rental',
        ]);

        $stationery = Category::create([
            'name' => 'Wedding Stationery',
            'icon' => 'mail',
            'color' => '#F8BBD0',
            'slug' => 'wedding-stationery',
        ]);

        // Create Services
        $services = [
            Service::create(['name' => 'Indoor', 'description' => 'Indoor venue']),
            Service::create(['name' => 'Outdoor', 'description' => 'Outdoor venue']),
            Service::create(['name' => 'A/C', 'description' => 'Air conditioned']),
            Service::create(['name' => 'Vegan Options', 'description' => 'Vegan catering']),
            Service::create(['name' => 'Bridal Makeup', 'description' => 'Bridal makeup service']),
            Service::create(['name' => 'Party Makeup', 'description' => 'Party makeup service']),
            Service::create(['name' => 'Traditional', 'description' => 'Traditional henna designs']),
            Service::create(['name' => 'Modern', 'description' => 'Modern henna designs']),
        ];

        // Create Vendors for Venue Category
        $venue1 = Vendor::create([
            'name' => 'Royal Banquet',
            'email' => 'royal@banquet.com',
            'phone' => '03001234567',
            'image' => 'https://via.placeholder.com/300x300?text=Royal+Banquet',
            'rating' => 4.8,
            'is_verified' => true,
            'city' => 'Lahore',
            'price' => 500000,
            'category_id' => $venue->id,
            'description' => 'Premium banquet hall with modern facilities and elegant decor. Perfect for weddings and large events.',
        ]);
        $venue1->services()->attach([1, 2, 3]);

        $venue2 = Vendor::create([
            'name' => 'Dream Palace',
            'email' => 'dream@palace.com',
            'phone' => '03009876543',
            'image' => 'https://via.placeholder.com/300x300?text=Dream+Palace',
            'rating' => 4.5,
            'is_verified' => true,
            'city' => 'Karachi',
            'price' => 450000,
            'category_id' => $venue->id,
            'description' => 'Beautiful palace venue for your special day with stunning architecture.',
        ]);
        $venue2->services()->attach([1, 3]);

        // Create Vendors for Makeup Category
        $makeup1 = Vendor::create([
            'name' => 'Glam Studio',
            'email' => 'glam@studio.com',
            'phone' => '03112345678',
            'image' => 'https://via.placeholder.com/300x300?text=Glam+Studio',
            'rating' => 4.9,
            'is_verified' => true,
            'city' => 'Islamabad',
            'price' => 50000,
            'category_id' => $makeup->id,
            'description' => 'Professional makeup artists with 10+ years experience in bridal and party makeup.',
        ]);
        $makeup1->services()->attach([5, 6]);

        $makeup2 = Vendor::create([
            'name' => 'Beauty Angels',
            'email' => 'beauty@angels.com',
            'phone' => '03115554444',
            'image' => 'https://via.placeholder.com/300x300?text=Beauty+Angels',
            'rating' => 4.6,
            'is_verified' => true,
            'city' => 'Faisalabad',
            'price' => 40000,
            'category_id' => $makeup->id,
            'description' => 'Expert bridal and party makeup services with premium products.',
        ]);
        $makeup2->services()->attach([5, 6]);

        // Create Vendors for Photographer Category
        $photo1 = Vendor::create([
            'name' => 'Moment Captures',
            'email' => 'moment@captures.com',
            'phone' => '03215555555',
            'image' => 'https://via.placeholder.com/300x300?text=Moment+Captures',
            'rating' => 4.7,
            'is_verified' => true,
            'city' => 'Lahore',
            'price' => 80000,
            'category_id' => $photographer->id,
            'description' => 'Professional wedding and event photography with cinematic videography.',
        ]);

        $photo2 = Vendor::create([
            'name' => 'Lens Magic',
            'email' => 'lens@magic.com',
            'phone' => '03216666666',
            'image' => 'https://via.placeholder.com/300x300?text=Lens+Magic',
            'rating' => 4.8,
            'is_verified' => true,
            'city' => 'Multan',
            'price' => 75000,
            'category_id' => $photographer->id,
            'description' => 'Creative wedding photography and videography with drone shots.',
        ]);

        // Create Vendors for Decor Category
        $decor1 = Vendor::create([
            'name' => 'Elegant Decor',
            'email' => 'elegant@decor.com',
            'phone' => '03317777777',
            'image' => 'https://via.placeholder.com/300x300?text=Elegant+Decor',
            'rating' => 4.6,
            'is_verified' => true,
            'city' => 'Lahore',
            'price' => 120000,
            'category_id' => $decor->id,
            'description' => 'Stunning event decoration with floral arrangements and lighting.',
        ]);

        // Create Vendors for Catering Category
        $catering1 = Vendor::create([
            'name' => 'Royal Feast',
            'email' => 'royal@feast.com',
            'phone' => '03325555555',
            'image' => 'https://via.placeholder.com/300x300?text=Royal+Feast',
            'rating' => 4.6,
            'is_verified' => true,
            'city' => 'Karachi',
            'price' => 350000,
            'category_id' => $catering->id,
            'description' => 'Exquisite catering for weddings and events with diverse menu options.',
        ]);
        $catering1->services()->attach([4]);

        // Create Vendors for Henna Category
        $henna1 = Vendor::create([
            'name' => 'Mehndi Magic',
            'email' => 'mehndi@magic.com',
            'phone' => '03425555555',
            'image' => 'https://via.placeholder.com/300x300?text=Mehndi+Magic',
            'rating' => 4.9,
            'is_verified' => true,
            'city' => 'Lahore',
            'price' => 15000,
            'category_id' => $henna->id,
            'description' => 'Traditional and modern henna designs by expert artists.',
        ]);
        $henna1->services()->attach([7, 8]);

        // Create Vendors for Car Rental Category
        $car1 = Vendor::create([
            'name' => 'Luxury Cars',
            'email' => 'luxury@cars.com',
            'phone' => '03525555555',
            'image' => 'https://via.placeholder.com/300x300?text=Luxury+Cars',
            'rating' => 4.7,
            'is_verified' => true,
            'city' => 'Islamabad',
            'price' => 20000,
            'category_id' => $carRental->id,
            'description' => 'Premium luxury car rental for weddings with professional drivers.',
        ]);

        // Create Vendors for Stationery Category
        $stationery1 = Vendor::create([
            'name' => 'Paper Dreams',
            'email' => 'paper@dreams.com',
            'phone' => '03625555555',
            'image' => 'https://via.placeholder.com/300x300?text=Paper+Dreams',
            'rating' => 4.5,
            'is_verified' => true,
            'city' => 'Multan',
            'price' => 8000,
            'category_id' => $stationery->id,
            'description' => 'Beautiful wedding invitations and custom stationery designs.',
        ]);

        echo "\n✅ Database seeded successfully!\n";
        echo "📊 Created:\n";
        echo "   - 8 Categories\n";
        echo "   - 8 Services\n";
        echo "   - 12 Vendors\n\n";
    }
}
