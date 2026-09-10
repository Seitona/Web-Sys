<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index()
    {
        $users = [
            ['username' => 'admin', 'name' => 'Alex Reyes', 'role' => 'Administrator'],
            ['username' => 'maria', 'name' => 'Maria Santos', 'role' => 'Cashier'],
            ['username' => 'john', 'name' => 'John Cruz', 'role' => 'Cashier'],
            ['username' => 'lea', 'name' => 'Lea Garcia', 'role' => 'Staff'],
            ['username' => 'mark', 'name' => 'Mark Dela Rosa', 'role' => 'Staff'],
        ];

        return view('users', ['users' => $users]);
    }
}
