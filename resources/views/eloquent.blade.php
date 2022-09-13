<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <title>Eloquent ORM Data table show</title>
  </head>
  <body>

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="title">
                        <h2 class="text-center mt-2">Parent (Category Table) To Child (Post table) Data show by Eloquent ORM</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th>SL</th>
                                <th>Category Name</th>
                                <th>Post Title</th>
                              </tr>
                            </thead>
                            <tbody>

                            @foreach ($categories as $key=>$category)
                              <tr>
                                <th>{{$key+1}}</th>
                                <td>{{$category->category_name}}</td>
                                @foreach($category->posts as $key=>$post)
                                <td>{{$post->tag}}</td>
                                @endforeach
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="title">
                        <h2 class="text-center mt-2">Child (Post Table) To Parent (Category table) Data show by Eloquent ORM</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th>SL</th>
                                <th>Post Title</th>
                                <th>Category Name</th>
                              </tr>
                            </thead>
                            <tbody>

                            @foreach ($posts as $key=>$post)
                              <tr>
                                <th>{{$key+1}}</th>
                                <td>{{$post->tag}}</td>
                                {{-- ekhane ei category ta hoycce Post model e relationship category function ta ke call korechi--}}
                                <td>{{$post->category->category_name}}</td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


  </body>
</html>


{{-- <tr v-for="(value,key) in posts" :key="key">
    <td>{{value.category_name}}</td>
    <td v-for="(post,index) in value.posts" :key="index">{{post.tag}}</td>
</tr> --}}
