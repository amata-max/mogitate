<?php

namespace App\Http\Controllers;


use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Request $request)
    {


    $query = Item::query();

        if ($request->keyword) {
        $query->where('name', 'LIKE', "%{$request->keyword}%");
        }

        $items = $query->latest()->get();

        return view('items.index', compact('items'));
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|integer|min:0',
            'description' => 'required|max:1000',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->file('image')) {
        $data['image'] = $request->file('image')->store('images', 'public');
        }

        Item::create($data);

        return redirect('/items');
    }

    public function show(Item $item)
    {
        return view('items.show', compact('item'));
    }

    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|integer|min:0',
            'description' => 'required|max:1000',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $item->update($data);

        return redirect('/items');
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return redirect('/items');
    }
}