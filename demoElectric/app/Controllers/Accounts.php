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

    private function requireLogin()
    {
        if (! session()->get('is_logged_in')) {
            return redirect()->to('/login')->with('error', 'Please login first to access the dashboard.');
        }

        return null;
    }

    private function rules(?int $id = null): array
    {
        $accountUniqueRule = 'required|min_length[3]|max_length[50]|is_unique[customer_accounts.account_number';
        $meterUniqueRule = 'required|min_length[3]|max_length[50]|is_unique[customer_accounts.meter_number';

        if ($id) {
            $accountUniqueRule .= ',id,' . $id;
            $meterUniqueRule .= ',id,' . $id;
        }

        $accountUniqueRule .= ']';
        $meterUniqueRule .= ']';

        return [
            'account_number' => $accountUniqueRule,
            'customer_name' => 'required|min_length[2]|max_length[150]',
            'address' => 'required|min_length[5]|max_length[255]',
            'phone' => 'required|min_length[7]|max_length[20]',
            'email' => 'required|valid_email|max_length[150]',
            'meter_number' => $meterUniqueRule,
            'connection_type' => 'required|in_list[residential,commercial,industrial]',
            'status' => 'required|in_list[active,inactive,suspended]',
        ];
    }

    private function accountData(): array
    {
        return [
            'account_number' => $this->request->getPost('account_number'),
            'customer_name' => $this->request->getPost('customer_name'),
            'address' => $this->request->getPost('address'),
            'phone' => $this->request->getPost('phone'),
            'email' => $this->request->getPost('email'),
            'meter_number' => $this->request->getPost('meter_number'),
            'connection_type' => $this->request->getPost('connection_type'),
            'status' => $this->request->getPost('status'),
        ];
    }

    public function index()
    {
        if ($redirect = $this->requireLogin()) {
            return $redirect;
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

    public function create()
    {
        if ($redirect = $this->requireLogin()) {
            return $redirect;
        }

        return view('accounts/form', [
            'title' => 'Add Customer Account - Puihaha Electric Company',
            'page' => 'accounts',
            'account' => [],
            'errors' => session()->getFlashdata('errors') ?? [],
            'action' => base_url('accounts'),
            'buttonText' => 'Create Account',
            'formTitle' => 'Add Customer Account',
        ]);
    }

    public function store()
    {
        if ($redirect = $this->requireLogin()) {
            return $redirect;
        }

        if (! $this->validate($this->rules())) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        try {
            $this->customerModel->insert($this->accountData());
        } catch (DatabaseException $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Cannot save the account. Please check the database connection.');
        }

        return redirect()->to('/accounts')->with('success', 'Customer account created successfully.');
    }

    public function show($id)
    {
        if ($redirect = $this->requireLogin()) {
            return $redirect;
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

    public function edit($id)
    {
        if ($redirect = $this->requireLogin()) {
            return $redirect;
        }

        $account = $this->customerModel->find($id);

        if (! $account) {
            return redirect()->to('/accounts')->with('error', 'Account not found.');
        }

        return view('accounts/form', [
            'title' => 'Edit Customer Account - Puihaha Electric Company',
            'page' => 'accounts',
            'account' => $account,
            'errors' => session()->getFlashdata('errors') ?? [],
            'action' => base_url('accounts/' . $id),
            'buttonText' => 'Update Account',
            'formTitle' => 'Edit Customer Account',
        ]);
    }

    public function update($id)
    {
        if ($redirect = $this->requireLogin()) {
            return $redirect;
        }

        $account = $this->customerModel->find($id);

        if (! $account) {
            return redirect()->to('/accounts')->with('error', 'Account not found.');
        }

        if (! $this->validate($this->rules((int) $id))) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        try {
            $this->customerModel->update($id, $this->accountData());
        } catch (DatabaseException $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Cannot update the account. Please check the database connection.');
        }

        return redirect()->to('/accounts/' . $id)->with('success', 'Customer account updated successfully.');
    }

    public function delete($id)
    {
        if ($redirect = $this->requireLogin()) {
            return $redirect;
        }

        $account = $this->customerModel->find($id);

        if (! $account) {
            return redirect()->to('/accounts')->with('error', 'Account not found.');
        }

        try {
            $this->customerModel->delete($id);
        } catch (DatabaseException $e) {
            return redirect()->to('/accounts')->with('error', 'Cannot delete the account. Please check the database connection.');
        }

        return redirect()->to('/accounts')->with('success', 'Customer account deleted successfully.');
    }
}
