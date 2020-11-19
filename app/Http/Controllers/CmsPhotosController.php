<?php

namespace App\Http\Controllers;

use App\Models\CmsPhoto;
use Illuminate\Http\Request;
use Log;
use Debugbar;

class CmsPhotosController extends Controller {

    public function upload(Request $request) {

        $input = $request->all();
        
        Log::info($input);

        if (!empty($request->get('bit_id'))) {
        	$cms_bit = \App\Models\CmsBit::find($request->get('bit_id'));
        }
        
        $ids = array();

        foreach ($request->file('photos') as $photo) {

            // Define input, path, filename, extension

            $extension = $photo->getClientOriginalExtension();

            $name = $photo->getClientOriginalName();

            $new_name = md5(time().uniqid()).'.'.$photo->getClientOriginalExtension();

				// Saving CmsPhoto to DB

				$cms_photo = new \App\Models\CmsPhoto;
				if (!empty($cms_bit)) {
					$cms_photo['bit_id'] = $cms_bit->id;
				} else {
					$cms_photo['random'] = $input['random'];
				}
				$cms_photo['filename'] = $new_name;
				$cms_photo->save();

				// Creating Dir
				$uploaded_filename = public_path('nuotraukos').'/'.$cms_photo->id.'/'.$new_name;
				
            // Saving original file

            $store = $photo->move(public_path('nuotraukos').'/'.$cms_photo->id,$new_name);

				/*
				Generate Sizes
				crop. 200x200 fixed
				large. 900x900 
				small. 500x500
				sthumb. 150x150
				thumb. 300x300
				xlarge. 1600x1600
				*/

				// Fit. crop. 200x200
				\Image::make($uploaded_filename)->fit(
					200, 
					200
				)->save('nuotraukos/'.$cms_photo->id.'/crop.'.$new_name);

				// Resize. large. 900x900
				\Image::make($uploaded_filename)->resize(
					900, 
					900, 
					function ($constraint) {
						$constraint->aspectRatio();
						$constraint->upsize();
					}
				)->save('nuotraukos/'.$cms_photo->id.'/large.'.$new_name);

				// Resize. small. 500x500
				\Image::make($uploaded_filename)->resize(
					500, 
					500, 
					function ($constraint) {
						$constraint->aspectRatio();
						$constraint->upsize();
					}
				)->save('nuotraukos/'.$cms_photo->id.'/small.'.$new_name);

				// Resize. sthumb. 150x150
				\Image::make($uploaded_filename)->resize(
					150, 
					150, 
					function ($constraint) {
						$constraint->aspectRatio();
						$constraint->upsize();
					}
				)->save('nuotraukos/'.$cms_photo->id.'/sthumb.'.$new_name);

				// Resize. thumb. 300x300
				\Image::make($uploaded_filename)->resize(
					300, 
					300, 
					function ($constraint) {
						$constraint->aspectRatio();
						$constraint->upsize();
					}
				)->save('nuotraukos/'.$cms_photo->id.'/thumb.'.$new_name);

				// Resize. xlarge. 2600x2600
				\Image::make($uploaded_filename)->resize(
					1600, 
					1600, 
					function ($constraint) {
						$constraint->aspectRatio();
						$constraint->upsize();
					}
				)->save('nuotraukos/'.$cms_photo->id.'/xlarge.'.$new_name);

				$ids[] = $cms_photo->id;

			}

		if (!empty($ids)) {
         $cms_photos = \App\Models\CmsPhoto::whereIn('id', $ids)->get();
      } else {
         $cms_photos = '';
      }
      return view('/cms_photos/upload', compact('cms_photos'));

	}

   public function destroy($id) {
		


		// Remove form Database
      $cms_bit_photo = \App\Models\CmsPhoto::findOrFail($id);

		$cms_bit_photo->delete();

		// Remove files and dir

		$dir = public_path('nuotraukos').'/'.$id;

		if (file_exists($dir)) {
			array_map('unlink', glob("$dir/*.*"));
			rmdir($dir);
		}

      return 'success';

   }

}