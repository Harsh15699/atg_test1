<!DOCTYPE html>
<html>
 <head>
  <title>Dashboard</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style>
  .input{
    width:70%;
    padding: 2%;
    margin: 2% 0;
    background-color: #c0c0c0;
    border:0px;
    border-radius: 4px;
  }
  #add{
    width:25%;
    background-color: blue;
    border: 1px solid blue;
    border-radius: 7%;
    padding: 2%;
    color:white;
    display: inline;
  }
  .status{
    background-color: green;
    border: 1px solid blue;
    border-radius: 7%;
    color:white;
    display: inline;
  }
  </style>
  </head>
 <body>
<div class="container mt-5">
        <div class="row">
            <div class="col-xl-6 m-auto">
                <div class="card shadow">
                  <div class="card-header">
                        <h2 class="card-title font-weight-bold" style=" text-align:center;" >Dashboard</h2>
                  </div>

                  <div class="card-body">

                    @if(isset(Auth::user()->name))
                      <div >
                        <strong style="color:green;" >Hello, {{ Auth::user()->name }}</strong>
                        <br />
                      </div>
                      <form>
                        <input type="text" name="task" class="input" id="task">
                        <input type="submit" name="button" value="Add Task" id="add" class="add">
                      </form>
                      <br>
                      <table border = "1">
                      <tr>
                        <th>User_Id</th>
                        <th>Task_Id</th>
                        <th>Task</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                      @foreach ($users as $user)
                      <tr>
                        <td>{{ $user->user_id }}</td>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->task }}</td>
                        <td>{{ $user->status }}</td>
                        <td><form><input type="submit" value="Change Status" name="status" id="status" onclick="changeStatus({{ $user->id }},'{{ $user->status }}')" class="status"></form></td>
                      </tr>
                      @endforeach
                      </table>
                    @else
                       <script>window.location = "/main";</script>
                    @endif
                  </div>

                  <div class="card-footer">
                      <a href="{{ url('/main/logout') }}" style="font-size:180%">Logout</a>
                  </div>
                </div>
            </div>
        </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$('#add').on('click',function(){
  var $task=$('#task');
  var data={
    task:$task.val(),
    user_id: {{ Auth::user()->id }}
  };
  $.ajax(
    {
      type:'POST',
      url:'../api/todo/add',
      data:data,
      headers:{'API_KEY':'helloatg'},
      success:function(){
        alert("successfully added");
      }
    });
    alert("Task Successfully Added");
});

function changeStatus(task_id,status){
var $newStatus='done';
if(status=='done'){
  $newStatus='pending'
}
var data={
  task_id:task_id,
  status:$newStatus
};
$.ajax(
  {
    type:'POST',
    url:'../api/todo/status',
    data:data,
    headers:{'API_KEY':'helloatg'},
    success:function(){
      alert("Successfully Marked as "+$newStatus);
    }
  });
}
</script>
 </body>
</html>
