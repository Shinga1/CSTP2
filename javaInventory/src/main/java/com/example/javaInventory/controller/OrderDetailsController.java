package com.example.javaInventory.controller;

import com.example.javaInventory.entity.OrderDetails;
import com.example.javaInventory.entity.Products;
import com.example.javaInventory.service.OrderDetailsService;
import com.example.javaInventory.service.ProductsService;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.ui.Model;

import java.util.List;

@Controller
public class OrderDetailsController {

    private OrderDetailsService orderDetailsService;
    private ProductsService productsService;

    public OrderDetailsController(OrderDetailsService orderDetailsService, ProductsService productsService) {
        this.orderDetailsService = orderDetailsService;
        this.productsService = productsService;
    }

    @GetMapping("/order/details/{orderId}")
    public String getOrderDetailsByOrderId(@PathVariable String orderId, Model model) {
        List<OrderDetails> orderDetails = orderDetailsService.getOrderDetailsByOrderId(orderId);

        for (OrderDetails orderDetail : orderDetails) {
            Long productId = orderDetail.getProductID();
            Products product = productsService.getProductID(productId);
            orderDetail.setProduct(product);
        }

        model.addAttribute("orderDetails", orderDetails);
        return "order-details";
    }
}
