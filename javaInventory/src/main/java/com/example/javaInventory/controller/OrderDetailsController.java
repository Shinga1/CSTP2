package com.example.javaInventory.controller;

import com.example.javaInventory.entity.OrderDetails;
import com.example.javaInventory.service.OrderDetailsService;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.ui.Model;

import java.util.List;

@Controller
public class OrderDetailsController {

    private OrderDetailsService orderDetailsService;

    public OrderDetailsController(OrderDetailsService orderDetailsService) {
        super();
        this.orderDetailsService = orderDetailsService;
    }

    @GetMapping("/order/details/{orderId}")
    public String getOrderDetailsByOrderId(@PathVariable String orderId, Model model) {
        List<OrderDetails> orderDetails = orderDetailsService.getOrderDetailsByOrderId(orderId);
        model.addAttribute("orderDetails", orderDetails);
        return "order-details";
    }
}
