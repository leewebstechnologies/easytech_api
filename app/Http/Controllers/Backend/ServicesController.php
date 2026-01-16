<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ServicesController extends Controller
{
     public function AllServices() {
        $services = Services::latest()->get();
        return view('backend.services.all_services', compact('services'));
    }

    // End Method

    public function AddServices() {
        return view('backend.services.add_services');
    }

     public function StoreServices(Request $request) {
        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(688, 436)->save(public_path('upload/services/'.$name_gen));
            $save_url = 'upload/services/'.$name_gen;

            Services::create([
                'services_name' => $request->services_name,
                'slug' => strtolower(str_replace('', '-', $request->services_name)),
                'services_short' => $request->services_short,
                'services_desc' => $request->services_desc,
                'icon' => $request->icon,
                'image' => $save_url,
            ]);
        }

          $notification = array(
            'message' => 'Services Inserted Successfully!',
            'alert-type' => 'success'
        );


        return redirect()->route('all.services')->with($notification);
    }

    // End Method

      public function EditServices($id) {
        $services = Services::find($id);
        return view('backend.services.edit_services', compact('services'));
    }

    // End Method

     public function UpdateServices(Request $request) {
        $services_id = $request->id;
        $services = Services::find($services_id);

        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(688, 436)->save(public_path('upload/services/'.$name_gen));
            $save_url = 'upload/services/'.$name_gen;

            if (file_exists(public_path($services->image))) {
                @unlink(public_path($services->image));
            }

             $services->update([
                'services_name' => $request->services_name,
                'slug' => strtolower(str_replace('', '-', $request->services_name)),
                'services_short' => $request->services_short,
                'services_desc' => $request->services_desc,
                'icon' => $request->icon,
                'image' => $save_url,
            ]);


          $notification = array(
            'message' => 'Services Updated With Image Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.services')->with($notification);
        } else {
            $services->update([
                'services_name' => $request->services_name,
                'slug' => strtolower(str_replace('', '-', $request->services_name)),
                'services_short' => $request->services_short,
                'services_desc' => $request->services_desc,
                'icon' => $request->icon,
            ]);


             $notification = array(
            'message' => 'Services Updated Without Image Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.services')->with($notification);

        }



    }

    // End Method
      public function DeleteServices($id) {
        $item = Services::find($id);
        $img = $item->image;
        unlink($img);

        Services::find($id)->delete();

         $notification = array(
            'message' => 'Services Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);



    }



}
