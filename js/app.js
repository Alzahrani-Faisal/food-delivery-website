let name ="Customer"
let count = 0;
let countIndex = 0;
let CartContent = 0;
let price =0;
let displayTotal = document.querySelector(".totalPrice");
let displayItems = document.querySelector(".totalItems");
let displayEachPrice = document.querySelector(".eachPrice");

let displayCount=document.querySelector('.count');
let displayCartCountDetail=document.querySelector(".CartCounterDetail");
let displayIndex=document.querySelector('.CartCounterIndex');



const form = document.review;
const flag=document.querySelector(".flag");
var char=0;

form.onload()= hideForm();

function showFlag(){
    if(char > 0)
    flag.classList.add("hide");
else{
    flag.classList.remove("hide");
}
}

function checkName(){
    
    if(document.getElementById("nameInput").value.length >0){
        name = document.getElementById("nameInput").value
    }
    window.alert(name)
}

function hideForm() {
        form.style.visibility = "hidden";
        form.style.transition = "all 0s";
        form.style.marginLeft = "90%";
        form.style.position = "absolute"
}
function showForm() {
    if(form.style.visibility === "visible"){
        form.style.transition = "all 0s";
        form.style.visibility = "hidden";
        form.style.marginLeft = "90%";
        form.style.position = "absolute"
    }
    else {
        form.style.visibility = "visible";
        form.style.marginLeft = "0";
        form.style.transition = "all 1s";
        form.style.position = "relative";
    }

}

function showReviews() {
    let description = document.getElementById("description");
    let reviews = document.getElementById("reviews");
    description.style.backgroundColor = "white"
    reviews.style.backgroundColor = "#fda901"
    let xhttp = new XMLHttpRequest();

    let urlStr = window.location.href;
    let id = urlStr.substr(urlStr.indexOf("id"));

    let response = null;

    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4) {
            if (xhttp.status == 200) {
                response = xhttp.responseText
                let reviewsJSON = JSON.parse(response);

                if (reviewsJSON.length) {
                    for (let i = 0; i < reviewsJSON.length; i++) {
                        let name = reviewsJSON[i]["reviewer_name"];
                        let city = reviewsJSON[i]["city"];
                        let date = reviewsJSON[i]["date"];
                        let rating = reviewsJSON[i]["rating"];
                        let review = reviewsJSON[i]["review"];
                        let image = reviewsJSON[i]["image"];

                        let container = document.createElement("div");
                        container.classList.add("container-fluid");
                        let row = document.createElement("div");
                        row.classList.add("row");
                        let col1 = document.createElement("div");
                        let col2 = document.createElement("div");
                        col1.classList.add("col-md-12", "col-lg-6", "col-xl-6");
                        col2.classList.add("col-md-12", "col-lg-6", "col-xl-6");
                        let img = document.createElement("img");
                        img.src = "reviewImages/" + image;
                        img.height = 303;
                        img.width = 444;
                        img.classList.add("rounded-corners", "shadow");
                        let nameTag = document.createElement("h4");
                        let infoTag = document.createElement("h5");
                        let reviewTag = document.createElement("p");

                        let ratingStr = "";
                        for (let i = 0; i < rating; i++){
                            ratingStr += "⭐";
                        }

                            nameTag.innerText = name;
                        infoTag.innerText = city + " - " + date + " " + ratingStr;
                        reviewTag.innerText = review;
                        col2.append(nameTag, infoTag, reviewTag);
                        col1.append(img);
                        row.append(col1, col2);
                        container.append(row);

                        let carouselItem = document.createElement("div");
                        carouselItem.classList.add("carousel-item");
                        carouselItem.appendChild(container);

                        let indicator = `<li data-target="#carouselIndicators" data-slide-to="` + i + `"></li>`

                        if (i == 0) {
                            carouselItem.classList.add("active");
                            indicator = `<li data-target="#carouselIndicators" data-slide-to="` + i + `" class="active"></li>`;
                        }
                        document.getElementById("reviewsCarousel").appendChild(carouselItem);
                        document.getElementById("indicator").innerHTML += indicator;
                    }
                } else {
                    document.getElementById("reviewsArea").innerHTML = `<h1>No reviews</h1>`;
                }


            }
            if (xhttp.status == 404) {
                console.log("File not found");
            }
        }
    };
    xhttp.open("get", "php/review.php?" + id, true);
    xhttp.send();
}

function changeLenght(textArea){
    let counter = document.getElementById("current");
    let textLength = document.getElementById("textAreaInput").value.length;
    counter.innerHTML = textLength ;
    char=textLength;
}


function decrement(){
    if(count > 1)
    count--;
    displayCount.innerHTML=count;
}
function increament(){ 
    if(count == 0){
        count+=2
    }else{
        count++;  
    }
   
    displayCount.innerHTML=count;
}
function increamentIndex(source){
    countIndex++;
    displayIndex.innerHTML = countIndex;
    price = price + parseFloat(source.value) ;
    displayTotal.innerHTML = price;

    tempItem = displayItems.innerHTML+"<br>";
    displayItems.innerHTML= tempItem + source.name;

    tempPrice = displayEachPrice.innerHTML+"<br>";
    displayEachPrice.innerHTML = tempPrice + source.value;

}
function CartCounter(){

    displayCartCountDetail.innerHTML=(count+CartContent);
    CartContent = CartContent+count;
}
function completeOrder(){
    countIndex = 0;
    price = 0;
    displayIndex.innerHTML = 0;
    displayTotal.innerHTML = 0;
    displayItems.innerHTML ="";
    displayEachPrice.innerHTML="";


}

