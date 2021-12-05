<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmailApiTest extends TestCase
{
    /**
     * Test validation
     *
     * @return void
     */
    public function test_validation()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->post('/api/v1/send-mail', []);
        $response->assertStatus(422);
    }

    /**
     * Test Email Validation
     *
     * @return void
     */
    public function test_valid_mail()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->post('/api/v1/send-mail', [
            'to' => 'cd',
            'subject' => 'ss',
            'body' => 'sdwf'
        ]);

        $this->assertEquals("The to must be a valid email address.", $response->json()['errors']['to'][0]);
        $response->assertStatus(422);
    }
    /**
     * Test Email Sent
     *
     * @return void
     */
    public function test_mail_sent()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->post('/api/v1/send-mail', [
            'to' => 'cd@sd.con',
            'subject' => 'ss',
            'body' => 'sdwf'
        ]);
        $this->assertEquals("Your mail has been sent", $response->json()['message']);
        $response->assertStatus(200);
    }

}
