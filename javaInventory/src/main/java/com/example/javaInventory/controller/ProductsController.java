package com.example.javaInventory.controller;

import com.example.javaInventory.entity.Products;
import com.example.javaInventory.service.ProductsService;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.multipart.MultipartFile;

import java.io.IOException;
import java.io.InputStream;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;
import java.nio.file.StandardCopyOption;

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

    @GetMapping("/products/add")
    public String addNewProduct(Model model) {
        Products products = new Products();
        model.addAttribute("product", products);
        return "add-product";
    }

    @PostMapping("/products")
    public String addProduct(Products products, @RequestParam("image") MultipartFile file) throws IOException {

        String fileName = file.getOriginalFilename();
        products.setProductImage(fileName);

        String uploadDir = "./product-images/";

        Path uploadPath = Paths.get(uploadDir);

        if (!Files.exists(uploadPath)) {
            Files.createDirectories(uploadPath);
        }

        try (InputStream inputStream = file.getInputStream()) {
            Path filePath = uploadPath.resolve(fileName);
            Files.copy(inputStream, filePath, StandardCopyOption.REPLACE_EXISTING);
        } catch (IOException IOe) {
            throw new IOException("Error when saving image " + fileName);
        }

        productsService.saveProduct(products);
        return "redirect:/products";
    }

    @GetMapping("/products/update/{id}")
    public String updateProduct(@PathVariable Long id, Model model) {
        model.addAttribute("product", productsService.getProductID(id));
        return "update-product";
    }

    @PostMapping("/products/{id}")
    public String update(@PathVariable Long id, Products product, @RequestParam("image") MultipartFile productImage) throws IOException {
        productsService.saveProduct(product);

        if (productImage.getOriginalFilename() != "") {
            product.setProductImage(productImage.getOriginalFilename());

            String fileName = productImage.getOriginalFilename();
            product.setProductImage(fileName);

            String uploadDir = "./product-images/";

            Path uploadPath = Paths.get(uploadDir);

            if (!Files.exists(uploadPath)) {
                Files.createDirectories(uploadPath);
            }

            try (InputStream inputStream = productImage.getInputStream()) {
                Path filePath = uploadPath.resolve(fileName);
                Files.copy(inputStream, filePath, StandardCopyOption.REPLACE_EXISTING);
            } catch (IOException IOe) {
                throw new IOException("Error when saving image " + fileName);
            }

        }

        productsService.updateProduct(product);
        return "redirect:/products";
    }
}


