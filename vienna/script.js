"use strict";
class Locations {
    constructor(name, city, zipcode, address, img, date) {
        this.name = name;
        this.city = city;
        this.zipcode = zipcode;
        this.address = address;
        this.img = img;
        this.date = date;
    }
    startCard() {
        return `
  <div class="col col-lg-3 col-md-6 col-sm-12 col-xs-12 ">
    <div class="card h-100">
      <img src="${this.img}" class="card-img-top d-sm-none d-xs-none d-md-block" alt="image">
      <div class="card-body">
        <h5 class="card-title" style="text-align: center">${this.name}</h5><br>
        <p class="card-text">City : ${this.city}</p>
                <p class="card-text">Address : ${this.zipcode}<br>${this.address}</p>
`;
    }
    endCard() {
        return `
      </div>
      <div class="card-footer">
        <small class="text-muted">Created : ${this.date}</small>
      </div>
    </div>
  </div>
`;
    }
    display() {
        return this.startCard() + this.endCard();
    }
}
let place1 = new Locations("The Hofburg", "Vienna", 1010, "Untergeschoß 21", "img/place1.jpg", "2021-08-19 17:27");
let place2 = new Locations("Belvedere Palace", "Vienna", 1030, "Prinz Eugen-Straße 27", "img/place2.jpg", "2021-09-10 17:30");
let place3 = new Locations("St.Stephen's Cathedral", "Vienna", 1010, "Stephansplatz 3", "img/place3.jpg", "2021-09-26 15:30");
let place4 = new Locations("National Library", "Vienna", 1010, "Josefsplatz", "img/place4.jpg", "2021-09-25 13:00");
let places = [place1, place2, place3, place4];
for (let place of places) {
    document.getElementById("place").innerHTML += place.display();
    console.log(place.display());
}
//Restaurant
class Restaurant extends Locations {
    constructor(name, city, zipcode, address, img, date, telephone, type, webaddress) {
        super(name, city, zipcode, address, img, date);
        this.telephone = telephone;
        this.type = type;
        this.webaddress = webaddress;
    }
    display() {
        return `
            ${super.startCard()} 
            <p class="card-text">Phone : ${this.telephone}</p>
            <p class="card-text">Type : ${this.type}</p>
            <p class="card-text">Web site : <a href="${this.webaddress}">Click Here!</a></p>
            ${super.endCard()} 
        `;
    }
}
let restaurant1 = new Restaurant("SALLON", "Vienna", 1220, "Wagramerstrasse 94", "img/restaurant1.jpg", "2021-03-24 12:45", 4312034722222, "American food", "https://www.saloon.co.at/");
let restaurant2 = new Restaurant("Kikko Ba", "Vienna", 1040, "Schleifmuhlgasse 8", "img/restaurant2.jpg", "2021-09-29 22:00", 431925138041, "Japanese food", "https://www.kikko.at/");
let restaurant3 = new Restaurant("Wienerin", "Vienna", 1010, "Peterspl 1", "img/restaurant3.jpg", "2021-09-27 20:00", 4315321380, "Austrian food", "https://wienerin.org/");
let restaurant4 = new Restaurant("Oreno Ramen", "Vienna", 1080, "Lerchenfelder strasse", "img/restaurant4.jpg", "2021-09-01 12:45", 4318901248, "japanese food", "https://lokalfuehrer.stadtbekannt.at/restaurants/oreno-ramen/");
let restaurants = [restaurant1, restaurant2, restaurant3, restaurant4];
for (let restaurant of restaurants) {
    document.getElementById("restaurant").innerHTML += restaurant.display();
}
//Event
class Events extends Locations {
    constructor(name, city, zipcode, address, img, date, eventDate, eventTime, price) {
        super(name, city, zipcode, address, img, date);
        this.eventDate = eventDate;
        this.eventTime = eventTime;
        this.price = price;
    }
    display() {
        return `
            ${super.startCard()} 
            <p class="card-text">Date : ${this.eventDate}</p>
            <p class="card-text">Time : ${this.eventTime}</p>
            <p class="card-text">Price : ${this.price} €</p>
            ${super.endCard()} 
        `;
    }
}
let event1 = new Events("Marathon", "Vienna", 1010, "Johannesgasse 33", "img/event1.jpg", "2021-02-24 12:45", "20.03. 2021", "10:00", 10);
let event2 = new Events("Halloween market", "Vienna", 1120, "Malfattigasse", "img/event2.jpg", "2021-10-31 20:45", "31.10. 2021", "12:00", 3);
let event3 = new Events("Art event", "Vienna", 1020, "Schrotzbergsatrasse 2", "img/event3.jpg", "2021-10-02 19:00", "01.10. 2021", "15:00", 7);
let event4 = new Events("Classic Concert", "Vienna", 1070, "MuseumsQuartier 14", "img/event4.jpg", "2021-09-30 17:00", "29.09.2021", "17:00", 5);
let events = [event1, event2, event3, event4];
for (let event of events) {
    document.getElementById("event").innerHTML += event.display();
}
//Sort
let placesArrays = [place1, place2, place3, place4, restaurant1, restaurant2, restaurant3, restaurant4, event1, event2, event3, event4];
console.log(placesArrays);
//ascending
function ascending() {
    placesArrays.sort(function (a, b) {
        if (a.date < b.date) {
            return -1;
        }
        else {
            return 1;
        }
    });
    for (let placesArray of placesArrays) {
        document.getElementById("ascending").innerHTML += placesArray.display();
    }
    document.getElementById("placesCards").innerHTML = "";
    document.getElementById("descending").innerHTML = "";
}
document.getElementById("ascendingBtn").addEventListener("click", ascending);
//descending
function descending() {
    placesArrays.sort(function (a, b) {
        if (a.date > b.date) {
            return -1;
        }
        else {
            return 1;
        }
    });
    for (let placesArray of placesArrays) {
        document.getElementById("descending").innerHTML += placesArray.display();
    }
    document.getElementById("placesCards").innerHTML = "";
    document.getElementById("ascending").innerHTML = "";
}
document.getElementById("descendingBtn").addEventListener("click", descending);
