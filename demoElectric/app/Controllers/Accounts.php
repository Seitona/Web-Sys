<?php

namespace App\Controllers;

use App\Models\CustomerAccountModel;
use CodeIgniter\Database\Exceptions\DatabaseException;

class Accounts extends BaseController
{
    protected CustomerAccountModel $customerModel;

    public function __construct()
    {
        $this->customerModel = new CustomerAccountModel();
    }

    public function index()
    {
        if (! session()->get('is_logged_in')) {
            return redirect()->to('/login')->with('error', 'Please login first to view accounts.');
        }

        $keyword = $this->request->getGet('search');
        $status = $this->request->getGet('status');
        $type = $this->request->getGet('type');
        $perPage = 10;

        try {
            if ($keyword) {
                $accounts = $this->customerModel->searchAccounts($keyword, $perPage);
            } elseif ($status) {
                $accounts = $this->customerModel->getAccountsByStatus($status, $perPage);
            } elseif ($type) {
                $accounts = $this->customerModel->getAccountsByType($type, $perPage);
            } else {
                $accounts = $this->customerModel->getAccountsPaginated($perPage);
            }

            $totalAccounts = $this->customerModel->getTotalAccounts();
            $activeAccounts = $this->customerModel->getCountByStatus('active');
            $inactiveAccounts = $this->customerModel->getCountByStatus('inactive');
            $suspendedAccounts = $this->customerModel->getCountByStatus('suspended');
            $databaseError = null;
        } catch (DatabaseException $e) {
            $accounts = [];
            $totalAccounts = 0;
            $activeAccounts = 0;
            $inactiveAccounts = 0;
            $suspendedAccounts = 0;
            $databaseError = 'Cannot connect to the database. Please start MySQL in XAMPP and import electric_company (4).sql.';
        }

        return view('accounts/index', [
            'title' => 'Customer Accounts - Puihaha Electric',
            'page' => 'accounts',
            'accounts' => $accounts,
            'pager' => $this->customerModel->pager,
            'total_accounts' => $totalAccounts,
            'active_accounts' => $activeAccounts,
            'inactive_accounts' => $inactiveAccounts,
            'suspended_accounts' => $suspendedAccounts,
            'current_page' => $this->request->getGet('page') ?? 1,
            'search_keyword' => $keyword,
            'filter_status' => $status,
            'filter_type' => $type,
            'database_error' => $databaseError,
        ]);
    }

    public function show($id)
    {
        if (! session()->get('is_logged_in')) {
            return redirect()->to('/login')->with('error', 'Please login first to view accounts.');
        }

        $account = $this->customerModel->find($id);

        if (! $account) {
            return redirect()->to('/accounts')->with('error', 'Account not found');
        }

        return view('accounts/show', [
            'title' => 'Account Details - Puihaha Electric',
            'page' => 'accounts',
            'account' => $account,
        ]);
    }
}
