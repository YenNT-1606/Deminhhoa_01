<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center pt-5">
                <h1 class="display-one mt-5">Student List</h1>
                <div class="text-left"><a href="{{route('listStudent_UI')}}" class="btn btn-outline-primary">Student List</a></div>
    
                <form id="edit-frm" method="POST" action="{{route('update_member',$students->id)}}" class="border p-3 mt-2">
                    @csrf 
                    <div class="control-group col-6 text-left">
                        <label for="text">Fullname</label>
                        <div>
                            <input type="text" id="fullname" class="form-control mb-4" name="fullname"
                                placeholder="Enter Fullname" value="{{ $students->fullname }}"
                                required>
                        </div>
                    </div>
                    <div class="control-group col-6 mt-2 text-left">
                        <label for="date">Birthday</label>
                        <div>
                            <input type="date" id="birthday" class="form-control mb-4" name="birthday"
                                placeholder="Enter Birthday" value="{{ $students->birthday }}"
                                required>
                        </div>
                    </div>
    
                    <div class="control-group col-6 mt-2 text-left">
                        <label for="text">Address</label>
                        <div>
                            <input type="text" id="address" class="form-control mb-4" name="address"
                                placeholder="Enter Address" value="{{ $students->address }}"
                                required>
                        </div>
                    </div>
                    <div class="control-group col-6 text-left mt-2"><button type="submit" class="btn btn-primary">Save Update</button></div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>