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
              <th>Name_parents</th>
              <th>Phone</th>
                <th>identtity_id</th>
                <th>Number_identity</th>
                <th>sex_id</th>
                <th>sexual_id</th>
                <th>Email</th>
                <th>Job</th>
                <th>link_kinship</th>
                <th>Social_status</th>

                <th>Pro</th>
               @foreach ($posts as $post)
               <tr>
                 <td>{{$post->id}}</td>
                 <td>{{$post->Name_parents}}</td>
                 <td>{{$post->Phone}}</td>
                 <td>{{$post->identity->type_identity}}</td>
                 <td>{{$post->Number_identity}}</td>
                 <td>{{$post->sex->type}}</td>
                 <td>{{$post->sexual->name_sexual}}</td>
                  <td>{{$post->Email}}</td>
                 <td>{{$post->Job}}</td>
                 <td>{{$post->link_kinship}}</td>
                 <td>{{$post->Social_status}}</td>
                

                   <td>
                       <a class="btn btn-primary", href="{{route('parent.edit',$post->id)}}" ,  style="background: red ,">Edit</a>
                       <a href="{{route('parent.destroy',$post->id)}}">Delete</a>

                   </td>
               </tr>

               @endforeach
          </table>
          <a href="{{route('parent.insert')}}">insert</a><br>
          <a href="{{route('parent.delete.all.Truncate')}}">Delete  Truncate</a>
          <a href="{{route('parent.delete.all.Truncate')}}">Delete  Truncate</a>
</body>
</html>
