<!-- BEGIN: Vendor JS-->
<script src="{{ asset(mix('assets/vendor/libs/jquery/jquery.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/popper/popper.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/js/bootstrap.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/js/menu.js')) }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!--Inventory Javascript-->
<script src="{{ asset('assets/js/addemp.js')}}"></script>
<script src="{{ asset('assets/js/addhardware.js')}}"></script>
<script src="{{ asset('assets/js/addproj.js')}}"></script>
<script src="{{ asset('assets/js/addservemp.js')}}"></script>
<script src="{{ asset('assets/js/addsoftware.js')}}"></script>
<script src="{{ asset('assets/js/login.js')}}"></script>
<script src="{{ asset('assets/js/updateoperation.js')}}"></script>
<script src="{{ asset('assets/js/updateproj.js')}}"></script>
<script src="{{ asset('assets/js/updatesoft.js')}}"></script>

storage\app\public\js
@yield('vendor-script')
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="{{ asset(mix('assets/js/main.js')) }}"></script>

<!-- END: Theme JS-->
<!-- Pricing Modal JS-->
@stack('pricing-script')
<!-- END: Pricing Modal JS-->
<!-- BEGIN: Page JS-->
@yield('page-script')
<!-- END: Page JS-->
