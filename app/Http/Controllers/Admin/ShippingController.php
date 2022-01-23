<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;

use App\Shipping;

class ShippingController extends Controller
{
    public function index (Request $request) {
        if ($request->ajax()) {
            $model = Shipping::query();
            
            if (isset($request->title)) {
                $model->where('title', $request->title);
            }

            $datatable_model = Datatables::of($model)
            ->addColumn('cost_type', function ($row_object) {
                return view('admin.shipping.incs._cost_type', compact('row_object'));
            })
            ->addColumn('active', function ($row_object) {
                return view('admin.shipping.incs._active', compact('row_object'));
            })
            ->addColumn('actions', function ($row_object) {
                return view('admin.shipping.incs._actions', compact('row_object'));
            });

            return $datatable_model->make(true);
        }
        
        $all_categories = [];
        return view('admin.shipping.index', compact('all_categories'));
    }

    public function show (Request $request, $id) {
        $target_object = Shipping::find($id);

        if (isset($target_object) && isset($request->fast_acc)) {
            return response()->json(['data' => $target_object, 'success' => isset($target_object)]);
        }

        return response()->json(['data' => null, 'success' > false]);
    }

    public function store (Request $request) {
        $validator = Validator::make($request->all(), [
            'title'         => 'required|unique:shippings,title|max:255',
            'description'   => 'required|max:500',
            'cost_type'     => 'required',
            'cost'          => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => null, 'success' => false, 'msg' => $validator->errors()]); 
        }

        $data       = $request->all();
        $new_object = Shipping::create($data);

        return response()->json(['data' => $new_object, 'success' => isset($new_object)]);
    }// end :: store

    public function update (Request $request, $id) {

        if (isset($request->activate_product)) {
            return $this->updateActivation($id);
        }

        return $this->updateShipping($request, $id);
    }

    private function updateActivation ($id) {
        $target_object = Shipping::find($id);
        if (isset($target_object)) {
            $target_object->is_active = !$target_object->is_active;
            $target_object->save();
        }

        return response()->json(['data' => $target_object, 'success' => isset($target_object)]);  
    }

    private function updateShipping ($request, $id) {
        $validator = Validator::make($request->all(), [
            'title'         => 'required|max:255|unique:shippings,title,' . $id,
            'description'   => 'required|max:500',
            'cost_type'     => 'required',
            'cost'          => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => null, 'success' => false, 'msg' => $validator->errors()]); 
        }

        $target_object = Shipping::find($id);
        $data       = $request->except('free_on_cost_above', 'categories');
        $target_object->update($data);

        return response()->json(['data' => $target_object, 'success' => isset($target_object)]);
    }

    public function destroy ($id) {
        $target_object = Shipping::find($id);
        isset($target_object) && $target_object->delete();

        return response()->json(['data' => $target_object, 'success' => isset($target_object)]);
    }

    public function dataAjax(Request $request) {
    	$data = [];

        if($request->has('q')){
            $search = $request->q;
            $data = ProductCategory::select("id", "ar_title", "en_title")
            		->orWhere('ar_title','LIKE',"%$search%")
            		->orWhere('en_title','LIKE',"%$search%")
                    ->orWhere('id', $search)
            		->get();
        }
        return response()->json($data);
    }
}
