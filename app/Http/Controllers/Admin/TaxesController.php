<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;

use App\Taxe;

class TaxesController extends Controller
{
    public function index (Request $request) {
        if ($request->ajax()) {
            $model = Taxe::query();
            
            if (isset($request->title)) {
                $model->Where('title', 'like', "%$request->title%");
            }

            $datatable_model = Datatables::of($model)
            ->addColumn('is_active', function ($row_object) {
                return view('admin.taxes.incs._active', compact('row_object'));
            })
            ->addColumn('cost_type', function ($row_object) {
                return $row_object->cost_type == 0 ? 'package' : 'per-item';
            })
            ->addColumn('is_fixed', function ($row_object) {
                return $row_object->is_fixed == 0 ? 'percentage' : 'fixed';
            })
            ->addColumn('actions', function ($row_object) {
                return view('admin.taxes.incs._actions', compact('row_object'));
            });

            return $datatable_model->make(true);
        }
        
        // $all_categories = ProductCategory::all();
        $all_categories = [];
        return view('admin.taxes.index', compact('all_categories'));
    }

    public function show (Request $request, $id) {
        if (isset($request->get_all_taxe)) {
            $all_tax = Taxe::where('is_active', 1)->get();
            return response()->json(['data' => $all_tax, 'success' => isset($all_tax)]);
        }

        $target_object = Taxe::find($id);

        if (isset($target_object) && isset($request->fast_acc)) {
            return response()->json(['data' => $target_object, 'success' => isset($target_object)]);
        }

        return response()->json(['data' => null, 'success' > false]);
    }

    public function store (Request $request) {
        $validator = Validator::make($request->all(), [
            'title'         => 'required|unique:taxes,title|max:255',
            'description'   => 'required|max:500',
            'cost_type'     => 'required',
            'cost'          => 'required',
            'is_fixed'      => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => null, 'success' => false, 'msg' => $validator->errors()]); 
        }

        $data       = $request->all();
        $new_object = Taxe::create($data);

        return response()->json(['data' => $new_object, 'success' => isset($new_object)]);
    }// end :: store

    public function update (Request $request, $id) {
        if (isset($request->activate_taxe)) {
            return $this->updateActivation($id);
        }
        
        return $this->updateTaxe($request, $id);
    }

    private function updateActivation ($id) {
        $target_object = Taxe::find($id);
        
        if (isset($target_object)) {
            $target_object->is_active = !$target_object->is_active;
            $target_object->save();
        }

        return response()->json(['data' => $target_object, 'success' => isset($target_object)]);  
    }

    private function updateTaxe ($request, $id) {
        $validator = Validator::make($request->all(), [
            'title'         => 'required|max:255|unique:taxes,title,' . $id,
            'description'   => 'required|max:500',
            'cost_type'     => 'required',
            'cost'          => 'required',
            'is_fixed'      => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => null, 'success' => false, 'msg' => $validator->errors()]); 
        }

        $target_object = Taxe::find($id);
        $data          = $request->except('free_on_cost_above', 'categories');
        $target_object->update($data);

        return response()->json(['data' => $target_object, 'success' => isset($target_object)]);
    }

    public function destroy ($id) {
        $target_object = Taxe::find($id);
        isset($target_object) && $target_object->delete();

        return response()->json(['data' => $target_object, 'success' => isset($target_object)]);
    }

    public function dataAjax(Request $request) {
    	$data = [];

        if($request->has('q')){
            $search = $request->q;
            $data = Taxe::select("id", "title")
            		->where('title','LIKE',"%$search%")
            		->get();
        }
        return response()->json($data);
    }
}
