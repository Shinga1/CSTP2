package com.example.javaInventory.service;

import com.example.javaInventory.entity.Products;

import java.util.List;

public interface ProductsService {

    List<Products> getAllProducts();

    Products saveProduct(Products products);

    Products updateProduct(Products products);
    Products getProductID(Long id);
}
