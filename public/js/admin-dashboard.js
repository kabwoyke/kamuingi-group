const member_link = document.getElementById('member_link');
const dropdown = document.getElementById('dropdown');

var modal = document.getElementById("myModal");



member_link.addEventListener("click" , function(){
    dropdown.classList.toggle("open-drop-down")
})

