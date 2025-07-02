<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings; // Assuming the model is named Setting and located in App\Models

class SettingController extends Controller
{
    //
     public function index()
    {
        $setting = Settings::first();
        return view('admin.settings.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = Settings::firstOrFail();
        $data = $request->except(['logo', 'favicon']);

        // Upload logo
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time().'_logo.'.$logo->getClientOriginalExtension();
            $logo->move(public_path('upload/settings'), $logoName);
            $data['logo'] = $logoName;
        }

        // Upload favicon
        if ($request->hasFile('favicon')) {
            $favicon = $request->file('favicon');
            $faviconName = time().'_favicon.'.$favicon->getClientOriginalExtension();
            $favicon->move(public_path('upload/settings'), $faviconName);
            $data['favicon'] = $faviconName;
        }

        // Convert short Google Maps URL to embed if needed
        if (!empty($data['map']) && str_contains($data['map'], 'https://maps.app.goo.gl')) {
            $data['map'] = 'https://www.google.com/maps?q=' . urlencode($data['map']) . '&output=embed';
        }

        $setting->update($data);
        return redirect()->back()->with('success', 'Setting berhasil diperbarui');
    }
}
