<?php

namespace PedramDavoodi\Localization\Controllers;

use App\Http\Controllers\Controller;
use PedramDavoodi\Localization\Models\Setting;
use PedramDavoodi\Localization\Requests\SettingUpdateRequest;

class SettingController extends Controller
{

    /**
     * show list of setting of package.
     */
    public function index()
    {
        return view('localization::setting.index')->withSettings(Setting::all());
    }

    /**
     * Update the specified setting in storage.
     */
    public function update(SettingUpdateRequest $request , Setting $setting)
    {
        $setting->update($request->validated());

        return redirect()->back()->withSuccess(___('successUpdate'));
    }

}
