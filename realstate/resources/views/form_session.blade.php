{{-- @include('cdn') --}}
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="css\bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <style>
        html {
            font-size: 18px;
            background-color: rgb(223, 223, 223);
            font-family: Trebuchet;

        }

        #bt {
            background-color: white;
            font-size: 20px;
        }
    </style>
</head>

<form action="{{ URL::to('/') }}/login" method="post" id="form1" enctype="multipart/form-data">
    @csrf
    <section class="">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center ">
                <div class="col-xl-9">

                    <h1 class="text-black mb-4" style="text-align:center">Login</h1>

                    <div class="card" style="border-radius: 10px;">
                        <div class="card-body">


                            <hr class="mx-n3">
                            <div class="row align-items-center ">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input type="text" class="form-control form-control-lg"
                                        placeholder="Your Email-id Here.." name="uname" />
                                </div>
                            </div>

                            <hr class="mx-n3">
                            <div class="row align-items-center ">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">password</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input type="text" class="form-control form-control-lg"
                                        placeholder="Your Password Here.." name="pwd" />
                                </div>
                            </div>
                            <hr class="mx-n3">
                            <div class="px-5 py-4">
                                <button type="submit" class="btn btn-primary btn-lg" name="btn">Click to
                                    Login</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</form>
</html>

