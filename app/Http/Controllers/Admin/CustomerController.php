<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Models\Customer;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

/**
 * Class InvoiceController
 * @package App\Http\Controllers\Admin
 */
class CustomerController extends Controller
{
    public function index()
    {
        return view('admin.customer.index');
    }

    public function create()
    {
        return view('admin.customer.create');
    }

    public function edit(Customer $customer)
    {
        return view('admin.customer.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {

        $customer->update($request->all(
            [
                'address',
                'city',
                'country',
                'email',
                'details',
            ]
        ));

        $customer->customerable()->update($request->all(
            [
                'contact_first_name',
                'contact_last_name',
                'siret',
                'name',
            ]
        ));

        return redirect()->route('customers.index')->with('success','The customer updated successfully!');
    }

    public function destroy(Customer $customer)
    {
        if(request()->ajax()){

            $customer->delete();

            return 'ok';
        }

        return '';
    }

    public function store(StoreCustomerRequest $request)
    {
        Db::transaction(function() use($request){
            $organisation = Organization::create($request->all());
            $customer = new Customer($request->only([
                'address',
                'city',
                'country',
                'email',
                'details',
            ]));
            $organisation->customer()->save($customer);
        });

        return redirect()->route('customers.index')->with('success', 'Nouveau client enregistré !');
    }

    public function list()
    {
        if (request()->ajax()) {
            $model = Customer::with('customerable');
            return DataTables::eloquent($model)->toJson();
        }

        return view('admin.user.index');
    }
}
