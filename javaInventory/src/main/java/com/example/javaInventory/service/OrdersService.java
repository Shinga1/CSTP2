package com.example.javaInventory.service;

import com.example.javaInventory.entity.Orders;

import java.util.List;

public interface OrdersService {

    List<Orders> getAllOrders();

    Orders getOrderID(Long id);
    Orders updateStatus(Orders orders);
}
