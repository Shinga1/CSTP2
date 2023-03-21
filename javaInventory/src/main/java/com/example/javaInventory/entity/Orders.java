package com.example.javaInventory.entity;

import jakarta.persistence.*;
import org.hibernate.annotations.UpdateTimestamp;

import java.sql.Timestamp;
import java.time.LocalDate;

@Entity
@Table(name = "orders")
public class Orders {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "id")
    private Long id;

    @Column(name = "user_id")
    private Integer userID;

    @Column(name = "name")
    private String name;

    @Column(name = "subtotal")
    private Float subtotal;

    @Column(name = "status")
    private String status;

    @Column(name = "created_at")
    private LocalDate orderDate;

    @Column(name = "updated_at")
    @UpdateTimestamp
    private Timestamp updatedAt;

    public Orders(Long id, Integer userID, String name, Float subtotal, String status, LocalDate createdAt, Timestamp updatedAt) {
        this.id = id;
        this.userID = userID;
        this.name = name;
        this.subtotal = subtotal;
        this.status = status;
        this.orderDate = createdAt;
        this.updatedAt = updatedAt;
    }

    //default constructor for entity
    public Orders() {

    }

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public Integer getUserID() {
        return userID;
    }

    public void setUserID(Integer userID) {
        this.userID = userID;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public Float getSubtotal() {
        return subtotal;
    }

    public void setSubtotal(Float subtotal) {
        this.subtotal = subtotal;
    }

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
    }

    public LocalDate getCreatedAt() {
        return orderDate;
    }

    public void setCreatedAt(LocalDate createdAt) {
        this.orderDate = createdAt;
    }

    public Timestamp getUpdatedAt() {
        return updatedAt;
    }

    public void setUpdatedAt(Timestamp updatedAt) {
        this.updatedAt = updatedAt;
    }
}
