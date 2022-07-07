let keywordFilter = document.querySelector("#keyFilter");
let key = document.querySelector("#searchbykey");
let dateFilter = document.querySelector("#dateFilter");
let date = document.querySelector("#searchbydate");
let priceFilter = document.querySelector("#priceFilter");
let price = document.querySelector("#searchbyprice");

keywordFilter.addEventListener("click", function() {
    // console.log("click2");
    key.style.display = "block";
    date.style.display = "none";
    price.style.display = "none";
});
dateFilter.addEventListener("click", function() {
    // console.log("click2");
    key.style.display = "none";
    date.style.display = "block";
    price.style.display = "none";
});
priceFilter.addEventListener("click", function() {
    // console.log("click3");
    key.style.display = "none";
    date.style.display = "none";
    price.style.display = "block";
});

