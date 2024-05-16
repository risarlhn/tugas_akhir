<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_dapat_login_dengan_email_dan_password_yang_benar()
    {
        // Membuat user untuk diuji login
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        // Data form untuk login
        $loginData = [
            'email' => 'test@example.com',
            'password' => 'password',
        ];

        // Mengirimkan request POST untuk login
        $response = $this->post('/login', $loginData);

        // Assert bahwa status code adalah 302 (redirect) yang menunjukkan login berhasil
        $response->assertStatus(302);

        // Assert bahwa user telah terautentikasi
        $this->assertAuthenticated();
    }

    public function test_user_tidak_dapat_login_dengan_email_dan_password_salah()
    {
        // Data form untuk login dengan kredensial yang salah
        $loginData = [
            'email' => 'email@salah.com',
            'password' => 'password-salah',
        ];

        // Mengirimkan request POST untuk login
        $response = $this->post('/login', $loginData);

        // Assert bahwa status code adalah 302 (redirect) yang menunjukkan login gagal
        $response->assertStatus(302);

        // Assert bahwa user tidak terautentikasi
        $this->assertGuest();
    }
    
}