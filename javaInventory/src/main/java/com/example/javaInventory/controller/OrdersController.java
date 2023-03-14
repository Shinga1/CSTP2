package com.example.javaInventory.controller;

import com.example.javaInventory.entity.Orders;
import com.example.javaInventory.service.OrdersService;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.*;

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

    @GetMapping("/orders/update/{id}")
    public String updateStatus(@PathVariable Long id, Model model) {
        model.addAttribute("order", ordersService.getOrderID(id));
        return "update-status";
    }

    @PostMapping("/orders/{id}")
    public String update(@PathVariable Long id, Orders orders) {
        Orders currentStatus = ordersService.getOrderID(id);
        currentStatus.setStatus(orders.getStatus());
        ordersService.updateStatus(currentStatus);
        return "redirect:/orders";
    }

}
