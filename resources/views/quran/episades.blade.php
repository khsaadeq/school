<h1>The Episades</h1>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{route('quran.store')}}" method="post">
@csrf
<br>
<label for='exampleInputEmaill'>اسم الحلقه</label><br>
<input type="text" name="name_episodes"><br>
<br> <label for='exampleInputEmaill'>عدد الطلاب</label><br>
    <input type="text" name="number_student"><br>
     <label for='exampleInputEmaill'>اسم </label><br>
    <select class="form-control"name='Id_teacher'>

   @foreach($teacher as $type_user)
     <option value="{{$type_user->id}}">{{$type_user->Name_tracher}}</option>
  @endforeach
    </select>
</div>
<label for='exampleInputEmaill'>الفتره</label><br>
    <select class="form-control"name='Id_period'>
   @foreach($period as $type_user)
<option value="{{$type_user->id}}">{{$type_user->type_period}}</option>
 @endforeach
</select> </div><br>

    //
    <label for='exampleInputEmaill'>الجنس</label><br>
    <select class="form-control"name='sex_id'>

   @foreach($sex as $type_user)
<option value="{{$type_user->id}}">{{$type_user->type}}</option>
 @endforeach
</select> </div><br>
//


<label for='exampleInputEmaill'>نضام الحلقه</label><br>
    <select class="form-control"name='Id_system_episoded'>
   @foreach($system_episodes as $type_user)
<option value="{{$type_user->id}}">{{$type_user->name}}</option>
 @endforeach
</select> </div><br>

    <button type="submit">Insert</button>

</form>
</body>
</html>
