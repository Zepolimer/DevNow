// // NUMBER OF USER - ADMIN
// let userHasPosted = document.getElementById('userNumber1');
// let userHasntPosted = document.getElementById('userNumber2');
// let allUserPosted = document.querySelector('.usersContainerPost');
// let allUserNoPosted = document.querySelector('.usersContainerNoPost');

// if(allUserPosted != null & allUserPosted != null & userHasPosted != null & userHasntPosted != null){
//   userHasPosted.textContent = allUserPosted.getElementsByClassName('allUsers').length;
//   userHasntPosted.textContent = allUserNoPosted.getElementsByClassName('allUsers').length;
// }


// // SEARCHBAR ADMIN
// let userContainer = document.querySelectorAll(".allUsers");
// let nameFilter = document.querySelectorAll(".nameFilter");
// let inputName = document.getElementById('users');

// inputName.addEventListener('input', () => {
//     let nameValue = (inputName.value);

//     if(nameValue != "") {
//         for(let el of userContainer){
//             if(el.textContent.includes(nameValue)) el.style.display = "block";
//             else el.style.display = "none";
//         }
//     } else {
//         for(let el of userContainer){
//             if(el.style.display == "none") el.style.display = "block";
//         }
//     }
// });


// INPUT RADIO pour filter front, back et full-stack
// stackSearch.forEach(filter => filter.addEventListener('click', () => {
//     let filterValue = filter.textContent;
//     let filterCapitalize = capitalize(filterValue);
//     let filterLowercase = lowercase(filterValue);
//     let filterUppercase = uppercase(filterValue);

//     citySearch.value = "";

//     for(let el of annonceContainer){
//         if(!el.classList.contains(`${filterCapitalize}` || `${filterLowercase}` || `${filterUppercase}`)){
//             el.style.display = "none";
//         } else {
//             el.style.display = "block";
//         }
//     }
// }));