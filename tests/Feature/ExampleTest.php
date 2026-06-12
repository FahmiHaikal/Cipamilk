<?php

namespace Tests\Feature;

use Database\Seeders\CipaMilkSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(CipaMilkSeeder::class);
    }

    public function test_landing_page_returns_catalog_with_product_detail_links(): void
    {
        $response = $this->get('/');

        $response
            ->assertOk()
            ->assertSee('Katalog Produk UMKM')
            ->assertSee('Yoghurt Botol Ciyo')
            ->assertSee('/katalog/yoghurt-botol-ciyo', false)
            ->assertSee('shopping_cart');
    }

    public function test_product_detail_page_returns_qr_product_content_and_navigation(): void
    {
        $response = $this->get('/katalog/yoghurt-botol-ciyo');

        $response
            ->assertOk()
            ->assertSee('Yoghurt Botol Ciyo')
            ->assertSee('Rp 8.000')
            ->assertSee('Yoghurt Ciyoo')
            ->assertSee('Deskripsi Produk')
            ->assertSee('Mungkin Anda Suka');
    }
}
