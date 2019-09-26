package Assignment2;

public class Mobile implements Cloneable{

	private String brand;
	private double price;
	

public Mobile (String Des, double price) {
this.brand = Des;
this.price = price;
}


public String getDescription() {
return brand;
}


public void setDescription(String description) {
this.brand = description;
}


public double getPrice() {
return price;
}


public void setPrice(double price) {
this.price = price;
}
public Object clone() throws CloneNotSupportedException {
return super.clone();
}

}
