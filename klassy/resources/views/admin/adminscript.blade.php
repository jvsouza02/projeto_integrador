<script src="{{ asset('admin/assets/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{asset('admin/assets/vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('admin/assets/vendors/progressbar.js/progressbar.min.js')}}"></script>
<script src="{{asset('admin/assets/vendors/jvectormap/jquery-jvectormap.min.js')}}"></script>
<script src="{{asset('admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('admin/assets/vendors/owl-carousel-2/owl.carousel.min.js')}}"></script>
<script src="{{ asset('assets/js/jquery-3.7.1.min.js')}}"></script>
<script src="{{ asset('assets/js/jquery.mask.min.js')}}"></script>
<script src="{{ asset('assets/js/jquery.maskMoney.min.js')}}"></script>
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

<script>
    $(document).ready(function () {
        // Aplica a máscara de dinheiro ao campo com id "valor"
        $('#preco').maskMoney({
            allowNegative: false, // Não permite valores negativos
            thousands: '.',       // Separador de milhar
            decimal: ',',         // Separador decimal
            affixesStay: true     // Mantém o prefixo e sufixo visíveis
        });

        $('#salario').maskMoney({
        allowNegative: false, // Não permite valores negativos
        thousands: '.',       // Separador de milhar
        decimal: ',',         // Separador decimal
        affixesStay: true     // Mantém o prefixo e sufixo visíveis
    });
    });
</script>

<!-- End custom js for this page -->
