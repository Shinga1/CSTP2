package com.example.javaInventory.controller;

import com.example.javaInventory.entity.Orders;
import com.example.javaInventory.reports.Order;
import com.example.javaInventory.service.OrdersService;
import jakarta.servlet.http.HttpServletResponse;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.*;

import java.io.IOException;
import java.sql.Timestamp;
import java.time.LocalDateTime;
import java.util.List;

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

    @GetMapping("/orders/update/status/{id}")
    public String updateStatus(@PathVariable Long id, Model model) {
        model.addAttribute("order", ordersService.getOrderID(id));
        return "update-status";
    }

    @PostMapping("/orders/{id}")
    public String update(@PathVariable Long id, Orders orders) {
        Orders currentStatus = ordersService.getOrderID(id);
        currentStatus.setStatus(orders.getStatus());
        orders.setUpdatedAt(Timestamp.valueOf(LocalDateTime.now()));
        ordersService.updateStatus(currentStatus);
        return "redirect:/orders";
    }

    @GetMapping("/order/report")
    public void exportToOrderPDF(HttpServletResponse response) throws IOException {
        response.setContentType("application/pdf");

        String head = "Content-Disposition";
        String name = "attachment; filename = Celessentials-orders-report.pdf";

        response.setHeader(head, name);

        List<Orders> allOrders = ordersService.getAllOrders();

        Order exporter = new Order(allOrders);
        exporter.export(response);
    }
}
