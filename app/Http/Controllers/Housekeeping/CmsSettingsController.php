<?php

namespace App\Http\Controllers\Housekeeping;

use App\Http\Controllers\Controller;
use App\Models\Website\CmsSettings;
use App\Notifications\GlobalNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class CmsSettingsController extends Controller
{
    public function index()
    {
        $view = view('pages.housekeeping.cms_settings.index');
        $view->settings = CmsSettings::all();

        return $view;
    }


    public function edit($key)
    {
        $view = view('pages.housekeeping.cms_settings.edit');
        $view->cms_setting = CmsSettings::where('key', $key)->first();

        return $view;
    }


    public function update(Request $request, $key)
    {
        $cms_setting = CmsSettings::where('key', $key)->first();
        $cms_setting->update($request->all());

        Auth::user()->notify(new GlobalNotification(__('Cms setting successfully updated'), 'success'));


        return redirect()->route('housekeeping.cms_settings.edit', $key);
    }

    public function indexAjax(Datatables $datatables)
    {
        $builder = CmsSettings::query()->select('key', 'value');

        return $datatables->eloquent($builder)
            ->addColumn('action', function ($cms_settings) {
                return '<a href="' . route('housekeeping.cms_settings.edit', [$cms_settings->key]) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i>' . __('Edit') .'</a>';
            })->rawColumns(['action'])->make(true);
    }

}
