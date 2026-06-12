<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Umkm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UmkmApprovalTest extends TestCase
{
    use RefreshDatabase;

    public function test_new_umkm_registration_is_pending_by_default()
    {
        $response = $this->post('/register', [
            'name' => 'Toko Baru',
            'email' => 'tokobaru@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'role' => 'umkm',
        ]);

        $response->assertRedirect();
        
        $user = User::where('email', 'tokobaru@example.com')->first();
        $this->assertNotNull($user);
        $this->assertEquals('umkm', $user->role);
        
        $umkm = $user->umkm;
        $this->assertNotNull($umkm);
        $this->assertEquals('pending', $umkm->status);
    }

    public function test_unapproved_umkm_cannot_access_dashboard()
    {
        $user = User::factory()->create(['role' => 'umkm']);
        $umkm = Umkm::create([
            'user_id' => $user->id,
            'nama_umkm' => 'Toko Pending',
            'whatsapp' => '12345678',
            'status' => 'pending',
        ]);

        $response = $this->actingAs($user)->get('/umkm/dashboard');
        
        // Should redirect to pending-approval
        $response->assertRedirect(route('umkm.pending'));
    }

    public function test_approved_umkm_can_access_dashboard()
    {
        $user = User::factory()->create(['role' => 'umkm']);
        $umkm = Umkm::create([
            'user_id' => $user->id,
            'nama_umkm' => 'Toko Approved',
            'whatsapp' => '12345678',
            'status' => 'approved',
        ]);

        $response = $this->actingAs($user)->get('/umkm/dashboard');
        
        $response->assertOk();
    }

    public function test_admin_can_approve_umkm()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $user = User::factory()->create(['role' => 'umkm']);
        $umkm = Umkm::create([
            'user_id' => $user->id,
            'nama_umkm' => 'Toko Pending',
            'whatsapp' => '12345678',
            'status' => 'pending',
        ]);

        $response = $this->actingAs($admin)->post("/admin/umkms/{$umkm->id}/approve");

        $response->assertRedirect();
        $this->assertEquals('approved', $umkm->fresh()->status);
    }

    public function test_admin_can_reject_umkm_reverts_user_role_to_konsumen()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $user = User::factory()->create(['role' => 'umkm']);
        $umkm = Umkm::create([
            'user_id' => $user->id,
            'nama_umkm' => 'Toko Pending',
            'whatsapp' => '12345678',
            'status' => 'pending',
        ]);

        $response = $this->actingAs($admin)->post("/admin/umkms/{$umkm->id}/reject");

        $response->assertRedirect();
        
        // User role should be reverted to konsumen
        $this->assertEquals('konsumen', $user->fresh()->role);
        
        // Umkm record should be deleted
        $this->assertNull(Umkm::find($umkm->id));
    }

    public function test_admin_can_delete_umkm_removes_both_umkm_and_user()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $user = User::factory()->create(['role' => 'umkm']);
        $umkm = Umkm::create([
            'user_id' => $user->id,
            'nama_umkm' => 'Toko Approved',
            'whatsapp' => '12345678',
            'status' => 'approved',
        ]);

        $response = $this->actingAs($admin)->delete("/admin/umkms/{$umkm->id}");

        $response->assertRedirect();
        
        // Both records should be deleted
        $this->assertNull(Umkm::find($umkm->id));
        $this->assertNull(User::find($user->id));
    }
}
