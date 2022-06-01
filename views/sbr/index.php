<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Carousel;
/* @var $this yii\web\View */

$this->title = 'SBR - Sri Lanka';
?>
<?php
//$images=['<img src="/img/slider/desert.jpg"/>','<img src="/img/slider/slider1.jpg"/>','<img src="/img/slider/slider2.jpg"/>'];
//echo yii\bootstrap\Carousel::widget(['items'=>$images]);

?>


<!-- <div class="container-fluid"> -->
    <!-- <div class="row"> -->
        <!-- <div class="col-md-1"></div> -->
        <!-- <div class="col-md-12"> -->


            <!-- <div id="xx" class="carousel icons-box"> -->

<div class="carousel">

    <div class="carousel-inner">
        <!-- <div class="container-caro"> -->
                <?=
                Carousel::widget([
                    'items' => [
                        // the item contains only the image
                        ['content' => '<img src="img/slider/slider11.jpg"/>',
                            'caption' => '',],
                        '<img src="img/slider/slider12.jpg"/>',
                        '<img src="img/slider/slider13.jpg"/>',]
                ]);
                ?>
</div>
</div>
         <!-- </div> -->
        <!-- </div> -->
    <!-- </div> -->
<!-- </div> -->
		
        
    <div class="row">
	<div class="container-caro">
        		<div class="col-md-4">
          			<div class="icons-box">
						<i class="ico-ok circle big"></i>
						<div class="title"><h3 class="font-alt">SBR</h3></div>
                                            	<legend></legend>
                                                <p class="font-para">
                                                   Statistical Business Registry (SBR) aims to improve total quality of the economic data by enhancing industrial and trade related information gathering around the country where as establishing it as a centralized national Business registry with all the commercial and legal implementations is the long term goal. The system is equipped with three main features, Gathering Establishment level information, linking available information with external records and sample selection. Distributed data collection sub-system is transfer data from data originating points to main system
						</p>
						<div class="clear"></div>
					</div>
        		</div>

        		<div class="col-md-4">
          			<div class="icons-box">
						<i class="ico-ipad circle big"></i>
						<div class="title"><h3 class="font-alt">Census</h3></div>
                        <legend></legend>
						<p class="font-para">
The Economic Census is a primary source of the basic statistics, on the nature, structure and performance of the economic activities undertaken within the country’s territory. This operation resulted a frame of economic units in the country, which has been used as the bench mark data for establishing a Statistical Business Register. The services sector has emerged with the rapid development of the country. Hence the needs of planners, policy makers and researchers for data on services and trade sectors have increased significantly
						</p>
						<div class="clear"></div>
					</div>
        		</div>

        		<div class="col-md-4">
          			<div class="icons-box">
						<i class="ico-heart circle big"></i>
						<div class="title"><h3 class="font-alt">Survey</h3></div>
                        <legend></legend>
						<p class="font-para">
Annual survey of industries (ASI) is carried out based on SBR. The scope of this ASI is all the activities categorised under the three industry divisions, namely Mining and Quarrying, Manufacturing and Electricity, Gas and Water of the International Standard Industrial Classification of the United Nations. State owned industrial establishments, industries coming within the perview of Board of Investment (BOI) and private sector establishments with 5 or more persons engaged, have been covered in this survey
						</p>
						<div class="clear"></div>
					</div>
        		</div>
</div>
      		</div>
