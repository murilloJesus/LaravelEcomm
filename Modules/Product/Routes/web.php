<?php


use Illuminate\Support\Facades\Route;
use Modules\Product\Http\Controllers\ProductController;
use Modules\Product\Http\Controllers\ProductReviewController;

Route::prefix('admin')->group(function () {
    Route::resource('/products', ProductController::class)->except('show');

    //essa rota
    Route::post('products/update/{id}', [ProductController::class, 'update'])->name('products.update');
   
    // Product Review

    /*Excel import export*/
    Route::get('products/export', [ProductController::class, 'export'])->name('product.export');
    Route::post('products/import', [ProductController::class, 'import'])->name('product.import');

    Route::post('reviews/{slug}', [ProductReviewController::class, 'store'])->name('product.review.store');
    Route::resource('reviews', ProductReviewController::class)->except('show', 'create');
});

