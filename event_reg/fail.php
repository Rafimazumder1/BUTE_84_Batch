<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- sweet alert  -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<style>
body{
    background-color: #7DCF8B;
}
</style>
<body>
<script>
Swal.fire({
                icon: 'error',
                // title: 'Oops...',
                text: 'Payment Failed.Try Again',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'OK'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "https://bandhan84.com/";
                }
                })
</script>
    
</body>
</html>