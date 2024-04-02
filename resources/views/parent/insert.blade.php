<h1>The Teacher</h1>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head><br>
<body>
<form action="{{route('parent.store')}}" method="post">
@csrf
          <label>أسم المستخدم</label><br>
    <input type="text" name="Name_parents"><br> <label>رقم الجوال</label><br>
    <input type="text" name="Phone"><br>

<div class='form-group'>
     <label for='exampleInputEmaill'>نوع الهوية</label>
    <select class="form-control"name='identtity_id'>

   @foreach($identity as $type_user)
     <option value="{{$type_user->id}}">{{$type_user->type_identity}}</option>
  @endforeach
    </select> 
</div><br>

 <label for='exampleInputEmaill'>الرقم الهوية</label><br>
    <input type="text" name="Number_identity"><br>
<div class='form-group'>
    <label for='exampleInputEmaill'>الجنس</label>
    <select class="form-control"name='sex_id'>

   @foreach($type as $type_user)
  <option value="{{$type_user->id}}">{{$type_user->type}}</option>
 @endforeach
</select> </div><br>
<div class='form-group'>
    <label for='exampleInputEmaill'>الجنسيه</label>
    <select class="form-control"name='sexual_id'>
   @foreach($types as $type_user)
<option value="{{$type_user->id}}">{{$type_user->name_sexual}}</option>
 @endforeach
</select> </div><br>
<label>الايميل</label><br>
    <input type="text" name="Email">
    <br><br><label>الوضيفة</label><br>
    <input type="text" name="Job"><br><label>صلة الرحم</label><br>
    <input type="text" name="link_kinship"><br><label>حالة الاب</label><br>
    <input type="text" name="Social_status"><br>

    <button type="submit">Insert</button>

</form>
</body>
</html>

