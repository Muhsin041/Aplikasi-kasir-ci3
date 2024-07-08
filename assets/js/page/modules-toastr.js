"use strict";

$("#toastr-1").click(function() {
  iziToast.info({
    title: 'Hello, world!',
    message: 'This awesome plugin is made iziToast toastr',
    position: 'topRight'
  });
});

$("#toastr-2").click(function() {
  iziToast.success({
    title: 'Hello, world!',
    message: 'This awesome plugin is made by iziToast',
    position: 'topRight'
  });
});

$("#login").click(function() {
  iziToast.success({
    title: 'Selamat',
    message: 'Login Berhasil',
    position: 'topRight'
  });
});
// $(document).ready(function() {
//   $('#login').click(function() {
//       $.ajax({
//           type: 'POST',
//           url: base_url+'dashboard',
//           data: { login: true },
//           dataType: 'json',
//           success: function(response) {
//               if (response.status === 'success') {
//                   iziToast.success({
//                       title: 'Selamat',
//                       message: 'Login Berhasil',
//                       position: 'topRight'
//                   });

//                   // Redirect setelah iziToast ditampilkan
//                   setTimeout(function() {
//                       window.location.href = '<?= site_url('dashboard'); ?>';
//                   }, 1000);
//               } else {
//                   iziToast.error({
//                       title: 'Gagal',
//                       message: 'Login Gagal',
//                       position: 'topRight'
//                   });
//               }
//           }
//       });
//   });
// });


$("#toastr-3").click(function() {
  iziToast.warning({
    title: 'Hello, world!',
    message: 'This awesome plugin is made by iziToast',
    position: 'topRight'
  });
});

$("#toastr-4").click(function() {
  iziToast.error({
    title: 'Hello, world!',
    message: 'This awesome plugin is made by iziToast',
    position: 'topRight'
  });
});

$("#toastr-5").click(function() {
  iziToast.show({
    title: 'Hello, world!',
    message: 'This awesome plugin is made by iziToast',
    position: 'bottomRight' 
  });
});

$("#toastr-6").click(function() {
  iziToast.show({
    title: 'Hello, world!',
    message: 'This awesome plugin is made by iziToast',
    position: 'bottomCenter' 
  });
});

$("#toastr-7").click(function() {
  iziToast.show({
    title: 'Hello, world!',
    message: 'This awesome plugin is made by iziToast',
    position: 'bottomLeft' 
  });
});

$("#toastr-8").click(function() {
  iziToast.show({
    title: 'Hello, world!',
    message: 'This awesome plugin is made by iziToast',
    position: 'topCenter' 
  });
});
