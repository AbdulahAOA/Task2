<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Exception;
use App\Http\Requests\StoreSizeRequest;
use App\Http\Requests\UpdateSizeRequest;

class SizeController extends Controller
{
    /**
     * Display a listing of sizes.
     */
    public function index()
    {
        $sizes = Size::latest()->paginate(10);

        return view(
            'sizes.index',
            compact('sizes')
        );
    }
    /**
 * Show size create form.
 */
public function create()
{
    return view('sizes.create');
}

/**
 * Store new size.
 */
public function store(StoreSizeRequest $request)
{
    try {

        /*
        |--------------------------------------------------------------------------
        | Create Size
        |--------------------------------------------------------------------------
        */
        Size::create([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'status' => $request->status,
            'created_by' => auth()->id(),
        ]);

        return redirect()
            ->route('sizes.index')
            ->with(
                'success',
                'Size created successfully.'
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
 * Show size edit form.
 */
public function edit(Size $size)
{
    return view(
        'sizes.edit',
        compact('size')
    );
}
/**
 * Update size.
 */
public function update(
    UpdateSizeRequest $request,
    Size $size
)
{
    try {

        /*
        |--------------------------------------------------------------------------
        | Update Size
        |--------------------------------------------------------------------------
        */
        $size->update([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'status' => $request->status,
            'updated_by' => auth()->id(),
        ]);

        return redirect()
            ->route('sizes.index')
            ->with(
                'success',
                'Size updated successfully.'
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
 * Soft delete size.
 */
public function destroy(Size $size)
{
    try {

        /*
        |--------------------------------------------------------------------------
        | Soft Delete Size
        |--------------------------------------------------------------------------
        */
        $size->delete();

        return redirect()
            ->route('sizes.index')
            ->with(
                'success',
                'Size deleted successfully.'
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