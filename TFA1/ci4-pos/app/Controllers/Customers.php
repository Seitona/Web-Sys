<?php

namespace App\Controllers;

class Customers extends BaseController
{
    public function index()
    {
        $customers = [
            ['name' => 'Kim Namjoon', 'email' => 'namjoon@example.com', 'phone' => '09171234567'],
            ['name' => 'Kim Seokjin', 'email' => 'seokjin@example.com', 'phone' => '09182345678'],
            ['name' => 'Min Yoongi', 'email' => 'yoongi@example.com', 'phone' => '09193456789'],
            ['name' => 'Jung Hoseok', 'email' => 'hoseok@example.com', 'phone' => '09204567890'],
            ['name' => 'Park Jimin', 'email' => 'jimin@example.com', 'phone' => '09215678901'],
        ];

        return view('customers', ['customers' => $customers]);
    }
}
