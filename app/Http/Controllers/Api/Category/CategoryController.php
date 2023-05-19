<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function allCategories(Request $request)
    {
        $this->output["categories"] = [];
        try {
            $categories = Category::all();
            $this->output["categories"] = $categories;
        }catch (\Exception $exception){
            $this->output["message"] = $exception->getMessage();
            $this->output["status"]  = 0;
        }
        return $this->output;
    }

    public function singleCategory(Request $request)
    {
        $this->output["category"] = [];
        try {
            $category_id = $request->id;

            if (empty($category_id))
                throw new \Exception("Kategori bilgisi göndermek zorunludur.");

            $category = Category::with(["news", "news.category", "news.user"])->find($category_id);

            $this->output["category"] = $category;
        }catch (\Exception $exception){
            $this->output["message"] = $exception->getMessage();
            $this->output["status"]  = 0;
        }
        return $this->output;
    }

}
