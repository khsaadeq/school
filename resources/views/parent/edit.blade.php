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
<form action="{{route('parent.update',$post->id)}}" method="post">
    {{-- @method('PUT') --}}
@csrf

<label>أسم المستخدم</label><br>
    <input type="text" name="Name_parents" value="{{$post->Name_parents}}"><br> <label>رقم الجوال</label><br>
    <input type="text" name="Phone" value="{{$post->Phone}}"><br>

<div class='form-group'>
     <label for='exampleInputEmaill'>نوع الهوية</label>
    <select class="form-control"name='identtity_id'>

   @foreach($identity as $type_user)
     <option value="{{$type_user->id}}"{{$post ->identtity_id == $type_user->id ? 'selected':''}}>{{$type_user->type_identity}}</option>
  @endforeach
    </select> 
</div><br>

 <label for='exampleInputEmaill'>الرقم الهوية</label><br>
    <input type="text" name="Number_identity"value="{{$post->Number_identity}}"><br>
<div class='form-group'>
    <label for='exampleInputEmaill'>الجنس</label>
    <select class="form-control"name='sex_id'>

   @foreach($type as $type_user)
  <option value="{{$type_user->id}}"{{$post ->sex_id == $type_user->id ? 'selected':''}}>{{$type_user->type}}</option>
 @endforeach
</select> </div><br>
<div class='form-group'>
    <label for='exampleInputEmaill'>الجنسيه</label>
    <select class="form-control"name='sexual_id'>
   @foreach($types as $type_user)
<option value="{{$type_user->id}}"{{$post ->sexual_id == $type_user->id ? 'selected':''}}>{{$type_user->name_sexual}}</option>
 @endforeach
</select> </div><br>
<label>الايميل</label><br>
    <input type="text" name="Email"value="{{$post->Email}}">
    <br><br><label>الوضيفة</label><br>
    <input type="text" name="Job" value="{{$post->Job}}"><br><label>صلة الرحم</label><br>
    <input type="text" name="link_kinship"value="{{$post->link_kinship}}"><br><label>حالة الاب</label><br>
    <input type="text" name="Social_status"value="{{$post->Social_status}}"><br>
    <button type="submit">updaterInsert</button>

</form>
</body>
</html>
