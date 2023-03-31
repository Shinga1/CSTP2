package com.example.javaInventory;

import com.example.javaInventory.controller.ProductsController;
import com.example.javaInventory.entity.Products;
import com.example.javaInventory.service.ProductsService;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Test;
import org.mockito.InjectMocks;
import org.mockito.Mock;
import org.mockito.MockitoAnnotations;
import org.springframework.ui.Model;
import org.springframework.web.servlet.mvc.support.RedirectAttributes;
import org.springframework.web.servlet.mvc.support.RedirectAttributesModelMap;

import static org.junit.jupiter.api.Assertions.assertEquals;
import static org.mockito.Mockito.when;

public class ProductsControllerTest {

    @Mock
    private Model model;

    @InjectMocks
    private ProductsController productsController;

    @Mock
    private ProductsService productsService;

    @BeforeEach
    void setUp() {
        MockitoAnnotations.openMocks(this);
    }

    @Test
    void testAddNewProduct() {
        // Arrange
        Products products = new Products();
        when(model.addAttribute("product", products)).thenReturn(model);

        // Act
        String viewName = productsController.addNewProduct(model);

        // Assert
        assertEquals("add-product", viewName);
    }

    @Test
    void testUpdateProduct() {
        // Arrange
        Integer id = 1;
        Products product = new Products();
        when(productsService.getProductID(Long.valueOf(id))).thenReturn(product);

        // Act
        String viewName = productsController.updateProduct(Long.valueOf(id), model);

        // Assert
        assertEquals("update-product", viewName);
    }

    @Test
    void testDeleteProduct() {
        // Arrange
        Integer id = 1;
        RedirectAttributes redirectAttributes = new RedirectAttributesModelMap();

        // Act
        String viewName = productsController.deleteProduct(Long.valueOf(id), redirectAttributes);

        // Assert
        assertEquals("redirect:/", viewName);
        assertEquals("Product has been deleted successfully", redirectAttributes.getFlashAttributes().get("deleted"));
    }
}
