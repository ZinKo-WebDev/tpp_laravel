
<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product</title>

</head>
<body>
    <div class="flex justify-between">
        <h1 class="text-center mt-4 mb-4">Products Edit</h1>

    <ul class="flex justify-center">
        <!-- Authentication Links -->
        @guest
            @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
            @endif

            {{-- @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif --}}
        @else
        <li class="p-2"><a href="{{route('productIndex')}}">Product</a></li>
        <li class="p-2"><a href="{{route('categoryIndex')}}">Category</a></li>
        <li class="p-2"><a href="{{route('Article.index')}}">Article</a></li>
            <li class="flex justify-center items-center">
                <a id="navbarDropdown" class="p-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>
                    <br>
                    <br>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="p-2" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul>
</div>

<div class="container">


    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ route('productUpdate', $data->id) }}" enctype="multipart/form-data">
        @csrf



        <div class="form-group mb-4">
            <label for="productName">Name</label>
            <input type="text" name="name" class="form-control" id="productName" value="{{ $data->name }}">
        </div>

        <div class="form-group mb-4">
            <label for="productType">Type</label>
            <input type="text" name="type" class="form-control" id="productType" value="{{ $data->type }}">
        </div>

        <div class="form-group mb-4">
            <label for="productImages">Images</label>
            <input type="file" name="images[]" class="form-control-file" id="productImages" multiple>
            <div>

                @foreach ($data->images as $image)
                    <img src="{{ asset('uploads/'.$image->image_path) }}" alt="Product Image" style="width: 100px; height: 100px;">
                @endforeach
            </div>
        </div>

        <div class="form-group mb-4">
            <label for="productPrice">Price</label>
            <input type="number" name="price" class="form-control" id="productPrice" value="{{ $data->price }}">
        </div>

        <div class="form-group mb-4">
            <label for="productQuantity">Quantity</label>
            <input type="number" name="quantity" class="form-control" id="productQuantity" value="{{ $data->quantity }}">
        </div>

        <button type="submit" class="btn btn-sm btn-primary">Update</button>
    </form>
</div>


</body>
</html>

