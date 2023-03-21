package com.example.javaInventory.service;

import com.example.javaInventory.entity.Orders;

import java.time.LocalDate;
import java.util.List;

public interface OrdersService {

    List<Orders> getAllOrders();

    Orders getOrderID(Long id);
    Orders updateStatus(Orders orders);

    List<Orders> getOrdersByDate(LocalDate date);

    List<Orders> getOrdersBetween(LocalDate atStartOfDay, LocalDate plusDays);
}
