<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M Square @ 13</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
    <style>
        body {
            background-color: skyblue;
        }
        table {
            margin: auto;
        }

        tr {
            background-color: orange;
            color: blue;
            text-align: center;
        }

        td {
            background-color: green;
            color: white;
            text-align: center;
        }

        h1 {
            color: red;
            text-align: center;
        }

        h3 {
            color: red;
            text-align: center;
        }

        a {
            text-decoration: none;
            color: blue;
            background-color: white;
        }

        label {
            color: brown;
            font-size: 18px;
        }

        .pagination-index {
            color: red;
            font-size: 24px;
        }

        .w-5,
        .h-5 {
            height: 16px;
        }
    </style>
</head>

<body>
    <div style="text-align: center; color: black;">
        <h1>View Admin Details</h1>
        <form>
            <label> &nbsp; Search Text Here :- &nbsp; </label>
            <input type="text" name="searchTxt" value="<?php echo @$_GET['searchTxt']; ?>">
            <input type="submit" name="search" value="Search">
        </form><br>
        <table class="container" id="table-data" style="text-align: center;">
            <tr>
                <th> &nbsp; Id &nbsp; </th>
                <th> &nbsp; First Name &nbsp; </th>
                <th> &nbsp; Last Name &nbsp; </th>
                <th> &nbsp; User Name &nbsp; </th>
                <th> &nbsp; Email Id &nbsp; </th>
                <th> &nbsp; Password &nbsp; </th>
                <th> &nbsp; City &nbsp; </th>
                <th> &nbsp; State &nbsp; </th>
                <th> &nbsp; Contact &nbsp; </th>
                <th> &nbsp; Gender &nbsp; </th>
                <th> &nbsp; Birthdate &nbsp; </th>
                <th> &nbsp; Hobby &nbsp; </th>
                <th> &nbsp; Image &nbsp; </th>
                <th> &nbsp; Edit &nbsp; </th>
                <th> &nbsp; Delete &nbsp; </th>
            </tr>
            <tr>
                @for($i=1;$i<=15;$i++) 
                    <td> &nbsp; M &nbsp; </td>
                @endfor
            </tr>
            @foreach($myusers as $row)
            <tr>
                <td> &nbsp; {{$row->id }} &nbsp; </td>
                <td> &nbsp; {{$row->fname }} &nbsp; </td>
                <td> &nbsp; {{$row->lname }} &nbsp; </td>
                <td> &nbsp; {{$row->username }} &nbsp; </td>
                <td> &nbsp; {{$row->email }} &nbsp; </td>
                <td> &nbsp; {{$row->pwd }} &nbsp; </td>
                <td> &nbsp; {{$row->city }} &nbsp; </td>
                <td> &nbsp; {{$row->state }} &nbsp; </td>
                <td> &nbsp; {{$row->contact }} &nbsp; </td>
                <td> &nbsp; {{$row->gender }} &nbsp; </td>
                <td> &nbsp; {{$row->birthdate }} &nbsp; </td>
                <td> &nbsp; {{$row->hobby }} &nbsp; </td>
                <td><img src="{{asset('upload/admin/images/'.$row->image)}}" alt="{{$row->image}}" width="60px"></td>
                <td> <a href="/admin/update/{{$row->id}}"> &nbsp; Edit &nbsp; </a> </td>
                <td> <a href="/admin/delete/{{$row->id}}"> &nbsp; Delete &nbsp; </a> </td>
            </tr>
            @endforeach
            <tr>
                @for($i=1;$i<=15;$i++) 
                    <td> &nbsp; M &nbsp; </td>
                @endfor
            </tr>
        </table>
        <br>
        <div>
            <div class="pagination-index">
                {{$myusers->links()}}
            </div>
        </div>
        <br>
        <table>
            <tr>
                <td><a href="/dashboard"> &nbsp; Dashboard &nbsp; </a></td>
            </tr>
        </table>
    </div>
</body>
</html>