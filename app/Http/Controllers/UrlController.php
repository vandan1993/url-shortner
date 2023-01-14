<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use AshAllenDesign\ShortURL\Facades\ShortURL as SFU;
use AshAllenDesign\ShortURL\Models\ShortURL as SMU;
use App\Traits\HttpResponse;

class UrlController extends Controller
{
    use HttpResponse;

    public function urlResize(Request $request)
    {   
        Validator::make($request->all(), [
            'url' => 'required|url',
            'singleuse' => 'required|boolean'
        ])->stopOnFirstFailure()->validate();
    
    
        $data = $request->all();
        $url = $data['url'];
        $singleuse = $data['singleuse'] ?? null;

        if(SMU::findByDestinationURL($url)->count() < 1){
            $urlObject = SFU::destinationUrl($url);
            if($singleuse == true){
                $urlObject->singleUse();
            }
    
            $url =  $urlObject->make();
            $newUrl = $url->default_short_url;
        }else{
            $urlObject = SMU::findByDestinationURL($url)->first();
            $newUrl = $urlObject->default_short_url;
        }
        return response()->json(["short-url" => $newUrl]);
    }

    public function listAllUrl(){

        return response()->json(SMU::latest()->get()->toArray());
    }

    public function getShortUrl(Request $request){
        
        Validator::make($request->all(), [
            'url' => 'required|url',
        ])->stopOnFirstFailure()->validate();
        
        $data = $request->all();
        $url = $data['url'];

        $response = ['shortUrl' => "" , "destinationUrl" => $url , "singleuse" => false ];
        if(SMU::findByDestinationURL($url)->count() > 0)
        {
            $urlObject = SMU::findByDestinationURL($url)->first();
            $response['shortUrl'] = $urlObject->default_short_url;
            $response['singleuse'] = $urlObject->single_use;
        }
        return response()->json($response);
    }
}
