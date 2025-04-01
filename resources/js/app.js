import './bootstrap';
// country code in registration page
document.addEventListener("DOMContentLoaded", function() {
    var input = document.querySelector("#number");
    var iti = window.intlTelInput(input, {
        initialCountry: "in", // Default country (India)
        separateDialCode: true, // Country Code अलग से दिखेगा
        onlyCountries: ["in"], // सिर्फ इंडिया दिखेगा

        // preferredCountries: ["in", "us", "gb"], // Priority Countries
    });

    // Ensure only numbers are entered
    input.addEventListener("input", function() {
        this.value = this.value.replace(/[^0-9]/g, ''); // सिर्फ नंबर अलाउ करेगा
    });
});





