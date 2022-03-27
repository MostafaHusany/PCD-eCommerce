<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;

use App\PromoCode;

class PromoCodesController extends Controller
{
    /**
     * General tasks .... 
     * 1- promo code
     * 2- flag on categories
     * 3- link product to more than one brand
     * 4- upgrade option for composite product in orders 
     * 
     * Create Promo adminstration ... 
     * We will have promos codes each will have time of use,
     * and may have rulles on 
     * promo can be a fixed ratio, or ratio
     */

    public function index (Request $request) {
        if ($request->ajax()) {
            $model = PromoCode::query();//->with('orders');
            
            if (isset($request->title)) {
                $model->where('title', $request->title);
            }

            $datatable_model = Datatables::of($model)
            ->addColumn('orders_count', function ($row_object) {
                return $row_object->orders()->count();
                // return 0;
            })
            ->addColumn('owner', function ($row_object) {
                return isset($row_object->user) ? $row_object->user->name : '---';
            })
            ->addColumn('active', function ($row_object) {
                return view('admin.promos.incs._active', compact('row_object'));
            })
            ->addColumn('actions', function ($row_object) {
                return view('admin.promos.incs._actions', compact('row_object'));
            });

            return $datatable_model->make(true);
        }
        
        $all_categories = [];
        return view('admin.promos.index', compact('all_categories'));
    }

    public function show (Request $request, $id) {
        $target_object = PromoCode::find($id);

        if (isset($target_object) && isset($request->fast_acc)) {
            $target_object->user;
            return response()->json(['data' => $target_object, 'success' => isset($target_object)]);
        }

        return response()->json(['data' => null, 'success' > false]);
    }

    public function store (Request $request) {
        $validator = Validator::make($request->all(), [
            'code'  => 'max:255|unique:promo_codes,code',
            'owner' => isset($request->owner) ? 'exists:users,id' : '',
            'value' => 'required|numeric|min:1',
            'is_random' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => null, 'success' => false, 'msg' => $validator->errors()]); 
        }

        $data = $request->all();
        $data['user_id'] = $request->owner;

        if (isset($request->is_random) && $request->is_random == 'false') {
            $data['code'] = $request->code;
        } else {
            $seed = str_split('abcdefghijklmnopqrstuvwxyz'
                 .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                 .'0123456789!@#$%^&*()'); // and any other characters
            shuffle($seed); // probably optional since array_is randomized; this may be redundant
            $rand = '';
            foreach (array_rand($seed, 6) as $k) $rand .= $seed[$k];
            $data['code'] = $rand;
        }

        $new_object = PromoCode::create($data);

        return response()->json(['data' => $new_object, 'success' => isset($new_object)]);
    }// end :: store

    public function update (Request $request, $id) {

        if (isset($request->activate_promo)) {
            return $this->updateActivation($id);
        }

        return $this->updateShipping($request, $id);
    }

    private function updateActivation ($id) {
        $target_object = PromoCode::find($id);
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
            'cost'          => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => null, 'success' => false, 'msg' => $validator->errors()]); 
        }

        $target_object = PromoCode::find($id);
        $data       = $request->except('free_on_cost_above', 'categories');
        $target_object->update($data);

        return response()->json(['data' => $target_object, 'success' => isset($target_object)]);
    }

    public function destroy ($id) {
        $target_object = PromoCode::find($id);
        isset($target_object) && $target_object->delete();

        return response()->json(['data' => $target_object, 'success' => isset($target_object)]);
    }

    public function dataAjax(Request $request) {
    	$data = [];

        if($request->has('q')) {
            $search = $request->q;
            $data = PromoCode::select("id", "title", 'cost')
                    ->where('is_active', 1)
            		->where('title','LIKE',"%$search%")
            		->get();
        }

        return response()->json($data);
    }

}
