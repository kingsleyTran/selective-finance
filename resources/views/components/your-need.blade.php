<section class="py-28">
    <div class="mx-auto max-w-screen-2xl px-6">
        <div class="grid grid-cols-1 gap-20 lg:grid-cols-2">

            {{-- LEFT --}}
            <div>
                <h2 class="font-display text-5xl leading-tight text-dark-green uppercase">
                    {!! $title !!}
                </h2>

                <p class="mt-6 max-w-md text-lg leading-relaxed text-davy-grey">
                    {!! $description !!}
                </p>

                <a
                    href="{{ route('contact') }}"
                    class="mt-10 inline-flex items-center rounded-full
                           bg-dark-yellow px-8 py-4
                           font-sans text-sm font-medium text-white
                           transition hover:bg-dark-yellow/20"
                >
                    Start Your Application
                </a>
            </div>

            {{-- RIGHT --}}
            <div class="space-y-14">
                @foreach ($items as $index => $item)
                    @php
                        $stepLabel = null;
                        $stepTitle = null;
                        $stepDescription = null;
                        if (is_object($item)) {
                            $stepLabel = $item->subtitle ?? $item->step_number ?? 'STEP ' . str_pad($index + 1, 2, '0', STR_PAD_LEFT);
                            $stepTitle = $item->title ?? $item->step_title ?? '';
                            $stepDescription = $item->description ?? $item->text ?? '';
                            if (is_array($stepDescription)) {
                                $parts = [];
                                foreach ($stepDescription as $block) {
                                    $parts[] = is_object($block) && isset($block->text) ? $block->text : '';
                                }
                                $stepDescription = implode(' ', $parts);
                            } elseif (is_object($stepDescription) && isset($stepDescription->text)) {
                                $stepDescription = $stepDescription->text;
                            }
                        } else {
                            $stepLabel = $item['step_label'] ?? $item['step_number'] ?? 'STEP ' . str_pad($index + 1, 2, '0', STR_PAD_LEFT);
                            $stepTitle = $item['title'] ?? $item['step_title'] ?? '';
                            $stepDescription = $item['description'] ?? $item['text'] ?? '';
                        }
                    @endphp
                    <div class="border-b border-dashed border-black/20 pb-8">
                        <span class="font-display text-[32px] leading-[100%] tracking-widest text-dark-yellow uppercase">
                            {{ is_string($stepLabel) ? $stepLabel : e($stepLabel->text ?? '') }}
                        </span>

                        <h3 class="mt-2 font-display text-[32px] text-dark-green uppercase">
                            {!! is_string($stepTitle) ? e($stepTitle) : (is_object($stepTitle) && isset($stepTitle->text) ? e($stepTitle->text) : '') !!}
                        </h3>

                        <p class="mt-4 text-dark">
                            {!! is_string($stepDescription) ? e($stepDescription) : $stepDescription !!}
                        </p>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</section>
