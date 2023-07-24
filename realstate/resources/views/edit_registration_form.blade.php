<html>
<head>
    <title>Update Profile</title>
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
@foreach ($reg_data as $r1)
@php
$h = explode(',', $r1['subject']);
@endphp

<form action="{{ URL::to('/') }}/Update_registration" method="post" id="form1" enctype="multipart/form-data">
{{-- <form method="POST" id="form1" enctype="multipart/form-data"> --}}
    @csrf
    <section class="">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center ">
                <div class="col-xl-9">

                    <h1 class="text-black mb-4" style="text-align:center">Update</h1>

                    <div class="card" style="border-radius: 10px;">
                        <div class="card-body">

                            @if (session('success'))
                                <h3 style="color:green">{{ session('success') }}</h3>
                            @endif
                            @if (session('error'))
                                <h3 style="color: red">{{ session('error') }}</h3>
                            @endif

                            <hr class="mx-n3">
                            <div class="row align-items-center ">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Student Name</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input type="text" class="form-control form-control-lg"
                                        placeholder="Your Name Goes Here.." name="sn"
                                        value="{{ $r1['Full_name'] }}" />

                                    <span style="color: red">
                                        @error('sn')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>



                            <hr class="mx-n3">
                            <div class="row align-items-center ">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Branch</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    {{-- <input class="form-control form-control-lg" id="formFileLg" type="text"
                                        placeholder="Branch You Belong" name="br" /> --}}
                                    <select class="form-control" id="brance" name="br">
                                        <option selected></option>
                                        <option value="D.Engg - Civil Engineering"
                                            @if ($r1['Brance'] == 'D.Engg - Civil Engineering') selected @endif>D.Engg - Civil Engineering
                                        </option>
                                        <option value="D.Engg - Computer Engineering"
                                            @if ($r1['Brance'] == 'D.Engg - Computer Engineering') selected @endif>
                                            D.Engg - Computer Engineering
                                        </option>
                                        <option value="D.Engg - Electrical Engineering"
                                            @if ($r1['Brance'] == 'D.Engg - Electrical Engineering') selected @endif>D.Engg - Electrical
                                            Engineering
                                        </option>
                                        <option value="D.Engg - Mechanical Engineering"
                                            @if ($r1['Brance'] == 'D.Engg - Mechanical Engineering') selected @endif>D.Engg - Mechanical
                                            Engineering
                                        </option>
                                    </select>
                                    <span style="color: red">
                                        @error('br')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <hr class="mx-n3">
                            <div class="row align-items-center ">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Subject</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input class="" type="checkbox" name="subject[]" value="WDTF"
                                        @if (is_array($h) && in_array('WDTF', $h)) checked @endif />WDT
                                    <input class="" type="checkbox" name="subject[]" value="SAD"
                                        @if (is_array($h) && in_array('SAD', $h)) checked @endif />SAD
                                    <input class="" type="checkbox" name="subject[]" value="CN"
                                        @if (is_array($h) && in_array('CN', $h)) checked @endif />CN
                                </div>
                                <span style="color: red">
                                    @error('subject')
                                        {{ $message }} 
                                    @enderror
                                </span>
                            </div>




                            <hr class="mx-n3">
                            <div class="row align-items-center">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Semester</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input class="form-control form-control-lg" id="formFileLg" type="number"
                                        placeholder="Current Semseter" name="sem" value="{{ $r1['Semester'] }}" />
                                    <span style="color: red">
                                        @error('sem')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <hr class="mx-n3">
                            <div class="row align-items-center ">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <!-- <input class="form-control form-control-lg" id="formFileLg" type="text" placeholder="Resident or Address"name="add" required/> -->
                                    <textarea name="add" cols="23" id="formFileLg" rows="2" placeholder="Resident or Address"
                                        class="form-control form-control-lg">{{ $r1['Address'] }}</textarea>
                                    <span style="color: red">
                                        @error('add')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <hr class="mx-n3">
                            <div class="row align-items-center">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Mobile</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input class="form-control form-control-lg" id="formFileLg" type="number"
                                        placeholder="Mobile No" name="mob" value="{{ $r1['Mobile'] }}" />
                                    <span style="color: red">
                                        @error('mob')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <hr class="mx-n3">
                            <div class="row align-items-center">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input class="form-control form-control-lg" id="formFileLg" type="email"
                                        placeholder="example@example.com" name="em"
                                        value="{{ $r1['Email'] }}" />
                                    <span style="color: red">
                                        @error('em')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <hr class="mx-n3">
                            <div class="row align-items-center">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Password</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input class="form-control form-control-lg" id="formFileLg" type="password"
                                        placeholder="Password" name="psw" value="{{ $r1['Password'] }}" />
                                    <span style="color: red">
                                        @error('psw')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <hr class="mx-n3">
                            <div class="row align-items-center ">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Conform Password</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input class="form-control form-control-lg" id="formFileLg" type="password"
                                        placeholder="Password" name="psw_confirmation"
                                        value="{{ $r1['Password'] }}" />
                                    <span style="color: red">
                                        @error('psw_confirmation')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <hr class="mx-n3">
                            <div class="row align-items-center">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Upload Profile</h6>
                                </div>
                                <div class="col-md-9 pe-5">

                                    <input class="form-control form-control-lg" id="formFileLg" type="file"
                                        name="file" />

                                        <img src="{{ URL::to('/') }}/images/profile/{{ $r1['Profile'] }}" height="150px" width="250px" />
                                        <br>
                                    <div class="small text-muted mt-2">Upload the profile picture that you are
                                        intrested...</div>

                                    <span style="color: red">
                                        @error('file')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <hr class="mx-n3">
                            <div class="px-5 py-4">
                                <button type="submit" class="btn btn-primary btn-lg" name="btn">Click to
                                    Registration</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</form>
@endforeach

</html>
