import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;


@Entity
@Table(name = "Products_Inventory")
 
public class InventoryItem {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private int id;
    @Column
    private String product_name;
    @Column
    private String product_image;
    @Column
    private String product_description;
    @Column
    private double product_price;
    @Column
    private String product_category;
    @Column
    private int product_stock;


    public InventoryItem() {}

    public InventoryItem(int id, String name, String image, String description, double price, String category,int stock) {
        this.id = id;
        this.product_name = name;
        this.product_image = image;
        this.product_description = description;
        this.product_price = price;
        this.product_category = category;
        this.product_stock = stock;
    }
    
    public void checkStockLevel(int minimum = 5) {
        if (this.stockLevel == 0) {
            sendAlertMessage("Product is out of stock.");
        } else if (this.stockLevel < minimum) {
            sendAlertMessage("Product stock level is low.");
        }
    }
    
    private void sendAlertMessage(String message) {
        System.out.println(message);
    }

    // Getter methods
    public int getId() {
        return id;
    }

    public String getName() {
        return name;
    }

    public String getImage(){
        return image;
    }

    public String getDescript(){
        return description;
    }

    public double getPrice() {
        return price;
    }

    public String getCategory(){
        return category;
    }

    public int getStock() {
        return stock;
    }

   


    // Setter methods
    public void setId(int id) {
        this.id = id;
    }

    public void setName(String name) {
        this.product_name = name;
    }

    public void setStock(int stock) {
        this.product_stock = stock;
    }

    public void setPrice(double price) {
        this.product_price = price;
    }
}

