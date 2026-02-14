<section class="mb-12 md:mb-28 scroll-mt-24">
    <div class="mx-auto max-w-screen-2xl px-6">
        <div class="grid grid-cols-1 gap-8 md:gap-16 lg:grid-cols-2 lg:items-center">

            {{-- Left: Image --}}
            <div class="h-full overflow-hidden rounded-sm">
                <img
                    src="{{ $image ?? '/images/contact.jpg' }}"
                    alt="Contact"
                    class="h-full w-full object-cover"
                />
            </div>

            {{-- Right: Form --}}
            <div>
                {{-- Heading --}}
                <h2 class="font-display font-medium text-4xl md:text-[56px] leading-[130%] tracking-[-0.56px] text-dark-green uppercase">
                    {!! $title !!}
                </h2>

                <div class="mb-8">
                    <p class="mt-4 max-w-md font-sans text-davy-grey">
                        {!! $description !!}
                    </p>
                </div>

                <div class="border-t border-dashed border-black/20 mb-8"></div>

                {{-- Form --}}
                <div x-data="contactForm()" class="mt-10">
                    <div x-show="success" x-cloak class="mb-6 rounded-lg bg-green-100 px-5 py-4 text-green-800">
                        <span x-text="successMessage"></span>
                    </div>
                    <div x-show="error" x-cloak class="mb-6 rounded-lg bg-red-100 px-5 py-4 text-red-800">
                        <ul class="list-inside list-disc space-y-1" x-html="errorHtml"></ul>
                    </div>
                    @if (session('contact_success'))
                        <div class="mb-6 rounded-lg bg-green-100 px-5 py-4 text-green-800">
                            {{ session('contact_success') }}
                        </div>
                    @endif
                    <form
                        @submit.prevent="submit"
                        method="POST"
                        action="{{ route('contact.submit') }}"
                        class="space-y-6"
                    >
                        @csrf

                        {{-- Select --}}
                        <select
                            name="service"
                            class="w-full appearance-none rounded-md border border-white/10 bg-white bg-[length:1.25rem_1.25rem] bg-[right_1rem_center] bg-no-repeat px-5 py-4 pr-12 font-sans text-black focus:outline-none [background-image:url('data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20fill%3D%22none%22%20viewBox%3D%220%200%2024%2024%22%20stroke%3D%22%23595959%22%3E%3Cpath%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%20stroke-width%3D%222%22%20d%3D%22M19%209l-7%207-7-7%22%2F%3E%3C%2Fsvg%3E')]"
                        >
                            @foreach ($services as $service)
                                <option value="{{ $service->title }}">{{ $service->title }}</option>
                            @endforeach
                        </select>

                        {{-- Name + Phone --}}
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            <input
                                type="text"
                                name="name"
                                placeholder="Name*"
                                required
                                class="w-full rounded-md border border-white/10 bg-white px-5 py-4 font-sans text-black focus:outline-none"
                            />

                            <input
                                type="text"
                                name="phone"
                                placeholder="Phone*"
                                required
                                class="w-full rounded-md border border-white/10 bg-white px-5 py-4 font-sans text-black focus:outline-none"
                            />
                        </div>

                        {{-- Email --}}
                        <input
                            type="email"
                            name="email"
                            placeholder="Email*"
                            required
                            class="w-full rounded-md border border-white/10 bg-white px-5 py-4 font-sans text-black focus:outline-none"
                        />

                        {{-- Loan amount --}}
                        <input
                            type="text"
                            name="amount"
                            placeholder="Loan Amount (A$)"
                            class="w-full rounded-md border border-white/10 bg-white px-5 py-4 font-sans text-black focus:outline-none"
                        />

                        {{-- Message --}}
                        <textarea
                            name="message"
                            rows="5"
                            placeholder="Message here..."
                            class="w-full rounded-md border border-white/10 bg-white px-5 py-4 font-sans text-black focus:outline-none"
                        ></textarea>

                        {{-- Submit --}}
                        <button
                            type="submit"
                            :disabled="loading"
                            class="mt-4 w-full rounded-full bg-dark-yellow py-4 font-sans text-lg text-white transition hover:opacity-90 disabled:opacity-70 disabled:cursor-not-allowed"
                        >
                            <span x-show="!loading">Send an Enquiry</span>
                            <span x-show="loading" x-cloak>Sending...</span>
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
