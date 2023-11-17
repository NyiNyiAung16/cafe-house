const navbar = document.querySelector('.navSection');
const coffeeListContainer = document.querySelector('.listContainer');

function handleScroll(){
    if(this.scrollY >= '210'){
        navbar.classList.add('scrollNav')
        coffeeListContainer.classList.add('scroll')
    }else{
        navbar.classList.remove('scrollNav')
        coffeeListContainer.classList.remove('scroll')
    }
}

window.addEventListener('scroll',handleScroll);

//carousel slide
const carouselSlide = document.querySelector('.carousel_slide');
const carouselItems = document.querySelectorAll('.carousel_item');
const btnLeft = document.querySelector('.btnleft'); 
const btnRight = document.querySelector('.btnright'); 
let slideIndex = 1;
let isMoving = false;

function moveSlide(){
    carouselSlide.style.transform = `translateX(-${slideIndex * 100}%)`;
}

function handleSlide(direction){
    isMoving = true;
    carouselSlide.style.transition = `transform .6s ease-in-out`;
    direction !== 'right' ? (slideIndex -= 1) : (slideIndex += 1);
    moveSlide();
}


function processImages(data){
    return `<div class="carousel_item">
                <p class="text-2xl">${data.content}</p>
                <img src="${data.url}" alt="${data.alt}" width="200">
            </div>`;
}

async function fetchData(){
    await fetch('json/carousel.json')
    .then((res)=>{
        if(!res.ok){
            throw new Error('Network response is not okay.')
        }       
        return res.json();
    })
    .then((data)=>{
        data.push(data[0]);
        data.unshift(data[data.length - 2]);
        carouselSlide.innerHTML = data.map(processImages).join('');
    })
    .catch((err)=>{
        console.log(err)
    })
}
fetchData();


btnLeft.addEventListener('click',()=>{
    if(isMoving) return;
    handleSlide()
})

btnRight.addEventListener('click',()=>{
    if(isMoving) return;
    handleSlide('right')
})

carouselSlide.addEventListener('transitionend',()=>{
    isMoving=false;
    const slidesArray = [...carouselSlide.querySelectorAll('img')];
    if(slideIndex === 0){
        carouselSlide.style.transition = 'none';
        slideIndex = slidesArray.length - 2;
        moveSlide();
    }
    if(slideIndex === slidesArray.length -1){
        carouselSlide.style.transition = 'none';
        slideIndex = 1;
        moveSlide();
    }
});

setInterval(()=>{
    if(isMoving) return;
    handleSlide('right');
},3000);


// // Start Coffee Lists Section

// window.addEventListener('scroll',handleScroll);


// // End Coffee Lists Section