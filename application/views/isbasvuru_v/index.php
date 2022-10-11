<!doctype html>
<html lang="tr">
<head>
    <!-- Character set configuration -->
    <meta charset="UTF-8">
    <title>Genel iş Başvuru Formu - Ezine Gıda İhtisas Organize Sanayi Bölgesi</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="index, follow"/>
    <meta name="description" content="Genel iş Başvuru Formu - Ezine Gıda İhtisas Organize Sanayi Bölgesi"/>
    <link rel="shortcut icon" type="image/x-icon" href="<?php base_url('basvuru_assets/') ?>favicons/favicon.ico">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('basvuru_assets/'); ?>favicons/favicon.ico">
    <!-- Viewport configuration, scaling options -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- CSS Stylesheet -->
    <link href="<?php echo base_url('basvuru_assets/'); ?>css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url('basvuru_assets/'); ?>css/job.css" rel="stylesheet">
    <!-- Font Awesome icon -->
    <link href="<?php echo base_url('basvuru_assets/'); ?>css/font-awesome.min.css" rel="stylesheet">
    <!-- Google web font  -->
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,500,700|Roboto:300,400,500" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="back">
<div id="lsf">
    <!-- Signup Begin -->
    <div class="hero">
        <div class="container">
            <div>
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
                        <h3 class="account">Ezine Gıda İhtisas Organize Sanayi Bölgesi Genel İş Başvuru Formu</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <!-- Container Begin-->
    <div class="container">
        <div>
            <!-- Row Begin-->
            <div class="row">
                <div class="col-xs-12 col-md-2 col-sm-2 col-lg-2"></div>
                <div class="col-xs-12 col-md-8 col-sm-8 col-lg-8">
                    <form id="testform" action="<?= base_url('Web/basvuruAl') ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group form-bottom">
                                    <input type="text" name="fname" maxlength="20" class="form-control"
                                           placeholder="Adınız" required>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group form-bottom">
                                    <input type="text" name="lname" maxlength="20" class="form-control"
                                           placeholder="Soyadınız" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-bottom">
                            <input maxlength="150" type="text" name="address" class="form-control" placeholder="Adres"
                                   required>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group form-bottom">
                                    <input type="text" name="state" class="form-control" placeholder="İl"
                                           required>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group form-bottom">
                                    <input type="text" name="city" class="form-control"
                                           placeholder="İlçe" required>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group form-bottom">
                                    <input type="date" name="dob" class="form-control"
                                           placeholder="Doğum tarihiniz (Gün/Ay/Yıl)" required>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group form-bottom">
                                    <select class="form-control pad-left" name="company" required>
                                        <option value="-1"> ‪Başvuru Yapacağınız Firma</option>
                                        <option value="AHMET YUNUS SEVİM - BAŞAK TİCARET"> AHMET YUNUS SEVİM - BAŞAK
                                            TİCARET
                                        </option>
                                        <option value="AKPINAR SÜT ÜRN. SAN. VE TİC. LTD. ŞTİ."> AKPINAR SÜT ÜRN. SAN.
                                            VE TİC. LTD. ŞTİ.
                                        </option>
                                        <option value="ALTINKILIÇ GIDA VE SÜT SAN. TİC. A.Ş."> ALTINKILIÇ GIDA VE SÜT
                                            SAN. TİC. A.Ş.
                                        </option>
                                        <option value="ASA KAHRAMANLAR SAN. TİC. LTD. ŞTİ."> ASA KAHRAMANLAR SAN. TİC.
                                            LTD. ŞTİ.
                                        </option>
                                        <option value="AY NAR GIDA TARIM HAY. SAN. TİC. LTD.ŞTİ."> AY NAR GIDA TARIM
                                            HAY. SAN. TİC. LTD.ŞTİ.
                                        </option>
                                        <option value="AYDIN SÜT MAMÜLLERİ VE GIDA TİC. LTD.ŞTİ."> AYDIN SÜT MAMÜLLERİ
                                            VE GIDA TİC. LTD.ŞTİ.
                                        </option>
                                        <option value="BAHRİ YANMAZ TAŞ. İNŞ. AKAR. NAKİL ARAÇ. VE OTO PAZ. VE TİC. LTD. ŞTİ.">
                                            BAHRİ YANMAZ TAŞ. İNŞ. AKAR. NAKİL ARAÇ. VE OTO PAZ. VE TİC. LTD. ŞTİ.
                                        </option>
                                        <option value="BAREKS GIDA LTD.ŞTİ."> BAREKS GIDA LTD.ŞTİ.</option>
                                        <option value="BERTİZ TURİZM VE OTELCİLİK TİC. LTD.ŞTİ."> BERTİZ TURİZM VE
                                            OTELCİLİK TİC. LTD.ŞTİ.
                                        </option>
                                        <option value="BOBAJOY GIDA SAN. VE TİC. A.Ş."> BOBAJOY GIDA SAN. VE TİC. A.Ş.
                                        </option>
                                        <option value="CEMAİM SÜT VE SÜT ÜRÜNLERİ SAN. TİC. LTD.ŞTİ."> CEMAİM SÜT VE SÜT
                                            ÜRÜNLERİ SAN. TİC. LTD.ŞTİ.
                                        </option>
                                        <option value="CİBUS GIDA DAĞITIM PAZ. TİC.LTD.ŞTİ."> CİBUS GIDA DAĞITIM PAZ.
                                            TİC.LTD.ŞTİ.
                                        </option>
                                        <option value="CORVUS TARIM GIDA TEKSTİL ŞARAP SAN. VE TİC. A.Ş."> CORVUS TARIM
                                            GIDA TEKSTİL ŞARAP SAN. VE TİC. A.Ş.
                                        </option>
                                        <option value="ÇALAPVERDİ GIDA İTH. İHR. VE TİC. LTD.ŞTİ."> ÇALAPVERDİ GIDA İTH.
                                            İHR. VE TİC. LTD.ŞTİ.
                                        </option>
                                        <option value="ÇANAKKALE ALTIN TARIM HAY. SOĞUK DEPO SAN. TİC. LTD. ŞTİ.">
                                            ÇANAKKALE ALTIN TARIM HAY. SOĞUK DEPO SAN. TİC. LTD. ŞTİ.
                                        </option>
                                        <option value="ÇANAKKALE İLİ ARI YETİŞTİRİCİLERİ BİRLİĞİ TİC. İŞL."> ÇANAKKALE
                                            İLİ ARI YETİŞTİRİCİLERİ BİRLİĞİ TİC. İŞL.
                                        </option>
                                        <option value="ÇEVİKLER SÜT MAMÜLLERİ GIDA SAN. TİC. LTD. ŞTİ."> ÇEVİKLER SÜT
                                            MAMÜLLERİ GIDA SAN. TİC. LTD. ŞTİ.
                                        </option>
                                        <option value="DARDANEL ÖNENTAŞ GIDA SAN. A.Ş."> DARDANEL ÖNENTAŞ GIDA SAN.
                                            A.Ş.
                                        </option>
                                        <option value="DEMİRAL GIDA ÜRÜNLERİ SAN. VE DIŞ TİC. A.Ş."> DEMİRAL GIDA
                                            ÜRÜNLERİ SAN. VE DIŞ TİC. A.Ş.
                                        </option>
                                        <option value="DELİCE NEM GIDA TARIM HAYV. TUR. SAN. TİC. LTD. ŞTİ."> DELİCE NEM
                                            GIDA TARIM HAYV. TUR. SAN. TİC. LTD. ŞTİ.
                                        </option>
                                        <option value="ELENOR GIDA ÜRETİM VE TİC. LTD.ŞTİ."> ELENOR GIDA ÜRETİM VE TİC.
                                            LTD.ŞTİ.
                                        </option>
                                        <option value="ENV ENERJİ ÇEVRE YÖN. VE TEK. SAN. VE TİC. LTD.ŞTİ."> ENV ENERJİ
                                            ÇEVRE YÖN. VE TEK. SAN. VE TİC. LTD.ŞTİ.
                                        </option>
                                        <option value="ERCİKEK BİSKÜVİ GIDA SAN. VE TİC. LTD.ŞTİ."> ERCİKEK BİSKÜVİ GIDA
                                            SAN. VE TİC. LTD.ŞTİ.
                                        </option>
                                        <option value="FOODSTREAM SEBZE MEYVE VE SOĞUK HAVA DEPOLARI A.Ş."> FOODSTREAM
                                            SEBZE MEYVE VE SOĞUK HAVA DEPOLARI A.Ş.
                                        </option>
                                        <option value="GÜLSÜM ÜSTÜN - ÇANAKKALE PAZARI YUFKACISI"> GÜLSÜM ÜSTÜN -
                                            ÇANAKKALE PAZARI YUFKACISI
                                        </option>
                                        <option value="GÜNDOĞDULAR GIDA SAN. TUR. TİC. LTD.ŞTİ."> GÜNDOĞDULAR GIDA SAN.
                                            TUR. TİC. LTD.ŞTİ.
                                        </option>
                                        <option value="IŞIK GIDA İHT. MAD. ÜRT. VE PAZ. LTD.ŞTİ."> IŞIK GIDA İHT. MAD.
                                            ÜRT. VE PAZ. LTD.ŞTİ.
                                        </option>
                                        <option value="İLYADA ZEYTİNYAĞI SABUN VE NAKLİYAT SAN. TİC. LTD. ŞTİ."> İLYADA
                                            ZEYTİNYAĞI SABUN VE NAKLİYAT SAN. TİC. LTD. ŞTİ.
                                        </option>
                                        <option value="İMBA TUR. YAT. İNŞ. LTD.ŞTİ."> İMBA TUR. YAT. İNŞ. LTD.ŞTİ.
                                        </option>
                                        <option value="KALEGIDA SAN. TİC. A.Ş."> KALEGIDA SAN. TİC. A.Ş.</option>
                                        <option value="KARMA PET EVCİL HAYVAN YEM VE GIDA SAN. TİC. LTD.ŞTİ."> KARMA PET
                                            EVCİL HAYVAN YEM VE GIDA SAN. TİC. LTD.ŞTİ.
                                        </option>
                                        <option value="MALKARA BİRLİK SÜT VE SÜT MAM. A.Ş."> MALKARA BİRLİK SÜT VE SÜT
                                            MAM. A.Ş.
                                        </option>
                                        <option value="MK DANIŞMANLIK EĞİTİM TIBBİ ÜRÜNLER LTD.ŞTİ."> MK DANIŞMANLIK
                                            EĞİTİM TIBBİ ÜRÜNLER LTD.ŞTİ.
                                        </option>
                                        <option value="MUTİ GIDA SAN. PAZ. VE TİC. A.Ş."> MUTİ GIDA SAN. PAZ. VE TİC.
                                            A.Ş.
                                        </option>
                                        <option value="MERSİN ELEKTRİK ÜRETİM VE ENERJİ YATIRIMLARI A.Ş."> MERSİN
                                            ELEKTRİK ÜRETİM VE ENERJİ YATIRIMLARI A.Ş.
                                        </option>
                                        <option value="MUSTAFA SELİM DEDEOĞLU"> MUSTAFA SELİM DEDEOĞLU</option>
                                        <option value="MESO GIDA VE TARIM TİC. SAN. LTD. ŞTİ."> MESO GIDA VE TARIM TİC.
                                            SAN. LTD. ŞTİ.
                                        </option>
                                        <option value="NAZMİ TOK - EKREMOĞLU MANDIRA VE PAZARLAMA"> NAZMİ TOK -
                                            EKREMOĞLU MANDIRA VE PAZARLAMA
                                        </option>
                                        <option value="ÖZ ENEZ BALIKÇILIK TARIM GIDA HAYVANCILIK TAŞ. İTH. İHR. TİC. LTD.ŞTİ.">
                                            ÖZ ENEZ BALIKÇILIK TARIM GIDA HAYVANCILIK TAŞ. İTH. İHR. TİC. LTD.ŞTİ.
                                        </option>
                                        <option value="PEYZADE SÜT ÜRÜNLERİ GIDA İNŞ. TUR. NAK. SAN. TİC. LTD. ŞTİ.">
                                            PEYZADE SÜT ÜRÜNLERİ GIDA İNŞ. TUR. NAK. SAN. TİC. LTD. ŞTİ.
                                        </option>
                                        <option value="RA ALAKAŞLAR SÜT VE SÜT ÜRÜNLERİ GIDA SAN. VE TİC. LTD.ŞTİ."> RA
                                            ALAKAŞLAR SÜT VE SÜT ÜRÜNLERİ GIDA SAN. VE TİC. LTD.ŞTİ.
                                        </option>
                                        <option value="SEZİDA GIDA VE TARIM ÜRÜNLERİ İTH. İHR. SAN. TİC.LTD.ŞTİ.">
                                            SEZİDA GIDA VE TARIM ÜRÜNLERİ İTH. İHR. SAN. TİC.LTD.ŞTİ.
                                        </option>
                                        <option value="SİNAN ERDOĞAN TURİZM ZEYTİNCİLİK SAN. VE TİC. LTD.ŞTİ."> SİNAN
                                            ERDOĞAN TURİZM ZEYTİNCİLİK SAN. VE TİC. LTD.ŞTİ.
                                        </option>
                                        <option value="ŞEN GÖREN SÜT ÜRÜNLERİ - ALİ ŞENGÖREN"> ŞEN GÖREN SÜT ÜRÜNLERİ -
                                            ALİ ŞENGÖREN
                                        </option>
                                        <option value="TROİANAS GIDA SANAYİ VE TİCARET A.Ş."> TROİANAS GIDA SANAYİ VE
                                            TİCARET A.Ş.
                                        </option>
                                        <option value="TROYA PETFOOD EVCİL HAYVAN YEM TİC.LTD.ŞTİ."> TROYA PETFOOD EVCİL
                                            HAYVAN YEM TİC.LTD.ŞTİ.
                                        </option>
                                        <option value="TROYİDA GIDA SAN. VE TİC. A.Ş."> TROYİDA GIDA SAN. VE TİC. A.Ş.
                                        </option>
                                        <option value="UYSAL PETROL İNŞAAT TURİZM TAŞIMACILIK GIDA SAN. VE TİC. LTD.ŞTİ.">
                                            UYSAL PETROL İNŞAAT TURİZM TAŞIMACILIK GIDA SAN. VE TİC. LTD.ŞTİ.
                                        </option>
                                        <option value="YELKEN EZİNE ÇİFTLİĞİ SÜT VE SÜT ÜRÜNLERİ A.Ş."> YELKEN EZİNE
                                            ÇİFTLİĞİ SÜT VE SÜT ÜRÜNLERİ A.Ş.
                                        </option>
                                        <option value="YELKEN GIDA İNŞAAT TURİZM SAN. VE TİC. LTD. ŞTİ."> YELKEN GIDA
                                            İNŞAAT TURİZM SAN. VE TİC. LTD. ŞTİ.
                                        </option>
                                        <option value="YENİCE MEYVE TİCARET LTD.ŞTİ."> YENİCE MEYVE TİCARET LTD.ŞTİ.
                                        </option>
                                        <option value="YZH GIDA TARIM HAYVANCILIK İNŞAAT A.Ş."> YZH GIDA TARIM
                                            HAYVANCILIK İNŞAAT A.Ş.
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group form-bottom">
                                    <input type="text" name="title" class="form-control"
                                           placeholder="Mesleğiniz" required>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group form-bottom">
                                    <select class="form-control pad-left" name="occupation" required>
                                        <option> Eğitim Durumunuz</option>
                                        <option value="Doktora"> Doktora</option>
                                        <option value="Yüksek Lisans"> Yüksek Lisans</option>
                                        <option value="Üniversite (Lisans)"> Üniversite (Lisans)</option>
                                        <option value="Ön Lisans"> Ön Lisans</option>
                                        <option value="Lise"> Lise</option>
                                        <option value="İlk Öğretim"> İlk Öğretim</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group form-bottom">
                                    <input type="email" name="email" class="form-control"
                                           placeholder="Email" required>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group form-bottom">
                                    <input type="text" name="phone" class="form-control"
                                           placeholder="Telefon No" required>
                                </div>
                            </div>
                            <div class="row">
                            </div>
                            <div class="col-xs-6">
                                <p class="pull-right"><b>* Lütfen Cv' nizi Yükleyin</b></p>
                                <small class="text-danger pull-right">Lütfen sadece PDF dosya yükleyiniz.</small>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group form-bottom">
                                    <input class="form-control form-control-sm" id="img_url" name="img_url" type="file" required>
                                </div>
                            </div>


                            <div class="checkbox form-bottom">
                                <label>
                                    <input type="checkbox" name="confirmation" id="confirmation" required>
                                    İş başvuru formunda ki tüm bilgiler tarafımdan doldurulmuştur ve doğrudur.
                                    Başvurumun değerlendirilmesi amacıyla bildirdiğim referanslardan hakkımda yapılacak
                                    araştırmalar için şirketinize yetki veriyorum. İş görüşmesi esnasında veya öncesinde
                                    referans olarak beyan ettiğim şahısların iletişim bilgilerinin, tarafımla yapılan iş
                                    görüşmesine istinaden referans sorgusu için firmanız tarafından kullanılması
                                    konusunda şahısları 6698 sayılı KVKK gereğince bilgilendirdiğimi ve açık rızalarını
                                    aldığımı beyan ediyorum.</label>
                            </div>
                            <hr>
                            <div class="text-center">
                                <button type="submit" class="btn btn-default hvr-float-shadow">
                                    Başvuru Yap
                                </button>
                            </div>
                        </div>
                    </form>
                    <center>
                        <p class="msg-1 msg-2-bg"></p>
                    </center>
                </div>
                <div class="col-xs-12 col-md-2 col-sm-2 col-lg-2"></div>
            </div>
            <!-- Row End-->
        </div>
    </div>
    <!-- Container End -->
    <div class="space-50"></div>
</div>
<!-- jQuery JavaScript plugins -->
<script src="<?php echo base_url('basvuru_assets/'); ?>js/jquery.min.js" type="text/javascript"></script>
<!-- Bootstrap JavaScript plugins -->
<script src="<?php echo base_url('basvuru_assets/'); ?>js/bootstrap.min.js" type="text/javascript"></script>
<!-- BootstrapValidator JS -->
<script src="<?php echo base_url('basvuru_assets/'); ?>js/bootstrapValidator.min.js"></script>
</body>
</html>
