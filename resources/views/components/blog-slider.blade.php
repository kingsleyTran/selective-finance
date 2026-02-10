<section class="mb-12 md:mb-28">
    <div class="mx-auto max-w-screen-2xl">
        {{-- Header --}}
        <div class="mb-8 md:mb-16 flex items-center justify-between px-6">
            <h2 class="font-display font-medium text-4xl md:text-[56px] leading-[130%] tracking-[-0.56px] text-dark-green uppercase">
                {!! $title !!}
            </h2>

            <a
                href="/blog"
                class="font-sans bg-dark-yellow py-3 px-10 tracking-widest text-[#F8F5EA] rounded-full transition hidden md:block hover:bg-dark-yellow/30"
            >
                Visit the Blog
            </a>
        </div>

        {{-- Slider --}}
        <div id="blog-slider" class="splide px-6 md:px-0 md:pl-6">
            <div class="splide__track">
                <ul class="splide__list">
                    @foreach($blogs as $blog)
                        <li class="splide__slide md:pr-6">
                            <x-blog-card
                                :image="$blog->data->image->url"
                                :date="$blog->data->created_date"
                                :title="$blog->data->title[0]->text"
                            />
                        </li>
                    @endforeach
                </ul>
                <a
                    href="/blog"
                    class="font-sans bg-dark-yellow py-3 px-10 tracking-widest text-[#F8F5EA] text-center rounded-full transition block md:hidden hover:bg-dark-yellow/30"
                >
                    Visit the Blog
                </a>
            </div>
        </div>
    </div>
</section>
