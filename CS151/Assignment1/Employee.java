package Assignment1;

public class Employee implements DepartmentConstants, Displayable {
	private int department;
	private String first_name;
	private String last_name;
	
	public Employee() {//default constructor 
		this.department = 0;
		this.first_name = null;
		this.last_name = null;
	}
	public Employee (int dep, String first, String last) {// constructor 
		this.department = dep;
		this.first_name = first;
		this.last_name = last;
}
	public String getFirstName() {
		return this.first_name;
	}

	public String getLastName() {
		return this.last_name;
	
}
	public String getDisplayText() {
		if (department == this.ADMIN) {
			return this.getFirstName()+" "+ this.getLastName()+" "+ "(Admin)";
		}
		else if (department == this.PRODUCTION) {
			return this.getFirstName()+" "+ this.getLastName()+" "+ "(Production)";
			
		}
		else if (department == this.MARKETING) {
			return this.getFirstName()+" "+ this.getLastName()+" "+ "(Marketing)";
			
		}
		else {return null;}
	}
}
