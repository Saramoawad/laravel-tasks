<form action="/posts" method="post">
    @csrf
    <input type="text" name="title" placeholder="title" ></br>
    <input type="text" name="body"></br>
    <input type="submit"value="Add Post"></br>
</form>
