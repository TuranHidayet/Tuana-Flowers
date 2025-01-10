<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tuana Flowers')</title>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Fiama - Flower Shop eCommerce HTML Template</title>
    <meta name="robots" content="noindex, follow"/>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @yield('customCss')
    <!-- Place favicon.png in the root directory -->
    <link rel="shortcut icon" href="{{ asset('front/img/favicon.png') }}" type="image/x-icon"/>
    <!-- Font Icons css -->
    <link rel="stylesheet" href="{{ asset('front/css/font-icons.css') }}">
    <!-- Plugins css -->
    <link rel="stylesheet" href="{{ asset('front/css/plugins.css') }}">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{ asset('front/css/responsive.css') }}">

    <style>


{{--        Florist Css--}}
        .florist-img {
            width: 210px;
            height: 273px;
            object-fit: cover;
            border-radius: 5px;
            display: block;
            margin: 0 auto;
        }


         /*Create Shop Css*/
         .create-shop-container {
             background: linear-gradient(135deg, #4a90e2, #9013fe);
             color: white;
             text-align: center;
             padding: 50px 20px;
             border-radius: 12px;
             box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
             max-width: 400px;
             margin: 50px auto;
             font-family: 'Arial', sans-serif;
         }

        .create-shop-title {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .create-shop-description {
            font-size: 16px;
            margin-bottom: 20px;
        }

        .create-shop-button {
            display: inline-block;
            background-color: white;
            color: #4a90e2;
            text-transform: uppercase;
            font-weight: bold;
            padding: 12px 25px;
            border-radius: 25px;
            text-decoration: none;
            transition: all 0.3s ease-in-out;
            box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.15);
        }

        .create-shop-button:hover {
            background-color: #4a90e2;
            color: white;
            box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.3);
            transform: translateY(-2px);
        }

    </style>




</head>

<body>
<div class="wrapper">
    @include('front.partials.header')
    @include('front.partials.basket')

        @yield('content')



    @include('front.partials.brandlogo')

    @include('front.partials.footer')
</div>


@yield('customJs')
<!-- jQuery -->
<script src="{{ asset('front/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('front/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('front/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('front/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('front/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('front/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('front/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('front/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('front/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('front/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('front/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('front/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('front/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('front/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('front/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('front/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('front/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('front/dist/js/demo.js') }}"></script>
<!-- All JS Plugins -->
<script src="{{ asset('front/js/plugins.js') }}"></script>
<!-- Main JS -->
<script src="{{ asset('front/js/main.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.add-to-cart').forEach(function (button) {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                const productId = this.getAttribute('data-product-id');

                fetch('{{ route('app.cart.add') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ product_id: productId })
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            updateCart(data.cart);
                        } else {
                            alert(data.error);
                        }
                    })
                    .catch(error => console.error('Error:', error));
            });
        });
    });

    function updateCart(cart) {
        let cartMenu = document.querySelector('.mini-cart-product-area');
        cartMenu.innerHTML = '';

        Object.values(cart).forEach(item => {
            cartMenu.innerHTML += `
                <div class="mini-cart-item clearfix">
                    <div class="mini-cart-img">
                        <a href="#"><img src="${item.image}" alt="Image"></a>
                        <span class="mini-cart-item-delete"><i class="icon-trash"></i></span>
                    </div>
                    <div class="mini-cart-info">
                        <h6><a href="#">${item.name}</a></h6>
                        <span class="mini-cart-quantity">${item.quantity} x $${item.price}</span>
                    </div>
                </div>
            `;
        });
    }


</script>

<script>
    function showAlert(title, text, icon = 'success', btnText = 'OK') {
        Swal.fire({
            title: title,
            text: text,
            icon: icon,
            confirmButtonText: btnText
        });
    }
</script>


</body>
</html>


