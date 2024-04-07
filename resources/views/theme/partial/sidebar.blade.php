@php
    $Categories = App\Models\Category::get();
    $recentBlogs = App\Models\Blog::latest()->take(3)->get();
@endphp




<div class="col-lg-4 sidebar-widgets">
    <div class="widget-wrap">
      <div class="single-sidebar-widget newsletter-widget">
        <h4 class="single-sidebar-widget__title">Newsletter</h4>
        <div class="form-group mt-30">
          <div class="col-autos">
            @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            <form action="{{ route('subscribe.store') }}" method="post">
                @csrf
            <input type="text" name="email" class="form-control" id="inlineFormInputGroup" placeholder="Enter email" onfocus="this.placeholder = ''"
              onblur="this.placeholder = 'Enter email'">
              @error('email')
              <span class="text-danger">{{ $message }}</span>
              @enderror
              <button class="bbtns d-block mt-2 w-100">Subcribe</button>

            </form>
          </div>
        </div>
      </div>
      @if (count($Categories) > 0)

      <div class="single-sidebar-widget post-category-widget">
        <h4 class="single-sidebar-widget__title">Category</h4>
        <ul class="cat-list mt-20">

            @foreach ($Categories as $category)
            <li>
                <a href="{{ route('theme.category',['id'=> $category->name]) }}" class="d-flex justify-content-between">
                  <p>{{ $category->name }}</p>
                  <p>({{ count($category->blog) }})</p>
                </a>
              </li>
            @endforeach
        </ul>
      </div>
      @endif



   @if(count($recentBlogs)>0)
      <div class="single-sidebar-widget popular-post-widget">
        <h4 class="single-sidebar-widget__title">Recent Blogs</h4>

        @foreach ($recentBlogs as $blog)


        <div class="popular-post-list">
          <div class="single-post-list">
            <div class="thumb">
              <img class="card-img rounded-0" src="{{asset("storage")}}/blogs/{{ $blog->image }}" alt="">
              <ul class="thumb-info">
                <li><a href="#">{{ $blog->user->name }}</a></li>
                <li><a href="#">{{ $blog->created_at->format('d M') }}</a></li>
              </ul>
            </div>
            <div class="details mt-20">
              <a href="{{ route('blog.show',['blog' => $blog]) }}">
                <h6>{{ $blog->name }}</h6>
              </a>
            </div>
          </div>

          @endforeach
         @endif
        </div>
      </div>
    </div>
</div>
