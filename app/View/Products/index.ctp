<!DOCTYPE html>
<html>
<head>
    <?php echo $this->element('head'); ?>
    <?php echo $this->Html->css('style'); ?>
    <?php echo $this->Html->script('bootstrap.min'); ?>
    <?php echo $this->Html->script('script'); ?>
</head>

<body>
    <div class="master-wrapper">
        <header id="header">
            <div class="darker-row">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-ms-8 col-md-8 menu-left">
                            <ul>
                                <li style="margin-left: -60px;"><a href="/"><i class="fa fa-home fa-2x"></i></a></li>
                                <li><a href="">Laptop</a></li>
                                <li><a href="">Smarphone</a></li>
                                <li><a href="">Ipad</a></li>
                            </ul>
                        </div>
                        <div class="col-xs-12 col-ms-4 col-md-4 menu-right">
                            <div class="higher-line">                                
                                <?php
                                    if(isset($current_user)){
                                        echo 'Chào Mừng!&nbsp;&nbsp;<a href="/admin"><span class="username">' . $current_user['username'] . '</span></a>&nbsp; ';
                                        echo '<span class="user"></a><a href="/register" target="_blank" role="button" data-toggle="modal"> Đăng ký &nbsp;</a>hoặc &nbsp;<a href="/logout" target="_blank" role="button" data-toggle="modal"> Đăng xuất </a></span>';
                                    }else{
                                        echo '<span class="user"><a href="/login" role="button" data-toggle="modal">Đăng nhập &nbsp;</a> hoặc &nbsp;<a href="/register" target="_blank" role="button" data-toggle="modal"> Đăng ký </a></span>';
                                    }
                                ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-ms-7 col-md-7 logo">
                        <a class="brand" href="">
                            <?php echo $this->Html->image('/img/huythai.jpg', array('alt'=>'thaihuy.vip', 'class' =>'img_logo')); ?>
                            <span class="pacifico">ThaiHuy.vip</span>
                            <span class="tagline">Website bán hàng cực chất</span>
                        </a> 

                    </div>
                    <div class="col-xs-12 col-ms-5 col-md-5">
                        <div class="top-right">
                            <div class="icons">
                                <a href="" target="_blank"><span style="font-size: 30px;" class="fa fa-facebook-square"></span></a>&nbsp;&nbsp;
                                <a href="" target="_blank"><span style="font-size: 30px;" class="fa fa-google-plus-square"></span></a>&nbsp;&nbsp;
                                <a href="" target="_blank" ><span style="font-size: 30px;" class="fa fa-youtube"></span></a>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </header>
        <div class="container">
            <div class="boxed-area blocks-spacer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-titles lined">
                                <h2 class="title">Hiện thị sản phẩm</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row popup-products blocks-spacer">
                        <?php foreach($products as $product) {
                        echo '<div class="col-md-4">
                            <div class="product">
                                <div class="product-inner">
                                    <div class="product-img">
                                        <div class="picture">
                                            <a href="#">
                                                <img width="310px" height="250px" src="'.$product["Product"]["image"].'"/>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="main-titles no-margin">
                                        <h4 class="title">Giá:&nbsp;&nbsp;<em style="text-decoration: line-through; color: gray; font-size: 16px;">'.number_format($product["Product"]["amount"]).'</em>&nbsp;&nbsp;<span style="color: #fc9a1c;">'.number_format($product["Product"]["amount"]*90/100) . '&nbsp;đ </span></h4>
                                        <h5 style="min-height: 20px; max-height: 20px;" class="no-margin">
                                            <a href="#"> '. $product["Product"]["product_name"] .'</a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>';
                        }                        
                        ?>
                    </div>
                    <div class="container">
                        <ul class="pagination">
                            <?php
                                $this->Paginator->options(array("update" => "#content",
                                "before" =>$this->Js->get("#spinner")->effect("fadeIn", array("buffer" => false)),
                                "complete" => $this->Js->get("#spinner")->effect("fadeOut", array("buffer" => false)),'evalScripts' => true,));

                                echo "<li>" .$this->Paginator->prev('« Previous ', null, null, array('class' => 'disabled'))."</li>" ;
                                echo "<li>".$this->Paginator->numbers(array("separator" => ""))."</li> "; 
                                echo "<li>" .$this->Paginator->next(' Next »', null, null, array('class' => 'disabled')). "</li>";                            
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>  
    </div>
    <footer class="main-footer">
        <div class="container">
            <div class="pull-right hidden-xs">
              <b>Version</b> 2.4.0
            </div>
            <strong>Copyright &copy; 2014-2016 <a href="https://runsystem.vn">My team Gmo</a>.</strong> All rights
            reserved.
        </div>
    </footer>
    
    
    
</body>
</html>

