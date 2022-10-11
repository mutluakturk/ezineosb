<script>
    $(document).ready(function () {
        // for become member
        $('#abnol').on('click', function () {
            $.ajax({
                type: 'POST',
                url: "<?= base_url('Newsletter/newslatterAjaxSave'); ?>",
                data: $('#newslatter').serialize(),
                success: function (data) {
                    if (data == 'success') {
                        iziToast.success({
                            title: 'Haber Aboneliği',
                            message: 'Aramıza Hoşgeldiniz. Artık haberleri size e-posta ile göndereceğiz.',
                            position: "topCenter"
                        })
                    } else {
                        iziToast.info({
                            title: 'Haber Aboneliği',
                            message: 'Haber aboneliğinizi daha önce alınmıştır.',
                            position: "topCenter"
                        })
                    }
                }
            })
        });

        //for suggestions
        $('#sendSuggest').on('click', function () {
            $.ajax({
                type: 'POST',
                url: "<?= base_url('Suggestions/suggestionAjaxSave'); ?>",
                data: $('#suggestion').serialize(),
                success: function (data) {
                    if (data == 'success') {
                        document.getElementById("adSoyad").value = "";
                        document.getElementById("telefon").value = "";
                        document.getElementById("konu").value = "";
                        iziToast.success({
                            title: 'Yeni Öneri Kaydı',
                            message: 'Düşünceleriniz bizim için önemlidir. Teşekkür ederiz.',
                            position: "topCenter"
                        })
                    } else {
                        iziToast.error({
                            title: 'Yeni Öneri Kaydı',
                            message: 'Tekrar deneyiniz.',
                            position: "topCenter"
                        })
                    }
                }
            })
        });


        $('.datat').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Turkish.json"
            },
            "order": [[0, "desc"]],
            "columnDefs": [
                {"orderable": false, "targets": [3]}
            ]
        });
    })
</script>