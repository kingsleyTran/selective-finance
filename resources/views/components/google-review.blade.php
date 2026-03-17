@push('styles')
<style>
/* Local overrides for the Google Review block */
.google-review-widget {
    border-radius: 1rem;
    overflow: hidden;
    background: transparent !important;
}

.google-review-widget .elfsight-app-243ebbd7-bbee-4bd3-ade9-79a0fff94368 {
    min-height: 420px;
    background: transparent !important;
}

/* Applies only if Elfsight renders same-document DOM (not iframe) */
.google-review-widget [class*="eapps-google-reviews"],
.google-review-widget [class*="eapps-widget"] {
    background: transparent !important;
}

/* Keep cards transparent but avoid touching interactive button overlays */
.google-review-widget [class*="Review"],
.google-review-widget [class*="review"],
.google-review-widget [class*="Card"],
.google-review-widget [class*="card"] {
    background: transparent !important;
    box-shadow: none !important;
}

/* Restore Elfsight button overlay appearance */
.google-review-widget .es-button-base-overlay,
.google-review-widget .ButtonBase__Overlay-sc-26241f43-4,
.google-review-widget [class*="ButtonBase__Overlay"] {
    background: var(--eapps-button-background-color, #16342f) !important;
    opacity: 1 !important;
}

.google-review-widget [class*="eapps-google-reviews"] {
    font-family: inherit !important;
}

/* Force transparent background for Elfsight header wrappers */
.google-review-widget .es-header-container,
.google-review-widget .HeaderContainer__Inner-sc-4da6b4d0-0,
.google-review-widget .HeaderComponent__StyledHeader-sc-82145d0b-0,
.google-review-widget [class*="HeaderContainer__Inner"],
.google-review-widget [class*="HeaderComponent__StyledHeader"] {
    background: transparent !important;
}
</style>
@endpush

<section class="mb-14 md:mb-28 scroll-mt-24">
    <div class="mx-auto max-w-screen-2xl px-6">
        <div class="text-center max-w-4xl mx-auto mb-6 md:mb-14">
            <h2 class="font-display font-medium text-3xl md:text-4xl lg:text-[56px] leading-[130%] tracking-[-0.56px] text-dark-green uppercase">
                {!! $title !!}
            </h2>
        </div>
        <!-- Elfsight Google Reviews | Selective Finance Google Reviews -->
        <script src="https://elfsightcdn.com/platform.js" async></script>
        <div class="google-review-widget">
            <div class="elfsight-app-243ebbd7-bbee-4bd3-ade9-79a0fff94368" data-elfsight-app-lazy></div>
        </div>
        <!-- Always remember that you are absolutely unique. Just like everyone else. - Margaret Mead -->
    </div>
</section>
