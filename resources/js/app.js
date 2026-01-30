import './bootstrap';
import '@splidejs/splide/css';
import Splide from '@splidejs/splide';

document.addEventListener('DOMContentLoaded', () => {
    const aboutSlider = document.querySelector('#about-stacked-slider');
    if (aboutSlider) {
        new Splide(aboutSlider, {
            type: 'loop',
            height: 460,
            autoWidth: true,
            gap: '1.5rem',
            arrows: false,
            pagination: false,
            autoplay: true,
            interval: 3500,
            speed: 800,
            easing: 'ease-in-out',
            pauseOnHover: false,
        }).mount();
    }

    const testimonialsSlider = document.querySelector('#testimonials-slider');
    if (testimonialsSlider) {
        new Splide(testimonialsSlider, {
            type: 'loop',
            gap: '2rem',
            arrows: true,
            pagination: true,
            autoplay: true,
            interval: 5000,
            speed: 600,
            easing: 'ease',
            pauseOnHover: true,
            perPage: 1,
            perMove: 1,
        }).mount();
    }

    const blogSlider = document.querySelector('#blog-slider');
    if (blogSlider) {
        new Splide('#blog-slider', {
            type      : 'slide',
            perPage   : 2.5,
            autoplay  : true,
            arrows    : false,
            pagination: false,
            breakpoints: {
                1024: { perPage: 2 },
                    640:  { perPage: 1 },
                },
            }).mount();
    }
});

