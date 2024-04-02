<h1>The Teacher</h1>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{route('teacher.store')}}" method="post">
@csrf
<label for='exampleInputEmaill'>اسم الأستاذ </label>
    <input type="text" name="Name_tracher"><br>
    <label for='exampleInputEmaill'>تاريخ الميلاد </label>
    <input type="date" name="Date_birth"><br>
    <label for='exampleInputEmaill'> jkjjkjk</label>
    <input type="text" name="Qualification"><br>
    <label for='exampleInputEmaill'>العمل </label>
    <input type="text" name="Work"><br>
    <label for='exampleInputEmaill'>الراتب </label>
    <input type="text" name="Salary"><br>
    <label for='exampleInputEmaill'>الجوال </label>
    <input type="text" name="phone"><br>
    <label for='exampleInputEmaill'>Email </label>
    <input type="text" name="Email"><br>
    <label for='exampleInputEmaill'>سنه الاتحاق </label>
    <input type="date" name="Teaching_years"><br>
    <label for='exampleInputEmaill'>المراكز الذ عمل فيها </label>
    <input type="text" name="Center_they_work"><br>
    <label for='exampleInputEmaill'> العنوان   </label>
    <input type="text" name="Address"><br>
    
   
     <label for='exampleInputEmaill'>نوع الهوية</label>
    <select class="form-control"name='identity_id'>

   @foreach($identity as $type_user)
     <option value="{{$type_user->id}}">{{$type_user->type_identity}}</option>
  @endforeach
    </select> 
</div>
<br> <label for='exampleInputEmaill'>الرقم الهوية</label>
    <input type="text" name="Number_identity"><br>
    //
    
    <label for='exampleInputEmaill'>الجنس</label>
    <select class="form-control"name='sex_id'>

   @foreach($sex as $type_user)
<option value="{{$type_user->id}}">{{$type_user->type}}</option>
 @endforeach
</select> </div><br>
    <label for='exampleInputEmaill'>الجنسيه</label>
    <select class="form-control"name='sexual_id'>
   @foreach($sexual as $type_user)
<option value="{{$type_user->id}}">{{$type_user->name_sexual}}</option>
 @endforeach
</select> </div><br>

<label for='exampleInputEmaill'>الموهل الدراسي </label>
    <select class="form-control"name='qualification_study_id'>
   @foreach($Qualification_study as $type_user)
<option value="{{$type_user->id}}">{{$type_user->name_qualification}}</option>
 @endforeach
</select> </div><br>
    <button type="submit">Insert</button>

    

</form>
</body>
</html>

