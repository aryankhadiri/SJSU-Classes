package Assignment1;
import java.text.DecimalFormat;

public class Product implements	Displayable{
	String product_code;
	String product_desc;
	double product_price;

	public Product(String code, String desc, double price ) {
		this.product_code = code;
		this.product_desc = desc;
		if (price>1000000){
			this.product_price = 1000000;
			System.out.println("The product price must be in range of $50,000-$1,000,000");
			System.out.println("The product price for the product " +'"'+ code +" "+desc+'"'+
			" exeeded $1,000,000. Therefore It is set at maximum: $1,000,000" );
		}
		else if (price<50000){
			this.product_price = 50000;
			System.out.println("The product price must be in range of $50,000-$1,000,000");
			System.out.println("The product price for the product " + code +" "+desc+
			" is below $50,000. Therefore It is set at minimum: $50,000" );
		}
		else{
			this.product_price = price;
		}
	}
	public String getCode() {
		return this.product_code;
		}
	public String getDesc(){
		return this.product_desc;
	}
	public double getPrice() {
		
		return this.product_price;
	}
	
	@Override
	public String getDisplayText() {
		DecimalFormat df = new DecimalFormat("0.00");
		return "["+this.getCode()+"] "+ "["+this.getDesc() + 
		"] "+"[$"+ df.format(this.getPrice())+"]"; 
	}
}
