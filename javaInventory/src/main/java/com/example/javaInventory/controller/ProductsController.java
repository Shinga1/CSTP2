package com.example.javaInventory.controller;

import com.example.javaInventory.entity.Products;
import com.example.javaInventory.reports.Stock;
import com.example.javaInventory.service.ProductsService;
import com.lowagie.text.DocumentException;
import jakarta.servlet.http.HttpServletResponse;
import jakarta.servlet.http.HttpSession;
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
import java.util.ArrayList;
import java.util.List;

@Controller
public class ProductsController {

    private ProductsService productsService;

    public ProductsController(ProductsService productsService) {
        super();
        this.productsService = productsService;
    }

    @GetMapping("/products")
    public String allProducts(Model model, HttpSession session) {
        List<Products> productsList = productsService.getAllProducts();
        List<String> outOfStock = new ArrayList<>();
        List<String> lowStock = new ArrayList<>();
        List<String> messages = new ArrayList<>();

        for (Products product : productsList) {
            if (product.getProductStock() == 0) {
                outOfStock.add(product.getProductName());
            } else if (product.getProductStock() <= 5) {
                lowStock.add(product.getProductName());
            }
        }

        if (!outOfStock.isEmpty()) {
            messages.add(String.join(", ", outOfStock) + " are out of stock");
        }

        if (!lowStock.isEmpty()) {
            messages.add(String.join(", ", lowStock) + " have low stock");
        }

        if (messages.isEmpty()) {
            messages.add("All products are in stock");
        }

        session.setAttribute("messages", messages);
        model.addAttribute("products", productsList);
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

    @GetMapping("/products/{id}")
    public String deleteProduct(@PathVariable Long id) {
        productsService.deleteProduct(id);
        return "redirect:/products";
    }

    @GetMapping("/reports")
    public String reports() {
        return "/reports";
    }

    @GetMapping("/stock/report")
    public void exportToPDF(HttpServletResponse response) throws IOException {
        response.setContentType("application/pdf");

        String header = "Content-Disposition";
        String name = "attachment; filename = stock-levels.pdf";

        response.setHeader(header, name);

        List<Products> allProducts = productsService.getAllProducts();

        Stock exporter = new Stock(allProducts);
        exporter.export(response);

    }
}


