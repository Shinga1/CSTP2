package com.example.javaInventory.service;

import com.example.javaInventory.entity.Products;
import com.example.javaInventory.repository.ProductsRepository;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class ProductsServiceImplementation implements ProductsService {

    private ProductsRepository productsRepository;

    public ProductsServiceImplementation(ProductsRepository productsRepository) {
        super();
        this.productsRepository = productsRepository;
    }

    @Override
    public List<Products> getAllProducts() {
        return productsRepository.findAll();
    }

    @Override
    public Products saveProduct(Products products) {
        return productsRepository.save(products);
    }

    @Override
    public Products updateProduct(Products products) {
        return productsRepository.save(products);
    }

    @Override
    public Products getProductID(Long id) {
        return productsRepository.findById(id).get();
    }

    @Override
    public void deleteProduct(Long id) {
        productsRepository.deleteById(id);
    }
}
