<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Exception;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
class CategoryController extends Controller
{
/**
 * Display a listing of categories.
 */
public function index()
    {
      $categories = Category::latest()->paginate(10);

    return view('categories.index', compact('categories'));
    }
    /**
 * Show category create form.
 */
public function create()
{
    $parentCategories = Category::whereNull('parent_category_id')
        ->where('status', 1)
        ->get();

    return view(
        'categories.create',
        compact('parentCategories')
    );
}
/**
 * Store new category.
 */
public function store(StoreCategoryRequest $request)
{
    try {
   
        /*
        |--------------------------------------------------------------------------
        | Create Category
        |--------------------------------------------------------------------------
        */
        Category::create([
            'parent_category_id' => $request->parent_category_id,
             'code' => strtoupper($request->code),
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'status' => $request->status,
            'created_by' => auth()->id(),
        ]);

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category created successfully.');

    } catch (Exception $exception) {

        return redirect()
            ->back()
            ->withInput()
            ->with('error', $exception->getMessage());
    }
}
/**
 * Show category edit form.
 */
public function edit(Category $category)
{
    $parentCategories = Category::whereNull('parent_category_id')
        ->where('id', '!=', $category->id)
        ->where('status', 1)
        ->get();

    return view(
        'categories.edit',
        compact('category', 'parentCategories')
    );
}

/**
 * Update category.
 */
public function update(
    UpdateCategoryRequest $request,
    Category $category
)
{
    try {

        /*
        |--------------------------------------------------------------------------
        | Update Category
        |--------------------------------------------------------------------------
        */
        $category->update([
            'parent_category_id' => $request->parent_category_id,
            'code' => strtoupper($request->code),
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'status' => $request->status,
            'updated_by' => auth()->id(),
        ]);

        return redirect()
            ->route('categories.index')
            ->with(
                'success',
                'Category updated successfully.'
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
 * Soft delete category.
 */
public function destroy(Category $category)
{
    try {

        /*
        |--------------------------------------------------------------------------
        | Soft Delete Category
        |--------------------------------------------------------------------------
        */
        $category->delete();

        return redirect()
            ->route('categories.index')
            ->with(
                'success',
                'Category deleted successfully.'
            );

    } catch (Exception $exception) {

        return redirect()
            ->back()
            ->with(
                'error',
                $exception->getMessage()
            );
    }
}


}
