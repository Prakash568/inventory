@extends('includes.app')
<script src="https://code.jquery.com/jquery.min.js"></script>
<div class="page-header">
    <h1>Create Order</h1>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <form action="{{ route('sale.store') }}" method="post">
                @csrf
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Customer Name</label>
                            <select name="customer_id" class="form-control">
                                @foreach ($customer as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" name="date" class="form-control" />
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <table class="table table-hover table-striped" id="order_table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Code</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                                <th><a href="javascript:void(0);" class="btn btn-info add_btn"><span
                                            class="glyphicon glyphicon-plus"></span></a></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <hr>
                {{-- <div class="row">
                    <div class="field_wrapper">
                        <div class="col-md-3">
                            <label>Product</label>
                            <input type="text" name="product_code[]" class="form-control" placeholder="Product Code" />
                        </div>
                        <div class="col-md-3">
                            <label>Quantity</label>
                            <input type="text" name="quantity[]" class="form-control" placeholder="Quantity" />
                        </div>
                        <div class="col-md-4">
                            <label>Amount</label>
                            <input type="text" name="amount[]" class="form-control" placeholder="Amount" />
                        </div>
                        <div class="col-md-2">
                            <a href="javascript:void(0);" class="btn btn-primary add_button" title="Add field"><span
                                    class="glyphicon glyphicon-plus"></span></a>
                        </div>
                    </div>
                </div> --}}

                <div class="row" style="margin-top:10px">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Sub Total</label>
                            <input type="text" name="sub_total" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Discount</label>
                            <input type="text" name="discount" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Total</label>
                            <input type="text" name="total" class="form-control" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Total</label>
                            <input type="text" name="total" class="form-control" />
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Payment Type</label>
                                    <select name="payment_type" class="form-control">
                                        <option value="" selected disabled>Type</option>
                                        <option value="0">Card</option>
                                        <option value="1">Cash</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Paid</label>
                                    <input type="text" name="paid" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Due</label>
                            <input type="text" name="due" class="form-control" />
                        </div>
                    </div>
                </div>
                <hr>
                <div align="center">
                    <button type="submit" class="btn btn-success" name="submit">Save</button>
                </div>
            </form>


        </div>
        <div class="col-md-3">
            <div class="page-header">
                <h1>Products</h1>
            </div>
            <div class="form-group">
                <select name="selected_product" id="selected_product" class="form-control">
                    <option value="" selected disabled>Categories</option>
                    @foreach ($category as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <table class="table table-hover table-striped" id="show_product" style="display:none">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Product Code</th>
                            <th>Stock</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
    $(function() {
        $('select[name=selected_product]').on("change", function() {
            $('#show_product').css("display", "block");
            var category_id = $(this).val();
            $.getJSON('/sale/categories/' + category_id, function(data) {
                console.log(data);
                $.each(data, function(index, value) {

                    var $table = $('#show_product tbody').empty();
                    var $tr = $('<tr/>');
                    $('<td/>').html(value.name).appendTo($tr);
                    $('<td/>').html(value.product_code).appendTo($tr);
                    $('<td/>').html(value.quantity).appendTo($tr);
                    $tr.appendTo($table);

                });
            });
        });


        var $table = $('#order_table tbody');
        var $i = 1;
        $('.add_btn').on("click", function() {
            var $html = '<tr><td>' + $i + '</td>' +
                '<td><input type="text" class="form-control product-code" name="product_code[]"></td>' +
                '<td><input type="text" class="form-control product-quantity" name="product_quantity[]"></td>' +
                '<td><input type="text" class="form-control product-price" name="product_price[]" readonly></td>' +
                '<td><input type="text" class="form-control total" name="total[]" readonly></td>' +
                '<td><a href="javascript:void(0);" class="btn btn-danger delete_btn"><span class="glyphicon glyphicon-trash"></span></a></td></tr>';
            $table.append($html);
            $i++;
        });

        $table.on("click", ".delete_btn", function() {
            $(this).closest('tr').remove();
        });


     $table.on("keyup", ".product-code", function(e) {
                let $code = $(this).val();
                console.log($code);

                $.getJSON('/product/product_price/'+$code,function(data){
                       console.log(data);
                })
             });
                // $.ajax({
                //     url:"{{url('/product/product_price/')}}"+$data,
                //     type:"GET",
                //     dataType:"json",
                //     success:function(data){
                //         console.log(data);
                //     }
                // })



                // var $quantity = $table.find('.quantity').val();
                // console.log($quantity);
                // var $price = $table.find('product-price').val();

        //  });

    });
</script>
