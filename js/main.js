let currentFile = "";
playAudio = (audio, button, audioFile) =>{
  try {
    const oAudio = document.querySelectorAll(audio);
    const btn = document.getElementsByClassName(button);
    let audioURL = document.getElementById(audioFile);

    //Skip loading if current file hasn't changed.
    if (audioURL.value !== currentFile) {
      oAudio.src = audioURL.value;
      currentFile = audioURL.value;
    }

    // Tests the paused attribute and set state.
    if (oAudio.paused) {
      oAudio.play();
      btn.textContent = "Pause";
    }
    else {
      oAudio.pause();
      btn.textContent = "Play";
    }
  }
  catch (e) {
    // Fail silently but show in F12 developer tools console
    if (window.console && console.error("Error:" + e)) ;
  }
};
