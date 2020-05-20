<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePrestationRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\Prestation;
use Illuminate\Http\Request;
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

    public function create()
    {
        return view('admin.prestation.create');
    }

    public function edit(Prestation $prestation)
    {
        return view('admin.prestation.edit', compact('prestation'));
    }

    public function update(Request $request, Prestation $prestation)
    {
        $prestation->update($request->all());

        return redirect()->route('prestation.index')->with('success','Prestation updated successfully!');
    }

    public function store(StorePrestationRequest $request)
    {
        Prestation::create($request->all());

        return redirect()->route('prestation.index')->with('success','Prestastion created successfully!');
    }

    public function delete(Prestation $prestation)
    {
        if(request()->ajax()){

            $prestation->delete();

            return 'ok';
        }

        return '';
    }

    public function list()
    {
        if(request()->ajax()) {
            return DataTables::eloquent(Prestation::query())->toJson();
        }

        return view('admin.prestation.index');
    }
}
