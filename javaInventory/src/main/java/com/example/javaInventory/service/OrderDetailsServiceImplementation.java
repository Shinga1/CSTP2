package com.example.javaInventory.service;

import com.example.javaInventory.entity.OrderDetails;
import com.example.javaInventory.repository.OrderDetailsRepository;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class OrderDetailsServiceImplementation implements OrderDetailsService{

    private OrderDetailsRepository orderDetailsRepository;

    public OrderDetailsServiceImplementation(OrderDetailsRepository orderDetailsRepository) {
        super();
        this.orderDetailsRepository = orderDetailsRepository;
    }

    @Override
    public List<OrderDetails> getOrderDetailsByOrderId(String orderId) {
        return orderDetailsRepository.findByOrderID(orderId);
    }
}
