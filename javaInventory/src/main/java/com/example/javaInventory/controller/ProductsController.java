package com.example.javaInventory.controller;

import com.example.javaInventory.entity.Products;
import com.example.javaInventory.reports.Stock;
import com.example.javaInventory.service.ProductsService;
import jakarta.servlet.http.HttpServletResponse;
import jakarta.servlet.http.HttpSession;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.multipart.MultipartFile;
import org.springframework.web.servlet.mvc.support.RedirectAttributes;

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

    @GetMapping("/")
    public String allProducts(Model model, HttpSession session, @RequestParam(required = false) String filter) {
        List<Products> productsList;
        List<String> outOfStock = new ArrayList<>();
        List<String> lowStock = new ArrayList<>();
        List<String> messages = new ArrayList<>();

        if (filter != null && !filter.isEmpty()) {
            productsList = productsService.filterByStatus(filter);
            session.setAttribute("filter", filter);
        } else if (filter != null && filter.isEmpty()) {
            productsList = productsService.getAllProducts();
            session.removeAttribute("filter");
        } else {
            productsList = productsService.getAllProducts();
        }



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
        model.addAttribute("filter", filter);
        return "products";
    }

    @GetMapping("/filter")
    public String filterProductsByStatus(@RequestParam String filter, Model model) {
        List<Products> filteredProducts = productsService.filterByStatus(filter);
        model.addAttribute("products", filteredProducts);
        model.addAttribute("filter", filter);
        return "products";
    }

    @GetMapping("/clear-filter")
    public String clearFilter(HttpSession session) {
        session.removeAttribute("filter");
        return "redirect:/";
    }

    @GetMapping("/add")
    public String addNewProduct(Model model) {
        Products products = new Products();
        model.addAttribute("product", products);
        return "add-product";
    }

    @PostMapping("/")
    public String addProduct(Products products, @RequestParam("image") MultipartFile file, RedirectAttributes redirectAttributes) throws IOException {

        String fileName = file.getOriginalFilename();
        products.setProductImage(fileName);

        // save the image to java
        String localDir1 = "./product-images/";
        Path localPath1 = Paths.get(localDir1);
        if (!Files.exists(localPath1)) {
            Files.createDirectories(localPath1);
        }
        try (InputStream inputStream = file.getInputStream()) {
            Path filePath1 = localPath1.resolve(fileName);
            Files.copy(inputStream, filePath1, StandardCopyOption.REPLACE_EXISTING);
        } catch (IOException IOe) {
            throw new IOException("Error when saving image " + fileName);
        }


        // save the image to laravel
        String localDir2 = "../public/assets/images/productImages/";
        Path localPath2 = Paths.get(localDir2);
        if (!Files.exists(localPath2)) {
            Files.createDirectories(localPath2);
        }
        try (InputStream inputStream = file.getInputStream()) {
            Path filePath2 = localPath2.resolve(fileName);
            Files.copy(inputStream, filePath2, StandardCopyOption.REPLACE_EXISTING);
        } catch (IOException IOe) {
            throw new IOException("Error when saving image " + fileName);
        }

        productsService.saveProduct(products);
        redirectAttributes.addFlashAttribute("add", "Product successfully added!");
        return "redirect:/";
    }

    @GetMapping("/update/{id}")
    public String updateProduct(@PathVariable Long id, Model model) {
        model.addAttribute("product", productsService.getProductID(id));
        return "update-product";
    }

    @PostMapping("/{id}")
    public String update(@PathVariable Long id, Products product, @RequestParam("image") MultipartFile productImage, RedirectAttributes redirectAttributes) throws IOException {
        productsService.saveProduct(product);

        if (productImage.getOriginalFilename() != "") {
            product.setProductImage(productImage.getOriginalFilename());

            String fileName = productImage.getOriginalFilename();
            product.setProductImage(fileName);

            // update image in java
            String javaUploadDir = "./product-images/";
            Path javaUploadPath = Paths.get(javaUploadDir);
            if (!Files.exists(javaUploadPath)) {
                Files.createDirectories(javaUploadPath);
            }
            try (InputStream inputStream = productImage.getInputStream()) {
                Path filePath = javaUploadPath.resolve(fileName);
                Files.copy(inputStream, filePath, StandardCopyOption.REPLACE_EXISTING);
            } catch (IOException IOe) {
                throw new IOException("Error when saving image " + fileName);
            }

            // update image in laravel
            String laravelUploadDir = "../public/assets/images/productImages/";
            Path laravelUploadPath = Paths.get(laravelUploadDir);
            if (!Files.exists(laravelUploadPath)) {
                Files.createDirectories(laravelUploadPath);
            }
            try (InputStream inputStream = productImage.getInputStream()) {
                Path filePath = laravelUploadPath.resolve(fileName);
                Files.copy(inputStream, filePath, StandardCopyOption.REPLACE_EXISTING);
            } catch (IOException IOe) {
                throw new IOException("Error when saving image " + fileName);
            }

        }

        productsService.updateProduct(product);
        redirectAttributes.addFlashAttribute("updated", "Product updated successfully");
        return "redirect:/";
    }

    @GetMapping("/{id}")
    public String deleteProduct(@PathVariable Long id, RedirectAttributes redirectAttributes) {
        productsService.deleteProduct(id);
        redirectAttributes.addFlashAttribute("deleted", "Product has been deleted successfully");
        return "redirect:/";
    }

    @GetMapping("/reports")
    public String reports() {
        return "/reports";
    }

    @GetMapping("/stock/report")
    public void exportToPDF(HttpServletResponse response) throws IOException {
        response.setContentType("application/pdf");

        String header = "Content-Disposition";
        String name = "attachment; filename = Celessentials-stock-report.pdf";

        response.setHeader(header, name);

        List<Products> allProducts = productsService.getAllProducts();

        Stock exporter = new Stock(allProducts);
        exporter.export(response);

    }
}


