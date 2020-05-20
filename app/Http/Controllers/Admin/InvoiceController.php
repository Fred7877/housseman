<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePrestationRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\Prestation;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

/**
 * Class InvoiceController
 * @package App\Http\Controllers\Admin
 */
class InvoiceController extends Controller
{
    public function index()
    {
        return view('admin.invoice.index');
    }
}
