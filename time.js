var now, dd, td;
var months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
var days = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];

document.addEventListener("DOMContentLoaded", init, false);
function init() {
  dd = document.getElementById("date");
  td = document.getElementById("time");
  updateTime();
  setInterval(updateTime,1000);
}

function updateTime() {
  var clockdata = getClockStrings();
  dd.innerHTML = clockdata.datehtml;
  td.innerHTML = clockdata.timehtml;
  dd.dateTime = now.toISOString();
  td.dateTime = now.toISOString();
}

function getClockStrings() {
  now = new Date();
  var year = now.getFullYear();
  var month = months[now.getMonth()];
  var date = now.getDate();
  var day = days[now.getDay()];
  var hour = now.getHours();
  var minutes = now.getMinutes();
  var seconds = now.getSeconds();
  var meridian = hour < 12 ? "AM" : "PM";
  var clockhour = hour > 12 ? hour - 12 : hour;
  if (hour === 0) {clockhour = 12;}
  var clockminutes = minutes < 10 ? "0" + minutes : minutes;
  var clockseconds = seconds < 10 ? "0" + seconds : seconds;
  var datehtml = day + ", " + month + " " + date + ", " + year;
  var timehtml = clockhour + ":" + clockminutes + "<span>:" + clockseconds + " " + meridian + "</span>";
  return {"datehtml":datehtml,"timehtml":timehtml};
}