<section class="bg-black px-6 py-24">
    <div class="mx-auto max-w-5xl">

        {{-- Title --}}
        <h2 class="mb-16 text-center font-serif text-4xl tracking-wide text-[#0F3B2E]">
            {{ $title ?? 'FREQUENTLY ASKED QUESTIONS' }}
        </h2>

        <div x-data="{ open: 0 }" class="space-y-8">

            @foreach ($items as $index => $item)
                <div class="border-b border-white/10 pb-8">

                    <button @click="open === {{ $index }} ? open = null : open = {{ $index }}"
                        class="flex w-full items-start justify-between gap-6 text-left">

                        <div class="max-w-3xl">
                            <h3 class="font-serif text-xl transition-colors"
                                :class="open === {{ $index }} ? 'text-[#B48A45]' : 'text-[#0F3B2E]'">
                                {{ $item['question'] }}
                            </h3>

                            <div x-show="open === {{ $index }}" x-collapse
                                class="mt-4 text-sm leading-relaxed text-gray-400">
                                {{ $item['answer'] }}
                            </div>
                        </div>

                        {{-- Toggle --}}
                        <span
                            class="flex h-12 w-12 shrink-0 items-center justify-center
                                   rounded-full bg-[#B48A45] text-black text-xl font-light">
                            <span x-text="open === {{ $index }} ? '−' : '+'"></span>
                        </span>

                    </button>
                </div>
            @endforeach

        </div>
    </div>
</section>
