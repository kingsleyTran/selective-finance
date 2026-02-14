import './bootstrap';
import Alpine from 'alpinejs'
import '@splidejs/splide/css';
import Splide from '@splidejs/splide';

window.Alpine = Alpine

Alpine.start()

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
        const testimonialsSplide = new Splide(testimonialsSlider, {
            type: 'loop',
            gap: '2rem',
            arrows: false,
            pagination: true,
            autoplay: true,
            interval: 5000,
            speed: 600,
            easing: 'ease',
            pauseOnHover: true,
            perPage: 1,
            perMove: 1,
        });
        updateArrows(testimonialsSlider, testimonialsSplide);
    }

    const introSlider = document.querySelector('#intro-slider');
    if (introSlider) {
        new Splide(introSlider, {
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

    const blogSlider = document.querySelector('#blog-slider');
    if (blogSlider) {
        new Splide(blogSlider, {
            type      : 'loop',
            perPage   : 2.5,
            perMove   : 1,
            gap: '1.5rem',
            autoplay  : true,
            arrows    : false,
            pagination: false,
            interval  : 4000,
            speed     : 600,
            easing    : 'ease',
            breakpoints: {
                1024: { perPage: 2.5 },
                640:  { perPage: 1 },
                },
            }).mount();
    }

    const otherServicesSlider = document.querySelector('#other-services-slider');
    if (otherServicesSlider) {
        const otherServicesSplide = new Splide(otherServicesSlider, {
            type   : 'slide',
            perPage: 4,
            gap    : '1.5rem',
            arrows : false,
            pagination: false,
            breakpoints: {
                1280: { perPage: 3 },
                768: { perPage: 2 },
                640: { perPage: 1 },
            }
        });
        updateArrows(otherServicesSlider, otherServicesSplide);
    }
});

function updateArrows(slider, splide) {
    const section = slider.closest('section');
    const prevBtn = section?.querySelector('.splide-prev');
    const nextBtn = section?.querySelector('.splide-next');

    function updateOtherServicesArrows() {
        const index = splide.index;
        const perPage = splide.options?.perPage ?? 1;
        const end = Math.max(0, splide.length - perPage);
        if (prevBtn) prevBtn.disabled = index <= 0;
        if (nextBtn) nextBtn.disabled = index >= end;
    }

    splide.on('moved resize', updateOtherServicesArrows);
    splide.mount();
    updateOtherServicesArrows();

    if (prevBtn) prevBtn.addEventListener('click', () => splide.go('<'));
    if (nextBtn) nextBtn.addEventListener('click', () => splide.go('>'));
}
