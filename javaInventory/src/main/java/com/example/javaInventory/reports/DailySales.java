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
import java.time.LocalDate;
import java.util.Date;
import java.util.List;

public class DailySales {

    private List<Orders> dailySales;

    public DailySales(List<Orders> dailySales) {
        super();
        this.dailySales = dailySales;
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

        cell.setPhrase(new Phrase("Date of order"));
        table.addCell(cell);
    }

    private void data(PdfPTable table, List<Orders> dailySales) {
        for (Orders order : dailySales) {
            table.addCell(String.valueOf(order.getId()));
            table.addCell(order.getName());
            table.addCell(String.valueOf(order.getSubtotal()));
            table.addCell(order.getStatus());
            table.addCell(String.valueOf(order.getCreatedAt()));
        }
    }


    public void exportDaily(HttpServletResponse response, LocalDate today) throws IOException {
        Document document = new Document(PageSize.A4);

        PdfWriter.getInstance(document, response.getOutputStream());

        document.open();

        Font font = FontFactory.getFont(FontFactory.HELVETICA_BOLD);
        font.setSize(20);
        Paragraph title = new Paragraph("Celessentials sales report for today", font);
        title.setAlignment(Element.ALIGN_CENTER);
        title.setSpacingAfter(20);

        document.add(title);

        DateFormat dateFormat = new SimpleDateFormat("dd/MM/yyyy HH:mm:ss");
        Date date = new Date();

        Paragraph generatedAt = new Paragraph("Report was generated at: " + dateFormat.format(date));
        document.add(generatedAt);


        Font smallFont = FontFactory.getFont(FontFactory.HELVETICA_BOLD);
        smallFont.setSize(14);

        double moneyMade = 0;

        if (dailySales.isEmpty()) {
            document.add(new Paragraph("There are no orders to display for today.", smallFont));
        } else {
            document.add(new Paragraph("Below are all the orders that were placed today:", smallFont));
            PdfPTable dailyTable = new PdfPTable(5);
            dailyTable.setWidthPercentage(100);
            dailyTable.setSpacingBefore(20);

            headings(dailyTable);
            data(dailyTable, dailySales);

            document.add(dailyTable);

            for (Orders order : dailySales) {
                moneyMade += order.getSubtotal();
            }

            Paragraph made = new Paragraph("Total amount made today: £" + String.format("%.2f", moneyMade));
            made.setSpacingBefore(20);
            document.add(made);


            document.close();
        }
    }
}
