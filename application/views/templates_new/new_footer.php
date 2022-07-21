<!-- Footer Start -->
<div class="footer">
    <div class="container-fluid shadow">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-6 text-center">
                <div class="footer-widget">
                    <img src="<?php echo base_url('assets/img/logo_color.png')?>" alt="Logo" height="100px">
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="footer-widget">
                    <h2></h2>
                    <div class="contact-info">
                        <p><i class="fa fa-map-marker"></i>
                                        Komplek Masjid Agung Al Azhar <br>
                                        Jl. Sisingamangaraja, Kebayoran Baru <br>
                                        Jakarta Selatan 12110</p>
                        <p><i class="fa fa-envelope"></i>tukutuku@uai.ac.id</p>
                        <p><i class="fa fa-phone"></i>(021) 727 92753</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <!--<div class="footer-widget">
                    <h2>Company Info</h2>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms & Condition</a></li>
                    </ul>
                </div>-->
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="footer-widget">
                    <h2>Follow Us</h2>
                    <div class="contact-info">
                        <div class="social">
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-linkedin-in"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                            <a href=""><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<!-- Footer Bottom Start -->
<div class="footer-bottom">
    <div class="container">
        <div class="row justify-content-center" >
            <div class="col-auto copyright">
                <p>Copyright &copy; 2021 <b>TukuTuku Dev Team</b> All Rights Reserved</p>
            </div>
        </div>
    </div>
</div>
<!-- Footer Bottom End -->
<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src=" <?= base_url('new/assets/') ?>lib/easing/easing.min.js"></script>
<script src=" <?= base_url('new/assets/') ?>lib/slick/slick.min.js"></script>

<!-- Template Javascript -->
<script src=" <?= base_url('new/assets/') ?>js/main.js"></script>
<script src=" <?= base_url('new/assets/') ?>js/hitungcart.js"></script>
<!-- Page level plugins -->
<script src="<?php echo base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- <script src="<?php echo base_url(); ?>assets/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatables/dataTables.bootstrap.min.js"></script> -->
<!-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.18/datatables.min.js"></script> -->

<!-- Page level custom scripts -->
<script src="<?php echo base_url() ?>assets/js/demo/datatables-demo.js"></script>

<script>
    $(document).ready( function () {
    $('#table1').DataTable();
    } );
</script>

<script>
    $(document).ready( function () {
    $('#table2').DataTable();
    } );
</script>

<script>
    $(document).ready( function () {
    $('#table3').DataTable();
    } );
</script>

<script>
    $(document).ready( function () {
    $('#table4').DataTable();
    } );
</script>

<script>
    $(document).ready( function () {
    $('#table5').DataTable();
    } );
</script>
</body>

</html>