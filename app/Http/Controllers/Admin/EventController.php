<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Models\Event;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

/**
 * Class InvoiceController
 * @package App\Http\Controllers\Admin
 */
class EventController extends Controller
{
    public function index()
    {
        return view('admin.event.index');
    }

    public function create()
    {
        return view('admin.event.create');
    }

    public function edit(Event $event)
    {
        return view('admin.event.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {

        $event->update($request->only(
            [
                'title',
                'details',
                'begin',
                'end',
            ]
        ));

        return redirect()->route('events.index')->with('success', 'L\' évènement à bien été modifié !');
    }

    public function delete(Event $event)
    {
        if (request()->ajax()) {

            $event->delete();

            return 'ok';
        }

        return '';
    }

    public function store(StoreEventRequest $request)
    {
        Event::create($request->only([
            'title',
            'detail',
            'begin',
            'end'
        ]));

        return redirect()->route('events.index')->with('success', 'Nouvel évènement a été enregistré !');
    }

    public function list()
    {
        if (request()->ajax()) {
            return DataTables::eloquent(Event::query())->toJson();
        }

        return view('admin.user.index');
    }


}
