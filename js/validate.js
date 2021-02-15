"use strict";
	
class FormValidator {
	constructor() {

		// Find all the interesting elements.
		this.element = {
			"form": document.getElementById("myForm"),
			"cardNumber": document.getElementById("cardNumber"),
			"expirationDate": document.getElementById("expirationDate"),
			"expirationYear": document.getElementById("expirationYear"),
			"securityCode": document.getElementById("securityCode"),
			"valid": document.getElementById("valid"),
			"issuesList" : document.getElementById("issuesList"),
			"issues" : document.getElementById("issues"),
			
		};
		
		// setup event handlers.
		// We need to use "bind" or else it uses 'window' as the function's object and not this object.
		// silly old callbacks.
		this.element['form'].onsubmit = this.onSubmit.bind(this);
		
	}
	
	issue(string){
		let newIssue = document.createElement("li");
		newIssue.appendChild(document.createTextNode(string));
		this.element["issuesList"].appendChild(newIssue);
		
	}
	
	clearIssues(){
		this.element["issuesList"].innerHTML = "";
		
		}
	
	
	//pad put to validate, using regex
	validateCardNumber() {
		console.log(this.element["cardNumber"].value);
		let passed = true;
		let val = this.element["cardNumber"].value;
		if (val.length < 16){
			passed = false;
			this.issue("Credit card number too short, must be exactly 16 characters in length.");	
		}
		else if (val.length > 16){
			passed = false;
			this.issue("Credit card number too long, must be exactly 16 characters in length.");
		}
		
		let regexp = /^5[1-5][0-9]{14}$/;
        if (!regexp.test(val)){
			passed = false;
			this.issue("The credit card number did not look like a credit card number.");
		}
		return passed;
	}

	validateExpirationDate() {
		return true;
	}
	
	validateSecurityCode() {
		return true;
	}
	
	onSubmit(event) {
		this.clearIssues();
		let passed = true;
		if (!this.validateCardNumber()) {
			passed = false;
		}
		if (!this.validateExpirationDate()) {
			passed = false;
		}
		if (!this.validateSecurityCode()) {
			passed = false;
		}
		
		if (passed === true){
			this.element["valid"].value = 1;
			this.element["issues"].classList.add("hidden");
		} else {
			this.element["valid"].value = 0;
			this.element["issues"].classList.remove("hidden");
		}
		
		return passed;
	}
	
}
let validator = new FormValidator();