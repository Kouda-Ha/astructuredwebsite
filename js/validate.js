'use strict';
	
class FormValidator {
	constructor() {

		// Find all the interesting elements.
		this.element = {
			'form': document.getElementById('myForm'),
			'cardNumber': document.getElementById('cardNumber'),
			'expirationDate': document.getElementById('expirationDate'),
			'expirationYear': document.getElementById('expirationYear'),
			'securityCode': document.getElementById('securityCode'),
			'valid': document.getElementById('valid'),
			'issuesList' : document.getElementById('issuesList'),
			'issues' : document.getElementById('issues'),
		};
		
		// Setup event handlers.
		// Uses 'bind' or else it uses 'window' as the function's object and not this object.
		// Silly old callbacks.
		this.element['form'].onsubmit = this.onSubmit.bind(this);
	}
	
	issue(string){
		let newIssue = document.createElement('li');
		newIssue.appendChild(document.createTextNode(string));
		this.element['issuesList'].appendChild(newIssue);
	}
	
	clearIssues(){
		this.element['issuesList'].innerHTML = '';	
	}
	
	
	//Validates credit card number, checks length and pattern matches, using regex
	validateCardNumber() {
		let passed = true;
		let val = this.element['cardNumber'].value;
		if (val.length < 16){
			passed = false;
			this.issue('Credit card number too short, must be exactly 16 characters in length.');	
		}
		else if (val.length > 16){
			passed = false;
			this.issue('Credit card number too long, must be exactly 16 characters in length.');
		}
		
		let regexp = /^5[1-5][0-9]{14}$/;
        if (!regexp.test(val)){
			passed = false;
			this.issue('The credit card number did not look like a credit card number.');
		}
		return passed;
	}
	//Checks date to make sure it isn't in the past
	validateExpirationDate() {
		let passed = true;
		let valMonth = this.element['expirationDate'].value;
		let valYear = this.element['expirationYear'].value;
		
		// Card details are valid until the first day of the next month.
		let expDate = new Date(parseInt(valYear), parseInt(valMonth) + 1, 1);
		let now = new Date();
		if (expDate < now) {
			passed = false;
			this.issue('The expiration date appears to be in the past.');
		}
		return passed;
	}
	
	//Checks the security code is 3-4 numbers long, using regex
	validateSecurityCode() {
		let passed = true;
		let val = this.element['securityCode'].value;
		let regexp = /^[0-9]{3,4}$/;
		if (!regexp.test(val)){
			passed = false;
			this.issue('The security code did not look like a security code. Must be 3-4 numbers.');
		}
		return passed;
	}
	
	//Validates all the form fields, if passes, sets "valid" hidden field to true and allows normal form action to take place
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
			this.element['valid'].value = 1;
			this.element['issues'].classList.add('hidden');
		} else {
			this.element['valid'].value = 0;
			this.element['issues'].classList.remove('hidden');
		}
		
		return passed;
	}
	
}
let validator = new FormValidator();