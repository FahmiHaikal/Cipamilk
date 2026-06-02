<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('nama_produk');
        });

        $this->backfillExistingProductSlugs();
        $this->makeSlugRequired();

        Schema::table('products', function (Blueprint $table) {
            $table->unique('slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropUnique(['slug']);
            $table->dropColumn('slug');
        });
    }

    private function backfillExistingProductSlugs(): void
    {
        $slugByProductName = [
            'susu pasteurisasi segar' => 'susu-pasteurisasi-segar',
            'keju mozarella lokal' => 'keju-mozarella-lokal',
            'yoghurt botol ciyoo (aneka rasa)' => 'yoghurt-botol-ciyo',
            'yoghurt botol ciyo' => 'yoghurt-botol-ciyo',
            'es lilin yoghurt' => 'es-lilin-yoghurt',
            'pie susu lembang' => 'pie-susu-lembang',
        ];

        $usedSlugs = [];

        DB::table('products')
            ->select('id', 'nama_produk')
            ->orderBy('id')
            ->get()
            ->each(function (object $product) use ($slugByProductName, &$usedSlugs): void {
                $normalizedName = Str::of($product->nama_produk)->lower()->toString();
                $baseSlug = $slugByProductName[$normalizedName] ?? Str::slug($product->nama_produk);
                $slug = $baseSlug ?: "produk-{$product->id}";

                if (in_array($slug, $usedSlugs, true)) {
                    $slug = "{$slug}-{$product->id}";
                }

                DB::table('products')
                    ->where('id', $product->id)
                    ->update(['slug' => $slug]);

                $usedSlugs[] = $slug;
            });
    }

    private function makeSlugRequired(): void
    {
        match (DB::getDriverName()) {
            'mysql', 'mariadb' => DB::statement('ALTER TABLE products MODIFY slug VARCHAR(255) NOT NULL'),
            'pgsql' => DB::statement('ALTER TABLE products ALTER COLUMN slug SET NOT NULL'),
            'sqlsrv' => DB::statement('ALTER TABLE products ALTER COLUMN slug NVARCHAR(255) NOT NULL'),
            default => null,
        };
    }
};
