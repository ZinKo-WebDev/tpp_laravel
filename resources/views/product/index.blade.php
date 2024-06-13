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
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">

            <a href="{{ route('productCreate') }}">Create</a>
        </button>
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
                    <th scope="col" class="px-6 py-3">
                        Image
                    </th>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                {{-- @dd($products); --}}
                @foreach ($products as $p)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">
                            {{ $p->id }}
                        </td>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $p->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $p->color }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $p->category }}
                        </td>
                        <td class="px-6 py-4">
                            ${{ $p->price }}
                        </td>
                        <td class="px-6 py-4">
                            ${{ $p->image }}
                        </td>
                        <td>
                            <div class="flex">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">

                                    <a href="{{ route('productEdit', $p->id) }}">Edit</a>
                                </button>

                            <a href="{{ route('productDelete', $p->id) }}">
                                <form action="{{ route('productDelete', $p->id) }}" method="POST">
                                    @csrf
                                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" type="submit">Delete</button>
                                </form>
                            </a>
                            </div>
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
