package Assignment2;

public class MyTest {
	public static void main (String[] args) {
		Mobile m = new Mobile("Iphone", 1000.00);
		Contract c1 = new Contract(40, 12, m );
		Contract c2 = null;
		Contract c3 = null;
		try {
			c2 = c1.clone();
			c3 = c1.clone();
		}
		catch (CloneNotSupportedException ex){
			System.out.println("There was a problem with coppying the contract");
		}
		c3.setPlan(20);
		c3.setMonth(24);
		Mobile m2 = new Mobile("Galaxy", 500.00);
		c3.setSmartphone(m2);
		c3.updateTotal();
		
		System.out.println("-----------------------\n");
		System.out.println("Original Contact");
		System.out.println(c1.toString());
		System.out.println("------------------------\n");
		System.out.println("Coppied Contract");
		System.out.println(c2.toString());
		System.out.println("-----------------------\n");
		System.out.println("Original Contact");
		System.out.println(c1.toString());
		System.out.println("-----------------------\n");
		System.out.println("Modified Contract");
		System.out.println(c3.toString());
		
	}
}
