<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Category Page</h2>
    <table>
        <thead>
            <tr>
                <th>FirstName</th>
                <th>LastName</th>
                <th>Age</th>
            </tr>
        </thead>
<tbody>
    @foreach ($data as $person)

    <tr>
        <th>{{$person[0]}}</th>
        <th>{{$person[1]}}</th>
        <th>{{$person[2]}}</th>

    </tr>
    @endforeach

</tbody>

    </table>

</body>
</html>
