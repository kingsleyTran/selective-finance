<section class="py-16 md:py-24">
    <div class="mx-auto max-w-screen-2xl px-6">
        <div class="text-center mb-12 md:mb-16">
            <h2 class="subtitle mb-2">
                {!! $subtitle !!}
            </h2>
            <h3 class="text-4xl md:text-[56px] font-display font-medium text-dark-green uppercase">
                {!! $title !!}
            </h3>
        </div>

        @if (count($testimonials) > 0)
            <div
                id="testimonials-slider"
                class="splide"
                aria-label="Testimonials"
            >
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach ($testimonials as $testimonial)
                            <li class="flex splide__slide border-y border-dashed border-black/20 py-6">
                                <div class="border-r border-dashed border-black/20 px-20 pt-12 -my-6">
                                    <div class="flex items-center justify-center font-aboreto text-[40px] leading-[130%] text-dark-yellow w-[256px] h-[256px] bg-white uppercase">
                                        {{ $testimonial->company }}
                                    </div>
                                </div>
                                <div class="max-w-3xl mx-auto px-4">
                                    @php
                                        $quote = is_object($testimonial)
                                            ? ($testimonial->quote ?? $testimonial->content ?? $testimonial->text ?? '')
                                            : ($testimonial['quote'] ?? $testimonial['content'] ?? $testimonial['text'] ?? '');
                                        $author = is_object($testimonial)
                                            ? ($testimonial->author ?? $testimonial->name ?? '')
                                            : ($testimonial['author'] ?? $testimonial['name'] ?? '');
                                        $position = is_object($testimonial)
                                            ? ($testimonial->role ?? $testimonial->position ?? '')
                                            : ($testimonial['role'] ?? $testimonial['position'] ?? '');
                                        if (is_object($quote) && isset($quote->text)) {
                                            $quote = $quote->text;
                                        } elseif (is_array($quote)) {
                                            $parts = [];
                                            foreach ($quote as $block) {
                                                if (isset($block->text)) {
                                                    $parts[] = $block->text;
                                                }
                                            }
                                            $quote = implode(' ', $parts);
                                        }
                                        $quote = is_string($quote) ? e($quote) : '';
                                    @endphp
                                    <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="22" viewBox="0 0 25 22" fill="none">
                                        <path d="M6.688 13.376C7.86133 13.376 8.77067 13.7573 9.416 14.52C10.12 15.224 10.472 16.1627 10.472 17.336C10.472 18.6267 10.0613 19.624 9.24 20.328C8.47733 20.9733 7.36267 21.296 5.896 21.296C4.07733 21.296 2.64 20.592 1.584 19.184C0.528 17.776 0 15.7813 0 13.2C0 10.736 0.528 8.47734 1.584 6.424C2.69867 4.312 4.34133 2.2 6.512 0.0879989C6.57067 0.029333 6.65867 0 6.776 0C6.952 0 7.09867 0.0880006 7.216 0.264002C7.33333 0.44 7.33333 0.586666 7.216 0.704001C4.34133 3.63734 2.904 7.09867 2.904 11.088C2.904 12.7307 3.19733 13.9333 3.784 14.696C4.312 13.816 5.28 13.376 6.688 13.376ZM20.416 13.376C21.5893 13.376 22.4987 13.7573 23.144 14.52C23.848 15.224 24.2 16.1627 24.2 17.336C24.2 18.6267 23.7893 19.624 22.968 20.328C22.2053 20.9733 21.0907 21.296 19.624 21.296C17.8053 21.296 16.368 20.592 15.312 19.184C14.256 17.776 13.728 15.7813 13.728 13.2C13.728 10.736 14.256 8.47734 15.312 6.424C16.4267 4.312 18.0693 2.2 20.24 0.0879989C20.2987 0.029333 20.3867 0 20.504 0C20.68 0 20.8267 0.0880006 20.944 0.264002C21.0613 0.44 21.0613 0.586666 20.944 0.704001C18.0693 3.63734 16.632 7.09867 16.632 11.088C16.632 12.7307 16.9253 13.9333 17.512 14.696C18.04 13.816 19.008 13.376 20.416 13.376Z" fill="#0A3F24"/>
                                    </svg>
                                    </div>
                                    <div class="font-display text-xl md:text-[32px] text-dark-green leading-relaxed mb-8 tracking-[-0.32px]">
                                        {{ $quote }}
                                    </div>
                                    @if ($author)
                                        <cite class="text-sm not-italic font-semibold text-dark-yellow tracking-[3.36px] uppercase">
                                            {{ is_string($author) ? e($author) : (is_object($author) && isset($author->text) ? e($author->text) : '') }}
                                        </cite>
                                    @endif
                                    @if ($position)
                                        <p class="text-davy-grey mt-1">{!! is_string($position) ? e($position) : e($position->text ?? '') !!}</p>
                                    @endif
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
    </div>
</section>
