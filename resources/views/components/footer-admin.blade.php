<footer class="footer">
    <div class="container">
        <div class="row align-items-center flex-row-reverse">
            <div class="col-auto ml-lg-auto">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <ul class="list-inline list-inline-dots mb-0">
                            <li class="list-inline-item"><a href="./docs/index.html">Documentation</a></li>
                            <li class="list-inline-item"><a href="./faq.html">FAQ</a></li>
                        </ul>
                    </div>
                    <div class="col-auto">
                        <a href="https://github.com/tabler/tabler" class="btn btn-outline-primary btn-sm">Source
                            code</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-auto mt-3 mt-lg-0 text-center">
                Copyright © 2018 <a href=".">Tabler</a>. Theme by <a href="https://codecalm.net"
                    target="_blank">codecalm.net</a> All rights reserved.
            </div>
        </div>
    </div>
</footer>
</div>
</body>
<!-- Libs JS -->
<script src="{{ asset('dist/libs/apexcharts/dist/apexcharts.min.js?1692870487') }}" defer></script>
<script src="{{ asset('dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1692870487') }}" defer></script>
<script src="{{ asset('dist/libs/jsvectormap/dist/maps/world.js?1692870487') }}" defer></script>
<script src="{{ asset('dist/libs/jsvectormap/dist/maps/world-merc.js?1692870487') }}" defer></script>
<!-- Tabler Core -->
<script src="{{ asset('dist/js/tabler.min.js?1692870487') }}" defer></script>
<script src="{{ asset('dist/js/demo.min.js?1692870487') }}" defer></script>
<script>
    $(document).ready(function() {

        $('.deleteData').on('click', function() {

            if (confirm('Are you sure you want to proceed?')) {
                $(this).html(`
                    <div class="spinner-border text-dark" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>`
                )
            } else {
                return false;
            }
        });
        $('button').click(function() {
            $(this).html(`
                    <div class="spinner-border text-dark" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>`)
        });
        $(document).on('click', '.buttonDashboard', function() {
            var loadingModal = new bootstrap.Modal($('#loadingModal')[0], {
                backdrop: 'static',
                keyboard: false
            });
            loadingModal.show();
        });
        $(document).on('click', '.buttonKategori', function() {
            var loadingModal = new bootstrap.Modal($('#loadingModal')[0], {
                backdrop: 'static',
                keyboard: false
            });
            loadingModal.show();
        });
        $(document).on('click', '.buttonJoki', function() {
            var loadingModal = new bootstrap.Modal($('#loadingModal')[0], {
                backdrop: 'static',
                keyboard: false
            });
            loadingModal.show();
        });
        $(document).on('click', '.buttonJoki', function() {
            var loadingModal = new bootstrap.Modal($('#loadingModal')[0], {
                backdrop: 'static',
                keyboard: false
            });
            loadingModal.show();
        });
        $(document).on('click', '.buttonPenjoki', function() {
            var loadingModal = new bootstrap.Modal($('#loadingModal')[0], {
                backdrop: 'static',
                keyboard: false
            });
            loadingModal.show();
        });
        $(document).on('click', '.buttonDataJoki', function() {
            var loadingModal = new bootstrap.Modal($('#loadingModal')[0], {
                backdrop: 'static',
                keyboard: false
            });
            loadingModal.show();
        });
        $(document).on('click', '.buttonInvoice', function() {
            var loadingModal = new bootstrap.Modal($('#loadingModal')[0], {
                backdrop: 'static',
                keyboard: false
            });
            loadingModal.show();
        });
    })
</script>

</html>
