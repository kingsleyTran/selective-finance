<section>
    <x-featured-post :image="$featuredPost->image" :title="$featuredPost->title" :excerpt="$featuredPost->excerpt" :slug="$featuredPost->slug" :createdDate="$featuredPost->createdDate" />
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($blogs as $blog)
                <x-blog-card :title="$blog->title" :image="$blog->image" :slug="$blog->slug" :createdDate="$blog->createdDate" />
            @endforeach
        </div>
    </div>
    <x-pagination :totalPages="$totalPages" :currentPage="$currentPage" />
</section>
