

const profileModal = document.getElementById('profileModal');
const profileModalBtn = document.getElementById('openProfileModal');
const closeProfileModal = document.getElementById('closeProfileModal');

profileModalBtn.addEventListener('click', () => {
  profileModal.style.display = "block";
});

closeProfileModal.addEventListener('click', () => {
  profileModal.style.display = "none";
});

window.addEventListener('click', (evt) => {
  if (evt.target === profileModal){
    profileModal.style.display = "none";
  }
});

const editProfileBtn = document.getElementById('editProfileBtn');
const editProfile = document.getElementById('editProfile');
const searchAndProfile = document.getElementById('searchAndProfile');

editProfileBtn.addEventListener('click', () => {
  editProfile.style.display = "inline";
    searchAndProfile.style.display = "none";
    editProfileBtn.style.display = "none";
});


const makePostModal = document.getElementById('makePostModal');
const postModalBtn = document.getElementById('openMakePostModal');
const closePostModal = document.getElementById('closePostModal');

postModalBtn.addEventListener('click', () => {
  makePostModal.style.display = "block";
});

closePostModal.addEventListener('click', () => {
  makePostModal.style.display = "none";
});

window.addEventListener('click', (evt) => {
  if (evt.target === makePostModal){
   makePostModal.style.display = "none";              
  }
});

const postit = document.querySelectorAll('.posts');


postit.forEach((post) => {
  let playbtn = post.querySelector('.playbtn');
  let audio = post.querySelector('audio');
  let pausebtn = post.querySelector('.pausebtn');
  let counter = post.querySelector('.counter');
  let showMore = post.querySelector('.postFooter');
  let fullPost = post.querySelector('.fullPostModal');


  playbtn.addEventListener('click', () => {
   audio.play();
   playbtn.style.display = 'none';
   pausebtn.style.display = 'flex';
  });
  pausebtn.addEventListener('click', () => {
   audio.pause();
   playbtn.style.display = 'flex';
   pausebtn.style.display = 'none';
  });
  showMore.addEventListener('click', () => {
    console.log('asd');
    fullPost.classList.toggle('modalHidden');
  });
  audio.addEventListener('ended' , () => {
   playbtn.style.display = 'flex';
   pausebtn.style.display = 'none';
  });
  audio.addEventListener('timeupdate', () => {
     counter.innerText = Math.trunc(audio.duration - audio.currentTime +0.99) + 's';
  });



  

  console.log(audio.duration);

              /*
  let textArea = document.querySelector('.commentTextarea');
  let commentForm = document.querySelector('.commentForm');

  textArea.addEventListener('focus', (evt) => {

    textArea.addEventListener('keyup', (evt) => {
              if (evt.keyCode === 13){
                console.log('moi');
                evt.preventDefault();
                commentForm.submit();
              }
  })});
      */
 });










