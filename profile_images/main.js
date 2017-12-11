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




like = (str) => {
  const xmlhttp = new XMLHttpRequest();
  let posts = document.querySelectorAll('.posts');
  console.log(posts);
  for (let post of posts){
    let postid = post.getAttribute('id');

    let button = document.getElementById(postid).querySelector('.like');

    button.onclick = (e) => {
      button.innerHTML += '1';
      xmlhttp.onreadystatechange = () => {
        button.innerHTML += '2';
        console.log(this.statusText);
        if (this.readyState === 4 && this.status === 200){
          button.innerHTML += this.responseText;
          console.log('3' + this.responseText);
        }

      };
      xmlhttp.open("GET", "like.php", true);
      xmlhttp.send();
    };

    console.log(postid);
  }


};

loadDoc = () => {
  const xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange =  () => {
    if (this.readyState === 4 && this.status === 200) {
      document.getElementById("demo").innerHTML = this.responseText;
      console.log(this.responseText);
    }
  };
  xhttp.open("GET", "ajax_info.txt", true);
  xhttp.send();
};

const profileModal = document.getElementById('profileModal');

const profileModalBtn = document.getElementById('openProfileModal');

const span = document.getElementsByClassName('closeModal')[0];

profileModalBtn.onclick = () => {
  profileModal.style.display = "block";
};

span.onclick = () => {
  profileModal.style.display = "none";
};

window.onclick = (evt) => {
  if (evt.target === profileModal){
    profileModal.style.display = "none";
  }
};

const editProfileBtn = document.getElementById('editProfileBtn');
const editProfile = document.getElementById('editProfile');
const searchAndProfile = document.getElementById('searchAndProfile');

editProfileBtn.onclick = () => {
  editProfile.style.display = "inline";
    searchAndProfile.style.display = "none";
};