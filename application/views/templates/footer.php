</div>
</div>

<script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/chart.js/chart.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/sb-admin-2.min.js'); ?>"></script>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "language": {
                "search": "Cari :",
                "lengthMenu": "Tampilkan _Menu_ data",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                "paginate":{
                    "previous": "Sebelumnya",
                    "next": "Berikutnya"
                }
            }
        });
    });
</script>
<script>
    var ctx = document.getElementById("chartDashboard");
    var chart=new Chart(ctx, {
        type: 'bar',
        data:{
            labels:['Buku','Anggota', 'Peminjaman'],
            datasets: [{
                label:'Jumlah Data',
                data:[
                    <?= $total_buku; ?>,
                    <?= $total_anggota; ?>, 
                    <?= $total_peminjaman; ?>       
                ],
                backgroundColor:[
                    '#4e73df',
                    '#1cc88a',
                    '#f6c23e'
                ]
            }]
        },
        options: {
            responsive: true,
            scales:{
                yAxes:[{
                    ticks:{
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
</body>
</html>