<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\System\PlatformSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = PlatformSetting::all()->pluck('value', 'key')->toArray();

        return view('dashboard.admin.settings.index', compact('settings'));
    }

    public function save(Request $request)
    {
        foreach ($request->except('_token') as $key => $value) {
            PlatformSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value, 'updated_by' => Auth::id()]
            );
        }

        return redirect()->back()->with('success', 'Settings saved successfully.');
    }
}
