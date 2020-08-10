<?php

namespace App\Http\Controllers\Housekeeping;

use App\Helpers\Rcon;
use App\Http\Controllers\Controller;
use App\Http\Requests\createWordFilterRequest;
use App\Http\Requests\updateWordFilterRequest;
use App\Models\Website\Wordfilter;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class WordfilterController extends Controller
{

    public function index()
    {
        return view('pages.housekeeping.wordfilter.index');
    }


    public function create()
    {
        return view('pages.housekeeping.wordfilter.create');
    }


    public function store(createWordFilterRequest $request)
    {
        $wordfilter = WordFilter::create([
            'key' => $request->get('key'),
            'replacement' => $request->get('replacement'),
            'hide' => $request->get('hide'),
            'report' => $request->get('report'),
            'mute' => $request->get('mute'),
        ]);
        Rcon::reloadWordFilter();

        return redirect()->route('housekeeping.wordfilter.edit', [$request->get('key')]);
    }


    public function edit(Wordfilter $wordfilter)
    {
        $view = view('pages.housekeeping.wordfilter.edit');
        $view->filter = $wordfilter;

        return $view;
    }


    public function update(updateWordFilterRequest $request, Wordfilter $wordfilter)
    {
        $wordfilter->update([
            'key' => $request->get('key'),
            'replacement' => $request->get('replacement'),
            'hide' => $request->get('hide'),
            'report' => $request->get('report'),
            'mute' => $request->get('mute'),
        ]);
        Rcon::reloadWordFilter();

        return redirect()->route('housekeeping.wordfilter.edit', [$wordfilter]);
    }

    public function destroy($id)
    {
        //
    }

    public function indexAjax(Datatables $datatables)
    {
        $builder = Wordfilter::query()->select('key', 'replacement', 'hide', 'report', 'mute');

        return $datatables->eloquent($builder)
            ->addColumn('action', function ($filter) {
                return '<a href="' . route('housekeeping.wordfilter.edit', [$filter->key]) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i>' . __('Edit') .'</a>';
            })->rawColumns(['action'])->make(true);
    }
}
