var songs = ["Don Moen - I want to be where you are.mp3"+
              "Don Moen - titre 1.mp3"];


var songTitle = document.getElementById('songTitle');
var songSlider = document.getElementById('songSlider');
var currentTime = document.getElementById('currentTime');
var duration = document.getElementById('duration');
var volumeSlider = document.getElementById('volumeSlider');
var nextSongTitle = document.getElementById('nextSongTitle');


var song = new Audio();
var currentSong = 0;

window.onload = loadSong;

function loadSong() {
  song.src = "songs/" + songs[currentSong];
  songTitle.textContent = (currentSong + 1) + "." +song[currentSong];
  nextSongTitle.innerHTML = "<b>Next Song: </b>" +songs[currentSong + 1 % songs.length];
  song.volume = volumeSlider.value;
  song.play();
  setTimeout(showDuration, 1000)

}
setInterval(updateSongSlider, 100);

function updateSongSlider(){
  var c = Math.round(song.currentTime);
  songSlider.value = c;
  currentTime.textContent = c;
}

function convertTime(secs){
  var min = Math.floor(secs/60);
  var sec = secs %60;
  min = (min<10) ? "0" +min:min;
  sec = (sec<10) ? "0" + sec:sec;
  return(min + ":" +sec);
}
function showDuration(){
  var d = Math.floor(songs.duration);
  songSlider.setAttribute("max", d);
  duration.textContent = convertTime(d);
}