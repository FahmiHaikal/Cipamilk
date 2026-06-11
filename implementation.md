# Implementation Guide: O2O QR Code Product Detail Feature

## 1. Feature Overview

The goal of this feature is to allow users to scan a static QR code printed on physical product packaging and be redirected to a dynamic Product Detail Page (PDP) on the web application.

**Constraints & Scope:**

- No Admin Panel required at this stage.
- Data mapping is strictly static per product variant using URL slugs (e.g., `/p/yoghurt-botol-ciyo`).
- The frontend must be highly optimized for mobile devices (Mobile-First Design) using the existing Tailwind CSS configuration.
- Dummy data must be injected via Seeders.

## 2. Execution Steps for Agentic AI

Please execute the following steps sequentially. Ensure you check existing files before creating new ones to avoid duplication.

### Step 1: Database and Model Updates

1. **Migration**: Check the existing `products` table migration. If it does not have a `slug` column, create a new migration to add it: `$table->string('slug')->unique()->after('name');`.
2. **Model**: Update `app/Models/Product.php`.
    - Add `'slug'` to the `$fillable` array.
    - Implement Implicit Route Binding by adding the method:
        ```php
        public function getRouteKeyName()
        {
            return 'slug';
        }
        ```

### Step 2: Database Seeder Injection

1. Update `database/seeders/CipaMilkSeeder.php` (or create it if it doesn't exist but is referenced).
2. Insert/Update the product data to include specific slugs and images. Use the following exact mappings:
    - Name: "Yoghurt Botol Ciyo", Slug: `yoghurt-botol-ciyo`, Image: `assets/images/products/yoghurt_botol_ciyo_image_products.png`
    - Name: "Es Lilin Yoghurt", Slug: `es-lilin-yoghurt`, Image: `assets/images/products/es_lilin_yogurth_image_products.png`
    - Name: "Keju Mozarella Lokal", Slug: `keju-mozarella-lokal`, Image: `assets/images/products/keju_mozarella_lokal_image_products.png`
    - Name: "Pie Susu Lembang", Slug: `pie-susu-lembang`, Image: `assets/images/products/pie_susu_lembang_image_products.png`
    - Name: "Susu Pasteurisasi Segar", Slug: `susu-pasteurisasi-segar`, Image: `assets/images/products/susu_pasteurisasi_segar_image_products.png`
3. Ensure the Seeder correctly links products to an existing UMKM record (create a dummy UMKM if necessary).

### Step 3: Routing & Controller

1. **Route**: Update `routes/web.php` to include a clean, short URL for the QR code:

    ```php
    Route::get('/p/{product}', [\App\Http\Controllers\ProductController::class, 'show'])->name('product.detail');
    Controller: Create or update app/Http/Controllers/ProductController.php.
    ```

    Implement the show(Product $product) method.

    Eager load the related UMKM data to prevent N+1 queries: $product->load('umkm');.

    Return the view products.show passing the $product variable.

### Step 4: Frontend Implementation (Mobile-First UI)

1. Create a new blade view: resources/views/products/show.blade.php.

2. UI/UX Requirements (Tailwind CSS):

    Layout: Extend your main application layout (layouts.app or similar). Ensure a maximum width container suitable for mobile (e.g., max-w-md mx-auto).

    Hero Image: Display the product image at the very top, full width, with a clean aspect ratio.

    Product Info: Below the image, display the product name (bold, large, sans-serif), the price (formatted in IDR), and the description. Add ample whitespace (padding/margin) for breathability.

    UMKM Profile Card: Create a subtle section or card displaying the UMKM name and details associated with the product.

    Styling: Minimalist, clean, using white backgrounds, subtle borders, and clear typography. Do not add any interactive "Add to Cart" or "WhatsApp" buttons yet; keep it as a static digital catalog.

3. Acceptance Criteria
   Running php artisan migrate:fresh --seed works without errors and populates the database with the correct slugs.

    Visiting http://localhost:8000/p/yoghurt-botol-ciyo successfully loads the product detail page.

    The UI looks professional and is fully responsive, specifically tailored for mobile screens.
