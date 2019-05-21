var filterBtn = document.querySelector(".filteret");
var filterAaben = document.querySelector(".filterAaben");
var filterLuk = document.querySelector(".filterLuk");

filterBtn.addEventListener("click", function(event){
  filterAaben.style.display = "block";
  filterLuk.style.display = "none";
});

var soegBtn = document.querySelector(".soeg");
var soegAaben = document.querySelector(".soegAaben");

soegBtn.addEventListener("click", function(event){
  soegAaben.style.display = "block";
  filterLuk.style.display = "none";
  filterAaben.style.display = "none";
});

var soegLuk = document.querySelector(".soegLuk");
soegLuk.addEventListener("click", function(event){
  soegAaben.style.display = "none";
  filterLuk.style.display = "block";
  filterAaben.style.display = "none";
});
