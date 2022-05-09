<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;

use App\District;

class DistrictsController extends Controller
{
    private $target_model;

    public function __construct () {
        $this->target_model = new District;
    }

    public function index (Request $request) {
        /**
         * In distrect table we will save 
         * the name, type (country, gove, city), parent_id
         * parent_id for the country is null, for the gove is the counrty,
         * for the city is the gove id  
         * 
         * for each user we will link the user with address
         * and each address consist of country id, gove id and user id
         * 
         * than the user can make order and select the order and the location
         * 
         */
        if ($request->ajax()) {
            $model = $this->target_model->query()
            ->with(['parent_district', 'customers_of_gover', 'customers_of_country'])
            ->orderBy('type', 'ASC')
            ->orderBy('id', 'ASC');
            
            if (isset($request->country)) {
                $model->where(function ($q) use ($request) {
                    $q->orWhere('id', $request->country);
                    $q->orWhere('district_id', $request->country);
                });
            }

            if (isset($request->name)) {
                $model->where('name', 'like', '%' . $request->name . '%');
            }

            $datatable_model = Datatables::of($model)
            ->addColumn('phone_code', function ($row_object) {
                return isset($row_object->phone_code) ? $row_object->phone_code : '---';
            })
            ->addColumn('customers', function ($row_object) {
                return $row_object->type == 'country' ? $row_object->customers_of_country()->count() : $row_object->customers_of_gover()->count();
            })
            ->addColumn('orders', function ($row_object) {
                return 0;
                // return $row_object->type == 'contry' ? $row_object->orders_by_country()->count() : $row_object->orders_by_gove()->count();
            })
            ->addColumn('parent', function ($row_object) {
                return isset($row_object->parent_district) ? $row_object->parent_district->name : '---';
            })
            ->addColumn('activation', function ($row_object) {
                return view('admin.districts.incs._active', compact('row_object'));
            })
            ->addColumn('actions', function ($row_object) {
                return view('admin.districts.incs._actions', compact('row_object'));
            });

            return $datatable_model->make(true);
        }
        
        return view('admin.districts.index');
    }

    public function show (Request $request, $id) {
        $target_object = $this->target_model->find($id);

        if (isset($target_object) && isset($request->fast_acc)) {
            $target_object->children_districts;
            return response()->json(['data' => $target_object, 'success' => isset($target_object)]);
        }

        return response()->json(['data' => null, 'success' > false]);
    }

    public function store (Request $request) {
        $validator = Validator::make($request->all(), [
            'name'  => 'required|max:255|unique:districts,name',
            // 'description' => 'required|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => null, 'success' => false, 'msg' => $validator->errors()]); 
        }

        $children_districts = json_decode($request->children_tags);
        if (!sizeof($children_districts)) {
            return response()->json(['data' => null, 'success' => false, 'msg' => ['children_districts' => 'children districts is required']]); 
        }

        $data         = $request->all();
        $data['type'] = 'country';
        $new_object   = $this->target_model->create($data);

        $this->create_child_tag($children_districts, $new_object->id);

        return response()->json(['data' => $new_object, 'success' => isset($new_object)]);
    }

    public function update (Request $request, $id) {
        if (isset($request->activate_object)) {
            return $this->updateActivation($id);
        }

        return $this->updateObject($request, $id);
    }

    private function updateActivation ($id) {
        $target_object = $this->target_model->find($id);
        if (isset($target_object)) {
            $target_object->is_active = !$target_object->is_active;
            $target_object->save();
        }

        return response()->json(['data' => $target_object, 'success' => isset($target_object)]);  
    }

    private function updateObject ($request, $id) {
        $validator = Validator::make($request->all(), [
            'name'  => 'required|max:255|unique:districts,name,'.$id,
            // 'description' => 'required|max:1000'
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => null, 'success' => false, 'msg' => $validator->errors()]); 
        }

        $target_object = $this->target_model->find($id);
        $children_districts = $target_object->type === 'country' ? json_decode($request->children_tags) : [];

        if ($target_object->type === 'country' && !sizeof($children_districts)) {
            return response()->json(['data' => null, 'success' => false, 'msg' => ['children_districts' => 'children districts is required']]); 
        }
        
        /* delete old children than create new one */ 
        $data = $request->all();
      
        $target_object->children_districts()->delete();

        $target_object->update($data);
        $this->create_child_tag($children_districts, $target_object->id);

        return response()->json(['data' => $target_object, 'success' => isset($target_object)]);
    }

    private function create_child_tag ($children_districts, $parent_district_id) {
        
        $children_districts_data = [];
        
        foreach ($children_districts as $tag) {
            $children_districts_data[] = ['name' => $tag, 'district_id' => $parent_district_id];
        }
        
        $this->target_model->insert($children_districts_data);
    }

    public function destroy ($id) {
        $target_object = $this->target_model->find($id);
        $target_object->children_districts()->delete();
        $target_object->delete();

        return response()->json(['data' => $target_object, 'success' => isset($target_object)]);
    }

    public function dataAjax(Request $request) {
    	$data = [];

        if($request->has('q')){
            $search = $request->q;
            $model = $this->target_model->query();
            $model->select("id", "name")
            	->where('name','LIKE',"%$search%");
                
            $data = isset($request->district_id) ? 
            $model->where('district_id', $request->district_id)->get():
            $model->where('type', "country")->get();
        }

        return response()->json($data);
    }
}
