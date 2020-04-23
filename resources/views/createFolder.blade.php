<form action="{{url('/createFolder')}}" method="post">
    @csrf
    <label for="">Folder name</label>
    <input type="text" name="name">
    <button type="submit">Creat</button>
</form>
