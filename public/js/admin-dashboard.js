document.addEventListener('DOMContentLoaded', function () {
    const member_link = document.getElementById('member_link');
    const dropdown = document.getElementById('dropdown');
    var modal = document.getElementById("myModal");
    member_link.addEventListener("click" , function(){
        dropdown.classList.toggle("open-drop-down")
    })


    const amountElement = document.getElementById('donation-total');
    const finalAmount = parseInt(amountElement.textContent);
    console.log(finalAmount);
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







