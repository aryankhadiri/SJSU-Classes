package Assignment1;
import java.text.DecimalFormat;

public class DisplayableText {
	
	public static void main(String[] args) {
		Employee a = new Employee(1,"John", "Anderson");
		Product p = new Product("Medical", "Laser System", 23333.0);
		System.out.println("Welcome to my application");
		System.out.println(a.getDisplayText() +" "+ p.getDisplayText());
		System.out.println("Thank you for using my application");
	}
}
