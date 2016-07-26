<?php
$string = file_get_contents("webdata.json");
$data = json_decode($string, true);
$begindate = date_create($data['info']['begin_date']);
$begindate1 = date_format($begindate, 'Y/m/d');
$enddate = date_create($data['info']['end_date']);
$enddate1 = date_format($enddate, 'Y/m/d');
$timeplace = $begindate1.'~'.$enddate1.' @ '.$data['info']['place'];

//control the schedule day
$interval=date_diff($begindate, $enddate);
$interval=(int)$interval->format("%r%a");
$today=date_create('');
$nowdate = date_diff($begindate,$today);
$daycount=(int)$nowdate->format("%r%a");
if ($daycount>=0 && $daycount<=$interval) {
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
    <meta name="format-detection" content="telephone=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $data['info']['short_title'];?></title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/agency.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/earlyaccess/cwtexyen.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/earlyaccess/cwtexhei.css" rel="stylesheet" type="text/css">    
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/blueimp-gallery.min.css">
    <link rel="stylesheet" href="css/bootstrap-image-gallery.min.css">
    <style>
    .abstract{
        font-size:16px;
        text-align: justify;
        text-indent : 2em ;
    }
    .en-heading{
        font-size:25px;
        font-family: Montserrat, "Helvetica Neue", Helvetica, Arial, sans-serif;

     
    }
    .media-body{
        font-size:18px;
    }

    ul{
        font-size:16px;
    }
    .form-group{
        color: white;
        font-size: 20px;
        line-height: 25px;
    }
    .speaker{
        font-size: 16px;
    }
    .myphoto{
        height: 150px;
        clear:left;
    }
    .bg-dark-gray{
        background-color:#f2f2f2
    }
    .mythumb{
        display:inline-block;
        position:relative;
        width:100px;
        height:100px;
        text-align : center;
        line-height : 100px;
        overflow:hidden;
    }
    .mythumb img{
        float: center;
        line-height: 100px;
        text-align: center;
        width:auto;
        height:100%;
        vertical-align : middle;
    }
    #links {
        padding-left: 20px;
        padding-right: 20px;
    }
    @media (max-width: 768px) {
        .mythumb{
            width:100px;
            height: 100px;
        }
        .mythumb img{
            line-height: 100px;
        }
        #links {
            padding-left: 5px;
            padding-right: 5px;
        }
    }
    li.my-social-buttons {
        margin-bottom: 0 ;
    }

    li.my-social-buttons p{
        line-height:40px;
        height: 40px;
        width: calc(100% - 50px);
        margin-left: 10px;
        float:left;

        font-size: 15px;
    }


    li.my-social-buttons a {
        clear:left;
        float:left;
        display: block;
        background-color: #222;
        height: 40px;
        width: 40px;
        margin: 0px;
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
    aside h2.section-heading {
        font-size: 40px;
        margin-top: 50px;
        margin-bottom: 15px
    }
    aside h3.section-subheading {
        font-size: 16px;
        font-family: "Droid Serif", "Helvetica Neue", Helvetica, Arial, sans-serif;
        text-transform: none;
        font-style: italic;
        font-weight: 400;
        margin-bottom: 20px
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
    <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-use-bootstrap-modal="false">
        <!-- The container for the modal slides -->
        <div class="slides"></div>
        <!-- Controls for the borderless lightbox -->
        <h3 class="title"></h3>
        <a class="prev">‹</a>
        <a class="next">›</a>
        <a class="close">×</a>
        <a class="play-pause"></a>
        <ol class="indicator"></ol>
        <!-- The modal dialog, which will be used to wrap the lightbox content -->
        <div class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body next"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left prev">
                            <i class="glyphicon glyphicon-chevron-left"></i>
                            Previous
                        </button>
                        <button type="button" class="btn btn-primary next">
                            Next
                            <i class="glyphicon glyphicon-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                <a class="navbar-brand page-scroll" href="#page-top"><?php echo $data['info']['short_title'];?></a>
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
                        <a class="page-scroll" href="#transport">交通住宿</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#gallery">活動相簿</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#team">聯絡我們</a>
                    </li>
                    <!--<li>
                        <a class="page-scroll" href="#contact">報名</a>
                    </li>-->
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
                <div class="intro-heading"><?php echo $data['info']['title'];?>
                    <div class="en-heading"><?php echo $data['info']['en_title'];?></div>
                </div>
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
                <?php $total=count($data['cn_speaker']);?>
                <?php $i=0;$nowcolumn=0;?>
                <?php foreach ($data['cn_speaker'] as $key => $value) {?>
                <?php if ($i==0) { ?>
                <div class="col-md-3 speaker">
                <?php }?>
                    <ul>

                        <li>
                            <dl class="list-unstyled" style="height:55px">
                                <dt><?php echo $value['cname'];?> <?php echo $value['ename'];?></dt>
                                <dd><?php echo $value['affiliation'];?></dd>

                            </dl>
                        </li>
                    </ul>
                    <?php $i++;?>
                    <?php if ($i==ceil($total/2)  ) {
                        $i=0;
                        $nowcolumn++;
                    ?>
                </div>
                <?php }elseif($i==floor($total/2) && $nowcolumn==1 ){?>
                </div>

                <?php }?>
                <?php }?>
                <?php $total=count($data['tw_speaker']);?>
                <?php $i=0;$nowcolumn=0;?>
                <?php foreach ($data['tw_speaker'] as $key => $value) {?>
                <?php if ($i==0) {?>
                <div class="col-md-3 speaker">
                <?php }?>
                    <ul>

                        <li>
                            <dl class="list-unstyled" style="height:55px">
                                <dt><?php echo $value['cname'];?></dt>
                                <dd><?php echo $value['affiliation'];?></dd>

                            </dl>
                        </li>
                    </ul>
                    <?php $i++;?>
                    <?php if ($i==ceil($total/2)) {
                        $i=0;
                    ?>
                </div>
                <?php }elseif($i==floor($total/2) && $nowcolumn==1 ){?>
                </div>

                <?php }?>
                <?php }?>

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
            <h4>會議地點</h4>
                <div class="btn-group btn-group-lg" role="group">
                    <button type="button" class="btn btn-default">數學系館 3174</button>
                </div>
                
            </div>
            <br>
            <br>
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
                    <p class="abstract">兩岸雖然有政治上的差異，但是學術上的交流卻是從未停過。由於我們擁有相同的語言文化，極容易合作且共同研究同一主題。而且近來在兩岸的開放之下，兩岸的學者也願意互訪參加對方的會議。
</p>
                    <p class="abstract">在計算數學方面，起源於中國計算學會理事長石鐘慈院士於1996年來中山大學訪問時。他參加中興大學在蕙蓀林場主辦的國內計算數學會議，並於會中提出是否輪辦「兩岸計算數學研討會」的議題。當時因有人反對遂無疾而終。而此一議題兩岸蹉跎了14年，在2010年很高興由廈門大學終於開辦了第一屆的會議。接著由中山大學在2012年主辦第二屆，以及湘潭大學在2014年主辦第三屆。今年由成功大學主辦。
</p>
                    <p class="abstract">這是兩岸計算數學界兩年一次的大會。會中齊聚臺灣和大陸的計算專家。除了增進雙方人員的瞭解，交換彼此的研究心得，提供大家相互交流切磋的機會外，將加強兩岸人員未來的合作與整合。希望能夠開發可能合作的研究課題。並刺激新的數學模型與數值方法，促進跨領域的合作研究，拓展出計算數學更廣泛的應用。本次研討會將針對計算數學下列幾個重要領域的研究工作交流和討論：
</p>
                    <ul>
                        <li>數值微分方程與數值動態系統</li>
                        <li>數值線性代數與線性最佳化控制</li>
                        <li>非線性問題之數值解</li>
                        <li>計算流體力學</li>


                    </ul>
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

    <section id="transport"  class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">交通</h2>
                    <h3 class="section-subheading text-muted">Transportation</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-1">
                    <span class="fa-stack fa-3x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-car fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
                <div class="col-lg-11">
                    <h2>開車</h2>
                    <p style="font-size:16px;">
                        南下：<br>沿國道一號南下 → 下永康交流道右轉 → 沿中正北路、中正南路(南向)往臺南市區直行 → 中華路左轉 → 沿中華東路前進 → 於小東路口右轉，直走即可抵達本校。
<br>【自國道三號南下者，轉國道8號（西向），可接國道一號（南向）】
                    </p>
                    <p style="font-size:16px;">
                        北上：<br>沿國道一號北上 → 下仁德交流道左轉 → 沿東門路(西向)往臺南市區直走 → 遇林森路或長榮路右轉(北向)，即可抵達本校。
<br>【自國道三號北上者，轉86號快速道路（西向），可接國道一號（北向）】
                    </p>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-1">
                    <span class="fa-stack fa-3x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-train fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
                <div class="col-lg-11">
                    <h2>高鐵</h2>
                    <p style="font-size:16px;">
                        搭乘臺灣高鐵抵臺南站者，可至高鐵臺南站二樓轉乘通廊或一樓大廳1號出口前往臺鐵沙崙站搭乘臺鐵區間車前往臺南火車站，約30分鐘一班車，20分鐘可到達臺南火車站；成功大學自臺南火車站後站步行即可到達。
                    </p>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-1">
                    <span class="fa-stack fa-3x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-plane fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
                <div class="col-lg-11">
                    <h2>機場</h2>
                    <p style="font-size:16px;">
                        高雄國際航空站（KHH）：<br>
                        在高雄國際航空站搭乘高雄捷運-由高雄國際機場站（R4）到高雄車站（R11）下車，至高雄火車站轉乘火車到臺南。
                        <br>於臺南站下車後，自後站出口（大學路），大學路左側即為本校光復校區，再往前直走即為數學系所在之成功校區。
                    </p>
                    <p style="font-size:16px;">
                        臺灣桃園國際機場（TPE）：<br>
                        在臺灣桃園國際機場搭乘計程車或接駁巴士到達臺灣高鐵桃園站。
                        <br>在臺灣高鐵桃園站搭乘高鐵到臺灣高鐵臺南站，至高鐵臺南站二樓轉乘通廊或一樓大廳1號出口前往臺鐵沙崙站搭乘臺鐵區間車前往臺南火車站，約30分鐘一班車，20分鐘可到達臺南火車站；成功大學自臺南火車站後站步行即可到達。

                    </p>

                </div>

            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading"></h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">住宿</h2>
                    <h3 class="section-subheading text-muted">Accommodations</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-1">
                    <span class="fa-stack fa-3x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-hotel fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
                <div class="col-lg-11">
                    <h2>天下大飯店</h2>
                    <p style="font-size:16px;">
                        70443台南市北區成功路202號
                        <br>電話：<a href="tel:+88662290271">886-6-2290271</a>
                        <br>網址：<a target="_blank" href="http://www.laplaza.com.tw">http://www.laplaza.com.tw</a>
                    </p>

                </div>

            </div>

            <div class="row">
                <div class="col-lg-1">
                    <span class="fa-stack fa-3x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-hotel fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
                <div class="col-lg-11">
                    <h2>成大會館</h2>
                    <p style="font-size:16px;">
                        701台南市東區大學路2號
                        <br>電話：<a href="tel:+88662758999">886-6-275-8999</a>
                        <br>網址：<a target="_blank" href="http://www.zendasuites.com.tw">http://www.zendasuites.com.tw</a>
                        
                    </p>

                </div>

            </div>

        </div>

    </section>
    <section id="gallery" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">活動相簿</h2>
                    <h3 class="section-subheading text-muted">Gallery</h3>
                </div>
            </div>
            <?php for($i =1 ; $i <=1 ; $i++){?>
            <div class="row">
                <h3>Day <?php echo $i ;?></h3>
                <div id="links">
                <?php ?>
                    <?php foreach (glob("img/gallery/day".$i."/{*_tn.jpg,*_tn.JPG}", GLOB_BRACE) as $filename) {?>
                    <?php $filename1=explode("/", $filename);?>
                    <?php $filename1=explode(".", $filename1[3]);?>
                    <?php $filename1=str_replace("_tn","",$filename1[0]);?>                    
                    <?php $filename2=str_replace("_tn","",$filename);?>
                    
                        <a href="<?php echo $filename2;?>" title="<?php echo $filename1;?>" data-gallery class="mythumb">
                            <img src="<?php echo $filename;?>" alt="<?php echo $filename1;?>">
                        </a>
                    <?php } ?>
                <?php ?>
                </div>
            </div>
            <?php } ?>
            

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
                <?php foreach ($data['contact'] as $key => $value) {?>
                <div class="col-sm-3">
                    <div class="team-member">
                        <?php
                            $size=count($value['photo']);
                            $int=rand(0,$size-1);
                        ?>
                        <?php if($size>0){?>
                            <img src="././img/team/<?php echo $value['photo'][$int];?> " class="img-responsive img-circle myphoto" alt="">
                        <?php }else{?>
                        <span class="fa-stack fa-5x" >
                            <i class="fa fa-circle fa-stack-2x text-primary" ></i>
                            <i class="fa fa-user fa-stack-1x fa-inverse"></i>
                        </span>
                        <div style="font-size:0;height:10px;"></div>
                        <?php }?>
                        <h4><?php echo $value['name'];?></h4>
                        <p class="text-muted"><?php echo $value['affiliation'];?></p>
                        <div class="team-member">
                            <ul class="list-unstyled">
                                <li class="my-social-buttons"><a href="tel:<?php echo $value['phone_href'];?>"><i class="fa fa-phone"></i></a><p><?php echo $value['phone_show'];?></p></li>
                                <li class="my-social-buttons"><a href="mailto:<?php echo $value['email'];?>"><i class="fa fa-envelope"></i></a><p><?php echo $value['email'];?></p></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </section>

    <!-- Clients Aside -->
    <aside class="clients">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">贊助單位</h2>
                    <h3 class="section-subheading text-muted">Sponsors</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <a target="_blank" href="http://web.ncku.edu.tw/bin/home.php">
                        <img src="img/logos/ncku.png" class="img-responsive img-centered" alt="">
                    </a>
                </div>
                <div class="col-md-3 col-sm-6">
                    <a target="_blank" href="http://proj1.sinica.edu.tw/~mrpcwww/">
                        <img src="img/logos/mrpc.jpeg" class="img-responsive img-centered" alt="">
                    </a>
                </div>
                <div class="col-md-3 col-sm-6">
                    <a target="_blank" href="http://www.twsiam.org/index.php/zh-tw/">
                        <img src="img/logos/twsiam_log.png" class="img-responsive img-centered" alt="">
                    </a>
                </div>
                <div class="col-md-3 col-sm-6">
                    <a target="_blank" href="http://www.cts.nthu.edu.tw/main.php">
                        <img src="img/logos/ncts2.png" class="img-responsive img-centered" alt="">
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
            <div class="alert alert-warning" role="alert">
                <ul>
                    <li>註冊費 1000元（含手冊，提袋，晚宴）</li>
                </ul>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="col-lg-12 text-center">
                                    <h4 class="section-heading">基本資料</h4>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" required data-validation-required-message="Please select your title." id="title" name="title">
                                        <option disabled>職稱 Title</option>
                                        <option>Prof.</option>
                                        <option>Dr.</option>
                                        <option>Mr.</option>
                                        <option>Mrs.</option>
                                        <option>Student</option>
                                    </select>
                                    <p class="help-block text-danger"></p>

                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="姓名 (Last name, First name) *" id="name" name="name" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="服務單位 (Affiliation) *" id="affiliation" name="affiliation" required data-validation-required-message="Please enter your affiliation.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="電子郵件 (Email) *" id="email" name="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="電話 (Primary Phone/ Mobile Phone) *" id="phone" name="phone" required data-validation-required-message="Please enter your phone number.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-lg-12 text-center">
                                    <h4 class="section-heading">用餐調查</h4>

                                </div>
                                <div class="form-group">
                                    <label for="meal" class="col-sm-4 control-label">葷素</label>
                                    <label class="radio-inline">
                                        <input type="radio" name="meal" id="inlineRadio1" value="nonvege" required> 葷
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="meal" id="inlineRadio2" value="vegetarian" required> 素
                                    </label>
                                    <p class="help-block text-danger"></p>

                                </div>

                                <div class="form-group">
                                    <label for="meald1" class="col-sm-4 control-label">7/25 午餐</label>
                                    <label class="radio-inline">
                                        <input type="radio" name="meald1" id="inlineRadio1" value="yes" required> 是
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="meald1" id="inlineRadio2" value="no" required> 否
                                    </label>
                                    <p class="help-block text-danger"></p>

                                </div>
                                <div class="form-group">
                                    <label for="meald2" class="col-sm-4 control-label">7/26 午餐</label>
                                    <label class="radio-inline">
                                        <input type="radio" name="meald2" id="inlineRadio1" value="yes" required> 是
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="meald2" id="inlineRadio2" value="no" required> 否
                                    </label>
                                    <p class="help-block text-danger"></p>

                                </div>
                                <div class="form-group">
                                    <label for="meald3" class="col-sm-4 control-label">7/27 午餐</label>
                                    <label class="radio-inline">
                                        <input type="radio" name="meald3" id="inlineRadio1" value="yes" required> 是
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="meald3" id="inlineRadio2" value="no" required> 否
                                    </label>
                                    <p class="help-block text-danger"></p>

                                </div>
                                <div class="col-lg-12 text-center">
                                    <h4 class="section-heading">代訂住宿</h4>

                                </div>
                                <div class="form-group">
                                    <label for="room1" class="col-sm-4 control-label">7/25</label>
                                    <label class="radio-inline">
                                        <input type="radio" name="room1" id="inlineRadio1" value="yes" required> 是
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="room1" id="inlineRadio2" value="no" required> 否
                                    </label>
                                    <p class="help-block text-danger"></p>

                                </div>
                                <div class="form-group">
                                    <label for="room2" class="col-sm-4 control-label">7/26</label>
                                    <label class="radio-inline">
                                        <input type="radio" name="room2" id="inlineRadio1" value="yes" required> 是
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="room2" id="inlineRadio2" value="no" required> 否
                                    </label>
                                    <p class="help-block text-danger"></p>

                                </div>
                                <div class="form-group">
                                    <label for="room3" class="col-sm-4 control-label">7/27</label>
                                    <label class="radio-inline">
                                        <input type="radio" name="room3" id="inlineRadio1" value="yes" required> 是
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="room3" id="inlineRadio2" value="no" required> 否
                                    </label>
                                    <p class="help-block text-danger"></p>

                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl" disabled="disabled">報名已截止</button>
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
                    <span class="copyright">Copyright &copy; <a target="_blank" href="http://www.math.ncku.edu.tw">國立成功大學數學系</a> 2016</span>
                </div>
                <!--<div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>-->
                <!--<div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">Privacy Policy</a>
                        </li>
                        <li><a href="#">Terms of Use</a>
                        </li>
                    </ul>
                </div>-->
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
                            <h3><?php echo $value['title'];?></h3>
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
    <script src="js/timetable.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/agency.js"></script>

    <script src="js/jquery.blueimp-gallery.min.js"></script>
    <script src="js/bootstrap-image-gallery.min.js"></script>

    <script>
    $('#image-gallery-button').on('click', function (event) {
        event.preventDefault()
        blueimp.Gallery($('#links a'), $('#blueimp-gallery').data())
    })
    </script>

</body>

</html>
