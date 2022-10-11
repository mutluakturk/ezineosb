<!DOCTYPE html>
<html lang="tr-TR">
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<head>
    <?php $this->load->view("includes/web_includes/head"); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<style>


    /* Add padding BETWEEN each column (if you want) */
    .row,
    .row > .column {
        padding: 8px;
    }

    /* Create three equal columns that floats next to each other */
    .column {
        float: left;
        width: 33.33%;
        display: none; /* Hide columns by default */
    }

    /* Clear floats after rows */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    /* Content */
    .content {
        background-color: white;
        padding: 10px;
    }

    /* The "show" class is added to the filtered elements */
    .show {
        display: block;
    }

</style>

<body data-spy="scroll" data-target=".inner-link" data-offset="60">
<main>
    <?php $this->load->view("includes/web_includes/pre_loader"); ?>

    <!--    =============================================-->
    <?php $this->load->view("includes/web_includes/top_header"); ?>
    <?php $this->load->view("includes/web_includes/menu"); ?>
    <?php $this->load->view("includes/web_includes/bread_crumb"); ?>
    <!--    =============================================-->
    <?php $this->load->view("includes/web_includes/gallery"); ?>

    <?php $this->load->view("includes/web_includes/whatsapp"); ?>
    <!--    =============================================-->
    <?php $this->load->view("includes/web_includes/top_footer"); ?>
    <?php $this->load->view("includes/web_includes/footer"); ?>
</main>
<!--  -->

<?php $this->load->view("includes/web_includes/site_scripts"); ?>

<script>
    filterSelection("all") // Execute the function and show all columns
    function filterSelection(c) {
        var x, i;
        x = document.getElementsByClassName("column");
        if (c == "all") c = "";
        // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
        for (i = 0; i < x.length; i++) {
            w3RemoveClass(x[i], "show");
            if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
        }
    }

    // Show filtered elements
    function w3AddClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            if (arr1.indexOf(arr2[i]) == -1) {
                element.className += " " + arr2[i];
            }
        }
    }

    // Hide elements that are not selected
    function w3RemoveClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            while (arr1.indexOf(arr2[i]) > -1) {
                arr1.splice(arr1.indexOf(arr2[i]), 1);
            }
        }
        element.className = arr1.join(" ");
    }

    // Add active class to the current button (highlight it)
    var btnContainer = document.getElementById("myBtnContainer");
    var btns = btnContainer.getElementsByClassName("btn");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function(){
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        });
    }
</script>
<script>
    // Demo video 1
    $(".youtube-link").grtyoutube({
        autoPlay:true,
        theme: "dark"
    });

    // Demo video 2
    $(".youtube-link-dark").grtyoutube({
        autoPlay:false,
        theme: "light"
    });
</script>


</body>
</html>