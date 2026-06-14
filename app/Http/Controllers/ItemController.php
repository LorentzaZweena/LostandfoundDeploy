<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ItemController extends Controller
{
    private function getItems()
    {
        return Item::with('user')->latest()->get();
    }

    public function home()
    {
        return view('home', ['items' => $this->getItems()]);
    }

    public function index()
    {
        return view('items.index', ['items' => $this->getItems()]);
    }

    public function show(Item $item)
    {
        return view('items.item-detail', compact('item'));
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
{
    if ($request->filled('website')) {
        return back();
    }

    $data = $request->validate([
        'title' => 'required|min:3|max:100',
        'description' => 'required|min:10|max:500',
        'category' => 'required',
        'location' => 'required|in:OCR 1,OCR 2,OCR 3,OCR 4,OCR 5,OCR 6,OCR 7,TCR 1,TCR 2,TCR 3',
        'status' => 'required|in:lost,found',
        'image' => 'nullable|image|max:2048'
    ]);

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('items', 'public');
    }

    $data['user_id'] = auth()->id();

    Item::create($data);

    return redirect('/items')->with(
        'success', 'Your report has been submitted successfully.'
    );
}

    public function update(Request $request, Item $item)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'location' => 'required',
            'contact_email' => 'required|email',
            'status' => 'required|in:lost,found,returned',
            'image' => 'nullable|image'
        ]);

        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('items','public');
        }

        $item->update($data);

        return back()->with('success', 'Report updated!');
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return back()->with('success', 'Report deleted!');
    }
}