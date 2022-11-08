<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;

use App\OrderStatus;

class OrderStatusController extends Controller
{private $target_model;

    public function __construct()
    {
        $this->target_model = new OrderStatus();
    }

    public function index (Request $request) {
        if ($request->ajax()) {
            $model = $this->target_model->query();
            
            if (isset($request->status)) {
                $model->where('status_code', 'like', "%$request->status%")
                ->orWhere('status_name_ar', 'like', "%$request->status%")
                ->orWhere('status_name_en', 'like', "%$request->status%");
            }

            $datatable_model = Datatables::of($model)
            ->addColumn('status_name', function ($row_object) {
                return view('admin.orders_status.incs._status_name', compact('row_object'));
            })
            ->addColumn('status_color', function ($row_object) {
                return view('admin.orders_status.incs._status_color', compact('row_object'));
            })
            ->addColumn('actions', function ($row_object) {
                return view('admin.orders_status.incs._actions', compact('row_object'));
            });

            return $datatable_model->make(true);
        }
        
        // $all_categories = ProductCategory::all();
        $all_categories = [];
        return view('admin.orders_status.index', compact('all_categories'));
    }

    public function show (Request $request, $id) {
        $target_object = $this->target_model->find($id);

        if (isset($target_object) && isset($request->fast_acc)) {
            return response()->json(['data' => $target_object, 'success' => isset($target_object)]);
        }

        return response()->json(['data' => null, 'success' > false]);
    }

    public function store (Request $request) {
        $validator = Validator::make($request->all(), [
            'status_code'      => 'required|unique:order_statuses,status_code',
            'status_name_ar'   => 'required|max:255',
            'status_name_en'   => 'required|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => null, 'success' => false, 'msg' => $validator->errors()]); 
        }

        $data       = $request->all();
        $new_object = $this->target_model->create($data);
        // cache()->forget('order_status');

        return response()->json(['data' => $new_object, 'success' => isset($new_object)]);
    }// end :: store

    public function update (Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'status_code'   => 'required|unique:order_statuses,status_code,' . $id,
            'status_name_ar'   => 'required|max:255',
            'status_name_en'   => 'required|max:255'
        ]);
        
        if ($validator->fails()) {
            return response()->json(['data' => null, 'success' => false, 'msg' => $validator->errors()]); 
        }

        $data          = $request->all();
        $target_object = $this->target_model->find($id);
        $target_object->update($data);
        // cache()->forget('order_status');

        return response()->json(['data' => $target_object, 'success' => isset($target_object)]);
    }

    public function destroy ($id) {
        $target_object = $this->target_model->find($id);
        isset($target_object) && $target_object->delete();
        // cache()->forget('order_status');

        return response()->json(['data' => $target_object, 'success' => isset($target_object)]);
    }

    public function dataAjax(Request $request) {
    	$data = [];

        if($request->has('q')){
            $search = $request->q;
            $data = $this->target_model->select("id", "status_code", "status_name")
            		->where('status_code','LIKE',"%$search%")
            		->where('status_name','LIKE',"%$search%")
            		->get();
        }

        return response()->json($data);
    }
}
