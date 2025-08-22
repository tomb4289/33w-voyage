document.addEventListener('DOMContentLoaded', function() {
    const carouselSlides = document.querySelectorAll('.carrousel__slide');
    const radioButtons = document.querySelectorAll('.carrousel__radio');
    const labels = document.querySelectorAll('.carrousel__label');
    
    if (carouselSlides.length === 0) return;
    
    let currentSlide = 0;
    let autoPlayInterval;
    
    function initCarousel() {
        showSlide(0);
        startAutoPlay();
        
        radioButtons.forEach((radio, index) => {
            radio.addEventListener('change', () => {
                showSlide(index);
                resetAutoPlay();
            });
        });
        
        labels.forEach((label, index) => {
            label.addEventListener('click', () => {
                radioButtons[index].checked = true;
                showSlide(index);
                resetAutoPlay();
            });
        });
    }
    
    function showSlide(index) {
        carouselSlides.forEach(slide => {
            slide.style.opacity = '0';
            slide.style.transition = 'opacity 0.5s ease-in-out';
        });
        
        if (carouselSlides[index]) {
            carouselSlides[index].style.opacity = '1';
        }
        
        radioButtons.forEach((radio, i) => {
            radio.checked = (i === index);
        });
        
        currentSlide = index;
    }
    
    function nextSlide() {
        const nextIndex = (currentSlide + 1) % carouselSlides.length;
        showSlide(nextIndex);
    }
    
    function startAutoPlay() {
        autoPlayInterval = setInterval(nextSlide, 5000);
    }
    
    function resetAutoPlay() {
        clearInterval(autoPlayInterval);
        startAutoPlay();
    }
    
    const carouselContainer = document.querySelector('.carrousel__container');
    if (carouselContainer) {
        carouselContainer.addEventListener('mouseenter', () => {
            clearInterval(autoPlayInterval);
        });
        
        carouselContainer.addEventListener('mouseleave', () => {
            startAutoPlay();
        });
    }
    
    initCarousel();
    
    document.addEventListener('keydown', function(e) {
        if (e.key === 'ArrowLeft') {
            const prevIndex = (currentSlide - 1 + carouselSlides.length) % carouselSlides.length;
            showSlide(prevIndex);
            resetAutoPlay();
        } else if (e.key === 'ArrowRight') {
            nextSlide();
            resetAutoPlay();
        }
    });
});
