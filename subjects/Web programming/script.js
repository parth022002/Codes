const imgs = document.querySelectorAll('.img-select a');
const imgBtns = [...imgs];
let imgId=1;
imgBtns.forEach((imgItem) => {
    imgItem.addEventListener('click', (e) => {
        event.preventDefault();
        imgId = imgItem.dataset.id;
        slideImage();
        });
});

function slideImages(){
    const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;
    document.querySelector('.img-showcase').style.transform='translateX(${-(imgId - 1)*displayWidth}px)';
}

Window.addEventListener('resize',slideImages);
