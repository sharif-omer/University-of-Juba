<footer>
    <div class="container footer clearfix mb-0 text-muted">
        <div class="float-start">
            <p>2025 &copy; All Right</p>
        </div>
        <div class="float-end">
            <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                    href="http://sharifomer.con">Sharif & Tarrir</a></p>
        </div>
    </div>
</footer>
</div>
</div>
<!-- SweetAlert2 -->
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
<script src="{{asset('asset/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('asset/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('asset/vendors/apexcharts/apexcharts.js')}}"></script>
<script src="{{asset('asset/js/pages/dashboard.js')}}"></script>

{{-- <script src="{{asset('asset/js/flashMassege.js')}}"></script> --}}
<script src="{{asset('asset/js/mazer.js')}}"></script>

<script src="{{asset('asset/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('asset/js/bootstrap.bundle.min.js')}}"></script>
    
<script src="{{asset('asset/vendors/jquery/jquery.min.js')}}"></script>
<script src="{{asset('asset/vendors/jquery-datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('asset/vendors/jquery-datatables/custom.jquery.dataTables.bootstrap5.min.js')}}"></script>
<script src="{{asset('asset/vendors/fontawesome/all.min.js')}}"></script>
<script>
    // Jquery Datatable
    let jquery_datatable = $("#table1").DataTable()
</script>

@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'نجاح!',
            text: '{{ session('success') }}',
            timer: 3000,
            showConfirmButton: false
        });
    </script>
@endif

@if (session('delete'))
    <script>
        Swal.fire({
            icon: 'warning',
            title: 'تم الحذف!',
            text: '{{ session('delete') }}',
            timer: 3000,
            showConfirmButton: false
        });
    </script>
@endif

@if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'خطأ!',
            text: '{{ session('error') }}',
            timer: 3000,
            showConfirmButton: false
        });
    </script>
@endif
</body>

</html>