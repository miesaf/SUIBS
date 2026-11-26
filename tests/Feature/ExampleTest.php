<?php

namespace Tests\Feature;

use App\Models\Borrower;
use App\Models\Inventory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_landing_and_auth_pages_load(): void
    {
        $this->get('/')->assertOk()->assertSee('S U I B S');
        $this->get('/login')->assertOk();
        $this->get('/register')->assertOk();
        $this->get('/password/reset')->assertOk();
    }

    public function test_guests_are_sent_to_login(): void
    {
        foreach (['/home', '/borrower', '/borrower/create', '/inventory', '/inventory/create', '/inventory-delete/1'] as $url) {
            $this->get($url)->assertRedirect('/login');
        }
    }

    public function test_register_login_and_logout(): void
    {
        $this->post('/register', [
            'name' => 'A', 'email' => 'a@example.com', 'password' => 'secret1', 'password_confirmation' => 'secret1',
        ])->assertRedirect('/home');
        $this->assertAuthenticated();

        $this->get('/logout')->assertRedirect('/');
        $this->assertGuest();

        $this->post('/login', ['email' => 'a@example.com', 'password' => 'wrong'])->assertSessionHasErrors('email');
        $this->post('/login', ['email' => 'a@example.com', 'password' => 'secret1'])->assertRedirect('/home');
    }

    public function test_inventory_crud(): void
    {
        $this->actingAs(User::factory()->create());

        $this->post('/inventory', [])->assertSessionHasErrors(['item', 'location']);
        $this->post('/inventory', ['item' => 'Ball', 'location' => 'Store'])->assertRedirect('/inventory');
        $item = Inventory::firstOrFail();
        $this->get('/inventory')->assertOk()->assertSee('Ball');
        $this->get("/inventory/{$item->id}/edit")->assertOk()->assertSee('Store');
        $this->put("/inventory/{$item->id}", ['item' => 'Net', 'location' => 'Hall'])->assertRedirect('/inventory');
        $this->assertSame('Net', $item->fresh()->item);
        $this->get("/inventory-delete/{$item->id}")->assertRedirect('/inventory');
        $this->assertSame(0, Inventory::count());
        $this->get('/inventory')->assertSee('No Data to Display');
    }

    public function test_borrower_crud(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $data = ['name' => 'Ali', 'phonenum' => '0123', 'position' => 'Student', 'inventoriy_id' => 1, 'user_id' => $user->id];

        $this->post('/borrower', [])->assertSessionHasErrors(['name', 'phonenum', 'position', 'inventoriy_id', 'user_id']);
        $this->post('/borrower', $data)->assertRedirect('/borrower');
        $b = Borrower::firstOrFail();
        $this->get('/borrower')->assertOk()->assertSee('Ali');
        $this->get("/borrower/{$b->id}/edit")->assertOk();
        $this->put("/borrower/{$b->id}", ['name' => 'Abu'] + $data)->assertRedirect('/borrower');
        $this->assertSame('Abu', $b->fresh()->name);
        $this->get("/borrower-delete/{$b->id}")->assertRedirect('/borrower');
        $this->assertSame(0, Borrower::count());
        $this->get('/borrower-delete/999')->assertNotFound();
    }
}
