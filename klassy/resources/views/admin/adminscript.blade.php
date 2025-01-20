<script src="{{ asset('admin/assets/vendors/js/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{asset('admin/assets/vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('admin/assets/vendors/progressbar.js/progressbar.min.js')}}"></script>
<script src="{{asset('admin/assets/vendors/jvectormap/jquery-jvectormap.min.js')}}"></script>
<script src="{{asset('admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('admin/assets/vendors/owl-carousel-2/owl.carousel.min.js')}}"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{asset('admin/assets/js/off-canvas.js')}}"></script>
<script src="{{asset('admin/assets/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('admin/assets/js/misc.js')}}"></script>
<script src="{{asset('admin/assets/js/settings.js')}}"></script>
<script src="{{asset('admin/assets/js/todolist.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{asset('admin/assets/js/dashboard.js')}}"></script>
<script>
    const inputImagem = document.getElementById('imagem');
    const previewImagem = document.getElementById('preview-imagem');

    inputImagem.addEventListener('change', () => {
        const file = inputImagem.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                previewImagem.src = e.target.result;
            };
            reader.readAsDataURL(file);
            previewImagem.style.display = 'block';
        } else {
            previewImagem.src = "";
        }
    });
</script>
<!-- End custom js for this page -->
