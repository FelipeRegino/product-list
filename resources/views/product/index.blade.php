@extends('_layouts.app')


@section('content')
  <section class="content-block small-padding">
    <div class="row">
      <div class="col-12">
        <h1 class="h2 font-700 mt-0">
           Product list
        </h1>
        <a class="btn btn-success case-u btn-sm p-2 font-600" href="{{ route('product.create') }}"><i class="fas fa-plus"></i> Add a product</a>
      </div>
    </div>
  </section>

  <div class="table-responsive p-30">
    <table id="product-list" class="table table-bordered">
      <thead class="bg-primary text-white">
        <th scope="col" class="text-center">ID</th>
        <th scope="col">Image</th>
        <th scope="col" class="text-center">Ref</th>
        <th scope="col">Name</th>
        <th scope="col" class="text-center">Category</th>
        <th scope="col" class="text-center">Price</th>
        <th scope="col" class="text-center">Quantity</th>
        <th scope="col" class="text-center">Active</th>
        <th scope="col"></th>
      </thead>
      <tbody>
        @foreach ($products as $product)
          <tr>
            <td class="align-middle text-center">{{ $product->id }}</td>
            <td>
              <article>
                <div class="article-inner">
                  <div class="imgcropped landscape">
                    <img src="{{ $product->getFirstMediaUrl() }}" class="landscape">
                  </div>
                </div>
              </article>
            </td>
            <td class="align-middle text-center">{{ $product->reference }}</td>
            <td class="align-middle">{{ $product->name }}</td>
            <td class="align-middle text-center">{{ $product->category->name }}</td>
            <td class="align-middle text-center">{{ $product->price }}</td>
            <td class="align-middle text-center">{{ $product->quantity }}</td>
            <td class="align-middle text-center">
              @if ($product->active)
                <p><i class="fas fa-circle text-success"></i></p>
              @else
                <p><i class="fas fa-circle text-danger"></i></p>
              @endif
            </td>
            <td class="align-middle text-center">
              <a href="{{ route('product.edit', $product) }}">
                <i class="fas fa-ellipsis-v"></i>
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
