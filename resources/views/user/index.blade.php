<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
          <table border="1">
              <th>ID</th>
              <th>name</th>
              <th>email</th>
             
                <th>password</th>
                <th>password2</th>
                <th>type_user_id</th>
                
                
               @foreach ($users as $post)
               <tr>
                 <td>{{$post->id}}</td>
                 <td>{{$post->name}}</td>
                 <td>{{$post->email}}</td>
                 
                 <td>{{$post->password}}</td>
                 <td>{{$post->password2}}</td>
                 <td>{{$post->type_user->type_users}}</td>               
                   <td>
                       <a class="btn btn-primary", href="{{route('user.edit',$post->id)}}",  style="background: red ,">Edit</a>
                       <a href="{{route('user.destroy',$post->id)}}">Delete</a>
                   </td>
               </tr>

               @endforeach
          </table>
          <a href="{{route('user.insert')}}">insert</a><br>
          <a href="{{route('user.delete.all.Truncate')}}">Delete  Truncate</a>
</body>
</html>
