package com.example.javaInventory.service;

import com.example.javaInventory.entity.Orders;
import com.example.javaInventory.repository.OrdersRepository;
import jakarta.persistence.EntityManager;
import jakarta.persistence.PersistenceContext;
import jakarta.persistence.TypedQuery;
import org.springframework.stereotype.Service;

import java.time.LocalDate;
import java.util.List;

@Service
public class OrdersServiceImplementation implements OrdersService {

    private OrdersRepository ordersRepository;

    @PersistenceContext
    private EntityManager entityManager;

    public OrdersServiceImplementation(OrdersRepository ordersRepository) {
        super();
        this.ordersRepository = ordersRepository;
    }

    @Override
    public List<Orders> getAllOrders() {
        return ordersRepository.findAll();
    }

    @Override
    public Orders getOrderID(Long id) {
        return ordersRepository.findById(id).get();
    }

    @Override
    public Orders updateStatus(Orders orders) {
        return ordersRepository.save(orders);
    }

    @Override
    public List<Orders> getOrdersByDate(LocalDate date) {
        return ordersRepository.findByOrderDate();
    }

    @Override
    public List<Orders> getOrdersBetween(LocalDate startDay, LocalDate endDate) {
        return ordersRepository.findByOrdersBetween();
    }

    @Override
    public List<Orders> filter(String status) {
        TypedQuery<Orders> query;
        if (status.equals("Processing")) {
            query = entityManager.createQuery("SELECT orderN FROM Orders orderN WHERE orderN.status = 'Processing'", Orders.class);
        } else if (status.equals("Shipping")) {
            query = entityManager.createQuery("SELECT orderN FROM Orders orderN WHERE orderN.status = 'Shipping'", Orders.class);
        } else if (status.equals("Delivered")) {
            query = entityManager.createQuery("SELECT orderN FROM Orders orderN WHERE orderN.status = 'Delivered'", Orders.class);
        } else if (status.equals("Cancelled")) {
            query = entityManager.createQuery("SELECT orderN FROM Orders orderN WHERE orderN.status = 'Cancelled'", Orders.class);
        } else {
            query = entityManager.createQuery("SELECT orderN FROM Orders orderN", Orders.class);
        }
        return query.getResultList();
    }
}

