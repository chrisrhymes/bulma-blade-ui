<?php

namespace Tests;

use Tests\Models\User;

class DBTestCase extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        User::create([
            'name' => 'Dave',
            'email' => 'dave@example.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);
        User::create([
            'name' => 'George',
            'email' => 'george@example.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);
    }

    protected function defineDatabaseMigrations()
    {
        $this->loadLaravelMigrations();
    }
}
