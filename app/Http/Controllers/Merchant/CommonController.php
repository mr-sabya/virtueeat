<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    public function getSubCategory($id)
    {
        $category = Category::findOrFail(intval($id));

        $data = '';

        $sub_categories = SubCategory::where('category_id', $category->id)->get();

        if($sub_categories->count() > 0){
            foreach($sub_categories as $sub_category){
                $data .= '<option value="" selected disbaled>--Select Sub Category--</option>';
                $data .= '<option value="'.$sub_category->id.'">'.$sub_category->name.'</option>';
            }
        }else{
            $data = '<option value="">No Sub Category Found</option>';
        }

        return response()->json(['data' => $data]);
    }
}
