package com.example.javaInventory.controller;

import com.example.javaInventory.service.ProductsService;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;

@Controller
public class ProductsController {

    private ProductsService productsService;

    public ProductsController(ProductsService productsService) {
        super();
        this.productsService = productsService;
    }

    @GetMapping("/products")
    public String allProducts(Model model) {
        model.addAttribute("products", productsService.getAllProducts());
        return "products";
    }
}
