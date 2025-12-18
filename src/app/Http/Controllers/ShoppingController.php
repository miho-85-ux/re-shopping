<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shopping;

class ShoppingController extends Controller
{
    public function index(){
        $items = Shopping::all();

        return view('index', compact('items'));
    }

    public function store(Request $request) {
        Shopping::create($request->all());

        return back();
    }

    public function edit(Request $request) {
        $item = Shopping::find($request->key);
        
        return view('/edit', compact('item'));
    }
    
    public function update(Request $request){
        $item = Shopping::find($request->key);
        $item -> update($request->only(['name','quantity']));
        
        return redirect('/');
    }
    
    public function destroy (Request $request) {
        $item = Shopping::find($request->key);
        $item->delete();

        return back();
    }

    public function search (Request $request) {
        $query = Shopping::query();
        if(!empty ($request->name)){
            
        }
        return view('index', compact('items'));
    }
}
