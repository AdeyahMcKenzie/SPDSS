<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catalog;
use App\Http\Requests\catalog\CatalogRequest;

class CatalogController extends Controller
{
    public function __construct(){
        //$this->middleware('catalog.access:SPDSSAdmin,RegisteredCustomer')->only(['show','index']);
        //$this->middleware('catalog.access:SPDSSAdmin,null')->only(['create','store','edit','update','destroy']);

        //$this->middleware('catalog.access:SPDSSAdmin,RegisteredCustomer')->only(['show','index']);
        //$this->middleware('catalog.access:SPDSSAdmin,null')->only(['index']);
                    
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = Catalog::all();
        return view('catalog/index')->with('items', $items);
    
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // $catalog = new Catalog;
        return view('catalog/create')->with('catalog', $catalog);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CatalogRequest $request)
    {
        Catalog::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            ]);
             return redirect(url('catalog'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Catalog::findOrFail($id);
        return view('catalog/show')->with('item',$item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $catalog = Catalog::findOrFail($id);//find existing record
        return view('catalog/edit')->with('catalog', $catalog);//pass the record to the view
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CatalogRequest $request, $id)
    {
        $catalog = Catalog::find($id);//find record
        //mkae changes to the record
        $catalog->name = $request->name;
        $catalog->description = $request->description;
        $catalog->price = $request->price;
        //save changes made
        $catalog->save();
        //return to the catalog with the changed data
        return redirect(url('catalog'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Catalog::findOrFail($id);
        $item->delete();
        return redirect()->back();
    }

    public function filterForm()
    {
        return view('catalog/filterForm');
    }

    public function filter(Request $request)
    {
        $request->validate(['minPrice'=>'required|numeric', 'maxPrice'=>'required|numeric',]);
        $items = Catalog::all()
        ->where('price', '>=', $request->minPrice)
        ->where('price', '<=', $request->maxPrice)
        ->sortBy('price');

        return view('catalog/filter')->with('items',$items);

    }
}
