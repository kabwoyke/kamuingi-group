document.addEventListener('DOMContentLoaded', function () {
    const member_link = document.getElementById('member_link');
    const dropdown = document.getElementById('dropdown');
    const donation_dropdown = document.getElementById('donation-dropdown')
    const donation_link = document.getElementById("donation_link")
    // var modal = document.getElementById("myModal");

    function updateClock() {
        var now = new Date();
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var seconds = now.getSeconds();

        hours = hours < 10 ? '0' + hours : hours;
        minutes = minutes < 10 ? '0' + minutes : minutes;
        seconds = seconds < 10 ? '0' + seconds : seconds;

        document.getElementById('clock').textContent = hours + ':' + minutes + ':' + seconds;
    }

    setInterval(updateClock, 1000);
    member_link.addEventListener("click" , function(){
        dropdown.classList.toggle("open-drop-down")
    })

    donation_link.addEventListener("click" , function(){
        donation_dropdown.classList.toggle("open-drop-down")
    })


    const amountElement = document.getElementById('donation-total');
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







