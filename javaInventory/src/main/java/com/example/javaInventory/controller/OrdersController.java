package com.example.javaInventory.controller;

import com.example.javaInventory.service.OrdersService;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;

@Controller
public class OrdersController {

    private OrdersService ordersService;

    public OrdersController(OrdersService ordersService) {
        super();
        this.ordersService = ordersService;
    }

    @GetMapping("/orders")
    public String allOrders(Model model){
        model.addAttribute("orders", ordersService.getAllOrders());
        return "orders";
    }

}
