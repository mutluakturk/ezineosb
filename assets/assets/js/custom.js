$(document).ready(function () {

    $(".sortable").sortable();

    $(".news_type_select").change(function () {
        //alert($(this).val());


        if ($(this).val() === "image"){
            $(".img_upload_container").fadeIn();
            $(".video_url_container").hide();
        } else if ($(this).val() === "video"){
            $(".video_url_container").fadeIn();
            $(".img_upload_container").hide();
        }
    })

    $(".content-container, .image_list_container").on('click', '.remove-btn', function () {

        var $data_url = $(this).data("url");

        swal({
            title: "Kayıt silinecektir. Devam edilsin mi?",
            text: "Seçili kayıt geri döndürülemez şekilde silinecek!",
            icon: "warning",
            buttons: true,
            dangerMode: true

        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = $data_url;
                } else {
                    swal("İptal Edildi", "Kayıt silinmedi vazgeçildi!", "info");
                }
            });
    })

    $(".detail-btn").on('click', function () {

        var $data_url = $(this).data("url");

        $.ajax({
            type: "post",
            url: $data_url,
            success: function (snc) {
                var obj = JSON.parse(snc);
                swal({
                    title: "Başvuruya ait Detaylar",
                    text: "Ad: " + obj.fname + "\n" +
                        "Soyad: " + obj.lname + "\n" +
                        "Meslek: " + obj.title + "\n" +
                        "Doğum Tarihi: " + obj.dob + "\n" +
                        "E-Posta: " + obj.email + "\n" +
                        "Telefon: " + obj.phone + "\n" +
                        "Eğitim Durumu " + obj.occupation + "\n" +
                        "Başvurulan Firma " + obj.company + "\n" +
                        "Adres " + obj.address + "\n" +
                        "İl " + obj.state + "\n" +
                        "İlçe " + obj.city + "\n",
                    icon: "info",
                    buttons: true
                });
            }
        })
        //alert($data_url);

    })

    $(".content-container, .image_list_container").on('change', '.isActive', (function () {
        var $data = $(this).prop("checked");
        var $data_url = $(this).data("url");

        if (typeof $data !== "undefined" && typeof $data_url !== "undefined") {
            $.post($data_url, {data: $data}, function (response) {
            })
        }
    }))

    $(".image_list_container").on('change', '.isCover', (function () {
        var $data = $(this).prop("checked");
        var $data_url = $(this).data("url");

        if (typeof $data !== "undefined" && typeof $data_url !== "undefined") {
            $.post($data_url, {data: $data}, function (response) {
                $(".image_list_container").html(response);

                $('[data-switchery]').each(function () {
                    var $this = $(this),
                        color = $this.attr('data-color') || '#188ae2',
                        jackColor = $this.attr('data-jackColor') || '#ffffff',
                        size = $this.attr('data-size') || 'default'

                    new Switchery(this, {
                        color: color,
                        size: size,
                        jackColor: jackColor
                    });
                });

                $(".sortable").sortable();
            })
        }
    }))


    $(".content-container, .image_list_container").on("sortupdate", '.sortable', function (event, ui) {
        var $data = $(this).sortable("serialize");
        var $data_url = $(this).data("url");
        $.post($data_url, {data: $data}, function (response) {
        })
    })

    $(".button_usage_btn").change(function () {
        $(".button-information-container").slideToggle();
    })

    var uploadSection = Dropzone.forElement("#dropzone");
    uploadSection.on("complete", function (file) {
        //console.log(file);
        var $data_url = $("#dropzone").data("url");
        $.post($data_url, {}, function (response) {
            $(".image_list_container").html(response);

            $('[data-switchery]').each(function () {
                var $this = $(this),
                    color = $this.attr('data-color') || '#188ae2',
                    jackColor = $this.attr('data-jackColor') || '#ffffff',
                    size = $this.attr('data-size') || 'default'

                new Switchery(this, {
                    color: color,
                    size: size,
                    jackColor: jackColor
                });
            });
            $(".sortable").sortable();
        });
    })


});