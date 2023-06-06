<?php

namespace App\Services\InventoryServices;

use App\Repositories\InventoryRepositories\ProductRepository;

class ProductService
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function products()
    {
        return $this->productRepository->products();
    }

    public function store($request)
    {
        $imagesPaths = $this->productRepository->storeImage($request);
        $product = $this->productRepository->store($request, $imagesPaths);
        return $this->productRepository->attachCategoriesWithProduct($product, $request->selected_categories);
    }

    public function show($productId)
    {
        return $this->productRepository->show($productId);
    }

    // get single product 
    public function getSingleProduct($productId)
    {
        return $this->productRepository->getSingleProductDetail($productId);
    }

    // Store product as viewed product 
    public function storeViewProduct($productId)
    {
        return $this->productRepository->storeViewProduct($productId);
    }

    public function edit($productId)
    {
        return $this->productRepository->show($productId);
    }

    public function update($request, $id)
    {
        $imagesPaths = $this->productRepository->storeImage($request);
        $product = $this->productRepository->update($request, $id, $imagesPaths);
        return $this->productRepository->attachCategoriesWithProduct($product, $request->selected_categories);
    }

    public function destroy($productId)
    {
        return $this->productRepository->destroy($productId);
    }

    public function shippingType($shipping_type_id)
    {
        return $this->productRepository->fetchShippingType($shipping_type_id);
    }

    
    public function fetchAllShippingTypes()
    {
        return $this->productRepository->fetchAllShippingTypes();
    }
    
    public function fetchProductsWithCategory($categoryId)
    {
        $categoryAndChildrenIds = $this->productRepository->getCategoryAndChildrenIds($categoryId);
        return $this->productRepository->getProductidsWithCategories($categoryAndChildrenIds);
    }

    // Add to Favorite product 
    public function addToFavoriteProduct($request)
    {
        return $this->productRepository->addToFavoriteProduct($request);
    }

    // Remove from Favorite product 
    public function removeFavoriteProduct($request)
    {
        return $this->productRepository->removeFavoriteProduct($request);
    }

    // get All Favorite product 
    public function getAllFavoriteProduct()
    {
        return $this->productRepository->getAllFavoriteProduct();
    }

    // get All viewed product 
    public function getViewedProduct()
    {
        return $this->productRepository->getViewedProduct();
    }

    // get All Popular product 
    public function getPopularProduct()
    {
        return $this->productRepository->getPopularProduct();
    }

}
