<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        clifford: '#da373d',
                    }
                }
            }
        }
    </script>
    <title>Document</title>
</head>
<body class="px-3">
<h2 class="text-2xl text-center my-3">Articles Page</h2>
<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">

    <a href="{{route('Article.create')}}">Create Article</a>
</button>
<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 " >
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
    <tr>
        <th scope="col" class="px-6 py-3">
            Article ID
        </th>
        <th scope="col" class="px-6 py-3">
            Article Title
        </th>

        <th scope="col" class="px-6 py-3">
            Article Description
        </th> <th scope="col" class="px-6 py-3">
            Action
        </th>

    </tr>
    </thead>
    <tbody>
    {{-- @dd($categories) --}}
    @foreach ($articles as $artical)

        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <td class="px-6 py-4">
                {{$artical->id}}
            </td>
            <td class="px-6 py-4">
                {{$artical->title}}
            </td>
            <td class="px-6 py-4">
                {{$artical->description}}
            </td>
            <td class="px-6 py-4">
                <div class="flex">
<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">

    <a href="{{route('Article.edit',$artical->id)}}">Edit</a>
</button>
                <a href="{{route('Article.destroy',$artical->id)}}">
                    <form action="{{route('Article.destroy',$artical->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" type="submit" >Delete</button>
                    </form>
                </a>
                </div>
            </td>
        </tr>
    @endforeach

    </tbody>

</table>

</body>
</html>
