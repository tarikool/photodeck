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


    public function getHashtags($string) {
        $hashtags= FALSE;
        preg_match_all("/(#\w+)/u", $string, $matches);
        if ($matches) {
            $hashtagsArray = array_count_values($matches[0]);
            $hashtags = array_keys($hashtagsArray);
        }
        return $hashtags;
    }

}
