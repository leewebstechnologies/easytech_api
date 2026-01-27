<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class AboutController extends Controller
{
    public function About() {
        $about = About::firstOrFail();;
        return view('backend.about.about', compact('about'));
    }
    // End Method

     public function UpdateAbout(Request $request) {
        $about_id = $request->id;
        $about = About::find($about_id);

        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(960, 679)->save(public_path('upload/about/'.$name_gen));
            $save_url = 'upload/about/'.$name_gen;

            if (file_exists(public_path($about->image))) {
                @unlink(public_path($about->image));
            }

             $about->update([
                'title' => $request->title,
                'description' => $request->description,
                'phone' => $request->phone,
                'setup_growth' => $request->setup_growth,
                'problem_solving' => $request->problem_solving,
                'passive_income' => $request->passive_income,
                'goal_achiever' => $request->goal_achiever,
                'image' => $save_url,
            ]);


          $notification = array(
            'message' => 'About Updated With Image Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
        } else {

          $about->update([
                'title' => $request->title,
                'description' => $request->description,
                'phone' => $request->phone,
                'setup_growth' => $request->setup_growth,
                'problem_solving' => $request->problem_solving,
                'passive_income' => $request->passive_income,
                'goal_achiever' => $request->goal_achiever,
            ]);


            $notification = array(
            'message' => 'About Updated Without Image Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

        }
    }
    // End Method
    
}
