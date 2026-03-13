<section class="mb-14 md:mb-28">
    <div class="mx-auto max-w-screen-2xl px-6">
        {{-- Header --}}
        <div class="mb-12 md:mb-16">
            @if ($subtitle)
                <p class="subtitle">{{ $subtitle }}</p>
            @endif
            <h2 class="text-3xl md:text-4xl lg:text-[56px] font-display font-medium text-dark-green uppercase">
                {{ $title }}
            </h2>
        </div>

        {{-- Team slider --}}
        @if (count($members) > 0)
        <div id="our-team-slider" class="splide" aria-label="Our Team">
            <div class="splide__track">
                <ul class="splide__list">
                    @foreach ($members as $member)
                        @php
                            $name = is_object($member) ? ($member->name ?? $member->label ?? '') : ($member['name'] ?? $member['label'] ?? '');
                            $role = is_object($member) ? ($member->position ?? $member->role ?? '') : ($member['position'] ?? $member['role'] ?? '');
                            $avatar = is_object($member) ? ($member->avatar ?? $member->image ?? $member->photo ?? '') : ($member['avatar'] ?? $member['image'] ?? $member['photo'] ?? '');
                            $phone_number = is_object($member) ? ($member->phone_number ?? '') : ($member['phone_number'] ?? '');
                            $email = is_object($member) ? ($member->email ?? '') : ($member['email'] ?? '');
                            $bio = is_object($member) ? ($member->bio ?? '') : ($member['bio'] ?? '');
                        @endphp
                        <li class="splide__slide">
                            <article class="group overflow-hidden rounded-sm bg-dark-green/10">
                                <div class="relative aspect-square">
                                    @if ($avatar)
                                        <img
                                            src="{{ is_object($avatar) ? ($avatar->url ?? '') : $avatar }}"
                                            alt="{{ $name }}"
                                            class="absolute inset-0 h-full w-full object-cover transition duration-500 group-hover:scale-105"
                                        />
                                    @else
                                        <div class="absolute inset-0 flex items-center justify-center text-6xl font-display text-dark-green/30">
                                            {{ substr($name, 0, 1) ?: '?' }}
                                        </div>
                                    @endif
                                </div>
                                {{-- Info: name, role, phone, email (below image) --}}
                                <div class="flex flex-col justify-start bg-dark-green p-4 md:p-6">
                                    <h3 class="font-display text-xl md:text-2xl font-medium text-white uppercase">{{ $name }}</h3>
                                    @if ($role)
                                        <p class="mt-0.5 text-sm text-light-yellow/90">{{ $role }}</p>
                                    @endif
                                    @if ($phone_number)
                                        <a href="tel:{{ preg_replace('/\s+/', '', $phone_number) }}" class="mt-1 text-sm text-white/90 hover:text-dark-yellow transition">{{ $phone_number }}</a>
                                    @endif
                                    @if ($email)
                                        <a href="mailto:{{ $email }}" class="mt-0.5 text-sm text-white/90 hover:text-dark-yellow transition break-all">{{ $email }}</a>
                                    @endif
                                    @if($bio)
                                        <p class="mt-3 text-sm text-white/90">{{ $bio }}</p>
                                    @endif
                                </div>
                            </article>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif
    </div>
</section>
