<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Create Product</h1>
    <form action="{{route('productStore')}}" method="post">
    @csrf
     <label for="">Name</label>
    <input type="text" name="name"> <br><br>
    <label for="">Color</label>
        <input type="text" name="color"> <br><br>
    <label for="">Category</label>
        <input type="text" name="category"> <br><br>
    <label for="">Price</label>
    <input type="text" name="price"><br><br>
    <label for="">Image</label>
    <input type="file" name="image"><br><br>
    <button type="submit">Create</button>
    </form>
</body>
</html>
