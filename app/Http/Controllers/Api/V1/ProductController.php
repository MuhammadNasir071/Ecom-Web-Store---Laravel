<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Product;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use Symfony\Component\HttpFoundation\Response;
use App\Services\InventoryServices\ProductService;
use App\Http\Requests\InventoryRequests\StoreProductRequest;
use App\Http\Resources\ProductDetailCollection;
use App\Http\Resources\ProductDetailResource;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    use ApiResponse;
    protected $productService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = limitPerPage($request);
        $products = $this->productService->products()
                            ->with('media')
                            ->searchByName($request->key)
                            ->paginate($limit);
        return $this->success('All Products List Response', new ProductCollection($products));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\InventoryRequests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  mixed  $productId
     * @return \Illuminate\Http\Response
     */
    public function show($productId)
    {
        $product =  $this->productService->getSingleProduct($productId);
        $this->productService->storeViewProduct($productId);
        return $this->success("Single Product Response",  new ProductDetailCollection($product));
    }

    /**
     * Display all products with category and its children.
     *
     * @param  mixed  $productId
     * @return \Illuminate\Http\Response
     */
    public function showProductsWithCatgeory(Request $request, $categoryId)
    {
        $limit = limitPerPage($request);

        $products =  $this->productService->fetchProductsWithCategory($categoryId)->with('media')
        ->searchByName($request->key)
        ->paginate($limit);

        return $this->success(
            "Products With Category Response", new ProductCollection($products));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\InventoryRequests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $this->productsService->destroy($id);
            return $this->success(trans('admin.DELETE_PRODUCT'), ['success' => true, 'data' => null]);
        }
        catch (\Throwable $th) {
            return $this->error('Product not found', Response::HTTP_NOT_FOUND, ['success' => false, 'data' => null]);
        }
    }

    // add to Favorite product
    public function addToFavoriteProduct(Request $request)
    {
        $this->productService->addToFavoriteProduct($request);
        return $this->success("Product added to favorite",  ['action' => "Product added to favorite"] );
    }

    // add to Favorite product
    public function removeFavoriteProduct(Request $request)
    {
        $this->productService->removeFavoriteProduct($request);
        return $this->success("Product removed from favorite",  ['action' => "Product removed from favorite"] );
    }

    // get all to Favorite products
    public function getAllFavoriteProduct()
    {
        $allFavortProduct = $this->productService->getAllFavoriteProduct();
        return $this->success("All favorite products",  ['allFavortProduct' => ProductResource::collection($allFavortProduct)]);
    }

    // get all to Viewed products
    public function getViewedProduct()
    {
        $allViewedProduct = $this->productService->getViewedProduct();
        return $this->success("All Viewed products",  ['allViewedProduct' => ProductResource::collection($allViewedProduct)]);
    }

    // get all to popular products
    public function getPopularProduct()
    {
        $allPopularProduct = $this->productService->getPopularProduct();
        return $this->success("All popular products",  ['allPopularProduct' => ProductResource::collection($allPopularProduct)]);
    }
}
