const button = document.getElementById("btn");
const list = document.getElementById("list");

list.style.display = "none";

button.addEventListener("click", (event) => {

	if(list.style.display == "none") {
		list.style.display = "block"; 
	} else {
		list.style.display = "none";
	}
});

// dropdown kedua
const buttonn = document.getElementById("btn-btn");
const listt = document.getElementById("list-list");

listt.style.display = "none";

buttonn.addEventListener("click", (event) => {
	if(listt.style.display =="none") {
		listt.style.display = "block"; 
	} else {
		listt.style.display = "none";
	}
});