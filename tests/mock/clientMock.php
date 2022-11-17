<?php

use App\Models\Client;
use PHPUnit\Framework\TestCase;
use App\Http\Controllers\ClientController;

class clientMock extends TestCase {
    public function mockClientsIndex() {
        $mockRepo = $this->createMock(ClientController::class);
        $mockRepo->method('index')->willReturn(Client::all());
        $users = $mockRepo->index();
        $this->assertEquals($users, Client::all());
    }
}