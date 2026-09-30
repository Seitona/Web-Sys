<?php

namespace App\Controllers;

use App\Models\User;
use CodeIgniter\Database\Exceptions\DatabaseException;

class Login extends BaseController
{
    protected User $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function index(): string
    {
        return view('login', [
            'title' => 'Login - Puihaha Electric',
            'page' => 'login',
            'error' => session()->getFlashdata('error'),
        ]);
    }

    public function attempt()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        try {
            $user = $this->userModel->findByEmail($email);
        } catch (DatabaseException $e) {
            session()->setFlashdata('error', 'Cannot connect to the database. Please start MySQL first.');
            return redirect()->back()->withInput();
        }

        if ($user && $this->userModel->verifyPassword($password, $user['password'])) {
            session()->set([
                'is_logged_in' => true,
                'user_id' => $user['id'],
                'user_email' => $email,
                'user_name' => $user['first_name'] . ' ' . $user['last_name'],
            ]);

            return redirect()->to('/accounts');
        }

        session()->setFlashdata('error', 'Invalid email or password.');
        return redirect()->back()->withInput();
    }

    public function logout()
    {
        session()->remove(['is_logged_in', 'user_id', 'user_email', 'user_name']);
        return redirect()->to('/login');
    }
}
