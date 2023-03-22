package com.example.javaInventory.service;

import com.example.javaInventory.entity.OrderDetails;

import java.util.List;


public interface OrderDetailsService {

    List<OrderDetails> getOrderDetailsByOrderId(String orderId);
}
