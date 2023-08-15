<x-layout>

    <div class="container py-md-5 container--narrow">
      <div class="d-flex justify-content-between">
        <h2>{{$post->title}}</h2>
<!-- //** post has been used on PostController public function viewSinglePost(Post $post)
        return view('single-post', ['post' => $post]); and on the routetag on web.php and on blade {{$post->title}} -->

        <span class="pt-2">
          <a href="#" class="text-primary mr-2" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
          <form class="delete-post-form d-inline" action="#" method="POST">
            <button class="delete-post-button text-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></button>
          </form>
        </span>
      </div>

      <p class="text-muted small mb-4">
        <a href="#"><img class="avatar-tiny" src="https://gravatar.com/avatar/f64fc44c03a8a7eb1d52502950879659?s=128" /></a>
        Posted by <a href="#">{{$post->pizza->username}}</a> on {{$post->created_at->format('j/n/Y')}}
      </p>

      <div class="body-content">
{{$post->body}}
      </div>
    </div>
</x-layout>
