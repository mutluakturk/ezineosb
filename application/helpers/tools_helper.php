<?php
function convertToSEO($text)
{
    $turkce = array("ç", "Ç", "ğ", "Ğ", "ü", "Ü", "ö", "Ö", "ı", "İ", "ş", "Ş", ".", ",", "!", "'", "\"", " ", "?", "*", "_", "|", "=", "(", ")", "[", "]", "{", "}", ";", "“", "’");
    $convert = array("c", "c", "g", "g", "u", "u", "o", "o", "i", "i", "s", "s", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-");
    return $seo = strtolower(str_replace($turkce, $convert, $text));
}

function get_readable_date($date)
{
    date_default_timezone_set('Europe/Istanbul');
    setlocale(LC_TIME, 'tr_TR.UTF-8');
    return strftime('%e %B %Y / %H:%M', strtotime($date));
}

function get_readable_just_date($date)
{
    date_default_timezone_set('Europe/Istanbul');
    setlocale(LC_TIME, 'tr_TR.UTF-8');
    return strftime('%e %B %Y', strtotime($date));
}

function get_active_user()
{
    $t = &get_instance();
    $user = $t->session->user;
    if ($user)
        return $user;
    else
        return false;
}

function get_username($category_id = 0)
{
    $t = &get_instance();
    $t->load->model("user_model");
    $category = $t->user_model->get(
        array(
            "id" => $category_id
        )
    );
    if ($category)
        return $category->user_name;
    else
        return "<b style='color: red'>Tanımlı Değil</b>";
}

function get_settings()
{
    $t = &get_instance();
    $t->load->model("settings_model");

    if ($t->session->userdata("settings")) {
        $settings = $t->session->userdata("settings");
    } else {
        $settings = $t->settings_model->get();
        if (!$settings) {
            $settings = new stdClass();
            $settings->company_name = "CMS";
            $settings->logo = "default";
        }

        $t->session->set_userdata("settings", $settings);
    }
    return $settings;
}

function get_menu_title($category_id = 0)
{
    $t = &get_instance();
    $t->load->model("Menu_model");
    $category = $t->Menu_model->get(
        array(
            "id" => $category_id
        )
    );
    if ($category)
        return $category->title;
    else
        return "<b style='color: goldenrod'>Ana Menü</b>";
}

function get_category_title($category_id = 0)
{
    $t = &get_instance();
    $t->load->model("portfolio_category_model");
    $category = $t->portfolio_category_model->get(
        array(
            "id" => $category_id
        )
    );
    if ($category)
        return $category->title;
    else
        return "<b style='color: red'>Tanımlı Değil</b>";
}

function get_news_title($category_id = 0)
{
    $t = &get_instance();
    $t->load->model("news_model");
    $category = $t->news_model->get(
        array(
            "url" => $category_id
        )
    );
    if ($category)
        return $category->title;
    else
        return "<b style='color: red'>Tanımlı Değil</b>";
}

function patient_check($patName, $patSurname)
{
    //burası randevusu olan kişinin kayıtlı hasta olup olmadığını inceler
    $t = &get_instance();
    $t->load->model("members_model");
    $member = $t->members_model->get(array("name" => $patName, "surname" => $patSurname));
    if ($member) {
        return $member->id;
    } else {
        return -1;
    }
}

function get_unchecked_comment_count()
{
    $t = &get_instance();
    $t->load->model("Comments_model");
    $unchecked = $t->Comments_model->get_all(array("status" => 0));
    return count($unchecked);
}

function get_gallery_images($id)
{
    $t = &get_instance();
    $t->load->model("Image_model");
    $images = $t->Image_model->get_all(array("gallery_id" => $id));
    if ($images) {
        return $images;
    } else {
        return -1;
    }
}

function get_gallery_videos($id)
{
    $t = &get_instance();
    $t->load->model("Video_model");
    $images = $t->Video_model->get_all(array("gallery_id" => $id));
    if ($images) {
        return $images;
    } else {
        return -1;
    }
}

function get_gallery_files($id)
{
    $t = &get_instance();
    $t->load->model("File_model");
    $images = $t->File_model->get_all(array("gallery_id" => $id));
    if ($images) {
        return $images;
    } else {
        return -1;
    }
}

//$_FILES["img_url"]["tmp_name"]
//"uploads/$t->viewFolder/deneme.png"
//320, 200,
function upload_picture($file, $uploadPath, $width, $height, $name)
{
    $t = &get_instance();
    $t->load->library("simpleimagelib");

    //klasör kontrolü
    if (!is_dir("{$uploadPath}/{$width}x{$height}")) {
        mkdir("{$uploadPath}/{$width}x{$height}");
    }

    $upload_error = false;
    try {
        // Create a new SimpleImage object
        $simleImage = $t->simpleimagelib->get_simple_image_instance();

        // Magic! ✨
        $simleImage
            ->fromFile($file)                     // load image.jpg
            //->autoOrient()                              // adjust orientation based on exif data
            ->thumbnail($width, $height, 'center')                          // resize to 320x200 pixels
            //->resize(320, 200)                          // resize to 320x200 pixels
            //->flip('x')                                 // flip horizontally
            //->colorize('DarkBlue')                      // tint dark blue
            //->border('black', 10)                       // add a 10 pixel black border
            //->overlay('watermark.png', 'bottom right')  // add a watermark image
            ->toFile("{$uploadPath}/{$width}x{$height}/$name", 'image/png');     // convert to PNG and save a copy to new-image.png
        //->toScreen();                               // output to the screen

        // And much more!
    } catch (Exception $err) {
        // Handle errors
        $error = $err->getMessage();
        $upload_error = true;
    }

    if ($upload_error) {
        echo $error;
    } else {
        return true;
    }
}

function get_picture($path = "", $picture = "", $resolution = "50x50")
{
    if ($picture != "") {
        if (file_exists(FCPATH . "uploads/$path/$resolution/$picture")) {
            $picture = base_url("uploads/$path/$resolution/$picture");
        } else {
            $picture = base_url("resources/assets/images/default_image.png");
        }
    } else {
        $picture = base_url("resources/assets/images/default_image.png");
    }
    return $picture;
}