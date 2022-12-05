<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Category\StoreCategoryRequest;
use App\Http\Requests\API\V1\Category\UpdateCategoryRequest;
use App\Http\Resources\API\V1\Category\CategoryCollection;
use App\Http\Resources\API\V1\Category\CategoryResource;
use App\Models\API\V1\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        return new CategoryCollection(Category::all());
    }

    public function store(StoreCategoryRequest $request)
    {
        $Category = new Category($request->all());

        if ($request->hasFile('icon_image')) {
            $image = $request->file('icon_image');
            $ext = $image->extension();
            $file = time().'.'.$ext;
            $image->storeAs('public/Category', $file);
            $Category->icon_image = $file;
        }

        $Category->save();

        return response()->json([
            'res' => true, //Retorna una respuesta
            'data' => $Category, //retorna toda la data
            'msg' => 'Guardado correctamente' //Retorna un mensaje
        ],201);
    }

    public function show(Category $CategoryId)
    {
        return response()->json(new CategoryResource($CategoryId),200);
    }

    public function update(UpdateCategoryRequest $request, $CategoryId)
    {
        $Category=Category::findOrFail($CategoryId);
        if ($request->hasFile('icon_image')){
            if (File::exists("storage/Category/".$Category->icon_image)) {
                File::delete("storage/Category/".$Category->icon_image);
            }
            $image = $request->file('icon_image');
            $ext = $image->extension();
            $file = time().'.'.$ext;
            $image->storeAs('public/Category', $file);
            $Category->icon_image = $file;

            $request['icon_image'] = $Category->icon_image;
        }

        $Category->update([
            'title' =>$request->title,
            "description"=>$request->description,
            //$request->all(),
            "icon_image"=>$Category->icon_image
        ]);
        
        return (new CategoryResource($Category))
        ->additional(['msg' => 'Actualizado correctamente'])
        ->response()
        ->setStatusCode(202);
    }

    public function destroy(Category $request, $CategoryId)
    {
        $Category = Category::findOrFail($CategoryId);
        
        if (File::exists("storage/Category/".$Category->icon_image)) {
            File::delete("storage/Category/".$Category->icon_image);
        }

        $Category->delete();
        
        return response()->json([
            'res' => true, //Retorna una respuesta
            'data' => $Category, //retorna toda la data
            'message' => 'Eliminado correctamente'
        ],200);
        //204 No Content
    }
}
