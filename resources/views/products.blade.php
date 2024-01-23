@extends('layouts.app')
@section('main')
           <div class="row py-2">
            @if (Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                    <strong>{{ Session::get('success') }}</strong>
                </div>
            @endif

            @foreach ($items as $item)
                <div class="col-md-4">
                    <div class="card mb-3 mt-3 text-center">
                        <div class="card-header">
                            <h3>{{$item->product_name}}</h3>
                        </div>
                        <div class="card-body">
                            <div class="image mb-3">
                                <img class="img-fluid"
                                    src={{$item->photo}}
                                    width="250" height="150" alt="">
                            </div>
                            <div class="details ">
                                <p>{{$item->product_description}}</p>


                                <p><b>${{$item->price}}</b></p>
                                <input type="hidden" name="price" value="1000">

                            </div>
                        </div>
                        <div class="card-footer ">
                            <a href="{{route('add-to-cart', ['id' => $item->id])}}"  class="btn btn-success">Add to cart</a>
                        </div>
                    </div>
                </div>
            @endforeach



        </div>

@endsection
