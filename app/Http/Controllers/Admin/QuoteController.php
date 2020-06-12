<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

/**
 * Class TransactionController
 * @package App\Http\Controllers
 */
class QuoteController extends Controller
{
    public function index()
    {
        return view('admin.quote.index');
    }

    public function create()
    {
        return view('admin.quote.create');
    }

    public function edit(Quote $quote)
    {
        return view('admin.quote.edit', compact('quote'));
    }

    public function update(Request $request, Quote $quote)
    {
        $quote->update($request->all());

        return redirect()->route('quote.index')->with('success','Quote updated successfully!');
    }

    public function store(Request $request)
    {
        Quote::create($request->all());

        return redirect()->route('quote.index')->with('success','Le devis a été créé !');
    }

    public function delete(Quote $quote)
    {
        if(request()->ajax()){

            $quote->delete();

            return 'ok';
        }

        return '';
    }

    public function list()
    {
        if(request()->ajax()) {
            return DataTables::eloquent(Quote::query())->toJson();
        }

        return view('admin.quote.index');
    }
}
