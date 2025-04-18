<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Form</title>
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


    <div class="mx-auto" style="width: 600px;">
        <h2 class="mb-4">Student Registration Form</h2>
        @if ($errors->any())
          <div class="alert alert-danger">
           <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
           </ul>
          </div>
         @endif
         <form method="POST" action="{{ route("student.store") }}" enctype="multipart/form-data">
          @csrf
            <!-- Name Field -->
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" value="{{ old('name') }}" name="name" class="form-control" id="name" placeholder="Enter your name">
                
                @error('name')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror

            </div>

            <!-- file Field -->
            <div class="mb-3">
                <label for="image" class="form-label">Student Image</label>
                <input type="file" name="image" class="form-control" id="image" accept="image/*">
               
            </div>

            <!-- Age Field -->
            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" value="{{ old('age') }}"  name="age" class="form-control" id="age" placeholder="Enter your age">
                @error('age')
                <div class="alert alert-danger">
                  {{ $message }}
              </div>
                @enderror
            </div>

            <!-- City Field (Dropdown) -->
            <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <select class="form-select" id="city" name="city">
                    <option value="" selected disabled>Select your city</option>
                    <option value="Lodhran" @selected(old('city') == 'Lodhran') >Lodhran</option>
                    <option value="Multan" @selected(old('city') == 'Multan')>Multan</option>
                    <option value="Karachi" @selected(old('city') == 'Karachi')>Karachi</option>
                    <option value="Bahawalpur" @selected(old('city') == 'Bahawalpur')>Bahawalpur</option>
                </select>
            </div>

            <!-- Course Field (Dropdown) -->
            <div class="mb-3">
                <label for="course_id" class="form-label">Course</label>
                <select class="form-select" id="course_id" name="course_id" required>
                    <option value="" selected disabled>Select your course</option>
                    <option value="1">Graphic Designing</option>
                    <option value="3">Full Stack Development</option>
                    <option value="2">Digital Marketing</option>
                    <option value="4">Mobile App Development</option>
                </select>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>