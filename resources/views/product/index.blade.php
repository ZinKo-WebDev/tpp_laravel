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
    <h2 class="text-2xl text-center my-3">Product Index Page</h2>


<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Product name
                </th>
                <th scope="col" class="px-6 py-3">
                    Color
                </th>
                <th scope="col" class="px-6 py-3">
                    Category
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
            </tr>
        </thead>
        <tbody>
            {{-- @dd($products); --}}
            @foreach ($products as $product)

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    {{$product->id}}
                  </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   {{$product->name}}
                </th>
                <td class="px-6 py-4">
                  {{$product->color}}
                </td>
                <td class="px-6 py-4">
                  {{$product->category}}
                </td>
                <td class="px-6 py-4">
                  ${{$product->price}}
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>

</tbody>

    </table>

</body>
</html>
