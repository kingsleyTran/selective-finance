<section class="py-32">
    <div class="container mx-auto px-6">

        {{-- HEADER --}}
        <div class="text-center max-w-4xl mx-auto mb-14">
            <p class="subtitle">
                {{ $subtitle }}
            </p>

            <h2 class="text-4xl md:text-[56px] font-display font-medium text-dark-green uppercase">
                {{ $title }}
            </h2>
        </div>

        {{-- CONTENT --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-20 items-start">

            {{-- IMAGE --}}
            <div class="lg:col-span-6 rounded-sm">
                @if ($image)
                    <img src="{{ $image }}" alt="" class="w-full object-cover rounded-sm" />
                @endif
            </div>

            {{-- TEXT --}}
            <div class="lg:col-span-6 space-y-4">

                <div class="text-davy-grey leading-relaxed max-w-xl">
                    {!! $description !!}
                </div>

                <div class="space-y-4">
                    @foreach ($items as $item)
                        <div class="flex gap-6 border-t border-dashed border-black/20 pt-4">
                            {{-- ICON --}}
                            <div class="mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="31" viewBox="0 0 30 31" fill="none">
                                    <path d="M13.3331 2.5067C13.2792 1.91371 14.0878 1.34768 15.7589 0.808611C17.4301 0.269538 18.8047 0 19.8828 0C20.4219 0 20.6376 0.0808605 20.5297 0.242581L14.7077 12.8569C14.6538 13.0186 14.4921 13.0995 14.2226 13.0995C14.0069 13.0995 13.8991 13.0186 13.8991 12.8569L13.3331 2.5067ZM2.01254 11.644C1.47347 11.4823 1.20393 10.458 1.20393 8.57128C1.20393 7.38531 1.28479 6.28021 1.44652 5.25597C1.66215 4.23173 1.87777 3.82743 2.0934 4.04306L12.3628 13.5847C12.4706 13.6386 12.4706 13.8003 12.3628 14.0698C12.3089 14.2855 12.228 14.3663 12.1202 14.3124L2.01254 11.644ZM15.9207 14.9593C15.8128 14.9593 15.705 14.8515 15.5972 14.6359C15.5433 14.3663 15.5703 14.2046 15.6781 14.1507L25.3814 10.3502C25.8666 10.1885 26.5135 10.6198 27.3221 11.644C28.1846 12.6682 28.8854 13.7464 29.4245 14.8784C30.0174 16.0105 30.1522 16.5765 29.8288 16.5765L15.9207 14.9593ZM7.26852 25.1478C7.10679 25.3634 6.8103 25.4712 6.37904 25.4712C5.73215 25.4712 4.84268 25.2826 3.71063 24.9052C2.63248 24.474 1.6891 24.0427 0.880488 23.6114C0.125784 23.1263 -0.143753 22.8298 0.0718765 22.722L12.2819 15.9296L12.4436 15.8488C12.5514 15.8488 12.6593 15.9296 12.7671 16.0914C12.9288 16.2531 12.9827 16.3609 12.9288 16.4148L7.26852 25.1478ZM14.4652 16.7382V16.6574C14.4652 16.5496 14.546 16.4148 14.7077 16.2531C14.9234 16.0914 15.0581 16.0644 15.112 16.1722L21.6618 24.2583C21.9852 24.6357 21.7966 25.3904 21.0958 26.5224C20.395 27.6006 19.5594 28.5979 18.5891 29.5143C17.6726 30.4307 17.1875 30.7272 17.1336 30.4038L14.4652 16.7382Z" fill="#B08949"/>
                                </svg>
                            </div>

                            {{-- TEXT --}}
                            <div>
                                <h3 class="text-[32px] font-display font-medium text-dark-yellow uppercase leading-[100%] -tracking-[0.32px] mb-3">
                                    {{ $item->title }}
                                </h3>
                                <p class="text-davy-grey leading-relaxed">
                                    {{ $item->description }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>

    </div>
</section>
