<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Membership;
use App\Models\Trainer;
use App\Http\Requests\CustomerRequest;
use Illuminate\Support\Facades\Validator;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $activeTrainers = Trainer::where('status', 1)->get();
        $activeMemberships = Membership::where('status', 1)->get();
        if (request()->ajax()) {
            // $customers = Customer::with('memberships')->select('*')->get();
            return datatables()->of(Customer::select('*'))
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
        return view('admin.users.customer', compact('activeTrainers', 'activeMemberships'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        // Get the selected membership name from the request
        $selectedMembershipName = request()->input('membership');

        // Find the corresponding membership ID based on the name
        $membership = Membership::where('name', $selectedMembershipName)->first();
        // $membership = Membership::find($request->membership_id);

        if (!$membership) {
            // Handle the case where the membership_id does not exist
            return response()->json(['error' => 'Invalid Membership ID.'], 400);
        }

        $form_data = [
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'image' => $request->image,
            'membership_id' => $request->membership_id,
            'amount_paid' => $request->amount_paid,
            'in' => $request->in,
            'out' => $request->out,
            'assigned_trainer_id' => $request->trainer_id,
        ];
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/image/', $filename);
            $form_data['image'] = $filename;
        }

        Customer::create($form_data);
        return response()->json(['success' => 'Data Added successfully.']);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        return response()->json($customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules = array(
            'id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'age' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'image' => 'required',
            'gender' => 'required',
            'amount_paid' => 'required',
            'membership' => 'required',
            'in' => 'required',
            'out' => 'required',

        );
        $error = Validator::make($request->all(), $rules);
        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        $customer = Customer::findOrFail($request->id);
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->age = $request->age;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->image = $request->image;
        $customer->gender = $request->gender;
        $customer->amount_paid = $request->amount_paid;
        $customer->membership_id = $request->membership_id;
        $customer->in = $request->in;
        $customer->out = $request->out;


        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/image/', $filename);
            $customer->image = $filename;
        }
        $customer->save();
        return response()->json(['success' => 'Data is successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Customer::findOrFail($id);
        $data->delete();
        return response()->json(['success' => 'Record deleted successfully.']);
    }
    public function status_update(Request $request)
    {
        $customer = Customer::findOrFail($request->id);
        $status = $customer->status === 1 ? 0 : 1;
        $customer->status = $status;
        $customer->save();
        return response()->json(['success' => 'Status updated successfully.']);
    }
}
