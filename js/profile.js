
const postit = document.querySelectorAll('.posts');


postit.forEach((post) => {
  let playbtn = post.querySelector('.playbtn');
  let audio = post.querySelector('audio');
  let pausebtn = post.querySelector('.pausebtn');
  let counter = post.querySelector('.counter');
  let showMore = post.querySelector('.postFooter');
  let fullPost = post.querySelector('.fullPostModal');
  let comments = document.querySelector('.comments');


  playbtn.addEventListener('click', () => {
    audio.play();
    playbtn.style.display = 'none';
    pausebtn.style.display = 'flex';
    counter.style.display = 'flex';
  });
  pausebtn.addEventListener('click', () => {
    audio.pause();
    playbtn.style.display = 'flex';
    pausebtn.style.display = 'none';
  });
  showMore.addEventListener('click', () => {
    fullPost.classList.toggle('modalHidden');

  });
  audio.addEventListener('ended' , () => {
    playbtn.style.display = 'flex';
    pausebtn.style.display = 'none';
    counter.style.display = 'none';
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