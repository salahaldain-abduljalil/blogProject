@extends('theme.master')
@section('title', 'My Blog')
@section('content')



    @include('theme.partial.hero', ['title' => 'My Blogs'])

    <!-- ================ contact section start ================= -->
    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="row">


            @if(session('updateblogs'))
            <div class="alert alert-success">
                {{ session('updateblogs') }}
            </div>
            @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col" width="15%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if (count($blogs) > 0)
                            @foreach ($blogs as $blog)
                                <tr>
                                    <td>
                                        <a href="{{ route('blog.show', ['blog' => $blog]) }}"
                                            target="_blank">{{ $blog->name }}</a>
                                    </td>

                                    <td>
                                        <a href="{{ route('blog.edit',['blog' => $blog]) }}" class="d-inline">

                                        <button type="submit" class="btn btn-sm btn-primary mr-2 d-inline">Edit</button>

                                        <form action="{{ route('blog.destroy',['blog'=>$blog]) }}" method="post">

                                            @method('delete')
                                            @csrf

                                            <button type="submit"   class="btn btn-sm btn-danger mr-2 d-inline">Delete</button></a>


                                        </form>


                                    </td>
                                </tr>
                            @endforeach

                        @endif

                    </tbody>
                </table>
                @if (count($blogs) > 0)
                    {{ $blogs->render('pagination::bootstrap-4') }}
                @endif



            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->


@endsection
