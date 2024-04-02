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
              <th>Id_teacher</th>    
              <th>Name_episodes</th>
              <th>Id_period</th>
              <th>Number_student</th>
              <th>sex_id</th>
              <th>Id_system</th>
              <th>Pro</th>

               @foreach ($posts as $post)
               <tr>
                 <td>{{$post->id}}</td> 
                  <td>{{$post->teacher->Name_tracher}}</td>
                 <td>{{$post->name_episodes}}</td>
                 <td>{{$post->period->type_period}}</td> 
                 <td>{{$post->number_student}}</td>
                 <td>{{$post->sex->type}}</td>
                 <td>{{$post->system_episodes->name}}</td>
                
                   <td>
                       <a class="btn btn-primary", href="{{route('quran.edit',$post->id)}}",  style="background: red ,">Edit</a>
                       <a href="{{route('quran.destroy',$post->id)}}">Delete</a>
                      
                   </td>
               </tr>

               @endforeach
          </table>
          <a href="{{route('quran.episades')}}">insert</a><br>
          <a href="{{route('quran.delete.all.Truncate')}}">Delete  Truncate</a>
</body>
</html>
