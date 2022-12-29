<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\EmailSettingsFormRequest;
use App\Http\Requests\Settings\SettingsFormRequest;
use App\Settings\EmailSettings;
use App\Settings\GeneralSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{


    public function index(GeneralSettings $settings)
    {
        return view('setting.index', [
            'app_name' => $settings->app_name,
            'app_version' => $settings->app_version,
            'app_url' => $settings->app_url,
            'app_timezone' => $settings->app_timezone,
            'app_active' => $settings->app_active,
            'app_logo' => asset('storage/' . $settings->app_logo)
        ]);
    }


    public function update(SettingsFormRequest $request, GeneralSettings $settings)
    {

        $settings->app_name = $request->app_name;
        $settings->app_version = $request->app_version;
        $settings->app_url = $request->app_url;
        $settings->app_timezone = $request->app_timezone;
        $settings->app_active = $request->boolean('app_active');

        if ($request->hasFile('app_logo')) {

            $oldLogo = $settings->app_logo;

            $settings->app_logo = $request->file('app_logo')->store('settings', ['disk' => 'public']);

            if ($oldLogo && $settings->app_logo) {
                Storage::disk('public')->delete($oldLogo);
            }
        }

        $settings->save();

        return redirect()->back()->with('success', 'Update a éte effectuer avec success');
    }

    public function updateEmail(EmailSettingsFormRequest $request, EmailSettings $settings)
    {

        $settings->mail_mailer = $request->mail_mailer;
        $settings->mail_host = $request->mail_host;
        $settings->mail_port = $request->mail_port;
        $settings->mail_encryption = $request->mail_encryption;

        $settings->mail_from_name = $request->mail_from_name;
        $settings->mail_from_address = $request->mail_from_address;
        $settings->mail_username = $request->mail_username;
        $settings->mail_password = $request->mail_password;

        $settings->save();

        Artisan::call('config:clear');

        upsertEnvironmentValue([
            'mail_mailer' => $settings->mail_mailer,
            'mail_host' => $settings->mail_host,
            'mail_port' => $settings->mail_port,
            'mail_username' => $settings->mail_username,
            'mail_password' => $settings->mail_password,
            'mail_encryption' => $settings->mail_encryption,
            'mail_from_address' => $settings->mail_from_address,
            'mail_from_name' => $settings->mail_from_name,
        ]);

        if (app()->environment('production')) {
            Artisan::call('config:cache');
        }

        return redirect()->back()->with('success', 'Update a éte effectuer avec success');
    }
}
