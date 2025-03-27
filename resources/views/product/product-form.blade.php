
                        <!-- Item Name -->
                        <input type="text" name="item_name" id="item-name" placeholder="Item Name" value="{{ old('item_name',$inventory->name ?? '') }}" required>
                        @error('item_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <!-- Quantity -->
                        <input type="number" name="item_quantity" id="item-quantity" placeholder="Quantity" value="{{ old('item_quantity',$inventory->quantity ?? '') }}" required>
                        @error('item_quantity')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <!-- Category -->
                        <input type="text" name="item_category" id="item-category" placeholder="Category" value="{{ old('item_category',$inventory->category ?? '') }}" required>
                        @error('item_category')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <!-- <input type="date" name="stock_entry_date" id="stock-entry-date" value="{{ old('stock_entry_date') }}" required>
                        @error('stock_entry_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror -->

                        <!-- Price -->
                        <input type="number" name="item_price" id="item-price" placeholder="Price" value="{{ old('item_price',$inventory->price ?? '') }}" required>
                        @error('item_price')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <!-- Upload Image -->
                        <label for="item-image">Upload Image:</label>
                        <input type="file" name="item_image" id="item-image" accept="image/*">

                        @if (!empty($inventory->image))
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $inventory->image) }}" width="100" class="img-thumbnail">
                            </div>
                        @endif

                        @error('item_image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <!-- Image Preview -->
                        <img id="preview-image" src="" alt="Image Preview" style="display: none; width: 100px; height: 100px;">
