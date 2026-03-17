<section class="mb-14 md:mb-28">
    <div class="mx-auto max-w-screen-2xl px-6">
        {{-- Header --}}
        <div class="mb-12 md:mb-16 flex items-center justify-between gap-4">
            <div>
                @if ($subtitle)
                    <p class="subtitle">{{ $subtitle }}</p>
                @endif
                <h2 class="text-3xl md:text-4xl lg:text-[56px] font-display font-medium text-dark-green uppercase">
                    {{ $title }}
                </h2>
            </div>

            {{-- Custom arrows --}}
            <div class="flex gap-4 md:gap-6">
                <button type="button" class="splide-prev text-dark-yellow-100 hover:opacity-70 disabled:text-dark/40 disabled:pointer-events-none disabled:cursor-not-allowed" aria-label="Previous team member">
                    <svg xmlns="http://www.w3.org/2000/svg" width="42" height="32" viewBox="0 0 50 38" fill="currentColor">
                        <path opacity="0.4" d="M50 17.3062H10.5794C10.5794 17.3062 20.1558 13.6821 22.0491 0.431769L20.2118 0C20.2118 0 18.3745 17.3062 0 17.3062V19.6843C0 19.6843 17.2884 18.2409 20.2118 37.0968L22.0491 36.5872C22.0491 36.5872 20.5179 24.0163 10.5794 19.6843H50V17.3062Z"/>
                    </svg>
                </button>
                <button type="button" class="splide-next text-dark-yellow-100 hover:opacity-70 disabled:text-dark/40 disabled:pointer-events-none disabled:cursor-not-allowed" aria-label="Next team member">
                    <svg xmlns="http://www.w3.org/2000/svg" width="42" height="32" viewBox="0 0 50 38" fill="currentColor">
                        <path opacity="0.4" d="M0 17.3062H39.4206C39.4206 17.3062 29.8442 13.6821 27.9509 0.431769L29.7882 0C29.7882 0 31.6255 17.3062 50 17.3062V19.6843C50 19.6843 32.7116 18.2409 29.7882 37.0968L27.9509 36.5872C27.9509 36.5872 29.4821 24.0163 39.4206 19.6843H0V17.3062Z"/>
                    </svg>
                </button>
            </div>
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
