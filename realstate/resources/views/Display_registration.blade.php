{{-- <table border="1">
    <tr>

    </tr>

</table> --}}



<html>
<link rel="stylesheet" href="css\bootstrap.css">
<link rel="stylesheet" href="js\bootstrap.js">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>

<head>
    <style>
        /* table{
            border-collapse: collapse;
            border:5px solid white;
        }
        th{
            background-color:#2F4F4F;
            padding:10px 30px;
            border:none;
            border-top:3px solid black;
            border-bottom:3px solid black;
            color:white;
        }
        td{
            background-color:#ADD8E6;
            padding:10px 30px;
            border:none;
            font-size:17px;
        } */
        body {
            background-color: black;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>
<div class="container-fluid">
    <table border="1" class="table table-dark table-hover table-striped-columns table-bordered text-center">
        <center>
            <tr>
                <th>Fullname</th>
                <th>Email</th>
                <th>Password</th>
                <th>Mobile</th>
                <th>Semester</th>
                <th>subject</th>
                <th>Brance</th>
                <th>Address</th>
                <th>profile_picture</th>
                <th>Role</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>Action</th>
            </tr>


            @foreach ($data as $d)
                <tr>
                    <td>{{ $d['Full_name'] }}</td>
                    <td>{{ $d['Email'] }}</td>
                    <td>{{ $d['Password'] }}</td>
                    <td>{{ $d['Mobile'] }}</td>
                    <td>{{ $d['Semester'] }}</td>
                    <td>{{ $d['subject'] }}</td>
                    <td>{{ $d['Brance'] }}</td>
                    <td>{{ $d['Address'] }}</td>
                    <td><img src="{{URL::to('/')}}/images/profile/{{ $d['Profile'] }}" alt="" height="100px" width="100px">
                    </td>
                    <td>{{ $d['role'] }}</td>
                    <td>{{ $d['status'] }}</td>

                    <td><a href="{{URL::to('/')}}/edit_user/{{ $d['Email'] }}"><input type="button" class="btn btn-primary"
                                value="Edit"></a></td>

                    <td><a href="{{URL::to('/')}}/delete_user/{{ $d['Email'] }}"><input type="button" class="btn btn-danger"
                                value="Delete"></a></td>

                    <td>
                        @if ($d['status'] == 'Active')
                            <a href="{{URL::to('/')}}/Deactivate/{{ $d['Email'] }}"><input type="button" class="btn btn-danger"
                                    value="Deactivate"></a>

                        @elseif($d['status'] == 'Deleted')
                            <a href="{{URL::to('/')}}/Activate/{{ $d['Email'] }}"><input type="button" class="btn btn-warning"
                                    value="Reactivate"></a>

                        @else
                            <a href="{{URL::to('/')}}/Activate/{{ $d['Email'] }}"><input type="button" class="btn btn-success"
                                    value="Activate"></a>
                        @endif
                    </td>
                </tr>
            @endforeach
            <table>
            </table>
        </center>
    </table>
</div>

</html>
