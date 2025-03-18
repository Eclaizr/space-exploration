let playable = true;
window.addEventListener('keydown', (e) =>{
    if(playable && (e.key == " " ||
      e.code == "Space" ||      
      e.keyCode == 32)) {
        console.log("oui");
        var audio = new Audio('/audio/binary_sunset.mp3');
        audio.play();
        playable = false;
  }
});