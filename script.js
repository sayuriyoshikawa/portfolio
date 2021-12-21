// const sections = document.querySelectorAll("section");
// const navLi = document.querySelectorAll("nav .container ul li");
// window.onscroll = () => {
//   var current = "";

//   sections.forEach((section) => {
//     const sectionTop = section.offsetTop;
//     if (pageYOffset >= sectionTop - 60) {
//       current = section.getAttribute("id"); }
//   });

//   navLi.forEach((li) => {
//     li.classList.remove("active");
//     if (li.classList.contains(current)) {
//       li.classList.add("active");
//     }
//   });
// };

setTimeout(function () {
    document.getElementById("firstFlower").style.display = "none";
}, 6000);

setTimeout(function () {
    document.getElementById("contents").style.display = "block";
}, 6000);



// //about

// function about() {
//     document.getElementById("aboutContainer").style.display = "flex";
// }
// document.getElementById("about").addEventListener("mouseover",about);

// //projecs

// function projects() {
//     document.getElementById("projectsContainer").style.display = "block";
// }
// document.getElementById("projects").addEventListener("mouseover",projects);

// //skills

// function skills() {
//     document.getElementById("skillsContainer").style.display = "block";
// }
// document.getElementById("skills").addEventListener("mouseover",skills);

// //contact

// function contact() {
//     document.getElementById("contactContainer").style.display = "block";
// }
// document.getElementById("contact").addEventListener("mouseover",contact);



// function form() {
//     document.getElementById("contactForm").reset();
//     alert("Thank you for your message!");
// }
// document.getElementById("btn").addEventListener("click",form);



 
//about
$('.aboutme').on('inview', function(event, isInView) {
    if (isInView) {//表示領域に入った時
      $(this).addClass('animate__animated animate__fadeInTopLeft');//クラス名が付与
    }  
  });

  $('.aboutRight').on('inview', function(event, isInView) {
    if (isInView) {//表示領域に入った時
      $(this).addClass('animate__animated animate__fadeInRight');//クラス名が付与
    } 
  });
  $('.aboutimg').on('inview', function(event, isInView) {
    if (isInView) {//表示領域に入った時
      $(this).addClass('animate__animated animate__fadeInBottomLeft');//クラス名が付与
    } 
  });



  //project
  $('.projectFlower2').on('inview', function(event, isInView) {
    if (isInView) {//表示領域に入った時
      $(this).addClass('animate__animated animate__fadeInBottomRight');//クラス名が付与
    } 
  });

  $('.projectTitle').on('inview', function(event, isInView) {
    if (isInView) {//表示領域に入った時
      $(this).addClass('animate__animated animate__fadeInDown');//クラス名が付与
    }  
  });

  $('.project1anime').on('inview', function(event, isInView) {
    if (isInView) {//表示領域に入った時
      $(this).addClass('animate__animated animate__fadeInTopLeft animate__delay-1s');//クラス名が付与
    } 
  });
  $('.project2anime').on('inview', function(event, isInView) {
    if (isInView) {//表示領域に入った時
      $(this).addClass('animate__animated animate__fadeInTopLeft animate__delay-1s');//クラス名が付与
    } 
  });
  $('.project3anime').on('inview', function(event, isInView) {
    if (isInView) {//表示領域に入った時
      $(this).addClass('animate__animated animate__fadeInTopLeft animate__delay-1s');//クラス名が付与
    } 
  });

  $('.projectFlower').on('inview', function(event, isInView) {
    if (isInView) {//表示領域に入った時
      $(this).addClass('animate__animated animate__fadeInTopLeft');//クラス名が付与
    } 
  });




//skills
$('.skillsanime').on('inview', function(event, isInView) {
    if (isInView) {//表示領域に入った時
      $(this).addClass('animate__animated  animate__fadeInDown');//クラス名が付与
    } 
  });

  $('.skillsBg2').on('inview', function(event, isInView) {
    if (isInView) {//表示領域に入った時
      $(this).addClass('animate__animated animate__fadeInTopRight');//クラス名が付与
    } 
  });
  
  $('.dev-icon').on('inview', function(event, isInView) {
    if (isInView) {//表示領域に入った時
      $(this).addClass('animate__animated animate__fadeInUp animate__delay-2s');//クラス名が付与
    } 
  });

  $('.skillsBg').on('inview', function(event, isInView) {
    if (isInView) {//表示領域に入った時
      $(this).addClass('animate__animated animate__fadeInBottomLeft');//クラス名が付与
    } 
  });


  //contact
  $('.contactTitle').on('inview', function(event, isInView) {
    if (isInView) {//表示領域に入った時
      $(this).addClass('animate__animated animate__fadeInDown');//クラス名が付与
    } 
  });
  $('.contactP').on('inview', function(event, isInView) {
    if (isInView) {//表示領域に入った時
      $(this).addClass('animate__animated animate__fadeIn animate__delay-1s');//クラス名が付与
    } 
  });
  $('.form').on('inview', function(event, isInView) {
    if (isInView) {//表示領域に入った時
      $(this).addClass('animate__animated animate__fadeInUp animate__delay-1s');//クラス名が付与
    } 
  });

  $('.contactFlower3').on('inview', function(event, isInView) {
    if (isInView) {//表示領域に入った時
      $(this).addClass('animate__animated animate__fadeInTopLeft');//クラス名が付与
    } 
  });

  $('.contactFlower1').on('inview', function(event, isInView) {
    if (isInView) {//表示領域に入った時
      $(this).addClass('animate__animated animate__fadeInTopRight');//クラス名が付与
    } 
  });

  $('.contactFlower2').on('inview', function(event, isInView) {
    if (isInView) {//表示領域に入った時
      $(this).addClass('animate__animated animate__fadeInBottomLeft');//クラス名が付与
    } 
  });

  $('.contactFlower4').on('inview', function(event, isInView) {
    if (isInView) {//表示領域に入った時
      $(this).addClass('animate__animated animate__fadeInBottomRight');//クラス名が付与
    } 
  });

  
  $('.sns').on('inview', function(event, isInView) {
    if (isInView) {//表示領域に入った時
      $(this).addClass('animate__animated animate__fadeInUp animate__delay-1s');//クラス名が付与
    } 
  });





// function bgcolor(){
//     document.getElementById("text").style.display = "flex";
// }
// document.getElementById("skills").addEventListener("mouseover",bgcolor);



// const en = document.querySelectorAll(".en");
// const ja = document.querySelectorAll(".ja")

// function english() {
//     en.style.css="inlineblock";
//     ja.style.display="none";
// }
// document.getElementById("english").addEventListener("clock",english);

// function english() {
//     ja.style.display="inlineblock";
//     en.style.display="none";
// }
// document.getElementById("english").addEventListener("clock",english);