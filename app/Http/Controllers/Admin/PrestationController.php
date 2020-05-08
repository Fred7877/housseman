<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Transaction;
use Yajra\DataTables\Facades\DataTables;

/**
 * Class TransactionController
 * @package App\Http\Controllers
 */
class PrestationController extends Controller
{
    public function index()
    {
        return view('admin.prestation.index');
    }
}
