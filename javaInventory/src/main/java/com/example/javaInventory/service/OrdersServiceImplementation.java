package com.example.javaInventory.service;

import com.example.javaInventory.entity.Orders;
import com.example.javaInventory.repository.OrdersRepository;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class OrdersServiceImplementation implements OrdersService {

    private OrdersRepository ordersRepository;

    public OrdersServiceImplementation(OrdersRepository ordersRepository) {
        super();
        this.ordersRepository = ordersRepository;
    }

    @Override
    public List<Orders> getAllOrders() {
        return ordersRepository.findAll();
    }
}
