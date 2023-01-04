<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Blog App</title>

    <link rel="icon" href="img/favicon.ico" type="image/x-icon" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"/>

    <link rel="stylesheet" href="{{ asset('css/mdb.min.css')}}" />
  </head>
  <body>

    <div class="container">
      <div class="row mt-4">
        <div class="col-md-8">
          <table class="table table-sm">
            <thead class="table-primary">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Author</th>
                <th scope="col">Transactions</th>

              </tr>
            </thead>
            <tbody>
            @foreach ($books as $key => $books)
            <tr>
              <th scope="row">{{$key+1}}</th>
              <th scope="row">{{$books->name}}</th>
              <th scope="row">{{$books->book_category}}</th>
              <th scope="row">{{$books->author}}</th>
              <th>
                <a href="{{route('book_delete',['id'=>$books->id])}}" class="btn btn-sm btn-danger">Delete</a>
                <a href="{{route('get_book_edit',['id'=>$books->id])}}" class="btn btn-sm btn-info">Edit</a>
              </th>
            </tr>
            @endforeach
            </tbody>
          </table>
        </div>

      <div class="col-md-4">
        <form method="POST" action="{{ isset($firstBook) ? url('book/edit') : url('book/store')}}">
          {{csrf_field()}}
          <div class="form-outline mb-4">
            <input type="text" id="name" name="name" value="{{ isset($firstBook) ? $firstBook->name:'' }}" class="form-control" />
            <label class="form-label" for="name">Book name</label>
          </div>
          <div class="form-outline mb-4">
            <input type="text" id="book_category" name="book_category" value="{{ isset($firstBook) ? $firstBook->book_category:'' }}" class="form-control" />
            <label class="form-label" for="book_category">Book category</label>
          </div>
          <div class="form-outline mb-4">

            <input type="text" id="author" name="author" value="{{ isset($firstBook) ? $firstBook->author:'' }}" class="form-control" />
            <label class="form-label" for="author">Author name</label>
          </div>
          {!! isset($firstBook) ? '<input type="hidden" name="book_id" value="'.$firstBook->id.'">':'' !!}
          <input type="submit" name="save" value="{{ isset($firstBook) ? 'Update' : 'save'}}" class="btn btn-info btn-block">
        </form>

      </div>

      </div>

      <div class="dropdown">
        <button
          class="btn btn-primary dropdown-toggle"
          type="button"
          id="dropdownMenuButton"
          data-mdb-toggle="dropdown"
          aria-expanded="false">
          Dropdown button
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <li><a class="dropdown-item" href="#">Action</a></li>
          <li><a class="dropdown-item" href="#">Another action</a></li>
          <li><a class="dropdown-item" href="#">Something else here</a></li>
        </ul>
      </div>
      <div>
        <h5>
          <span class="badge bg-info">{{'Total book :' .$bookCount}}</span>
        </h5>
      </div>
    </div>

  </body>
  <script type="text/javascript" src="{{ asset('js/mdb.min.js')}}"></script>

  <script type="text/javascript"></script>
</html>
