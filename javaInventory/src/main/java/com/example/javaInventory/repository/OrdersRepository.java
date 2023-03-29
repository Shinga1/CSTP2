package com.example.javaInventory.repository;

import com.example.javaInventory.entity.Orders;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import java.util.List;

public interface OrdersRepository extends JpaRepository<Orders, Long> {


    @Query(value = "SELECT * FROM orders WHERE DATE(created_at) = CURDATE()", nativeQuery = true)
    List<Orders> findByOrderDate();

    @Query(value = "SELECT * FROM orders WHERE created_at BETWEEN CURDATE() - INTERVAL 7 DAY AND CURDATE()", nativeQuery = true)
    List<Orders> findByOrdersBetween();

    @Query(value = "SELECT COUNT(*) FROM orders WHERE DATE(created_at) BETWEEN CURDATE() - INTERVAL 6 DAY AND CURDATE() GROUP BY DATE(created_at)", nativeQuery = true)
    List<Integer> countOrdersByDayLast7Days();

}
