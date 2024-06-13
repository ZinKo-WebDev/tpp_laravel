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
    <h2 class="text-2xl text-center my-3">Category Page</h2>

    <a href="{{route('categoryCreate')}}">Create</a>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 " >
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                   Category ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Category name
                </th> <th scope="col" class="px-6 py-3">
                    Action
                </th>

            </tr>
        </thead>
<tbody>
    {{-- @dd($categories) --}}
    @foreach ($categories as $category)

   <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    {{$category->id}}
                  </td>
                <td class="px-6 py-4">
                    {{$category->name}}
                  </td>
       <td class="px-6 py-4">

           <a href="{{route('categoryEdit',$category->id)}}">Edit</a>
{{--           <a href="{{route('')}}">Delete</a>--}}
                  </td>
   </tr>
    @endforeach

</tbody>

    </table>

</body>
</html>
