@extends('layout.app2')

@section('content')   
    
  <!-- ======= About Us Section ======= -->
  <div class="container">
    <div class="container" data-aos="fade-u">
      <div class="section-title">
        <a href="/blog" class="btn btn-outline-primary btn-sm">Go back</a>
      </div>

    </div>
    <div class="container">
      <h1>Your Posts</h1>
      <div class="row" style="display: flex; flex-wrap: wrap;">
        @foreach($posts as $post)
          @if($post->user_id == Auth::user()->name)
            <div class="col-md-2 mb-4" style="flex: 0 0 auto;">
                <div class="card h-100">&nbsp&nbsp&nbsp
                    @if(!empty(trim($post->image)))
                        <img style="width: auto; height: 100px;" src="{{ asset("uploads/". $post->image) }}" class="card-img-top" alt="Product Image">
                    @endif
                    <div class="card-body">
                        <a class="card-title" href="/blog/{{ $post->id }}">{{ \Illuminate\Support\Str::limit($post->title ?? '',20,' ...') }}</a>
                    </div>
                </div>
            </div>
          @endif
        @endforeach
      </div>
    </div>
  </section><!-- End About Us Section -->

  
  
@endsection