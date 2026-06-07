<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Exception;
use App\Http\Requests\StoreColorRequest;
use App\Http\Requests\UpdateColorRequest;

class ColorController extends Controller
{
    /**
     * Display a listing of colors.
     */
    public function index()
    {
        $colors = Color::latest()->paginate(10);

        return view(
            'colors.index',
            compact('colors')
        );
    }
    /**
 * Show color create form.
 */
public function create()
{
    return view('colors.create');
}
/**
 * Store new color.
 */
public function store(StoreColorRequest $request)
{
    try {

        /*
        |--------------------------------------------------------------------------
        | Create Color
        |--------------------------------------------------------------------------
        */
        Color::create([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'status' => $request->status,
            'created_by' => auth()->id(),
        ]);

        return redirect()
            ->route('colors.index')
            ->with(
                'success',
                'Color created successfully.'
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
 * Show color edit form.
 */
public function edit(Color $color)
{
       return view(
        'colors.edit',
        compact('color')
    );
}
/**
 * Update color.
 */
public function update(
    UpdateColorRequest $request,
    Color $color
)
{
    try {

        /*
        |--------------------------------------------------------------------------
        | Update Color
        |--------------------------------------------------------------------------
        */
        $color->update([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'status' => $request->status,
           'updated_by' => auth()->id(),
        ]);

        return redirect()
            ->route('colors.index')
            ->with(
                'success',
                'Color updated successfully.'
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
 * Soft delete color.
 */
public function destroy(Color $color)
{
    try {

        /*
        |--------------------------------------------------------------------------
        | Soft Delete Color
        |--------------------------------------------------------------------------
        */
        $color->delete();

        return redirect()
            ->route('colors.index')
            ->with(
                'success',
                'Color deleted successfully.'
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