<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
     public function AllTestimonial() {
        $testimonial = Testimonial::latest()->get();
        return view('backend.testimonial.all_testimonial', compact('testimonial'));
    }

    public function AddTestimonial() {
        return view('backend.testimonial.add_testimonial');
    }
    // End Method

    public function StoreTestimonial(Request $request) {

            Testimonial::create([
                'name' => $request->name,
                'position' => $request->position,
                'message' => $request->message,
            ]);

          $notification = array(
            'message' => 'Testimonial Inserted Successfully!',
            'alert-type' => 'success'
        );


        return redirect()->route('all.testimonial')->with($notification);
    }
    // End Method
    
     public function EditTestimonial($id) {
        $testimonial = Testimonial::find($id);
        return view('backend.testimonial.edit_testimonial', compact('testimonial'));
    }

    // End Method

     public function UpdateTestimonial(Request $request) {
            $testimonial_id = $request->id;
            $testimonial = Testimonial::find($testimonial_id);

            $testimonial->update([
                'name' => $request->name,
                'position' => $request->position,
                'message' => $request->message,
            ]);

          $notification = array(
            'message' => 'Testimonial Updated Successfully!',
            'alert-type' => 'success'
        );


        return redirect()->route('all.testimonial')->with($notification);
    }

    // End Method

     public function DeleteTestimonial($id) {
        Testimonial::find($id)->delete();

         $notification = array(
            'message' => 'Testimonial Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    // End Method

}
