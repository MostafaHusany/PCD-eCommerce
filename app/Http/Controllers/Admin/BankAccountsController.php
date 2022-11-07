<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Validator;

use App\Models\BankAcount;

class BankAccountsController extends Controller
{
    public function __construct () {
        cache()->remember('bank_acounts', CACHE_TIME, function () {
            return BankAcount::where('is_active', 1)->get();
        });
    }

    public function index (Request $request) {
        if ($request->ajax()) {
            $model = BankAcount::query();
            
            if (isset($request->bank_name)) {
                $model->Where('bank_name', 'like', "%$request->bank_name%");
            }

            $datatable_model = Datatables::of($model)
            ->addColumn('image', function ($row_object) {
                return view('admin.banks.incs._image', compact('row_object'));
            })
            ->addColumn('is_active', function ($row_object) {
                return view('admin.banks.incs._active', compact('row_object'));
            })
            ->addColumn('actions', function ($row_object) {
                return view('admin.banks.incs._actions', compact('row_object'));
            });

            return $datatable_model->make(true);
        }

        return view('admin.banks.index');
    }
    
    public function show (Request $request, $id) {
        $target_object = BankAcount::find($id);

        if (isset($target_object) && isset($request->fast_acc)) {
            return response()->json(['data' => $target_object, 'success' => isset($target_object)]);
        }

        return response()->json(['data' => null, 'success' > false]);
    }

    public function store (Request $request) {
        $validator = Validator::make($request->all(), [
            'bank_name'     => 'required|max:500',
            'account_name'  => 'required|max:500',
            'number'        => 'required|max:500',
            'iban'          => 'required|max:500',
            'image'         => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => null, 'success' => false, 'msg' => $validator->errors()]); 
        }
        
        $data  = $request->all();
        $image = $request->file('image')[0];
        $image->store('/public/banks');
        $data['image'] = 'storage/banks/' . $image->hashName();

        $new_object = BankAcount::create($data);
        
        // clear related_cach
        cache()->forget('bank_acounts');

        return response()->json(['data' => $new_object, 'success' => isset($new_object)]);
    }

    public function update (Request $request, $id) {
        
        // clear related_cach
        cache()->forget('bank_acounts');

        if (isset($request->activate_taxe)) {
            return $this->updateActivation($id);
        }
        
        return $this->updateBank($request, $id);
    }
    
    private function updateActivation ($id) {
        $target_object = BankAcount::find($id);
        
        if (isset($target_object)) {
            $target_object->is_active = !$target_object->is_active;
            $target_object->save();
        }

        return response()->json(['data' => $target_object, 'success' => isset($target_object)]);  
    }

    private function updateBank ($request, $id) {
        $validator = Validator::make($request->all(), [
            'bank_name'     => 'required|max:500',
            'account_name'  => 'required|max:500',
            'number'        => 'required|max:500',
            'iban'          => 'required|max:500'
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => null, 'success' => false, 'msg' => $validator->errors()]); 
        }

        $target_object = BankAcount::find($id);
        $data          = $request->all();

        if (isset($request->image)) {
            File::exists($target_object->image) && unlink($target_object->image);
            $image = $request->file('image')[0];
            $image->store('/public/banks');
            $data['image'] = 'storage/banks/' . $image->hashName();
        }

        $target_object->update($data);

        return response()->json(['data' => $target_object, 'success' => isset($target_object)]);
    }

    public function destroy ($id) {
        $target_object = BankAcount::find($id);
        isset($target_object) && $target_object->delete();

        // clear related_cach
        cache()->forget('bank_acounts');

        return response()->json(['data' => $target_object, 'success' => isset($target_object)]);
    }
}
