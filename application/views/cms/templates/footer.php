<div class="clearfix"></div>
<!-- Footer -->
<footer class="site-footer">
    <div class="footer-inner bg-white">
        <div class="row">
            <div class="col-sm-6">
                Copyright &copy; <?= date('Y'); ?> Bagiyo Denso
            </div>
            <div class="col-sm-6 text-right">
                Designed by <a href="<?= base_url(''); ?>">Jaxindo Digital Agency</a>
            </div>
        </div>
    </div>
</footer>
<!-- /.site-footer -->
</div>
<!-- /#right-panel -->

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
    integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="<?= base_url('assets/templates/'); ?>assets/js/main.js"></script>

<!-- tinymce id -->
<script type="text/javascript">
    tinymce.init({
        selector: "#mytextarea_id",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image responsivefilemanager",
        automatic_uploads: true,
        image_advtab: true,
        images_upload_url: "<?= base_url("upload/images/body") ?>",
        height: 900,
        file_picker_types: 'image',
        paste_data_images: true,
        relative_urls: false,
        remove_script_host: false,
        file_picker_callback: function(cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/jpg,image/jpeg,image/png,image/webp');
            input.onchange = function() {
                var file = this.files[0];
                var reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function() {
                    var id = 'bagiyo-' + (new Date()).getTime();
                    var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                    var blobInfo = blobCache.create(id, file, reader.result);
                    blobCache.add(blobInfo);
                    cb(blobInfo.blobUri(), {
                        title: file.name
                    });
                };
            };
            input.click();
        }
    });
</script>

<!-- Preview Images -->
<script type="text/javascript">
    function PreviewHeader1() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("header1").files[0]);

        oFReader.onload = function(oFREvent) {
            document.getElementById("priviewHeader1").src = oFREvent.target.result;
        };
    };
</script>

<!-- lenght meta -->
<script>
    // meta descrition
    function metades(obj) {
        document.getElementById('mdes').innerHTML = obj.value.length;
    }
    // meta keyword
    function metakey(obj) {
        document.getElementById('mkey').innerHTML = obj.value.length;
    }
</script>


<script src="<?= base_url('assets/templates/'); ?>assets/js/lib/data-table/datatables.min.js"></script>
<script src="<?= base_url('assets/templates/'); ?>assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
<script src="<?= base_url('assets/templates/'); ?>assets/js/lib/data-table/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/templates/'); ?>assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
<script src="<?= base_url('assets/templates/'); ?>assets/js/lib/data-table/jszip.min.js"></script>
<script src="<?= base_url('assets/templates/'); ?>assets/js/lib/data-table/vfs_fonts.js"></script>
<script src="<?= base_url('assets/templates/'); ?>assets/js/lib/data-table/buttons.html5.min.js"></script>
<script src="<?= base_url('assets/templates/'); ?>assets/js/lib/data-table/buttons.print.min.js"></script>
<script src="<?= base_url('assets/templates/'); ?>assets/js/lib/data-table/buttons.colVis.min.js"></script>
<script src="<?= base_url('assets/templates/'); ?>assets/js/init/datatables-init.js"></script>

<!-- simple table -->
<script type="text/javascript">
    $(document).ready(function() {
        // Cek dan inisialisasi ulang hanya jika belum
        if ($.fn.DataTable.isDataTable('#bootstrap-data-table')) {
            $('#bootstrap-data-table').DataTable().destroy();
        }
        $('#bootstrap-data-table').DataTable();

        if ($.fn.DataTable.isDataTable('#bootstrap-data-wa')) {
            $('#bootstrap-data-wa').DataTable().destroy();
        }
        $('#bootstrap-data-wa').DataTable();
    });
</script>


<!--  Chart js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

<!--Chartist Chart-->
<script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
<script src="<?= base_url('assets/templates/'); ?>assets/js/init/weather-init.js"></script>

<script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
</body>

</html>