package Assignment2;

public class Contract implements Cloneable {

	public double getPlan() {
		return plan;
	}

	public double getTotal() {
		return (this.month*this.plan)+smartphone.getPrice();
	}
	
	public int getMonth() {
		return month;
	}
	public void setMonth(int month) {
		this.month = month;
	}
	public void setPlan(double plan) {
		this.plan = plan;
	}
	
	public Mobile getSmartphone() {
		return smartphone;
	}
	public void setSmartphone(Mobile smartphone) {
		this.smartphone = smartphone;
	}
	private double plan;
	private double total;
	private int month;
	private Mobile smartphone;
	

public Contract(double plan, int month, Mobile smartphone) {
	this.plan = plan;
	this.total = (month*plan)+smartphone.getPrice();
	this.month = month;
	this.smartphone = smartphone;
}
public Contract clone() throws CloneNotSupportedException {
	//If you use the clone method it will throw the CLONENOTSU .. anyway. So it is better to throw it and then catch it. 
	Contract c1 = (Contract) super.clone();
	//makes a copy of the object (contract only) and returns a object type and therefore we need to cast it. 
	//it does not copy the object. So therefore, we need to do it and add it to the contract
	c1.setSmartphone((Mobile)smartphone.clone());// when we copy the contract object, the mobile object does not get coppied. 
	//so the smartphone in c1 will stay the same, the object. not a copy. So we copy the object Mobile and then we add it 
	//to the c1 contract. 
	return c1;

}
@Override
public String toString() {
	return "Description: " + smartphone.getDescription() +"\n"+"Price: $"+smartphone.getPrice()+
			"\n" + "Plan: $"+ this.getPlan() + "\n" + "Month: "+ this.getMonth() + "\n" + "Total: $"+ this.getTotal()+"\n"; 
}
}


