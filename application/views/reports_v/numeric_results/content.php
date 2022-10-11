<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">Rapor Parametreleri <br>Başlangıç Tarihi: <?= $baslangic; ?> <br>Bitiş Tarihi: <?= $bitis; ?>

        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <!--<a href="whatsapp://send?text=falan-filan-gidece">asdasd</a>-->
                <label style="font-weight: bolder; font-size: larger">Randevulu Sayısı: </label>
                <label style="color: red; font-weight: bolder; font-size: larger"><?= count($randevuSay); ?> </label><br>
                <label style="font-weight: bolder; font-size: larger">Randevusuz Sayısı: </label>
                <label style="color: red; font-weight: bolder; font-size: larger"><?= count($randevusuz); ?> </label><br>
                <label style="font-weight: bolder; font-size: larger">Randevulu Anamnezler Toplamı ₺: </label>
                <label style="color: red; font-weight: bolder; font-size: larger"><?= $rliAnaTop[0] ."₺"; ?> </label><br>
                <label style="font-weight: bolder; font-size: larger">Randevulu Anamnezler Toplamı $: </label>
                <label style="color: red; font-weight: bolder; font-size: larger"><?= $rliAnaTop[1] ."$"; ?> </label><br>
                <label style="font-weight: bolder; font-size: larger">Randevulu Anamnezler Toplamı €: </label>
                <label style="color: red; font-weight: bolder; font-size: larger"><?= $rliAnaTop[2] ."€"; ?> </label><br>
                <label style="font-weight: bolder; font-size: larger">Randevulu Anamnezler Toplamı £: </label>
                <label style="color: red; font-weight: bolder; font-size: larger"><?= $rliAnaTop[3] ."£"; ?> </label><br>
                <label style="font-weight: bolder; font-size: larger"> -------------------------------------------------------------------- </label><br>
                <label style="font-weight: bolder; font-size: larger">Randevusuz Anamnezler Toplamı ₺: </label>
                <label style="color: red; font-weight: bolder; font-size: larger"><?= $rsizAnaTop[0] ."₺"; ?> </label><br>
                <label style="font-weight: bolder; font-size: larger">Randevusuz Anamnezler Toplamı $: </label>
                <label style="color: red; font-weight: bolder; font-size: larger"><?= $rsizAnaTop[1] ."$"; ?> </label><br>
                <label style="font-weight: bolder; font-size: larger">Randevusuz Anamnezler Toplamı €: </label>
                <label style="color: red; font-weight: bolder; font-size: larger"><?= $rsizAnaTop[2] ."€"; ?> </label><br>
                <label style="font-weight: bolder; font-size: larger">Randevusuz Anamnezler Toplamı £: </label>
                <label style="color: red; font-weight: bolder; font-size: larger"><?= $rsizAnaTop[3] ."£"; ?> </label><br>
            </div><!-- .widget-body -->
        </div>
    </div>
</div>