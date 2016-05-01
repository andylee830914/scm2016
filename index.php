<?php
$string = file_get_contents("webdata.json");
$data = json_decode($string, true);
$begindate = date_create($data['info']['begin-date']);
$begindate1 = date_format($begindate, 'Y/m/d');
$enddate = date_create($data['info']['end-date']);
$enddate1 = date_format($enddate, 'Y/m/d');
$timeplace = $begindate1.'~'.$enddate1.' @ '.$data['info']['place'];

//control the schedule day
$interval=date_diff($begindate, $enddate);
$interval=$interval->days;
$today=date_create('');
$nowdate = date_diff($today, $begindate);
$daycount=$nowdate->days;
if ($daycount>=0 && $daycount<$interval) {
    $daycount;
}else{
    $daycount="";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $data['info']['short-title'];?></title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/agency.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/earlyaccess/cwtexyen.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <style>
    .abstract{
        font-size:16px;
        text-align: justify;
        text-indent : 2em ;
    }
    li.my-social-buttons {
        margin-bottom: 0 ;
    }

    li.my-social-buttons p{
        line-height:40px;
        height: 40px;
        width: 255px;
        margin-left: 10px;
        margin-right: 10px;
        float:left;
        font-size: 15px;
    }


    li.my-social-buttons a {
        float:left;
        display: block;
        background-color: #222;
        height: 40px;
        width: 40px;
        margin-left: 15px;
        border-radius: 100%;
        font-size: 20px;
        line-height: 40px;
        color: #fff;
        outline: 0;
        -webkit-transition: all .3s;
        -moz-transition: all .3s;
        transition: all .3s
    }

    li.my-social-buttons  a:hover, li.my-social-buttons a:focus, li.my-social-buttons a:active {
        background-color: #fed136
    }
</style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top"><?php echo $data['info']['short-title'];?></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#news">最新消息</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#speaker">邀請講員</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#schedule<?php echo $daycount;?>">大會議程</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">關於會議</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#team">聯絡我們</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">報名</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-heading"><?php echo $data['info']['title'];?></div>
                <div class="intro-lead-in"><?php echo $timeplace;?></div>
                <a href="#contact" class="page-scroll btn btn-xl">立即報名</a>
            </div>
        </div>
    </header>

    <!-- Services Section -->
    <section id="news">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">最新消息</h2>
                    <h3 class="section-subheading text-muted">News</h3>
                </div>
            </div>
            <div class="row">
                <?php
                $reversed = array_reverse($data['news']);
                foreach ($reversed as $key => $value) {
                ?>

                <div class="media">
                    <div class="media-left">
                            <span class="fa-stack fa-2x">
                                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                <i class="fa fa-info fa-stack-1x fa-inverse"></i>
                            </span>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $value['date'];?></h4>
                        <?php echo $value['content'];?>
                    </div>
                </div>
                <?php }?>
                <!--<div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">E-Commerce</h4>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-laptop fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Responsive Design</h4>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-lock fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Web Security</h4>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                </div>-->
            </div>
        </div>
    </section>

    <!-- talk  Section -->
    <section id="speaker" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">邀請講員</h2>
                    <h3 class="section-subheading text-muted">Invited Speakers</h3>
                </div>
            </div>
            <div class="row">

            </div>
        </div>
    </section>
    <!-- Schedule Section -->
    <section id="schedule">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">大會議程</h2>
                    <h3 class="section-subheading text-muted">Schedule</h3>
                </div>
            </div>
            <div class="row text-center">
                <?php foreach ($data['schedule'] as $key => $value) {?>
                <div class="col-md-3" id="schedule<?php echo $key;?>">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-calendar fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Day <?php echo $key+1;?></h4>
                    <div class="list-group">
                        <?php foreach ($value as $key1 => $value1) {
                            if (!is_null($value1['talkid'])) {
                        ?>
                        <a href="#portfolioModal<?php echo $value1['talkid'];?>" class="portfolio-link list-group-item" data-toggle="modal">
                            <h4 class="list-group-item-heading"><?php echo $value1['time'];?></h4>
                            <p class="list-group-item-text"><?php echo $value1['content'];?></p>
                        </a>

                        <?php }else{?>
                        <a href="#schedule" class="list-group-item">
                            <h4 class="list-group-item-heading"><?php echo $value1['time'];?></h4>
                            <p class="list-group-item-text"><?php echo $value1['content'];?></p>
                        </a>
                        <?php }?>
                        <?php }?>



                    </div>
                </div>
                <?php }?>


            </div>
        </div>
    </section>
    <!-- Abstract Section -->
    <section id="portfolio" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">會議摘要</h2>
                    <h3 class="section-subheading text-muted">Meeting Abstracts</h3>
                </div>
            </div>
            <div class="row">
                <?php foreach ($data['talk'] as $key => $value) {?>

                <div class="col-md-3 col-sm-4 portfolio-item">
                    <a href="#portfolioModal<?php echo $key;?>" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-book fa-3x"></i>
                            </div>
                        </div>
                        <img data-src="holder.js/100px260?theme=gray&text=<?php echo $value['title'];?> \n  \n <?php echo $value['speaker'];?>" class="img-responsive" alt="">
                    </a>
                </div>
                <?php }?>
            </div>
        </div>
    </section>
    <!-- About Section -->
    <section id="about" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">關於會議</h2>
                    <h3 class="section-subheading text-muted">About</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p class="abstract">兩岸數學界的交流從上個世紀末就開始。因語言文化上並無障礙，雙方較容易進行深入之研討，開啟共同的研究合作計畫。而且大陸離台灣近，兩邊學者也有較高意願參加對方的會議。</p>
                    <p class="abstract">最早是淡江大學和北京大學輪辦的「海峽兩岸數學研討會」。1995年在淡江大學舉辦第一屆，1998年在北京大學辦第二屆，2000年又回淡江大學，…，2007年淡江辦完後，2009在北大，去年再回淡江。</p>
                    <p class="abstract">接著是「海峽兩岸統計及概率研討會」，由高雄中山大學在1996年創辦第一屆，第二屆於1999年在蘇州大學舉行，之後改成每兩年辦一次，2010年在成功大學舉辦第七屆會議。</p>
                    <p class="abstract">另外「海峽兩岸圖論與組合學研討會」於2001年在昆明辦第一屆，2002年在中央研究院開第二屆，2005年第三屆在金華浙江師範大學，2007年第四屆在台灣大學，2009年由天津南開大學辦第五屆會議，去年則由交通大學主辦第六屆。</p>
                    <p class="abstract">計算數學方面，1996年中國計算學會理事長石鐘慈院士來中山大學訪問，並參加中興大學在蕙蓀林場主辦的國內計算數學會議，會中石院士提出是否輪辦「兩岸計算數學研討會」的議題，但因有人反對遂無疾而終。此一議題兩岸蹉跎了14年，很高興2010年廈門大學終於開辦了第一屆的會議，
                        會中決議由中山大學主辦第二屆，在2016年，則由成功大學舉辦第四屆兩岸計算數學研討會。</p>
                    <p class="abstract">此次大會齊聚台灣和大陸的計算專家於成功大學，增進雙方人員的瞭解，交換彼此的研究心得，提供大家相互交流切磋的機會，加強兩岸人員未來的合作與整合，開發可能合作的研究課題。期能刺激新的數學模型與數值方法，促進跨領域的合作研究，拓展出計算方法更廣泛的應用。</p>

                </div>
                <!--<div class="col-lg-12">
                    <ul class="timeline">
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="img/about/1.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>2009-2011</h4>
                                    <h4 class="subheading">Our Humble Beginnings</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="img/about/2.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>March 2011</h4>
                                    <h4 class="subheading">An Agency is Born</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="img/about/3.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>December 2012</h4>
                                    <h4 class="subheading">Transition to Full Service</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="img/about/4.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>July 2014</h4>
                                    <h4 class="subheading">Phase Two Expansion</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <h4>Be Part
                                    <br>Of Our
                                    <br>Story!</h4>
                            </div>
                        </li>
                    </ul>
                </div>-->
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section id="team" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">聯絡我們</h2>
                    <h3 class="section-subheading text-muted">Contact us</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="team-member">
                        <!--<img src="" class="img-responsive img-circle" alt="">-->
                        <span class="fa-stack fa-4x">
                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                            <i class="fa fa-user fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4>廖士綱 先生</h4>
                        <p class="text-muted">國立成功大學數學系</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-6">
                    <div class="team-member">
                        <ul class="list-unstyled">
                            <li class="my-social-buttons"><a href="tel:+88662757575"><i class="fa fa-phone"></i></a><p>06-2757575 轉 65156 轉 415</p></li>
                            <li class="my-social-buttons"><a href="mailto:l18021010@mail.ncku.edu.tw"><i class="fa fa-envelope"></i></a><p>l18021010@mail.ncku.edu.tw</p></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Clients Aside -->
    <aside class="clients">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <a href="http://web.ncku.edu.tw/bin/home.php">
                        <img src="img/logos/ncku.png" class="img-responsive img-centered" alt="">
                    </a>
                </div>
            </div>
        </div>
    </aside>

    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">報名</h2>
                    <h3 class="section-subheading text-muted">On-line Registration</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="Your Phone *" id="phone" required data-validation-required-message="Please enter your phone number.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Your Message *" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; 國立成功大學數學系 2016</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">Privacy Policy</a>
                        </li>
                        <li><a href="#">Terms of Use</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- Portfolio Modals -->
    <!-- Use the modals below to showcase details about your portfolio projects! -->

    <!-- Portfolio Modal 1 -->
    <?php foreach ($data['talk'] as $key => $value) {?>

    <div class="portfolio-modal modal fade" id="portfolioModal<?php echo $key;?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <!-- Project Details Go Here -->
                            <h2><?php echo $value['title'];?></h2>
                            <h4 class="item-intro text-muted"><?php echo $value['speaker'];?></h4>
                            <?php
                                $abstract = explode("\n", $value['abstract']);
                                foreach ($abstract as $akey => $avalue) {
                            ?>
                            <p class="abstract"><?php echo $avalue;?></p>
                            <?php
                                }
                            ?>

                            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Abstract</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php }?>


    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/holder.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/agency.js"></script>

</body>

</html>
