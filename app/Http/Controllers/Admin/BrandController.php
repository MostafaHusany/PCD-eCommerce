<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    private $target_model;

    public function __construct()
    {
        $this->target_model = new Brand();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = Brand::query();

            if (isset($request->title)) {
                $model->where(function ($query) use ($request) {
                    $query->orWhere('ar_title', 'like', '%' . $request->title . '%');
                    $query->orWhere('en_title', 'like', '%' . $request->title . '%');
                });
            }

            $datatable_model = Datatables::of($model)
            ->addColumn('image', function ($row_object) {
                return view('admin.brands.incs._image', compact('row_object'));
            })
            ->addColumn('actions', function ($row_object) {
                return view('admin.brands.incs._actions', compact('row_object'));
            });
            return $datatable_model->make(true);
        }
        $brands = Brand::all();
        return view('admin.brands.index', compact('brands'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ar_title'        => 'required|unique:brands,ar_title|max:255',
            'en_title'        => 'required|unique:brands,en_title|max:255',
            'ar_description' => 'required|max:2000',
            'en_description' => 'required|max:2000',
            'image'          => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['data' => null, 'success' => false, 'msg' => $validator->errors()]);
        }

        $data       = $request->all();
        $image = $request->file('image')[0];
        $image->store('/public/brands');
        $data['image'] = 'storage/brands/' . $image->hashName();


        $new_object = Brand::create($data);
        Cache::forget('brands');

        return response()->json(['data' => $new_object, 'success' => isset($new_object)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {

        $target_object = Brand::find($id);

        if (isset($target_object)) {
            return response()->json(['data' => $target_object, 'success' => isset($target_object)]);
        }

        return response()->json(['data' => null, 'success' > false]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'ar_title'       => 'required|max:255|unique:brands,ar_title,' . $id,
            'en_title'       => 'required|max:255|unique:brands,en_title,' . $id,
            'ar_description' => 'required|max:2000',
            'en_description' => 'required|max:2000',
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => null, 'success' => false, 'msg' => $validator->errors()]);
        }
        $target_object = Brand::find($id);
        $data = $request->all();
        if (isset($request->image)) {
            $image = $request->file('image')[0];
            $image->store('/public/brands');
            $data['image'] = 'storage/brands/' . $image->hashName();
        }else{
            $data['image'] = $target_object->image;
        }

        $target_object->update($data);
        Cache::forget('brands');

        return response()->json(['data' => $target_object, 'success' => isset($target_object)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $target_object = Brand::find($id);
        isset($target_object) && $target_object->delete();
        Cache::forget('brands');

        return response()->json(['data' => $target_object, 'success' => isset($target_object)]);
    }

    /**
     * Find brands with key-words 
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function dataAjax(Request $request)
    {
        $data = [];

        if ($request->has('q')) {
            $search = $request->q;
            $model = Brand::query()->select("id", "ar_title", "en_title")
                ->orWhere('ar_title', 'LIKE', "%$search%")
                ->orWhere('en_title', 'LIKE', "%$search%")
                ->orWhere('id', $search);

            $data = $model->get();
        }
        return response()->json($data);
    }

}
