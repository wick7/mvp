<div class="row">
        @foreach ($posts as $post)
        <div class="col-md-6 col-lg-4">
          <div class="card"><img alt="Card image cap" class="card-img-top img-fluid" src="https://s-media-cache-ak0.pinimg.com/736x/55/03/94/550394c428e268868aa73e509302b84c.jpg" />
            <div class="card-block" style="margin-bottom: 1em;">
              <h4 class="card-title" style="word-wrap: break-word;">{{$post->title}}</h4>
              <p class="card-text" style="word-wrap: break-word;">{{substr($post->body, 0, 50)}}{{strlen($post->body) > 50 ? "..." : ""}}</p>
              <a href="{{route('posts.show', $post->id)}}" class="btn btn-primary">View</a>
              <a href="{{route('posts.edit', $post->id)}}" class="btn btn-success">Edit</a>
              <a href="{{route('photos', $post->id)}}" class="btn btn-success">Add Photo</a>
            </div>
          </div>
        </div>
        @endforeach
        </div>