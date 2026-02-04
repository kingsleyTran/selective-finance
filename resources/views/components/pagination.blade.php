<nav class="max-w-screen-2xl mx-auto flex items-center justify-between gap-10 py-20 px-6">
    <!-- PREV -->
    <button class="group flex items-center gap-2 text-dark-yellow
             transition-opacity hover:opacity-70">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="18" viewBox="0 0 24 18" fill="none">
            <path
                d="M24 8.30697H5.07811C5.07811 8.30697 9.6748 6.56741 10.5836 0.207249L9.70165 0C9.70165 0 8.81976 8.30697 0 8.30697V9.44847C0 9.44847 8.29844 8.75562 9.70165 17.8065L10.5836 17.5618C10.5836 17.5618 9.84857 11.5278 5.07811 9.44847H24V8.30697Z"
                fill="currentColor" />
        </svg>
    </button>

    <!-- PAGES -->
    <ul class="flex items-center gap-6">
        @for ($i = 1; $i <= $totalPages; $i++)
            <li>
                <button
                    class="{{ $i === $currentPage
                        ? 'flex w-8 h-8 items-center justify-center rounded-sm bg-dark-yellow text-light-yellow'
                        : 'text-sm text-davy-grey hover:text-white' }}">
                    <span class="text-sm">
                        {{ $i }}
                    </span>
                </button>
            </li>
        @endfor
    </ul>

    <!-- NEXT -->
    <button class="group flex items-center gap-2 text-dark-yellow
             transition-opacity hover:opacity-70">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="18" viewBox="0 0 24 18" fill="none">
            <path
                d="M0 8.30697H18.9219C18.9219 8.30697 14.3252 6.56741 13.4164 0.207249L14.2983 0C14.2983 0 15.1802 8.30697 24 8.30697V9.44847C24 9.44847 15.7016 8.75562 14.2983 17.8065L13.4164 17.5618C13.4164 17.5618 14.1514 11.5278 18.9219 9.44847H0V8.30697Z"
                fill="currentColor" />
        </svg>
    </button>
</nav>
