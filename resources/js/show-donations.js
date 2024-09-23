    document.addEventListener('DOMContentLoaded', function () {

     

        const amountElement = document.querySelector('.amount');
        const finalAmount = parseInt(amountElement.textContent);
        let currentAmount = 0;
        const duration = 2000;
        const incrementTime = 30;
        const step = finalAmount / (duration / incrementTime);

        const counter = setInterval(() => {
            currentAmount += step;
            if (currentAmount >= finalAmount) {
                amountElement.textContent = finalAmount.toFixed(0);
                clearInterval(counter);
            } else {
                amountElement.textContent = currentAmount.toFixed(0);
            }
        }, incrementTime);
    });

