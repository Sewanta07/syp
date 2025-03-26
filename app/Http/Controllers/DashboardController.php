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
        return view('inventory.inventory',compact('active_menu'));
    }

    public function product()
    {
        $active_menu = 'product';
        $inventories = Inventory::all();
        return view('product.product',compact('active_menu','inventories'));
    }
    public function saveInventory(Request $request) {
        // Dump and Die to Debug (Comment this out in production)
        // dd($request->all());
    
        // Validate request data
        $request->validate([
            'item_name' => 'required|string|max:255',
            'item_quantity' => 'required|integer|min:1',
            'item_category' => 'required|string|max:255',
            'stock_entry_date' => 'required|date',
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
            'stock_entry_date' => $request->stock_entry_date,
            'price' => $request->item_price,
            'image' => $imagePath ?? null, // Save image path or null if upload failed
        ]);
        $inventory = Inventory::latest()->paginate(5); // 5 items per page
        return view('inventory.inventory', compact('inventory'))->with('success', 'Item added successfully!');
    }
    
}
