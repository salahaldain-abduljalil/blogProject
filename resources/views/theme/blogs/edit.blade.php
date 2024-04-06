@extends('theme.master')
@section('title','Edit My Blog')
@section('content')



@include('theme.partial.hero',['title'=>$blog->name])

 <!-- ================ contact section start ================= -->
 <section class="section-margin--small section-margin">
    <div class="container">
      <div class="row">
        <div class="col-12">

            @if(session('deleteblogs'))
            <div class="alert alert-success">
                {{ session('deleteblogs') }}
            </div>
            @endif
          <form action="{{ route('blog.update',['blog' =>$blog]) }}" class="form-contact contact_form" action="contact_process.php" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="form-group">
                <input class="form-control border" name="name" id="name" type="text" placeholder="Enter your Blog title" value="{{ $blog->name }}">

                <x-input-error :messages="$errors->get('name')" class="mt-2" />

              </div>

              <div class="form-group">
                <input class="form-control border" name="image" type="file">
                <x-input-error :messages="$errors->get('image')" class="mt-2" />

              </div>
              <div class="form-group">
                <select class="form-control border" name="category_id" value="{{ old('category_id') }}">
                    @if (count($categories) > 0)
                    @foreach ($categories as $category)

                    <option value="{{ $category->id }}" @if ($category->id == $blog->category_id)

                        selected

                    @endif>{{ $category->name }}</option>



                    @endforeach

                    @endif

                </select>
                <x-input-error :messages="$errors->get('category_id')" class="mt-2" />

              </div>
              <div class="form-group">
                <textarea class="w-100 border" name="description" value="{{ $blog->description }}" rows="10">

                </textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                  <div class="form-group text-center text-md-right mt-3">
                    <button type="submit" class="button button--active button-contactForm">Submit</button>
                  </div>

              </div>

          </form>
        </div>
      </div>
    </div>
  </section>
	<!-- ================ contact section end ================= -->


@endsection


