<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>

        <style>
            .errors {
                color: red;
                font-weight: bold;
            }
        </style>
    </head>

    <body class="bg-black">
        <div class="container-fluid px-5 ">
            <div class=" p-5 mt-4 rounded shadow-lg bg-body-light position-relative">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="text-center text-warning mb-2 fw-bold">Add Employee</h3>
                    <a href="/employee" class="btn btn-warning fw-bold" role="button">Show Employee</a>
                </div>
                <form class="row" id="submit_form">
                    @csrf
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="first-name" class="text-white">First Name</label>
                            <input type="text" class="form-control" name="first_name" id="first_name"
                                placeholder="First Name">
                            <div><span id="error_first_name" class="text-danger fw-bold"></span></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="last-name" class="text-white">Last Name</label>
                            <input type="text" class="form-control" name="last_name" id="last_name"
                                placeholder="Last Name">
                            <div><span id="error_last_name" class="text-danger fw-bold"></span></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="gender" class="text-white">Gender</label>
                            <select class="form-select" name="gender" id="gender">
                                <option value="">-------Select Gender-------</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Others">Others</option>
                            </select>
                            <div><span id="error_gender" class="text-danger fw-bold"></span></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="age" class="text-white">Age</label>
                            <input type="number" class="form-control" name="age" id="age">
                            <div><span id="error_age" class="text-danger fw-bold"></span></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="email" class="text-white">Email</label>
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Enter Email">
                            <div><span id="error_email" class="text-danger fw-bold"></span></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="mobile-number" class="text-white">Mobile Number</label>
                            <input type="number" class="form-control" name="mobile_number" id="mobile_number"
                                placeholder="Enter Mobile Number">
                            <div><span id="error_mobile_number" class="text-danger fw-bold"></span></div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group mb-2">
                            <label for="address" class="text-white">Address</label>
                            <textarea name="address" class="form-control" name="address" id="address" cols="30" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-warning px-3 fw-bold float-end">Submit</button>
                    </div>
                </form>
                {{-- toast notification --}}
                <div class="toast align-items-center bg-white position-absolute top-0 start-50 translate-middle"
                    id="liveToast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
                    <div class="d-flex">
                        <div class="toast-body">
                            Employee Add Successfully...
                        </div>
                        <button type="submit" class="btn-close me-2 m-auto" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                </div>
                {{-- toast notification end --}}
            </div>

        </div>
        <script>
            $(document).ready(function() {
                jQuery.validator.addMethod("noSpace", function(value, element) {
                    return value.indexOf(" ") < 0 && value != "";
                }, "No space please and don't leave it empty");
                $('#submit_form').validate({
                    errorClass: 'errors',
                    ignore: [],
                    rules: {
                        first_name: {
                            required: true,
                            noSpace: true,
                            number: false,
                            digit: false,
                        },
                        last_name: {
                            required: true,
                            noSpace: true,
                        },
                        gender: {
                            required: true,
                        },
                        age: {
                            required: true,
                            max: 60,
                            min: 18,
                        },
                        email: {
                            required: true,
                            email: true,
                        },
                        mobile_number: {
                            required: true,
                            minlength: 10,

                        },
                        address: {
                            required: true,
                        }
                    },
                    messages: {
                        first_name: {
                            required: "Please Enter First Name"
                        },
                        last_name: {
                            required: "Please Enter Last Name"
                        },
                        gender: {
                            required: "Please Select Gender"
                        },
                        age: {
                            required: "Please Enter the Age"
                        },
                        email: {
                            required: "Please Enter the Email"
                        },
                        mobile_number: {
                            required: "Please Enter Mobile No",
                        },
                        address: {
                            required: "Please Enter Address"
                        }
                    },
                    submitHandler: function(form, event) {
                        event.preventDefault();
                        $.ajax({
                            type: "Post",
                            url: '/employee',
                            data: $(form).serialize(),
                            success: function(response) {
                                console.log(response)
                                if (response.success) {
                                    $('#liveToast').toast('show');
                                    form.reset();
                                    setTimeout(() => {
                                        window.location.href = '/employee';
                                    }, 5000);

                                } else {
                                    alert(error);
                                }
                            },
                            error: function(error) {
                                console.log(error);
                            }
                        })

                    }
                })
            })
        </script>
    </body>

</html>
