<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class="container">
        <h2 class="text-center">Student Edit</h2>
        <a href="{{ route('student.index') }}" class="btn btn-success">Back</a>
        <hr> @if(Session::has('error'))
        <p class="alert alert-success">{{ Session::get('error') }}</p>
        @endif
        <form style="margin: 0 auto; max-width: 600px;" action="{{ route('student.update',$student->id) }}" method="post">
            @csrf @method('PUT')
            <div class="form-group">
                <label>Enter Student Name</label>
                <input class="form-control" name="name" value="{{ $student->name }}" placeholder="Enter student name"> @error('name')
                <div class="form-control-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Enter Roll</label>
                <input class="form-control" value="{{ $student->roll }}" name="roll" placeholder="Enter roll"> @error('roll')
                <div class="form-control-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Enter Department</label>
                <select name="department_id" id="" class="form-control">

                    @foreach($departments as $department)
                    <option value="{{ $department->id }}" @if($department->id == $student->department_id)
                        selected @endif>{{ $department->department_name }}</option>
                    @endforeach
                </select> @error('department_id')
                <div class="form-control-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="0" @if($student->status == 0) selected="" @endif>Deactive</option>
                    <option value="1" @if($student->status ==1) selected="" @endif>Active</option>
                </select> @error('roll')
                <div class="form-control-feedback">{{ $message }}</div>
                @enderror
            </div>



            <div class=" form-group">

                <button type="submit" class="btn btn-success">Update</button>
            </div>



        </form>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>