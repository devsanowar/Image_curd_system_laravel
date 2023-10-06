<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Add Product</title>
  </head>
<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-8 m-auto">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h3>Product Lists <a href="{{ route('create.product') }}" class="btn btn-info" style="float: right">Add New Product</a></h3>
                        </div>
                        <div class="card-body">
                            @if (Session::has('success_msg'))
                                <p class="alert alert-success">{{ Session::get('success_msg'); }}</p>
                            @endif
                            <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th scope="col">SN</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @forelse ($products as $key=>$product)
                                    <tr>
                                        <th scope="row">{{ $key+1 }}</th>
                                        <td><img width="100" src="{{ asset('images/product/'.$product->product_image) }}"></td>
                                        <td>{{ $product->name }}</td>
                                        <td>
                                            <a href="{{ route('edit.product', $product->id) }}" class="btn btn-success">{{ __('Edit') }}</a>
                                            <a href="{{ route('delete.product', $product->id) }}" class="btn btn-danger">{{ __('Delete') }}</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <p class="alert alert-danger">Product not found!</p>
                                    @endforelse
                                </tbody>
                              </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>

