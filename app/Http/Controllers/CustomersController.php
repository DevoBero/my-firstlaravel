<?php

namespace App\Http\Controllers;

use App\Company;
use App\Customer;
use Illuminate\Http\Request;


class CustomersController extends Controller
{
    public function list()
    {
        $activeCustomers = Customer::active()->get();
        $inactiveCustomers = Customer::inactive()->get();
        $companies = Company::latest()->get();

        return view('internals.customers',
        [
            'activeCustomers' => $activeCustomers,
            'inactiveCustomers' => $inactiveCustomers,
            'companies' => $companies,
        ]);
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'active' => 'required',
            'company_id' => 'required',
        ]);

        Customer::create($data);

        return back();
    }

    // public function companyAdd(){

    //     $data = request()->validate([
    //         'name' => 'required|min:3',
    //         'phone' => 'required',
    //     ]);

    //     Company::create($data);

    //     return back();
    // }

    // public function companyShow(){

    //     return view('internals.company');
    // }
}

?>
