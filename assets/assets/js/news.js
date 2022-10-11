$(document).ready(function () {
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
})