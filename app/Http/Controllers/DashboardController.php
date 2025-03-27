<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;

class DashboardController extends Controller
{
    public function index()
    {
        $active_menu = 'dashboard';
        return view('dashboard.index',compact('active_menu'));
    }

    public function inventory()
    {
        $active_menu = 'inventory';
        $inventory = Inventory::latest()->paginate(2);
        return view('inventory.inventory',compact('active_menu','inventory'));
    }

    public function product()
    {
        $active_menu = 'product';
        $inventories = Inventory::all();
        return view('product.create',compact('active_menu','inventories'));
    }
    public function saveInventory(Request $request) {
        // Dump and Die to Debug (Comment this out in production)
        // dd($request->all());
    
        // Validate request data
        $request->validate([
            'item_name' => 'required|string|max:255',
            'item_quantity' => 'required|integer|min:1',
            'item_category' => 'required|string|max:255',
            'item_price' => 'required|numeric|min:0',
            'item_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
        ]);
    
        // Handle image upload
        if ($request->hasFile('item_image')) {
            $imagePath = $request->file('item_image')->store('inventory_images', 'public');
        }
    
        // Store inventory data (assuming you have an `Inventory` model)
       $inventory =  Inventory::create([
            'name' => $request->item_name,
            'quantity' => $request->item_quantity,
            'category' => $request->item_category,
            'stock_entry_date' => now(),
            'price' => $request->item_price,
            'image' => $imagePath ?? null, // Save image path or null if upload failed
        ]);
        $inventory = Inventory::latest()->paginate(2); // 5 items per page
        return view('inventory.inventory', compact('inventory'))->with('success', 'Item added successfully!');
    }
    


    public function profile()
    {
        $active_menu = 'profile';
        $inventories = profile::all();
        return view('profile.profile',compact('active_menu','profile'));
    }

    public function aboutus()
    {
        $active_menu = 'aboutus';
        $inventories = aboutus::all();
        return view('aboutus.aboutus',compact('active_menu','aboutus'));
    }
    public function editInventory($id){
        $active_menu = 'inventory';
        $inventory = Inventory::find($id);
        return view('product.edit',compact('active_menu','inventory'));
    }

    public function updateInventory(Request $request, $id) {
        $active_menu = 'inventory';
        $inventory = Inventory::findOrFail($id);
    
        // Validate input data
        $request->validate([
            'item_name' => 'required|string|max:255',
            'item_category' => 'required|string|max:255',
            'item_price' => 'required|numeric|min:0',
            'item_quantity' => 'required|integer|min:0',
            'item_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional image validation
        ]);
    
        $inventory->name = $request->item_name;
        $inventory->category = $request->item_category;
        $inventory->price = $request->item_price;
        $inventory->quantity = $request->item_quantity;
    
        if ($request->hasFile('item_image')) {
            // Delete old image if exists
            if ($inventory->image) {
                Storage::delete('public/' . $inventory->image);
            }
    
            // Store new image
            $imagePath = $request->file('item_image')->store('inventory_images', 'public');
            $inventory->image = $imagePath;
        }
    
        $inventory->save();
    
        return redirect()->route('dashboard.inventory')->with('success', 'Inventory item updated successfully.');
    }
    
}


