package com.example.javaInventory;

import com.example.javaInventory.controller.ProductsController;
import com.example.javaInventory.entity.Products;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Test;
import org.mockito.InjectMocks;
import org.mockito.Mock;
import org.mockito.MockitoAnnotations;
import org.springframework.ui.Model;

import static org.junit.jupiter.api.Assertions.assertEquals;
import static org.mockito.Mockito.when;

public class ProductsControllerTest {

    @Mock
    private Model model;

    @InjectMocks
    private ProductsController productsController;

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
}
