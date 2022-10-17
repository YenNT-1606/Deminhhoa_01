<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Student List</title>
</head>

<body>
    <div class="container">

        {{-- thông báo --}}
        @if (session('success'))
            <div class="alert alert-success h4 text-white" id="alert" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session('delete'))
            <div class="alert alert-error h4 text-white" id="alert" role="alert">
                {{ session('delete') }}
            </div>
        @endif

        {{-- end thông báo --}}
        <div class="row">
            <div class="col-12 text-center pt-5">
                <h1 class="display-one m-5">STUDENT LIST</h1>
                <div class="text-left"><a href={{ route('createNemberUI') }} class="btn btn-outline-primary">Add new
                        student</a></div>

                <table class="table mt-3  text-left">
                    <thead>
                        <tr>
                            <th scope="col">Fullname</th>
                            <th scope="col" class="pr-5">Birthday</th>
                            <th scope="col">Address</th>
                            <th scope='col'>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($students as $student)
                            <tr>
                                <td>{{ $student->fullname }}</td>
                                <td class="pr-5 text-right">{{ $student->birthday }}</td>
                                <td>{{ $student->address }}</td>
                                <td class="d-flex gap-4">

                                    <a href={{ route('edit_member_ui', ['id' => $student->id]) }}
                                        class="btn btn-outline-primary">Edit
                                    </a>
                                    <form action="{{ route('delete-student', ['id' => $student->id]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-outline-danger ml-1">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">No students found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function showModel(id) {
            var frmDelete = document.getElementById("delete-frm");
            frmDelete.action = 'student/' + id;
            var confirmationModal = document.getElementById("deleteConfirmationModel");
            confirmationModal.style.display = 'block';
            confirmationModal.classList.remove('fade');
            confirmationModal.classList.add('show');
        }

        function dismissModel() {
            var confirmationModal = document.getElementById("deleteConfirmationModel");
            confirmationModal.style.display = 'none';
            confirmationModal.classList.remove('show');
            confirmationModal.classList.add('fade');
        }
    </script>
</body>

</html>
