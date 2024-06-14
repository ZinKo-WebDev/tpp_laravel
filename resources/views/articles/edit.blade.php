<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    </script> <title>Document</title>
</head>
<body>
    <h1 class="text-2xl text-center my-3">Update Article</h1>

<form  action="{{route('Article.update',$article->id)}}" class="max-w-sm mx-auto bg-slate-500 p-5  rounded-md" method="POST">
    @csrf
    @method('PATCH')

    <div class="mb-5">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"  for="">Title</label>
        <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" type="text" name="title" value="{{$article->title}}">
    </div>
        <div class="mb-5">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"  for="">Description</label>
        <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" type="text" name="description" value="{{$article->description}}">
        </div>
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-3" type="submit">Update</button>
</form>
</body>
</html>
