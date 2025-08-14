// Toggle payment fields
document.addEventListener('DOMContentLoaded', function() {
    const creditCardRadio = document.getElementById('creditCard');
    const mobileMoneyRadio = document.getElementById('mobileMoney');
    const creditCardFields = document.getElementById('creditCardFields');
    const mobileMoneyFields = document.getElementById('mobileMoneyFields');

    creditCardRadio.addEventListener('change', function() {
        if (creditCardRadio.checked) {
            creditCardFields.style.display = 'block';
            mobileMoneyFields.style.display = 'none';
        }
    });

    mobileMoneyRadio.addEventListener('change', function() {
        if (mobileMoneyRadio.checked) {
            creditCardFields.style.display = 'none';
            mobileMoneyFields.style.display = 'block';
        }
    });

    // Optional: Prevent form submission for demo
    document.getElementById('checkoutForm').addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Order placed! Thank you for shopping with Agri Connect.');
    });
});