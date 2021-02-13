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
		};
		
		// setup event handlers.
		// We need to use "bind" or else it's uses 'window' as the function's object and not this object.
		// silly old callbacks.
		this.element['form'].onsubmit = this.onSubmit.bind(this);
		
	}
	validateCardNumber() {
		return true;
	}
	validateExpirationDate() {
		return true;
	}
	validateSecurityCode() {
		return true;
	}
	onSubmit(event) {
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
		
		return passed;
	}
}