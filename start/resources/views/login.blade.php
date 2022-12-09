<form action="/xu-ly-login" method="post">
    @csrf
    <div>
        <label for="">username</label>
        <input type="text" name="username" >
    </div>
    <div>
        <label for="">password</label>
        <input type="text" name="password" >
    </div>
    <div>
        <button type="submit">Login</button>
    </div>
</form>