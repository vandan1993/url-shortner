<?php

namespace App\Http\Controllers;

use AshAllenDesign\ShortURL\Facades\ShortURL as SFU;
use Illuminate\Support\Facades\Validator;

use AshAllenDesign\ShortURL\Models\ShortURL as SU;

use Illuminate\Http\Request;

class MagicUrl extends Controller
{
    public function shortUrl(Request $request)
    {
        Validator::make($request->all(), [
                'url' => 'required|url',
                'singleuse' => 'required|boolean'
            ])->stopOnFirstFailure()->validate();
        
        $data = $request->all();

        $url = $data['url'];
        
        $shortURLObject = SFU::destinationUrl($url)->make();
        $shortURL = $shortURLObject->default_short_url;
        dd($shortURLObject);
    }
}
