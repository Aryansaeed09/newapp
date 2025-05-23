<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/students">Students Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>
    
    <div class="container">
      <a class="btn btn-outline-danger my-3" href="/students/create">Create Student</a>

      @if(session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
     </div>
      @endif
      @if(session('error'))
      <div class="alert alert-denger">
        {{ session('error') }}
     </div>
    @endif
    
      <table class="table table-danger table-bordered align-middle my-4">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Age</th>
            <th scope="col">City</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
         @foreach ($students as $student)
           <tr>
              <th scope="row">{{$student->id}}</th>
              <td><img src="{{ asset('storage/' . $student->image) }}" width="50px"></td>
              <td>{{$student->name}}</td>
              <td>{{$student->age}}</td>
             <td>{{$student->city}}</td>
             <td>
              <div>
                <a class="btn btn-info btn-sm" href="{{route('student.update',$student->id)}}">Update</a>
                <a class="btn btn-danger btn-sm" href="{{route('student.delete',$student->id)}}">Delete</a>
              </div>
             </td>
           </tr>
         @endforeach
          
        </tbody>
      </table>
   

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>