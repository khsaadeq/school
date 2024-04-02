<h1>The users</h1>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
<form action="{{route('user.store')}}" method="post">
@csrf
        <label>أسم ألمستخدم</label><br>
    <input type="text" name="name" placeholder="اسم المستخدم"><br><br>
    <label>الإيميل</label><br>
    <input type="text" name="email" placeholder=""><br><br>
    <label>كلمة ألسر</label><br>
    <input type="text" name="password" placeholder=""><br><br>
    <label>تأكيد كلمة ألسر</label><br>
    <input type="text" name="password2" placeholder=""><br><br>
   <div class='form-group'>
    <label>نوع المستخدم</label><br>
    <select class="form-control"name='type_user_id'>

   @foreach($type_users as $type_user)
<option value="{{$type_user->id}}">{{$type_user->type_users}}</option>
 @endforeach
</select> 
</div>
<br>
<br>

    <button type="submit">Insert</button>

</form>
</body>
</html>

