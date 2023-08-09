<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Worker;
use App\Http\Requests\WorkerRequest;


class Workercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        return view('admin.users.worker');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkerRequest $request)
    {
        $request->validate([ 
            'inputs' => 'required|array|min:1', 
            'inputs.*.name' => 'required|string|max:100',
            'inputs.*.email' => 'required|email|unique:workers,email', 
            'inputs.*.role' => 'required|string',
        ]);
    
        try {
            foreach ($request->inputs as $input) {
                $worker = new Worker();
                $worker->name = $input['name'];
                $worker->email = $input['email'];
                $worker->role = $input['role'];
    
                $worker->save();
            }
            
            return response()->json(['success' => 'Data added successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => 'Failed to save data: ' . $e->getMessage()]);
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
