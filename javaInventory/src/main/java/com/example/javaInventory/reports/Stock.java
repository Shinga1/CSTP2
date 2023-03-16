package com.example.javaInventory.reports;

import com.example.javaInventory.entity.Products;
import com.lowagie.text.*;
import com.lowagie.text.pdf.PdfPCell;
import com.lowagie.text.pdf.PdfPTable;
import com.lowagie.text.pdf.PdfWriter;
import jakarta.servlet.http.HttpServletResponse;

import java.io.IOException;
import java.util.ArrayList;
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
        Paragraph title = new Paragraph("Stock of all products", font);
        title.setSpacingAfter(20);
        document.add(title);

        if (outOfStock.isEmpty()){
            document.add(new Paragraph("There are no out of stock products."));
        } else {
            document.add(new Paragraph("Out of stock products"));
            PdfPTable outOfStockTable = new PdfPTable(3);
            outOfStockTable.setWidthPercentage(100);
            outOfStockTable.setSpacingBefore(20);

            headings(outOfStockTable);
            data(outOfStockTable, outOfStock);

            document.add(outOfStockTable);
        }

        if (lowStock.isEmpty()) {
            document.add(new Paragraph("There are no low stock products."));
        } else {
            document.add(new Paragraph("Low stock products"));
            PdfPTable lowStockTable = new PdfPTable(3);
            lowStockTable.setWidthPercentage(100);
            lowStockTable.setSpacingBefore(20);

            headings(lowStockTable);
            data(lowStockTable, lowStock);

            document.add(lowStockTable);
        }

        document.add(new Paragraph("In stock products"));
        PdfPTable inStockTable = new PdfPTable(3);
        inStockTable.setWidthPercentage(100);
        inStockTable.setSpacingBefore(20);

        headings(inStockTable);
        data(inStockTable, inStock);

        document.add(inStockTable);

        document.close();
    }
}
