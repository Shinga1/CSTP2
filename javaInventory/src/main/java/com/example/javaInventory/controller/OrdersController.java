package com.example.javaInventory.controller;

import com.example.javaInventory.entity.Orders;
import com.example.javaInventory.reports.DailySales;
import com.example.javaInventory.reports.Order;
import com.example.javaInventory.reports.WeeklySales;
import com.example.javaInventory.service.OrdersService;
import jakarta.servlet.http.HttpServletResponse;
import jakarta.servlet.http.HttpSession;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.servlet.mvc.support.RedirectAttributes;

import java.io.IOException;
import java.sql.Timestamp;
import java.time.LocalDate;
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
    public String allOrders(Model model, HttpSession session, @RequestParam(value = "status", required = false) String status){
        List<Orders> orders;
        if (status != null && !status.isEmpty()) {
            orders = ordersService.filter(status);
            session.setAttribute("status", status);
        } else if (status != null && status.isEmpty()) {
            orders = ordersService.getAllOrders();
            session.removeAttribute("status");
        } else {
            orders = ordersService.getAllOrders();
        }

        model.addAttribute("orders", orders);
        model.addAttribute("status", status);

        return "orders";
    }

    @GetMapping("/filter/status")
    public String filterOrder(@RequestParam String status, Model model) {
        List<Orders> filteredOrders = ordersService.filter(status);
        model.addAttribute("orders", filteredOrders);
        model.addAttribute("status", status);
        return "orders";
    }

    @GetMapping("/clear")
    public String clear(HttpSession session) {
        session.removeAttribute("status");
        return "redirect:/orders";
    }


    @GetMapping("/orders/update/status/{id}")
    public String updateStatus(@PathVariable Long id, Model model) {
        model.addAttribute("order", ordersService.getOrderID(id));
        return "update-status";
    }

    @PostMapping("/orders/{id}")
    public String update(@PathVariable Long id, Orders orders, RedirectAttributes redirectAttributes) {
        Orders currentStatus = ordersService.getOrderID(id);
        currentStatus.setStatus(orders.getStatus());
        orders.setUpdatedAt(Timestamp.valueOf(LocalDateTime.now()));
        ordersService.updateStatus(currentStatus);
        redirectAttributes.addFlashAttribute("update", "Order status has been updated successfully");
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

    @GetMapping("/daily/report")
    public void exportDailyPDF(HttpServletResponse response) throws IOException {
        response.setContentType("application/pdf");

        String head = "Content-Disposition";
        String name = "attachment; filename = Celessentials-daily-sales-report.pdf";

        response.setHeader(head, name);

        LocalDate today = LocalDate.now();
        List<Orders> dailySales = ordersService.getOrdersByDate(today);

        DailySales exporter = new DailySales(dailySales);
        exporter.exportDaily(response, today);
    }

    @GetMapping("/weekly/report")
    public void exportWeeklyPDF(HttpServletResponse response) throws IOException {
        response.setContentType("application/pdf");

        String head = "Content-Disposition";
        String name = "attachment; filename = Celessentials-weekly-sales-report.pdf";

        LocalDate end = LocalDate.now();
        LocalDate start = end.minusWeeks(1);


        response.setHeader(head, name);

        List<Orders> weeklySales = ordersService.getOrdersBetween(start, end.plusDays(1));

        WeeklySales exporter = new WeeklySales(weeklySales, ordersService);
        exporter.exportWeekly(response);
    }

}
