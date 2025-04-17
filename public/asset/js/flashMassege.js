{/* <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 

    function confirmDelete(id) {
        Swal.fire({
            title: 'هل أنت متأكد؟',
            text: "لن تتمكن من استعادة هذا السجل!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'نعم، احذفه!',
            cancelButtonText: 'إلغاء'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    } */}

// Create Sweetalert

// function confirmDelete(formId) {
//     Swal.fire({
//         title: "Are you sure?",
//         text: "You won’t be able to revert this action !",
//         icon: "warning",
//         showCancelButton: true,
//         confirmButtonColor: "#d33",
//         cancelButtonColor: "#3085d6",
//         confirmButtonText: "Yes, delete!",
//         cancelButtonText: "Cancel"
//     }).then((result) => {
//         if (result.isConfirmed) {
//             document.getElementById(formId).submit(); // إرسال النموذج إذا تم التأكيد
//         }
//     });
// }