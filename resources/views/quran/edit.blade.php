<h1>The update</h1>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{route('quran.update',$post->id)}}" method="post">
    {{-- @method('PUT') --}}
@csrf
<label for='exampleInputEmaill'>اسم </label><br>
    <select class="form-control"name='Id_teacher'>

   @foreach($teacher as $type_user)
     <option value="{{$type_user->id}}"{{$post->Id_teacher == $type_user->id ? 'selected':''}}>{{$type_user->Name_tracher}}</option>
  @endforeach
    </select> 
</div><br>


<label for='exampleInputEmaill'>اسم الحلقه</label><br>
<input type="text" name="name_episodes" value="{{$post->name_episodes}}"><br>
<label for='exampleInputEmaill'>الفتره</label><br>
    <select class="form-control"name='Id_period'>
   @foreach($period as $type_user)
<option value="{{$type_user->id}}"{{$post->Id_period == $type_user->id ? 'selected' : ' '}}>{{$type_user->type_period}}</option>
 @endforeach
</select> </div><br>
<br> <label for='exampleInputEmaill'>عدد الطلاب</label><br>
    <input type="text" name="number_student"value="{{$post->number_student}}"><br><br>
    //
    <label for='exampleInputEmaill'>الجنس</label><br>
    <select class="form-control"name='sex_id'>

   @foreach($sex as $type_user)
<option value="{{$type_user->id}}"{{$post ->sex_id == $type_user->id ? 'selected':''}}>{{$type_user->type}}</option>
 @endforeach
</select> </div><br>
//
    

<label for='exampleInputEmaill'>نضام الحلقه</label><br>
    <select class="form-control"name='Id_system'>
   @foreach($system_episodes as $type_user)
<option value="{{$type_user->id}}"{{$post ->Id_system == $type_user->id ? 'selected':''}}>{{$type_user->name}}</option>
 @endforeach
</select> </div><br>
   
    <button type="submit">Insert</button>

</form>
</body>
</html>
