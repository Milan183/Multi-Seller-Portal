<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M Square @ 13</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
        <h1>View Registration Details</h1>
        <form>
            <label> &nbsp; Search Text Here :- &nbsp; </label>
            <input type="text" name="searchTxt" value="<?php echo @$_GET['searchTxt']; ?>">
            <input type="submit" name="search" value="Search">
        </form><br>
        <table class="container" id="table-data" style="text-align: center;">
            <tr>
                <th> &nbsp; Id         &nbsp; </th>
                <th> &nbsp; F Name     &nbsp; </th>
                <th> &nbsp; L Name     &nbsp; </th>
                <th> &nbsp; User Name  &nbsp; </th>
                <th> &nbsp; Email Id   &nbsp; </th>
                <th> &nbsp; Password   &nbsp; </th>
                <th> &nbsp; City       &nbsp; </th>
                <th> &nbsp; State      &nbsp; </th>
                <th> &nbsp; Contact    &nbsp; </th>
                <th> &nbsp; Role       &nbsp; </th>
                <th> &nbsp; Gender     &nbsp; </th>
                <th> &nbsp; Birthdate  &nbsp; </th>
                <th> &nbsp; Hobby      &nbsp; </th>
                <th> &nbsp; Image      &nbsp; </th>
                <th> &nbsp; Status     &nbsp; </th>
                <th> &nbsp; Edit       &nbsp; </th>
                <th> &nbsp; Delete     &nbsp; </th>
            </tr>
            <tr>
                @for($i=1;$i<=17;$i++) 
                    <td> &nbsp; M &nbsp; </td>
                @endfor
            </tr>
            @foreach($myusers as $row)
            <tr>
                <td> &nbsp; {{$row->id }}        &nbsp; </td>
                <td> &nbsp; {{$row->fname }}     &nbsp; </td>
                <td> &nbsp; {{$row->lname }}     &nbsp; </td>
                <td> &nbsp; {{$row->username }}  &nbsp; </td>
                <td> &nbsp; {{$row->email }}     &nbsp; </td>
                <td> &nbsp; {{$row->pwd }}       &nbsp; </td>
                <td> &nbsp; {{$row->city }}      &nbsp; </td>
                <td> &nbsp; {{$row->state }}     &nbsp; </td>
                <td> &nbsp; {{$row->contact }}   &nbsp; </td>
                <td> &nbsp; {{$row->role }}      &nbsp; </td>
                <td> &nbsp; {{$row->gender }}    &nbsp; </td>
                <td> &nbsp; {{$row->birthdate }} &nbsp; </td>
                <td> &nbsp; {{$row->hobby }}     &nbsp; </td>
                <td><img src="{{asset('upload/register/images/'.$row->image)}}" alt="{{$row->image}}" width="60px"></td>
                <!-- <td> &nbsp; {{$row->status }}    &nbsp; </td> -->
                <td>
                <!-- Checked switch -->
                <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input status" name="status" id="status" data-userid="{{$row->id}}" data-role="{{$row->role}}" @if($row->status==1) checked @endif />
                </div>
                </td>
                <td> <a href="/register/update/{{$row->id}}"> &nbsp; Edit &nbsp; </a> </td>
                <td> <a href="/register/delete/{{$row->id}}"> &nbsp; Delete &nbsp; </a> </td>
            </tr>
            @endforeach
            <tr>
                @for($i=1;$i<=17;$i++) 
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

<script type="text/javascript">
$(document).ready(function() {
    // alert("ready");
    $(document).on("click",".status",function() {
        // alert("click");
        var status = "";
        var user_id = $(this).attr("data-userid");
        // console.log(user_id);
        var role = $(this).attr("data-role");
        // console.log(role);
        if($(this).is(':checked')) {
            // console.log(1);
            status = "1";
        }
        else {
            // console.log(0);
            status = "0";
        }
        $.ajax({
            url:'{{url("ajax-update-register-status")}}',
            data: {status:status,user_id:user_id,role:role,_token:"{{ csrf_token() }}"},
            type: "POST",
            success: function(response) {
                console.log(response);
            }
        });
        if(role=="Admin")
        {
            $.ajax({
                url:'{{url("ajax-update-admins-status")}}',
                data: {status:status,user_id:user_id,_token:"{{ csrf_token() }}"},
                type: "POST",
                success: function(response) {
                    console.log(response);
                }
            });
        }
        if(role=="Seller")
        {
            $.ajax({
                url:'{{url("ajax-update-sellers-status")}}',
                data: {status:status,user_id:user_id,_token:"{{ csrf_token() }}"},
                type: "POST",
                success: function(response) {
                    console.log(response);
                }
            });
        }
    });
});
</script>