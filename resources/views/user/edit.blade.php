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
<form action="{{route('user.update',$uses->id)}}" method="post">
    
    @csrf
   <!-- // @method('PUT') -->

    <label>أسم ألمستخدم</label><br>
    <!-- <input type="text" name="id" value="{{$uses->id}}"><br><br> -->
    <input type="text" name="name" value="{{$uses->name}}"><br><br>
    <label>الإيميل</label><br>
    <input type="text" name="email" value="{{$uses->email}}"><br><br>   <label>كلمة ألسر</label><br>
    <input type="text" name="password" value="{{$uses->password}}"><br><br>
    <label>تأكيد كلمة ألسر</label><br>
    <input type="text" name="password2" value="{{$uses->password2}}"><br><br>
 <!-- <input type="text" name="type_user_id" value="{{$uses->type_user_id}}"><br><br> -->
    <div class='form-group'>
    <label>نوع المستخدم</label><br>
    <select class="form-control"name='type_user_id'>

   @foreach($type_users as $type_user)
<option value="{{$type_user->id}}"{{$uses->type_user_id == $type_user->id ? 'selected':''}}>{{$type_user->type_users}}</option>
 @endforeach
</select> 
</div>
    <button type="submit">Insert</button>

</form>
</body>
</html>
