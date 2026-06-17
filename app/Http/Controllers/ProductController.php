<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use App\Models\ProductColor;
use App\Models\Color;
use App\Models\Category;
use App\Models\Size;
use App\Models\ProductPrice;
use App\Models\ProductVariationQuantity;
use Illuminate\Support\Facades\Storage;
use App\Models\ProductImage;
class ProductController extends Controller
{
    /**
     * Display a listing of products.
     */
    public function index()
    {
        $products = Product::latest()->paginate(10);

        return view(
            'products.index',
            compact('products')
        );
    }
    /**
 * Show product create form.
 */
public function create()
{
    $categories = Category::where('status', 1)->get();

    $colors = Color::where('status', 1)->get();

    $sizes = Size::where('status', 1)->get();

    return view(
        'products.create',
        compact(
            'categories',
            'colors',
            'sizes'
        )
    );
}
/**
 * Store new product.
 */
public function store(StoreProductRequest $request)
{


        /*
        |--------------------------------------------------------------------------
        | Create Product
        |--------------------------------------------------------------------------
        */

    try {
         
        $product = Product::create([

            'category_id' => $request->category_id,
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'description_ar' => $request->description_ar,
            'description_en' => $request->description_en,
            'status' => $request->status,
            'created_by' => auth()->id(),

        ]);

        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $image) {

                $path = $image->store(
                    'products',
                    'public'
                );

                ProductImage::create([

                    'product_id' => $product->id,
                    'image' => $path,

                ]);
            }
        }

        if ($request->has('colors')) {

            foreach ($request->colors as $colorId) {

                ProductColor::create([

                    'product_id' => $product->id,
                    'color_id' => $colorId,
                    'created_by' => auth()->id(),

                ]);
            }
        }

        if ($request->has('prices')) {

            foreach ($request->prices as $sizeId => $price) {

                if (!empty($price)) {

                    ProductPrice::create([

                        'product_id' => $product->id,
                        'size_id' => $sizeId,
                        'price' => $price,
                        'on_sale_status' => 2,
                        'created_by' => auth()->id(),

                    ]);
                }
            }
        }

        if ($request->has('quantities')) {

            foreach ($request->quantities as $colorId => $sizes) {

                foreach ($sizes as $sizeId => $quantity) {

                    if ($quantity !== null && $quantity !== '') {

                        ProductVariationQuantity::create([

                            'product_id' => $product->id,
                            'color_id' => $colorId,
                            'size_id' => $sizeId,
                            'quantity' => $quantity,
                            'status' => 1,
                            'created_by' => auth()->id(),

                        ]);
                    }
                }
            }
        }

        return redirect()
            ->route('products.index')
            ->with(
                'success',
                'Product created successfully.'
            );

    } catch (Exception $exception) {

        return redirect()
            ->back()
            ->withInput()
            ->with(
                'error',
                $exception->getMessage()
            );
    }
}
/**
 * Store front home page.
 */
public function storeFront()
{
    $products = Product::with('images')
        ->latest()
        ->get();

    return view(
        'store.home',
        compact('products')
    );
}


/**
 * Product details page.
 */
public function showProduct(Product $product)
{
$product->load([
'images',
'colors',
'prices.size',
'variationQuantities.color',
'variationQuantities.size'
]);


if (auth('customer')->check()) {

    return view(
        'customer.product',
        compact('product')
    );

}

return view(
    'store.product',
    compact('product')
);


}


public function edit(Product $product)
{
    return view(
        'products.edit',
        compact('product')
    );
}

public function update(Request $request, Product $product)
{
    $product->update([
        'name_ar' => $request->name_ar,
        'name_en' => $request->name_en,
        'description_ar' => $request->description_ar,
        'description_en' => $request->description_en,
        'status' => $request->status,
    ]);

    return redirect()
        ->route('products.index')
        ->with(
            'success',
            'Product updated successfully.'
        );
}


public function destroy(Product $product)
{
    ProductColor::where(
        'product_id',
        $product->id
    )->delete();

    ProductPrice::where(
        'product_id',
        $product->id
    )->delete();

    ProductVariationQuantity::where(
        'product_id',
        $product->id
    )->delete();

    $product->delete();

    return redirect()
        ->route('products.index')
        ->with(
            'success',
            'Product deleted successfully.'
        );
}

}