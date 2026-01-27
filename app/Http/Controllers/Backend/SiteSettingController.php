<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    public function SiteSetting() {
        $site = SiteSetting::firstOrFail();
        return view('backend.setting.site_setting', compact('site'));
    }
    // End Method

    public function UpdateSiteSetting(Request $request) {
        $setting_id = $request->id;
        $setting = SiteSetting::find($setting_id);

        $setting->update([
                'address' => $request->address,
                'email' => $request->email,
                'phone' => $request->phone,
                'facebook' => $request->facebook,
                'linkedin' => $request->linkedin,
                'twitter' => $request->twitter,
                'instagram' => $request->instagram,
                'youtube' => $request->youtube,
                'footer_message' => $request->footer_message,
            ]);


          $notification = array(
            'message' => 'Setting Updated Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


}
