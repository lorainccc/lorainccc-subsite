jQuery(document).ready(function( $ ){
    
	$("#ppfniframe").attr("title", "PayPal Payment Objects");
	$("iframe[id*='hosted-fields-tokenization-frame']").attr("title", "PayPal Payment Tokenization");

	/*$('#braintree-hosted-field-number').addAttr('title', 'PayPal Payment Hosted Number Field');
	$('#braintree-hosted-field-expirationDate').addAttr('title', 'PayPal Payment Expiration Date Field');
	$('#braintree-hosted-field-cvv').addAttr('title', 'PayPal Payment CVV Field');
	$('#reCAPTCHA').addAttr('title', 'reCAPTCHA Field');*/
});