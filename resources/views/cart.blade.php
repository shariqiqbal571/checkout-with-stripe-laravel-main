@extends('layouts.app')
@section('main')
    <div class="row">
        <div class="card my-3 mb-3">
            @if (Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                    <strong>{{ Session::get('success') }}</strong>
                </div>
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr style="background: #f2f2f2">
                                <th style="width: 60%" scope="col">Product</th>
                                <th style="width: 10%" scope="col">Price</th>
                                <th style="width: 10%" scope="col">Quantity</th>
                                <th style="width: 10%" scope="col">Sub Total</th>
                                <th style="width: 10%" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0; @endphp

                            @if (session('cart'))
                                @foreach (session('cart') as $id => $item)
                                    @php $total += $item['price'] * $item['quantity']; @endphp
                                    <tr data-id="{{ $id }}">
                                        <td>
                                            <img src="{{ $item['photo'] }}" width="80" height="80" class="rounded"
                                                alt="">
                                            {{ $item['product_name'] }}
                                        </td>
                                        <td>${{ $item['price'] }}</td>
                                        <td>
                                            <input type="number" value="{{ $item['quantity'] }}" min="1"
                                                class="form-control cart_update quantity">
                                        </td>
                                        <td>
                                            ${{ $item['price'] * $item['quantity'] }}
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-danger cart_remove">Remove</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5" class="text-end">
                                    <h3><strong>Total: ${{ $total }}</strong></h3>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5" class="text-end">
                                    <form action="{{ route('stripe') }}" method="POST">
                                        @csrf
                                        <a href="{{ route('products') }}" class="btn btn-warning">Continue Shopping</a>

                                        <button class="btn btn-success" type="submit"
                                            id="checkout-live-button">Checkout</button>
                                    </form>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(".cart_update").change(function(e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                method: "PATCH",
                url: "{{ route('update-item-from-cart') }}", // Wrap the route in double quotes
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });

        });
        $(".cart_remove").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("Do you really want to remove this item?")) {
                $.ajax({
                    method: "DELETE",
                    url: "{{ route('remove_from_cart') }}", // Wrap the route in double quotes
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
@endsection
