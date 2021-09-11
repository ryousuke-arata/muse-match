<?php
  namespace Tests\Feature\Controllers;

  use Tests\TestCase;
  use App\Models\Person;
  use App\Models\Post;
  use Database\Seeders\GenreSeeder;

  class ControllerTest extends TestCase 
  {

      public function test_login()
      {
          $request = $this->get('user-top');
          $request->assertStatus(200);

          $user = Person::factory()->create();
          $request = $this->actingAs($user)->withSession(['banned' => false])->post('login-top');
          $request->assertStatus(200);

          $request = $this->post('new-top');
          $request->assertStatus(500);

          $request = $this->get('index');
          $request->assertStatus(200);
      }

      public function post_test()
      {
          $request = $this->get('index');
          $request->assertStatus(200);
      }
  }