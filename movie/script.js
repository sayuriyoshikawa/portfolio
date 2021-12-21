
//nav bar
document.getElementById("nav").innerHTML =
  `<nav class="navbar  navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
    <a class="navbar-brand" href="index.html">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
            <a class="nav-link" href="#">New</a>
            <a class="nav-link" href="#">Popular</a>
        </div>
    </div>
</div>
</nav>`;


//sort button
document.getElementById("sort").innerHTML = `
<h1 style="text-align: center; color: white;">Movies</h1>
<div class="dropdown d-flex flex-row-reverse">
  <button class="btn btn-secondary dropdown-toggle " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="box-sizing:10%;">
    Sort
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li id="change"><a class="dropdown-item" href="#">Ranking</a></li>
  </ul>
</div>`;


//information from JSON
var movie = JSON.parse(movies);
console.table(movie);


//cards of movies
let card = `<div class="row justify-content-around" style="gap:2vw;">`

for (var x of movie) {

  card += `
<div class="card row col-lg-4 col-md-6 col-sm-12 px-0" style="max-width: 540px; background-color: black; color: white; position: relative;">
  <div class="row g-0">
    <div class="col-4" >
      <img src="${x.image}" class="img-fluid rounded-start" alt="picture">
    </div>
    <div class="col-8">
      <div class="card-body">
        <h5 class="card-title"">${x.title}</h5>
        <p class="card-text text-muted">${x.genre}</p>
        <p class="card-text">${x.description}</p>

        <div style="display:flex; justify-content: flex-end; position: absolute; right:1px; bottom: 1px;">
        <button type="button" class="btn likebtn" id="like">
        <span style="color:rgb(95, 223, 86);">Like</span><img src="img/like1.png" alt="like"></button>
        <span class="likenumber" style="background-color:rgb(95, 223, 86); display: inline-block; width:50px; height:50px; border-radius: 50%; text-align:center; line-height:50px; color:black; font-size:20px;" >${x.likes}</span>
        </div>

      </div>
    </div>
  </div>
</div>`

}

card +=
  `</div>`

document.getElementById("main").innerHTML = card;


//number of like
// var number = document.getElementsByClassName("likebtn");
// var a = document.getElementsByClassName("likenumber");


// var count0 = movie[0].likes;
// number[0].addEventListener("click", function () {

//     count0 += 1;
//     a[0].innerHTML = count0;

// })

// var count1 = movie[1].likes;
// number[1].addEventListener("click", function () {

//     count1 += 1;
//     a[1].innerHTML = count1;

// })

// var count2 = movie[2].likes;
// number[2].addEventListener("click", function () {

//     count2 += 1;
//     a[2
//     ].innerHTML = count2;


// })

// var count3 = movie[3].likes;
// number[3].addEventListener("click", function () {

//     count3 += 1;
//     a[3].innerHTML = count3;


// })
// var count4 = movie[4].likes;
// number[4].addEventListener("click", function () {

//     count4 += 1;
//     a[4].innerHTML = count4;


// })
// var count5 = movie[5].likes;
// number[5].addEventListener("click", function () {

//     count5 += 1;
//     a[5].innerHTML = count5;


// })



// I tryed more stylish way but it doesn't work...

var number = document.getElementsByClassName("likebtn");
var a = document.getElementsByClassName("likenumber");

for (let i = 0; i < movie.length; i++) {
  
  number[i].addEventListener("click", function () {

    plus(i);
    

  })
}


function plus(i) {
  movie[i].likes++;
  a[i].innerHTML = movie[i].likes;
  let movielike = movie[i].likes;
  localStorage.setItem("movielike", movie[i].likes);
  console.log(localStorage.movielike);
}



//Sort 



function changeoder() {

  let newoder = movie;

  let newlike = localStorage.getItem('movielike');
  console.log(newlike);

  newoder.sort(function (a, b) {

    if (a.newlike > b.newlike) {
      return -1;
    } else {
      return 1;
    }
  });

  console.table(newoder);


  let card1 = `<div class="row justify-content-around" style="gap:2vw;">`;

  for (var y of newoder) {

    card1 += `
<div class="card row col-lg-4 col-md-6 col-sm-12 px-0" style="max-width:540px; background-color: black; color: white; position: relative;">
  <div class="row g-0">
    <div class="col-4" > 
      <img src="${y.image}" class="img-fluid rounded-start " alt="picture">
    </div>
    <div class="col-8">
      <div class="card-body">
        <h5 class="card-title"">${y.title}</h5>
        <p class="card-text text-muted">${y.genre}</p>
        <p class="card-text">${y.description}</p>

        <div style="display:flex; justify-content: flex-end; position: absolute; right:1vw; bottom: 1vw;">
        <button type="button" class="btn likebtn" id="like">
        <span style="color:rgb(95, 223, 86);">Like</span><img src="img/like1.png" alt="like"></button>
        <span class="likenumber" style="background-color:rgb(95, 223, 86); display: inline-block; width:50px; height:50px; border-radius: 50%; text-align:center; line-height:50px; color:black; font-size:20px;" >${y.likes}</span>
        </div>

      </div>
    </div>
  </div>
</div>`

  }

  card1 +=
    `</div>`;


  document.getElementById("main").innerHTML = card1;

//like function
  var number = document.getElementsByClassName("likebtn");
var a = document.getElementsByClassName("likenumber");

for (let i = 0; i < movie.length; i++) {

  number[i].addEventListener("click", function () {

    plus(i);


  })
}

function plus(i) {
  newoder[i].likes++;
  a[i].innerHTML = newoder[i].likes;
}

  //like button
  // var count0 = newoder[0].likes;
  // number[0].addEventListener("click", function () {

  //   count0 += 1;
  //   a[0].innerHTML = count0;

  // })
  // var count1 = newoder[1].likes;
  // number[1].addEventListener("click", function () {

  //   count1 += 1;
  //   a[1].innerHTML = count1;

  // })

  // var count2 = newoder[2].likes;
  // number[2].addEventListener("click", function () {

  //   count2 += 1;
  //   a[2
  //   ].innerHTML = count2;


  // })

  // var count3 = newoder[3].likes;
  // number[3].addEventListener("click", function () {

  //   count3 += 1;
  //   a[3].innerHTML = count3;


  // })
  // var count4 = newoder[4].likes;
  // number[4].addEventListener("click", function () {

  //   count4 += 1;
  //   a[4].innerHTML = count4;


  // })
  // var count5 = newoder[5].likes;
  // number[5].addEventListener("click", function () {

  //   count5 += 1;
  //   a[5].innerHTML = count5;


  // })

}

document.getElementById("change").addEventListener("click", changeoder);