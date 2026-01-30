<section class="pb-24">
    <div class="mx-auto max-w-7xl px-6">
        <div class="grid grid-cols-1 gap-16 lg:grid-cols-2 lg:items-center">

            {{-- Left: Image --}}
            <div class="overflow-hidden rounded-sm">
                <img
                    src="{{ $image ?? '/images/contact.jpg' }}"
                    alt="Contact"
                    class="h-full w-full object-cover"
                />
            </div>

            {{-- Right: Form --}}
            <div>
                {{-- Heading --}}
                <h2 class="font-display text-4xl md:text-[56px] leading-[130%] tracking-[-0.56px] text-dark-green uppercase">
                    {!! $title !!}
                </h2>

                <div class="mb-8">
                    <p class="mt-4 max-w-md font-sans text-davy-grey">
                        {!! $description !!}
                    </p>
                </div>

                <div class="border-t border-dashed border-black/20 mb-8"></div>

                {{-- Form --}}
                <form
                    method="POST"
                    class="mt-10 space-y-6"
                >
                    @csrf

                    {{-- Select --}}
                    <select
                        name="service"
                        class="w-full rounded-md border border-white/10 bg-white px-5 py-4 font-sans text-black focus:outline-none"
                    >
                        <option>Business Loan</option>
                        <option>Invoice Finance</option>
                        <option>Property Finance</option>
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
                        class="mt-4 w-full rounded-full bg-dark-yellow py-4 font-sans text-lg text-white transition hover:opacity-90"
                    >
                        Send an Enquiry
                    </button>
                </form>
            </div>

        </div>
    </div>
</section>
