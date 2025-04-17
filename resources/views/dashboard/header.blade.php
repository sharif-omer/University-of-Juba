
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stusents Service Platform</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('asset/css/bootstrap.css')}}">  
    <link rel="stylesheet" href="{{asset('asset/js/vendors/iconly/bold.css')}}">
    <link rel="stylesheet" href="{{asset('asset/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('asset/vendors//bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('asset/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('asset/css/style.css')}}">
    <link rel="shortcut icon" href="{{asset('asset/images/logo/ulog.png')}}" type="image/x-icon">
    
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}

    <!-- تنسيقات الرسائل -->
     <style>
        /* رسائل الفلاش العادية */
        .flash-message {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px 25px;
            color: white;
            border-radius: 5px;
            z-index: 9999;
            animation: slideIn 0.3s ease-out;
            display: none; /* مبدئيًا مخفية */
        }

        .flash-message.show {
            display: flex !important;
            align-items: center;
            gap: 10px;
        }

        .flash-success { background: #28a745; }
        .flash-error { background: #dc3545; }

        @keyframes slideIn {
            from { transform: translateX(100%); }
            to { transform: translateX(0); }
        }
    </style> 


    <!-- مكان عرض الرسائل العادية -->
     @if(session('success'))
        <div class="flash-message flash-success show">
            <i class="fas fa-check-circle"></i>
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="flash-message flash-error show">
            <i class="fas fa-times-circle"></i>
            {{ session('error') }}
        </div>
    @endif 

    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>  --}}
 {{-- <script>
    function confirmDelete(formId) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won’t be able to revert this action!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete!",
            cancelButtonText: "Cancel"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(formId).submit(); // إرسال النموذج إذا تم التأكيد
            }
        });
    }
</script>  --}}




