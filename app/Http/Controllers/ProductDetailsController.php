<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductDetailsController extends Controller
{
    public function test(Request $request)
    {
        if($request->ajax())
        {
            $SkuArray = $request->input('sku');
            $ColorArray = $request->input('selColor');
            $SizeArray = $request->input('selSize');
            

            $arr = array();

            foreach($ColorArray as $key)
            {
                $arr[] .= $key;
            }

            for ($i=0; $i < count($arr); $i++) { 
                $arr[$i] .= $SizeArray[$i];
            }

            $arr2 = array_unique($arr);
            if(count($arr) != count($arr2))
            {
                return response('1',422);
            }


            $this->validate(
                $request,
                [
                    'sku.*' => 'min:3|max:10', /* không trùng tiêu đề khác */
                ],
                [
                    'sku.*.min'=>'Min',
                    'sku.*.max'=>'Max'
                ]
            );
 
        }
    }

}
