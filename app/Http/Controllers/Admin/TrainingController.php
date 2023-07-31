<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Training;
use Datatables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests\TrainingRequest;


class TrainingController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Training::select('*'))
                ->addColumn('action', function ($data) {
                    $button = '<a href="javascript:void(0)" data-toggle="tooltip" onClick="editFunc(' . $data->id . ')" data-original-title="Edit" class="edit btn btn-success">
                Edit
               </a>';
                    $button .= '<a href=javascript:void(0)" data-toggle="tooltip" onclick="deleteFunc(' . $data->id . ')" data-original-tittle="Delete" class="delete btn btn-danger"> Delete</a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.users.training');
    }

    public function store(TrainingRequest $request)
    {
        $form_data = [
            'name' => $request->name,
        ];
        Training::create($form_data);
        return response()->json(['success' => 'Data Added successfully.']);
    }

    public function edit($id)
    {
        $training = Training::find($id);
        return response()->json($training);
    }

    public function update(Request $request)
    {
        $rules = array(
            'id' => 'required', 
            'name' => 'required',
        );
        $error = Validator::make($request->all(), $rules);
        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        $training = Training::findOrFail($request->id);
        $training->name = $request->name;
        $training->Update();
        return response()->json(['success' => 'Data is successfully updated']);
    }


    public function destroy($id)
    {
        $data = Training::findOrFail($id);
        $data->delete();
        return response()->json(['success' => 'Record deleted successfully.']);
    }
    public function status_update(Request $request)
    {
        $training = Training::findOrFail($request->id);
        $status = $training->status === 1 ? 0 : 1;
        $training->status = $status;
        $training->save();
        return response()->json(['success' => 'Status updated successfully.']);
    }
}
