<x-layouts.app :configuration="$configuration" :title="$page->data->seo_title">
    @foreach ($slices as $slice)
        @switch($slice->slice_type)
            @case('header_section')
                @php
                    $image = $slice->primary->image->url ?? '';
                    $title = '';
                    if (isset($slice->primary->title) && is_array($slice->primary->title)) {
                        $titleParts = [];
                        foreach ($slice->primary->title as $block) {
                            if (isset($block->text)) {
                                $titleParts[] = e($block->text);
                            }
                        }
                        $title = implode('<br>', $titleParts);
                    } elseif (isset($slice->primary->title)) {
                        $title = e($slice->primary->title);
                    }
                @endphp
                <x-page-header :image="$image" :title="$title" />
                @break
            @case('information_section')
                @php
                    $location = $slice->primary->location[0]->text ?? '';
                    $phone = $slice->primary->call_us[0]->text ?? '';
                    $email = $slice->primary->email[0]->text ?? '';
                @endphp
                <section class="max-w-screen-2xl mx-auto px-6 mb-14 md:mb-28">
                    <div class="grid grid-cols-1 gap-8 pt-6 border-t border-dashed border-black/20 sm:grid-cols-2 lg:grid-cols-3">
                        <div class="flex flex-col min-w-0">
                            <p class="font-bold text-dark-yellow uppercase mb-3">Location</p>
                            <p class="font-medium text-xl text-dark-green break-words">{{ $location }}</p>
                        </div>
                        <div class="flex flex-col min-w-0">
                            <p class="font-bold text-dark-yellow uppercase mb-3">Call Us</p>
                            <p class="font-medium text-xl text-dark-green break-words">{{ $phone }}</p>
                        </div>
                        <div class="flex flex-col min-w-0 sm:col-span-2 lg:col-span-1">
                            <p class="font-bold text-dark-yellow uppercase mb-3">Email</p>
                            <p class="font-medium text-xl text-dark-green break-words">{{ $email }}</p>
                        </div>
                    </div>
                </section>
                @break
            @case('contact_section')
                @php
                    $title = '';
                    if (isset($slice->primary->title) && is_array($slice->primary->title)) {
                        $titleParts = [];
                        foreach ($slice->primary->title as $block) {
                            if (isset($block->text)) {
                                $titleParts[] = e($block->text);
                            }
                        }
                        $title = implode('<br>', $titleParts);
                    } elseif (isset($slice->primary->title)) {
                        $title = e($slice->primary->title);
                    }
                    $description = '';
                    if (isset($slice->primary->description) && is_array($slice->primary->description)) {
                        $descriptionParts = [];
                        foreach ($slice->primary->description as $block) {
                            if (isset($block->text)) {
                                $descriptionParts[] = '<p>' . e($block->text) . '</p>';
                            }
                        }
                        $description = implode('', $descriptionParts);
                    } elseif (isset($slice->primary->description)) {
                        $description = '<p>' . e($slice->primary->description) . '</p>';
                    }
                    $image = $slice->primary->image->url ?? '';
                @endphp
                <x-contact-form :title="$title" :image="$image" :description="$description" />
                @break
        @endswitch
    @endforeach
</x-layouts.app>
