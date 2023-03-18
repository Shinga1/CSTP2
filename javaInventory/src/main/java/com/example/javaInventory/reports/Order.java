package com.example.javaInventory.reports;

import com.example.javaInventory.entity.Orders;
import com.lowagie.text.*;
import com.lowagie.text.pdf.PdfPCell;
import com.lowagie.text.pdf.PdfPTable;
import com.lowagie.text.pdf.PdfWriter;
import jakarta.servlet.http.HttpServletResponse;

import java.io.IOException;
import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;

public class Order {
    private List<Orders> allOrders;

    public Order(List<Orders> allOrders) {
        super();
        this.allOrders = allOrders;
    }

    private void headings(PdfPTable table) {
        PdfPCell cell = new PdfPCell();

        cell.setPhrase(new Phrase("Order number"));
        table.addCell(cell);

        cell.setPhrase(new Phrase("Name of customer"));
        table.addCell(cell);

        cell.setPhrase(new Phrase("Total paid by customer"));
        table.addCell(cell);

        cell.setPhrase(new Phrase("Status of order"));
        table.addCell(cell);
    }

    private void data(PdfPTable table, List<Orders> allOrders) {
        for (Orders order : allOrders) {
            table.addCell(String.valueOf(order.getId()));
            table.addCell(order.getName());
            table.addCell(String.valueOf(order.getSubtotal()));
            table.addCell(order.getStatus());
        }
    }

    public void export(HttpServletResponse response) throws IOException {
        Document document = new Document(PageSize.A4);

        PdfWriter.getInstance(document, response.getOutputStream());

        document.open();

        List<Orders> processing = new ArrayList<>();
        List<Orders> shipping = new ArrayList<>();
        List<Orders> delivered = new ArrayList<>();
        List<Orders> cancelled = new ArrayList<>();

        for (Orders order : allOrders) {
            if (order.getStatus().equals("Processing")) {
                processing.add(order);
            } else if (order.getStatus().equals("Shipping")) {
                shipping.add(order);
            } else if (order.getStatus().equals("Cancelled")) {
                cancelled.add(order);
            } else if (order.getStatus().equals("Delivered")){
                delivered.add(order);
            }
        }

        Font font = FontFactory.getFont(FontFactory.HELVETICA_BOLD);
        font.setSize(20);
        Paragraph title = new Paragraph("Celessentials orders report", font);
        title.setAlignment(Element.ALIGN_CENTER);
        title.setSpacingAfter(20);

        document.add(title);

        DateFormat dateFormat = new SimpleDateFormat("dd/MM/yyyy HH:mm:ss");
        Date date = new Date();

        Paragraph generatedAt = new Paragraph("Report was generated at: " + dateFormat.format(date));
        document.add(generatedAt);

        Font smallFont = FontFactory.getFont(FontFactory.HELVETICA_BOLD);
        smallFont.setSize(14);

        if (processing.isEmpty()) {
            document.add(new Paragraph("There are no orders to process currently", smallFont));
        } else {
            document.add(new Paragraph("Below are all the orders that are being processed:", smallFont));
            PdfPTable processTable = new PdfPTable(4);
            processTable.setWidthPercentage(100);
            processTable.setSpacingBefore(20);

            headings(processTable);
            data(processTable, processing);

            document.add(processTable);
        }

        if (shipping.isEmpty()) {
            document.add(new Paragraph("There are no orders that are shipping.", smallFont));
        } else {
            document.add(new Paragraph("Below are all the orders that are shipping:", smallFont));
            PdfPTable shipTable = new PdfPTable(4);
            shipTable.setWidthPercentage(100);
            shipTable.setSpacingBefore(20);

            headings(shipTable);
            data(shipTable, shipping);

            document.add(shipTable);
        }


        if (delivered.isEmpty()) {
            document.add(new Paragraph("There are no orders that have been delivered yet", smallFont));
        } else {
            document.add(new Paragraph("Below are all the orders that have been delivered:", smallFont));
            PdfPTable deliveredTable = new PdfPTable(4);
            deliveredTable.setWidthPercentage(100);
            deliveredTable.setSpacingBefore(20);

            headings(deliveredTable);
            data(deliveredTable, delivered);

            document.add(deliveredTable);
        }


        if (cancelled.isEmpty()) {
            document.add(new Paragraph("There are no orders that have been cancelled.", smallFont));
        } else {
            document.add(new Paragraph("Below are all the orders that have been cancelled:", smallFont));
            PdfPTable cancelledTable = new PdfPTable(4);
            cancelledTable.setWidthPercentage(100);
            cancelledTable.setSpacingBefore(20);

            headings(cancelledTable);
            data(cancelledTable, cancelled);

            document.add(cancelledTable);
        }

        document.close();
    }

}
