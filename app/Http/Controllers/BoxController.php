<?php
namespace App\Http\Controllers;

use App\Models\Box;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BoxController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $boxes = Box::where('owner_id', $user->id)->get();
        return view('boxes.index', compact('boxes'));
    }

    public function create()
    {
        return view('boxes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'price' => 'required|integer',
        ]);

        $box = new Box($request->all());
        $box->owner_id = Auth::id();
        $box->save();

        return redirect()->route('boxes.index')->with('success', 'Box created successfully.');
    }

    public function show(Box $box)
    {
        if ($box->owner_id !== Auth::id()) {
            abort(403);
        }
        return view('boxes.show', compact('box'));
    }

    public function edit(Box $box)
    {
        if ($box->owner_id !== Auth::id()) {
            abort(403);
        }
        return view('boxes.edit', compact('box'));
    }

    public function update(Request $request, Box $box)
    {
        if ($box->owner_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'price' => 'required|integer',
        ]);

        $box->update($request->all());

        return redirect()->route('boxes.index')->with('success', 'Box updated successfully.');
    }

    public function destroy(Box $box)
    {
        if ($box->owner_id !== Auth::id()) {
            abort(403);
        }
        $box->delete();
        return redirect()->route('boxes.index')->with('success', 'Box deleted successfully.');
    }
}
