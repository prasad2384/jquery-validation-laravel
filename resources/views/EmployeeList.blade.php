<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Employee List</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
    </head>

    <body class="bg-black">
        <div class="container-fluid px-5 px-md-5">

            <div class="row mt-4 position-relative">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h2 class="text-warning fw-bold">Employee</h2>
                    <a href="employee/create" class="fw-bold btn btn-warning">Add Employee</a>
                </div>
                <div class="col-6 col-md-12">
                    <table id="example" class="table table-responsive table-bordered ">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Age</th>
                                <th scope="col">Email</th>
                                <th scope="col">Mobile No</th>
                                <th scope="col">Address</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="EmployeeTable">
                            @foreach ($data as $dt)
                                <tr>
                                    <th scope="col text-center">{{ $dt->id }}</th>
                                    <th scope="col ">{{ $dt->first_name }} {{ $dt->last_name }}</th>
                                    <th scope="col ">{{ $dt->gender }}</th>
                                    <th scope="col ">{{ $dt->age }}</th>
                                    <th scope="col ">{{ $dt->email }}</th>
                                    <th scope="col ">{{ $dt->mobile_number }}</th>
                                    <th scope="col ">{{ $dt->address }}</th>
                                    <th scope="col">
                                        <button class="btn btn-danger btn-sm"
                                            onclick="DeleteEmployee({{$dt->id}})">Delete</button>
                                        <a href="{{route('employee.edit',$dt->id)}}" class="btn btn-warning btn-sm">Update</a>      
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                {{-- toast notification --}}
                <div class="toast align-items-center bg-white position-absolute top-0 start-50 translate-middle"
                    id="liveToast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
                    <div class="d-flex">
                        <div class="toast-body" id="toast-body">

                        </div>
                        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                </div>
                {{-- toast notification end --}}
            </div>

        </div>
        <script>
            function DeleteEmployee(id) {
                $.ajax({
                    url: '/employee/' + id,
                    type: 'Delete',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#toast-body').text(response.message);
                            $('#liveToast').toast('show');
                            $('#EmployeeTable').find('tr').filter(function() {
                                return $(this).find('th').first().text() == id;
                            }).remove();
                        }
                        else{
                            alert(response.message);
                        }
                    },
                    error:function(error){
                        console.log(error)
                    }
                });
             
            }
        </script>
    </body>

</html>
