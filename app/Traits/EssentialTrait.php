<?php

namespace App\Traits;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait EssentialTrait{


    public function storeImage(Request $request, $field_name, $old_image = null, $directory = null)
    {
        $directory = $directory ?: 'uploads';

        if ($request->hasFile( $field_name)){
            Storage::disk('public')->delete( $old_image);
            return $request->file( $field_name)->store( $directory, 'public');
        }

    }

}
