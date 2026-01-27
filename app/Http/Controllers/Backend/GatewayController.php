<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gatewayone;
use App\Models\GateWayTwo;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class GatewayController extends Controller
{
    public function GateWayOne() {
        $gateone = Gatewayone::find(1);
        return view('backend.gateway.gateway_one', compact('gateone'));
    }
    // End Method

    public function UpdateGateWayOne(Request $request) {
        $gateone_id = $request->id;
        $gateone = Gatewayone::find($gateone_id);

        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(960, 679)->save(public_path('upload/gateway/'.$name_gen));
            $save_url = 'upload/gateway/'.$name_gen;

            if (file_exists(public_path($gateone->image))) {
                @unlink(public_path($gateone->image));
            }

             $gateone->update([
                'title' => $request->title,
                'description' => $request->description,
                'phone' => $request->phone,
                'image' => $save_url,
            ]);


          $notification = array(
            'message' => 'Gateway Updated With Image Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
        } else {

           $gateone->update([
                'title' => $request->title,
                'description' => $request->description,
                'phone' => $request->phone
           ]);

            $notification = array(
            'message' => 'Gateway Updated With Image Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

        }



    }
    // End Method

    public function GateWayTwo() {
        $gatetwo = GateWayTwo::find(1);
        return view('backend.gateway.gateway_two', compact('gatetwo'));
    }
    // End Method

    public function UpdateGateWayTwo(Request $request) {
        $gatetwo_id = $request->id;
        $gatetwo = GateWayTwo::find($gatetwo_id);

        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(1414, 1236)->save(public_path('upload/gateway/'.$name_gen));
            $save_url = 'upload/gateway/'.$name_gen;

            if (file_exists(public_path($gatetwo->image))) {
                @unlink(public_path($gatetwo->image));
            }

             $gatetwo->update([
                'title' => $request->title,
                'description' => $request->description,
                'project' => $request->project,
                'review' => $request->review,
                'experience' => $request->experience,
                'image' => $save_url,
            ]);


          $notification = array(
            'message' => 'Gateway Updated With Image Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

        } else {

          $gatetwo->update([
                'title' => $request->title,
                'description' => $request->description,
                'project' => $request->project,
                'review' => $request->review,
                'experience' => $request->experience
            ]);


          $notification = array(
            'message' => 'Gateway Updated With Image Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

        }



    }
    // End Method

}
