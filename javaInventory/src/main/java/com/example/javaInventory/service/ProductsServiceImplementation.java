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
}
