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

    const introSlider = document.querySelector('#intro-slider');
    if (introSlider) {
        new Splide(introSlider, {
            type      : 'slide',
            autoWidth: true,
            gap: '1.5rem',
            perPage   : 2.5,
            autoplay  : true,
            arrows    : false,
            pagination: false,
            interval  : 4000,
            speed     : 600,
            easing    : 'ease',
            pauseOnHover: true,
            breakpoints: {
                1024: { perPage: 2.5 },
                768: { perPage: 2 },
                640: { perPage: 1 },
            },
        }).mount();
    }

    const blogSlider = document.querySelector('#blog-slider');
    if (blogSlider) {
        new Splide(blogSlider, {
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
        const section = otherServicesSlider.closest('section');
        const prevBtn = section?.querySelector('.splide-prev');
        const nextBtn = section?.querySelector('.splide-next');

        function updateOtherServicesArrows() {
            const index = otherServicesSplide.index;
            const perPage = otherServicesSplide.options?.perPage ?? 1;
            const end = Math.max(0, otherServicesSplide.length - perPage);
            if (prevBtn) prevBtn.disabled = index <= 0;
            if (nextBtn) nextBtn.disabled = index >= end;
        }

        otherServicesSplide.on('moved resize', updateOtherServicesArrows);
        otherServicesSplide.mount();
        updateOtherServicesArrows();

        if (prevBtn) prevBtn.addEventListener('click', () => otherServicesSplide.go('<'));
        if (nextBtn) nextBtn.addEventListener('click', () => otherServicesSplide.go('>'));
    }
});

