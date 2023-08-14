<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('categories')->pluck('name', 'id');
        $sizes = DB::table('Sizes')->pluck('name', 'id');
        if (request()->ajax()) {
            return datatables()->of(Product::select('*')->with('categoryDetail'))
                ->editColumn('category',  function ($data) {
                    return optional($data->categoryDetail)->name;
                })
                ->editColumn('size',  function ($data) {
                    return optional($data->sizeDetail)->name;
                })

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


        return view('admin.users.product', compact('categories', 'sizes'));
    }
    public function store(ProductRequest $request)
    {
        $form_data = [
            'name' => $request->name,
            'image' => $request->image,
            'category' => $request->category,
            'price' => $request->price,
            'size' => $request->size,

        ];
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/image/', $filename);
            $form_data['image'] = $filename;
        }
        Product::create($form_data);

        return response()->json(['success' => 'Data added successfully.']);
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
        $product = Product::find($id);
        return response()->json($product);
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
            'image' => 'required',
            'category' => 'required',
            'price' => 'required',
            'size' => 'required',



        );
        $error = Validator::make($request->all(), $rules);
        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        $product = Product::findOrFail($request->id);
        $product->name = $request->name;
        $product->image = $request->image;
        $product->category = $request->category;
        $product->price = $request->price;
        $product->size = $request->size;


        /// Check if a new image is uploaded
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/image/', $filename);
            $product->image = $filename;
        }
        $product->save();
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
        $data = Product::findOrFail($id);
        $data->delete();
        return response()->json(['success' => 'Record deleted successfully.']);
    }
    public function status_update(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $status = $product->status === 1 ? 0 : 1;
        $product->status = $status;
        $product->save();
        return response()->json(['success' => 'Status updated successfully.']);
    }
}
