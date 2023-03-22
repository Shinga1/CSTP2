package com.example.javaInventory.service;

import com.example.javaInventory.entity.Products;
import com.example.javaInventory.repository.ProductsRepository;
import jakarta.persistence.EntityManager;
import jakarta.persistence.PersistenceContext;
import jakarta.persistence.TypedQuery;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class ProductsServiceImplementation implements ProductsService {

    private ProductsRepository productsRepository;

    @PersistenceContext
    private EntityManager entityManager;

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

    @Override
    public List<Products> filterByStatus(String status) {
        TypedQuery<Products> query;
        if (status.equals("In Stock")) {
            query = entityManager.createQuery("SELECT product FROM Products product WHERE product.productStock > 5", Products.class);
        } else if (status.equals("Low Stock")) {
            query = entityManager.createQuery("SELECT product FROM Products product WHERE product.productStock <= 5 AND product.productStock > 0", Products.class);
        } else if (status.equals("Out of Stock")) {
            query = entityManager.createQuery("SELECT product FROM Products product WHERE product.productStock = 0", Products.class);
        } else {
            query = entityManager.createQuery("SELECT product FROM Products product", Products.class);
        }
        return query.getResultList();
    }
}
