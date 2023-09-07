<?php
$newUser=new Users();
?>
<?php $this->start('head');?>
<?php $this->setSiteTitle('How It Works | Broombids');?>
<style type="text/css">
    .animate-ball .ball
    {
        background: #2cc1d64f !important;
    }
  
</style>
<?php $this->end();?>

<?php $this->start('body');?>
<section class="page-banner">
    <div class="container">
        <div class="page-title-wrapper">
            <h1 class="page-title">HOW IT WORKS</h1>
            <ul class="bradcurmed">
                <li><a href="<?=PROOT?>" rel="noopener noreferrer">Home</a></li>
                <li>Vendor</li>
            </ul>
        </div>
    </div>
    
    <ul class="animate-ball">
        <li class="ball"></li>
        <li class="ball"></li>
        <li class="ball"></li>
        <li class="ball"></li>
        <li class="ball"></li>
    </ul>
</section>

<section class="featured-four-ab" style="padding-top: 50px;">
    <div class="container">
        <div class="section-title text-center">
            <h3 class="sub-title wow pixFadeUp">VENDOR</h3>
            <h2 class="title wow pixFadeUp" data-wow-delay="0.3s">Ακολουθήστε αυτήν την εύκολη διαδικασία για να χρησιμοποιήσετε το broombids ως προμηθευτές.</h2>
        </div>
        <div class="row justify-content-center">
           
            <div class="col-lg-4 col-md-6">
                <div class="saaspik-icon-box-wrapper style-four wow pixFadeLeft" data-wow-delay="0.6s" style="height: 600px;">
                    <div class="saaspik-icon-box-icon"><center> <img src="<?=PROOT?>images/w_login.svg" alt="" style="width: 40%; margin-top: -45px;" /></center></div>
                    <div class="pixsass-icon-box-content">
                        <h3 class="pixsass-icon-box-title" style="text-align: center;"><a href="javascript:void(0);">Δημιουργήστε τον λογαριασμό σας</a></h3>
                        <ul>
                            <li>Εγγραφείτε δωρεάν για να δημιουργήσετε τον λογαριασμό σας. </li>
                            <li>Ορίστε τα στοιχεία της εταιρείας σας.</li>
                            <li>Επιλέξτε από τη βάση δεδομένων τα οχήματα που θέλετε να νοικιάσετε.</li>
                            <li>Ελέγξτε για αιτήματα ενοικίασης.</li>
                        </ul>
                        
                    </div>
                    
                </div>
            </div>
             <div class="col-lg-4 col-md-6">
                <div class="saaspik-icon-box-wrapper style-four wow pixFadeLeft" data-wow-delay="0.5s" style="height: 600px;">
                    <div class="saaspik-icon-box-icon"><center> <img src="<?=PROOT?>images/w_content.svg" alt="" style="width: 40%; margin-top: -45px;" /></center></div>
                    <div class="pixsass-icon-box-content">
                        <h3 class="pixsass-icon-box-title" style="text-align: center;"><a href="javascript:void(0);">Κάντε μια προσφορά</a></h3>
                        <ul>
                            <li>Ελέγξτε τα αιτήματα και δημοσιεύστε την Προσφορά σας.</li>
                            <li>Επιστρέφετε συχνά για να δείτε τι προσφέρουν οι άλλοι και τροποποιήστε την προσφορά σας .</li>
                            <li>Ορίστε την τελική σας προσφορά και περιμένετε.</li>                           
                        </ul>
                        
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="saaspik-icon-box-wrapper style-four wow pixFadeLeft" data-wow-delay="0.9s" style="height: 600px;">
                    <div class="saaspik-icon-box-icon">
                       <center> <img src="<?=PROOT?>images/w_support.svg" alt="" style="width: 40%; margin-top: -45px;" /></center>
                    </div>
                    <div class="pixsass-icon-box-content">
                        <h3 class="pixsass-icon-box-title" style="text-align: center;"><a href="javascript:void(0);">Η συμφωνία έκλεισε</a></h3>
                        <ul>
                            <li>Λάβετε το επιβεβαιωτικό e-mail.</li>
                            <li>Ολοκληρώστε όλες τις απαιτούμενες λεπτομέρειες.</li>
                            <li>Ελάτε σε επαφή με τον νέο σας πελάτη.</li>
                        </ul>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>




<?php $this->end();?>

