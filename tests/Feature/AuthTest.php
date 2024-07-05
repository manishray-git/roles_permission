<?php

namespace Tests\Feature;

use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
  use RefreshDatabase;
  /**
   * A basic feature test example.
   */



  public function test_registration_fails_with_admin_role()
  {
    $response = $this->postJson('/api/signup', [
      'name' => "manish",
      'email' => "valid@email.com",
      'password' => "validpassword",
      'password_confirmation' => "validpassword",
      'role_id' => Role::Super_Admin
    ]);


    $response->assertStatus(422);
  }


  public function test_registration_succeeds_with_vendor_admin()
  {
    $response = $this->postJson('/api/signup', [
      'name' => "ramesh",
      'email' => "rames@email.com",
      'password' => "ValidPassword",
      'password_confirmation' => "ValidPassword",
      'role_id' => Role::Vendor_Admin
    ]);

    $response->assertStatus(200)->assertJsonStructure([
      'access_token'
    ]);
  }


  public function test_registration_succeeds_with_vendor_Staff()
  {

    $response = $this->postJson('/api/signup', [
      'name' => "rohan",
      'email' => "rohan@gmail.com",
      'password' => "ValidPassword",
      'password_confirmation' => "ValidPassword",
      'role_id' => Role::Vendor_Staff

    ]);

    $response->assertStatus(200)->assertJsonStructure([
      'access_token'
    ]);
  }


  public function test_login_with_admn_role(){


    $response = $this->post('/api/login',[
      'email' => "superadmin@booking.com",
      'password' => "supersecretpassword",
    ]);

    


    $response->assertStatus(200)->assertJsonStructure([
         'user',
         'access_token'
    ]);
  }


  
}
