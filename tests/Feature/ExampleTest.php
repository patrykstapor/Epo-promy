<?php

namespace Tests\Feature;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
//    public function test_the_application_returns_a_successful_response(): void
//    {
//        $response = $this->get('/');
//
//        $response->assertStatus(200);
//    }

    public function tworzy_nowego_uzytkownika():\http\Client\Curl\User
    {
        // Przykładowe dane użytkownika
        $dane = [
            'name' => 'Jan Kowalski',
            'email' => 'jan.kowalski@example.com',
            'password' => bcrypt('tajnehaslo'),
        ];

        // Tworzenie użytkownika
        $user = User::create($dane);

        // Sprawdzenie, czy użytkownik został zapisany do bazy
        $this->assertDatabaseHas('users', [
            'email' => 'jan.kowalski@example.com',
        ]);

        // Sprawdzenie, czy pobrany użytkownik ma odpowiednie imię
        $this->assertEquals('Jan Kowalski', $user->name);
        return $user;
    }


    public function tworzy_ticket() : Ticket
    {
        // Tworzymy przykładowego użytkownika do powiązania z ticketem
        $user = User::factory()->create();

        // Dane tiketu
        $dane = [
            'title' => 'Zgłoszenie awarii',
            'description' => 'Nie działa przycisk zamów.',
            'user_id' => $user->id,
        ];

        // Tworzymy ticket
        $ticket = Ticket::create($dane);

        // Sprawdzamy, czy ticket dodał się do bazy
        $this->assertDatabaseHas('tickets', [
            'title' => 'Zgłoszenie awarii',
            'user_id' => $user->id,
        ]);

        // Dodatkowo: sprawdzenie samego obiektu
        $this->assertEquals('Zgłoszenie awarii', $ticket->title);
        return $ticket;
    }




}
