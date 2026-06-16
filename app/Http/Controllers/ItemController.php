<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ItemController extends Controller
{
    private function getItems()
    {
        return Item::with('user')
            ->where('approval_status', 'approved')
            ->latest()
            ->get();
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
    try{
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
    $data['approval_status'] = auth()->user()->role === 'staff' ? 'approved' : 'pending';
    Item::create($data);

    if(auth()->user()->role === 'user'){

    return redirect('/items')->with(
        'pending',
        'Your report has been submitted and is awaiting approval from IT Support.'
    );

    }

    return redirect('/items')->with(
        'success',
        'Report published successfully.'
    );
    } catch (\Exception $e) {

        dd($e->getMessage());

    }
}

    public function update(Request $request, Item $item)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'location' => 'required',
            'contact_email' => 'nullable|string|max:255',
            'status' => 'required|in:lost,found,returned',
            'image' => 'nullable|image'
        ]);
        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('items','public');
        }

        $item->update($data);

        return back()->with('success', 'Report updated!');
    }

    public function pendingReports()
    {
        $items = Item::with('user')
            ->where('approval_status', 'pending')
            ->latest()
            ->get();

        return view('admin.pending-reports', compact('items'));
    }

    public function approve(Item $item)
    {
        $item->update([
            'approval_status' => 'approved'
        ]);

        return back()->with('success', 'Report approved');
    }

    public function reject(Item $item)
    {
        $item->update([
            'approval_status' => 'rejected'
        ]);

        return back()->with('success', 'Report rejected');
    }

    public function approvedReports()
    {
        $items = Item::with('user')
            ->where('approval_status', 'approved')
            ->latest()
            ->get();

        return view('admin.approved-reports', compact('items'));
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return back()->with('success', 'Report deleted!');
    }
}