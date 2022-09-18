<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Scopes\CategoryScope;
use App\Http\Requests\Post\PostRequest;
use Illuminate\Database\Eloquent\Builder;

class CategoryController extends Controller
{
    //

    public function categoryList(Request $request)
    {
        if ($request->limit != '') {
            $categories = Category::paginate($request->limit);
        } else {
            $categories = Category::paginate(10);
        }

        return response()->json([
            "categories" => $categories
        ], 200);
    }
}
