package com.example.javaInventory.reports;

import com.example.javaInventory.entity.Products;
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

public class Stock {
    private List<Products> allProducts;

    public Stock(List<Products> allProducts) {
        super();
        this.allProducts = allProducts;
    }

    private void headings(PdfPTable table) {
        PdfPCell cell = new PdfPCell();

        cell.setPhrase(new Phrase("Product ID"));
        table.addCell(cell);

        cell.setPhrase(new Phrase("Product name"));
        table.addCell(cell);

        cell.setPhrase(new Phrase("Product stock"));
        table.addCell(cell);

    }

    private void data(PdfPTable table, List<Products> allProducts) {
        for (Products product : allProducts) {
            table.addCell(String.valueOf(product.getId()));
            table.addCell(product.getProductName());
            table.addCell(String.valueOf(product.getProductStock()));
        }
    }

    public void export(HttpServletResponse response) throws IOException {
        Document document = new Document(PageSize.A4);

        PdfWriter.getInstance(document, response.getOutputStream());

        document.open();

        List<Products> outOfStock = new ArrayList<>();
        List<Products> lowStock = new ArrayList<>();
        List<Products> inStock = new ArrayList<>();

        for (Products product : allProducts) {
            if (product.getProductStock() == 0) {
                outOfStock.add(product);
            } else if (product.getProductStock() <= 5) {
                lowStock.add(product);
            } else if (product.getProductStock() > 5) {
                inStock.add(product);
            }
        }

        Font font = FontFactory.getFont(FontFactory.HELVETICA_BOLD);
        font.setSize(20);
        Paragraph title = new Paragraph("Celessentials stocks report", font);
        title.setAlignment(Element.ALIGN_CENTER);
        title.setSpacingAfter(20);

        document.add(title);

        DateFormat dateFormat = new SimpleDateFormat("dd/MM/yyyy HH:mm:ss");
        Date date = new Date();

        Paragraph generatedAt = new Paragraph("Report was generated at: " + dateFormat.format(date));
        document.add(generatedAt);

        Font smallFont = FontFactory.getFont(FontFactory.HELVETICA_BOLD);
        smallFont.setSize(14);

        if (outOfStock.isEmpty()){
            document.add(new Paragraph("There are no out of stock products currently.", smallFont));
        } else {
            document.add(new Paragraph("Below are all the out of stock products:", smallFont));
            PdfPTable outOfStockTable = new PdfPTable(3);
            outOfStockTable.setWidthPercentage(100);
            outOfStockTable.setSpacingBefore(20);

            headings(outOfStockTable);
            data(outOfStockTable, outOfStock);

            document.add(outOfStockTable);
        }

        if (lowStock.isEmpty()) {
            document.add(new Paragraph("There are no low stock products currently.", smallFont));
        } else {
            document.add(new Paragraph("Below are all the low stock products:", smallFont));
            PdfPTable lowStockTable = new PdfPTable(3);
            lowStockTable.setWidthPercentage(100);
            lowStockTable.setSpacingBefore(20);

            headings(lowStockTable);
            data(lowStockTable, lowStock);

            document.add(lowStockTable);
        }

        if (inStock.isEmpty()) {
            document.add(new Paragraph("There are currently no in stock products.", smallFont));
        } else {
            document.add(new Paragraph("Below are all the in stock products:", smallFont));
            PdfPTable inStockTable = new PdfPTable(3);
            inStockTable.setWidthPercentage(100);
            inStockTable.setSpacingBefore(20);

            headings(inStockTable);
            data(inStockTable, inStock);

            document.add(inStockTable);
        }


        document.close();
    }
}
