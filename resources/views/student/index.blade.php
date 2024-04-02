<h1>hshsghxgxggxbxx</h1>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body> <table border="1">
            <thead>
            <tr>
                <th>id</th>
                <th>Name_student</th>
                <th>Date_birth</th>
                <th>Address</th>
                <th>Chapret</th>
                <th>School</th>
                <th>identtity_id</th>
                <th>Number_identity</th>
                <th>sex_id</th>
                <th>sexual_id</th>
                <th>parents_id</th>
                <th>Previous_save</th>
                <th>Current_save</th>
                <th>Date_Join_Episode</th>
                <th>quran_episodes_id</th>
                
                <th>quran_episodes</th>

            </tr>
</thead>
                @foreach ($student as $post)
               <tr>
                 <td>{{$post->id}}</td>
                 <td>{{$post->Name_student}}</td>
                 <td>{{$post->Date_birth}}</td>
                 <td>{{$post->Address}}</td>
                 <td>{{$post->Chapret}}</td>
                 <td>{{$post->School}}</td>
                 
                 <td>{{$post->identity->type_identity}}</td>
                 <td>{{$post->Number_identity}}</td>
                 <td>{{$post->sex->type}}</td>
                 <td>{{$post->sexual->name_sexual}}</td>
                 <td>{{$post->parents->Name_parents}}</td>
                 <td>{{$post->Previous_save}}</td>
                 <td>{{$post->Current_save}}</td>
                 <td>{{$post->Date_Join_Episode}}</td>
                 <td>{{$post->quran_episades->name_episodes}}</td> 
               
                   <td>
                       <a class="btn btn-primary", href="{{route('student.edit',$post->id)}}",  style="background: red ,">Edit</a>
                     
                   </td>
               </tr>

               @endforeach
          </table>
          <a href="{{route('student.insert')}}">insert</a><br>
          <a href="{{route('student.delete.all.Truncate')}}">Delete  Truncate</a>
</body>
</html>
