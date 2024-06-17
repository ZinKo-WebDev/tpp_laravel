<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Product Page</title>

</head>

<body class="px-3">
    <div class="text-2xl text-center my-3">
        <h1 class="text-center mt-4 mb-4">Products Details</h1>
        <div class="row">
            <div class="col-6">
                <a href="{{ url('/') }}"><i class="fa-solid fa-house fa-xl"></i></a>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('productCreate') }}" class="btn btn-sm btn-info text-white">Create</a>
            </div>
        </div>

        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr class="text-left">
                    <th scope="col" class="px-6 py-3">ID</th>
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Category</th>
                    <th scope="col" class="px-6 py-3">Images</th>
                    <th scope="col" class="px-6 py-3">Price</th>
                    <th scope="col" class="px-6 py-3">Quantity</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product_item as $p)
                    <tr class="text-xs text-gray-700 uppercase bg-gray-50 text-left px-3">
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->type }}</td>
                        <td class="flex">
                            @foreach ($p->images as $image)
                                <img src="{{ asset('uploads/' . $image->image_path) }}" width="40px" height="20px"
                                    class="img-thumbnail mb-1">
                            @endforeach
                        </td>
                        <td>{{ $p->price }}</td>
                        <td>{{ $p->quantity }}</td>
                        <td>
                            <div class="flex items-center ">
                                <div class="col-6">
                                    <a href="{{ route('productEdit', ['id' => $p->id]) }}"
                                        class="btn bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                </div>
                                <div class="col-6">
                                    <form action="{{ route('productDelete', $p->id) }}" method="POST">
                                        @csrf
                                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>
