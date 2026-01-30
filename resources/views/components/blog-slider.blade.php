<section class="md:pt-10 md:pb-24">
    <div class="mx-auto max-w-screen-2xl">
        {{-- Header --}}
        <div class="mb-16 flex items-center justify-between px-6">
            <h2 class="font-display font-medium text-4xl md:text-[56px] leading-[130%] tracking-[-0.56px] text-dark-green uppercase">
                {!! $title !!}
            </h2>

            <a
                href="/blog"
                class="font-sans bg-dark-yellow py-3 px-10 tracking-widest text-[#F8F5EA] rounded-full transition hover:bg-dark-yellow/30"
            >
                Visit the Blog
            </a>
        </div>

        {{-- Slider --}}
        <div id="blog-slider" class="splide pl-6">
            <div class="splide__track">
                <ul class="splide__list">
                    @foreach($blogs as $blog)
                        <li class="splide__slide pr-6">
                            <x-blog-card
                                :image="$blog->data->image->url"
                                :date="$blog->data->created_date"
                                :title="$blog->data->title[0]->text"
                            />
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
