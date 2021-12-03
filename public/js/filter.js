let citySearch = document.getElementById("citySearch");
let deleteCity = document.getElementById("deleteCity");
let annonceContainer = document.querySelectorAll(".annoncesContainer");

function capitalize(str) {
  let lower = str.toLowerCase(); // minuscule
  return str.charAt(0).toUpperCase() + lower.slice(1); // M + inuscule
}
function lowercase(str) {
  return str.toLowerCase();
} // minuscule
function uppercase(str) {
  return str.toUpperCase();
} // MAJUSCULE

if ((citySearch != null) & (annonceContainer != null)) {
  citySearch.addEventListener("change", () => {
    let searchValue = citySearch.value;
    let searchCapitalize = capitalize(searchValue);
    let searchLowercase = lowercase(searchValue);
    let searchUppercase = uppercase(searchValue);

    if (searchValue != "") {
      for (let elem of annonceContainer) {
        if (!elem.classList.contains(`${searchCapitalize}` || `${searchLowercase}` || `${searchUppercase}`)) elem.style.display = "none";
        else elem.style.display = "";
      }
    }
  });
}

if ((deleteCity != null) & (citySearch != null) & (annonceContainer != null)) {
  deleteCity.addEventListener("click", () => {
    if ((citySearch.value = "")) return;
    else {
      for (let elem of annonceContainer) {
        if (elem.style.display == "none") elem.style.display = "block";
      }
      citySearch.value = "";
    }
  });
}


// NUMBER OF USER - ADMIN
let userHasPosted = document.getElementById('userNumber1');
let userHasntPosted = document.getElementById('userNumber2');
let allUserPosted = document.querySelector('.usersContainerPost');
let allUserNoPosted = document.querySelector('.usersContainerNoPost');

if(allUserPosted != null & allUserPosted != null & userHasPosted != null & userHasntPosted != null) {
  userHasPosted.textContent = allUserPosted.getElementsByClassName('allUsers').length;
  userHasntPosted.textContent = allUserNoPosted.getElementsByClassName('allUsers').length;
}
