# Team 20
## Celessentials

### Contributors:

* Hasnain Ali
* Ameera Desai
* Ismail Hussain
* Karan Kapoor
* Shingai Mutumbi
* Anaami Patel
* Manav Chana
---

### Project description:
Celessentials is a company that sells celebrity-related products. Our goal is to provide our customers with high-quality products associated with their favourite celebrities. Our website offers a wide range of celebrity-produced or endorsed products, including perfumes, accessories, beauty items, and much more. All of our customers receive a smooth purchasing procedure. We at Celessentials believe in the power of celebrity culture to inspire and connect people, and we are committed to providing our customers with the most up-to-date celebrity products.

---

## Setting up the Celessentials website

## Requirements:
* Laravel 
* Composer 
* PHP
* XAMPP 

---

### Steps to open locally:

1. Clone this repository `git@github.com:Shinga1/CSTP2.git`
2. Open XAMPP and start Apache and MySQL
3. Create a new database called `celessentials`
4. Go into the folder called mySQL database and you will find a sql file copy that into the SQL in XAMPP
5. Open the CSTP2 folder inside VS code
6. Check the .env folder so it is like the following: <br>
`DB_CONNECTION=mysql` <br>
`DB_HOST=127.0.0.1` <br>
`DB_PORT=3306` <br>
`DB_DATABASE=celessentials` <br>
`DB_USERNAME=root` <br>
`DB_PASSWORD=` <br>
7. Run `php artisan key:generate`
8. Run `php artisan serve`
9. Open `http://127.0.0.1:8000/` in the browser

### Now you should have access to the Celessentials website

---

## Steps to open the java inventory locally

## Requirements:
* A IDE (Intellij IDEA or Eclipse) 
* Java development kit (JDK) 
* Maven

### Steps to open locally:

1. If you have not clone this repository `git@github.com:Shinga1/CSTP2.git`
2. Open XAMPP and start Apache and MySQL
3. If you have not create a new database called `celessentials`
4. If you have not go into the folder called mySQL database and you will find a sql file copy that into the SQL in XAMPP 
5. Open the `javaInventory` folder inside you selected IDE
6. Navigate to `javaInventory/src/main/resources/application.properties` and check that the first line is: <br>
`spring.datasource.url=jdbc:mysql://localhost:3306/celessentials` <br>
7. Run the java application by going to `javaInventory/src/main/java/com/example/javaInventory/JavaApplication.java/` and right clicking on it and pressing `Run 'JavaAppIication'`
8. Open `http://127.0.0.1:8080/` in the browser
