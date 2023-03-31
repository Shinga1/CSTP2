package com.example.javaInventory;

import com.example.javaInventory.controller.OrdersController;
import com.example.javaInventory.entity.Orders;
import com.example.javaInventory.service.OrdersService;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Test;
import org.mockito.InjectMocks;
import org.mockito.Mock;
import org.mockito.MockitoAnnotations;
import org.springframework.ui.Model;

import jakarta.servlet.http.HttpSession;
import org.springframework.web.servlet.mvc.support.RedirectAttributes;

import java.util.ArrayList;
import java.util.List;

import static org.junit.jupiter.api.Assertions.assertEquals;
import static org.mockito.Mockito.verify;
import static org.mockito.Mockito.when;

public class OrdersControllerTest {

    @Mock
    private Model model;

    @Mock
    private OrdersService ordersService;

    @Mock
    private HttpSession mockSession;

    @InjectMocks
    private OrdersController ordersController;

    @Mock
    private RedirectAttributes redirectAttributes;

    @BeforeEach
    void setUp() {
        MockitoAnnotations.openMocks(this);
    }

    @Test
    void testAllOrders() throws Exception {
        // Arrange
        List<Orders> orders = new ArrayList<>();
        when(ordersService.getAllOrders()).thenReturn(orders);

        // Act
        String viewName = ordersController.allOrders(model, mockSession, null);

        // Assert
        assertEquals("orders", viewName);
        verify(model).addAttribute("orders", orders);
        verify(model).addAttribute("status", null);
    }

    @Test
    void testAllOrdersWithStatus() {
        // Arrange
        List<Orders> orders = new ArrayList<>();
        String status = "shipped";
        when(ordersService.filter(status)).thenReturn(orders);

        // Act
        String viewName = ordersController.allOrders(model, mockSession, status);

        // Assert
        assertEquals("orders", viewName);
        verify(model).addAttribute("orders", orders);
        verify(model).addAttribute("status", status);
    }

    @Test
    void testUpdateStatus() {
        // Arrange
        Integer orderId = 1;
        Orders order = new Orders();
        when(ordersService.getOrderID(Long.valueOf(orderId))).thenReturn(order);

        // Act
        String viewName = ordersController.updateStatus(Long.valueOf(orderId), model);

        // Assert
        assertEquals("update-status", viewName);
    }

    @Test
    void testUpdate() {
        // Arrange
        Integer orderId = 1;
        Orders order = new Orders();
        order.setId(Long.valueOf(orderId));
        order.setStatus("new status");
        Orders currentStatus = new Orders();
        currentStatus.setStatus("old status");
        when(ordersService.getOrderID(Long.valueOf(orderId))).thenReturn(currentStatus);

        // Act
        String viewName = ordersController.update(Long.valueOf(orderId), order, redirectAttributes);

        // Assert
        assertEquals("redirect:/orders", viewName);
        verify(ordersService).updateStatus(currentStatus);
        assertEquals("new status", currentStatus.getStatus());
        verify(redirectAttributes).addFlashAttribute("update", "Order status has been updated successfully");
    }
}
