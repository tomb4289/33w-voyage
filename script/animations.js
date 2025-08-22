document.addEventListener('DOMContentLoaded', function() {
    const heroElements = document.querySelectorAll('[data-animation]');
    
    if (heroElements.length === 0) return;
    
    function animateElement(element) {
        const animation = element.getAttribute('data-animation');
        const delay = parseFloat(element.getAttribute('data-delay')) || 0;
        
        setTimeout(() => {
            element.style.opacity = '0';
            element.style.animation = `${animation} 1s ease-out forwards`;
            element.style.opacity = '1';
        }, delay * 1000);
    }
    
    function initAnimations() {
        heroElements.forEach(element => {
            animateElement(element);
        });
    }
    
    initAnimations();
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const element = entry.target;
                if (element.classList.contains('animated')) return;
                
                element.classList.add('animated');
                animateElement(element);
            }
        });
    }, { threshold: 0.1 });
    
    heroElements.forEach(element => {
        observer.observe(element);
    });
});
