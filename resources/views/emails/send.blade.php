<html>
<head></head>
<body style="background: black; color: white">
<style>
    /*
P.S: if you like my content maybe you will become a donator and donate some money? That helps me to create new awesome materials. https://www.paypal.me/melnik909
*/

/*
* core styles
*/
.lienket:hover {
    
    color:white !important;
}
.sm-link{
	--uismLinkDisplay: var(--smLinkDisplay, inline-flex);	
	--uismLinkTextColor: var(--smLinkTextColor);
	--uismLinkTextColorHover: var(--smLinkTextColorHover);	
	
	display: var(--uismLinkDisplay);
	color: var(--uismLinkTextColor);
	position: relative;
	overflow: hidden;
}

a.sm-link{
	text-decoration: none;
}

.sm-link__label{
  display: block;
}

/* sm-link_padding-all */ 

.sm-link_padding-all{
	--uismLinkLineWeight: var(--smLinkLineWeight, 2px);
	--uismLinkLineColor: var(--smLinkLineColor, #ffffff);
	--uismLinkPadding: var(--smLinkPadding, 0px);
	
	padding: var(--uismLinkPadding);
}

.sm-link_padding-all::before, 
.sm-link_padding-all::after{
  width: 100%;
  height: var(--uismLinkLineWeight);
  left: 0;
}

.sm-link_padding-all::before{
  top: 0;
}

.sm-link_padding-all::after{
  bottom: 0;
}

.sm-link_padding-all .sm-link__label::before,
.sm-link_padding-all .sm-link__label::after{
  width: var(--uismLinkLineWeight);
  height: 100%;
  top: 0;
}

.sm-link_padding-all .sm-link__label::before{
  left: 0;
}

.sm-link_padding-all .sm-link__label::after{
  right: 0;
}

.sm-link_padding-all::before,
.sm-link_padding-all::after,
.sm-link_padding-all .sm-link__label::before,
.sm-link_padding-all .sm-link__label::after{
  content: "";     
	background-color: var(--uismLinkLineColor);
  position: absolute; 
	opacity: 0;
	    will-change: transform, opacity;
    color:#fff;
	transition-property: transform, opacity;
}

.sm-link_padding-all:hover::before,
.sm-link_padding-all:hover::after,
.sm-link_padding-all:hover .sm-link__label::before,
.sm-link_padding-all:hover .sm-link__label::after{
	opacity: 1;
}

/* sm-link_padding-bottom */ 

.sm-link_padding-bottom{
	--uismLinkLineWeight: var(--smLinkLineWeight, 2px);
	--uismLinkLineColor: var(--smLinkLineColor, #ffffff);	
	
	padding-bottom: var(--uismLinkLineWeight);	
	position: relative;
}

.sm-link_padding-bottom::after{
  content: "";
  width: 100%;
  height: var(--uismLinkLineWeight);
	background-color: var(--uismLinkLineColor);
	
  position: absolute;
  left: 0;
  bottom: 0;
}

/* sm-link_bg */ 

.sm-link_bg {
	--uismLinkLineColor: var(--smLinkLineColor, #ffffff);	
	--uismLinkTextColorHover: var(--smLinkTextColorHover, #ffffff);	
	--uismLinkPadding: var(--smLinkPadding, 5px);
	
	padding: var(--uismLinkPadding);
	transition: color .3s ease-out;
}

.sm-link_bg::before, 
.sm-link_bg::after{
  content: "";
	background-color: var(--uismLinkLineColor);	
  opacity: 0;
  position: absolute;
	
	transition: transform .2s ease-out, opacity .2s ease-out .03s;
}

.sm-link_bg .sm-link__label{
  position: relative;
  z-index: 2;
}

.sm-link_bg:hover::before, 
.sm-link_bg:hover::after{
  opacity: 1;
	transition-duration: .35s, .35s;
	transition-delay: 0s, 0s;
}

.sm-link_bg:hover{
	color: var(--uismLinkTextColorHover);
}

/* sm-link_text */ 

.sm-link_text::before{
  content: attr(data-sm-link-text);
	color: var(--uismLinkTextColorHover);
  position: absolute;
}

.sm-link_text::before, 
.sm-link_text .sm-link__label{
  transition-property: transform;
	transition-timing-function: cubic-bezier(.86, .6, .08, 1.01); 
	transition-duration: .3s;
}

.sm-link_text:hover::before,
.sm-link_text:hover .sm-link__label{
	transition-duration: .4s;
}

/* effect 1 */

.sm-link1::before{
  transform: translate3d(-105%, 0, 0);
}

.sm-link1::after{
  transform: translate3d(105%, 0, 0);
}

.sm-link1 .sm-link__label::before{
  transform: translate3d(0%, -100%, 0);
}

.sm-link1 .sm-link__label::after{
  transform: translate3d(0%, 100%, 0);
}

.sm-link1::before,
.sm-link1::after,
.sm-link1 .sm-link__label::before,
.sm-link1 .sm-link__label::after{
	transition-timing-function: ease-out;
	transition-duration: .2s, .15s;
	transition-delay: 0s, .15s;
}

.sm-link1:hover::before,
.sm-link1:hover::after,
.sm-link1:hover .sm-link__label::before,
.sm-link1:hover .sm-link__label::after{
  transform: translate3d(0, 0, 0);
	opacity: 1;
	
	transition-duration: .25s;
	transition-delay: 0s;
}

/* effect 2 */

.sm-link2::before{
	top: 0;
  transform: rotateY(90deg);
	transition-duration: .3s;
}

.sm-link2 .sm-link__label{
  transform: rotateY(0);
	transition-delay: .3s;
	transition-duration: .3s;
}

.sm-link2:hover::before{
  transform: rotateY(0deg);
	transition-delay: .3s;
}

.sm-link2:hover .sm-link__label{
  transform: rotateY(90deg);  
	transition-delay: 0s;
	transition-duration: .3s;
}

/* effect 3 */

.sm-link3::after{
  transform: translate3d(-100%, 0, 0);
  transition: transform .2s ease-in;
}

.sm-link3:hover::after{
  transform: translate3d(0, 0, 0);
}

/* effect 4 */

.sm-link4::after{
  opacity: 0;
  transform: translate3d(0, 100%, 0);
  transition: transform .3s ease-out, opacity .3s ease-out;
}

.sm-link4:hover::after{
  opacity: 1;
  transform: translate3d(0, 0, 0);
}

/* effect 5 */

.sm-link5::before,
.sm-link5::after,
.sm-link5 .sm-link__label::before,
.sm-link5 .sm-link__label::after{
	transition-timing-function: ease-out;
	transition-duration: .2s, .15s;
	transition-delay: 0s, .15s;	
}

.sm-link5::before{
  transform: translate3d(-100%, 0, 0);
}

.sm-link5::after{
  transform: translate3d(100%, 0, 0);
}

.sm-link5 .sm-link__label::before{
  transform: translate3d(0, 100%, 0);
}

.sm-link5 .sm-link__label::after{
  transform: translate3d(0, -100%, 0);
}

.sm-link5:hover::before,
.sm-link5:hover::after,
.sm-link5:hover .sm-link__label::before,
.sm-link5:hover .sm-link__label::after{
  transform: translate3d(0, 0, 0);
	transition-delay: 0s;	
}

/* effect 6 */

.sm-link6::before,
.sm-link6::after, 
.sm-link6 .sm-link__label::before,
.sm-link6 .sm-link__label::after{
  transition-duration: .2s;
  transition-timing-function: ease-out;
}

.sm-link6::before, 
.sm-link6::after{
  width: 100%;
  height: var(--uismLinkLineWeight);
  left: 0;
}

.sm-link6 .sm-link__label::before,
.sm-link6 .sm-link__label::after{
  width: var(--uismLinkLineWeight);
  height: 100%;
  top: 0;
}

.sm-link6::before{
  top: 0;
  transform: translate3d(-105%, 0, 0);
}

.sm-link6::after{
  bottom: 0;
  transform: translate3d(105%, 0, 0);
}

.sm-link6 .sm-link__label::before{
  left: 0;
  transform: translate3d(0, 105%, 0);
}

.sm-link6 .sm-link__label::after{
  right: 0;
  transform: translate3d(0, -105%, 0);
}

.sm-link6:hover::before,
.sm-link6:hover::after,
.sm-link6:hover .sm-link__label::before,
.sm-link6:hover .sm-link__label::after{
  transform: translate3d(0, 0, 0);
}

.sm-link6:hover::before{
  transition-delay: 0s;
}

.sm-link6 .sm-link__label::after,
.sm-link6:hover::after{
  transition-delay: .25s;
}

.sm-link6::after,
.sm-link6:hover .sm-link__label::after{
  transition-delay: .15s;
}

.sm-link6::before,
.sm-link6:hover .sm-link__label::before{
  transition-delay: .35s;
}

/* effect 7 */

.sm-link7::before{
  left: 0;
  top: 0;
  transform: translate3d(-110%, 0, 0);
}

.sm-link7 .sm-link__label,
.sm-link7:hover::before{
  transform: translate3d(0, 0, 0);
}

.sm-link7:hover .sm-link__label{
  transform: translate3d(110%, 0, 0);	
}

/* effect 8 */

.sm-link8::before{
  left: 0;
  top: 0;
  transform: translate3d(0, 140%, 0);
}

.sm-link8 .sm-link__label,
.sm-link8:hover::before{
	transform: translate3d(0, 0, 0);
}

.sm-link8:hover .sm-link__label{
  transform: translate3d(0, -140%, 0);	
}

/* effect 9 */

.sm-link9::before,
.sm-link9::after{
  width: 50%;
  height: 100%;
  top: 0;
}

.sm-link9::before{
  left: 0;
  transform: translate3d(-100%, 0, 0);
}

.sm-link9::after{
  right: 0;
  transform: translate3d(100%, 0, 0);
}

.sm-link9:hover::before,
.sm-link9:hover::after{
  transform: translate3d(0, 0, 0);  
}

/* effect 10 */

.sm-link10::before,
.sm-link10::after{
  width: 100%;
  height: 50%;
  left: 0;
}

.sm-link10::before{
  top: 0;
  transform: translate3d(0, -50%, 0);
}

.sm-link10::after{
  bottom: 0;
  transform: translate3d(0, 50%, 0);
}

.sm-link10:hover::before,
.sm-link10:hover::after{
  transform: translate3d(0, 0, 0);
}

/* effect 11 */

.sm-link11::before,
.sm-link11::after{
  width: 51%;
  height: 100%;
  transform: rotate(360deg);
  top: 0;
}

.sm-link11::before{
  left: 0;
}

.sm-link11::after{
  right: 0;
}

.sm-link11:hover::before,
.sm-link11:hover::after{
  transform: rotate(0);
}

/* effect 12 */

.sm-link12::before,
.sm-link12::after{
  width: 51%;
  height: 100%;
  top: 0; 
}

.sm-link12::before{
  left: 0;
  transform: translate3d(-100%, 0, 0) rotate(-45deg);
}

.sm-link12::after{
  right: 0;
  transform: translate3d(100%, 0, 0) rotate(-45deg);
}

.sm-link12:hover::before, 
.sm-link12:hover::after{
  transform: translate3d(0, 0, 0);
}

/*
SETTINGS
*/

.sm-link{
	--smLinkPadding: 10px 15px;
	--smLinkLineWeight: 5px;
	--smLinkLineColor: #ffffff;
	--smLinkTextColor: #ffffff;
	--smLinkTextColorHover: #ffffff;
}

.sm-link_bg{
	--smLinkTextColorHover: #ffffff;
}


.logoImg {
    width: 120px !important;
    height: 60px !important;
}


h3.h3{text-align:center;margin:1em;text-transform:capitalize;font-size:1.7em;}


/********************* Shopping Demo-4 **********************/
.product-grid4,.product-grid4 .product-image4{position:relative}
.product-grid4{padding:5px;font-family:Poppins,sans-serif;text-align:center;border-radius:5px;overflow:hidden;z-index:1;transition:all .3s ease 0s}
.product-grid4:hover{box-shadow:0 0 10px rgba(0,0,0,.2)}
.product-grid4 .product-image4 a{display:block}
.product-grid4 .product-image4 img{width:100%;height:auto}
.product-grid4 .pic-1{opacity:1;transition:all .5s ease-out 0s}
.product-grid4:hover .pic-1{opacity:1}
.product-grid4 .social{width:180px;padding:0;margin:0 auto;list-style:none;position:absolute;right:0;left:0;top:50%;transform:translateY(-50%);transition:all .3s ease 0s}
.product-grid4 .social li{display:inline-block;opacity:0;transition:all .7s}
.product-grid4 .social li:nth-child(1){transition-delay:.15s}
.product-grid4 .social li:nth-child(2){transition-delay:.3s}
.product-grid4 .social li:nth-child(3){transition-delay:.45s}
.product-grid4:hover .social li{opacity:1}
.product-grid4 .social li a{color:#222;background:#fff;font-size:17px;line-height:36px;width:40px;height:36px;border-radius:2px;margin:0 5px;display:block;transition:all .3s ease 0s}
.product-grid4 .social li a:hover{color:#fff;background:#000}
.product-grid4 .social li a:after,.product-grid4 .social li a:before{content:attr(data-tip);color:#fff;background-color:#000;font-size:12px;line-height:20px;border-radius:3px;padding:0 5px;white-space:nowrap;opacity:0;transform:translateX(-50%);position:absolute;left:50%;top:-30px}
.product-grid4 .social li a:after{content:'';height:15px;width:15px;border-radius:0;transform:translateX(-50%) rotate(45deg);top:-22px;z-index:-1}
.product-grid4 .social li a:hover:after,.product-grid4 .social li a:hover:before{opacity:1}
.product-grid4 .product-discount-label,.product-grid4 .product-new-label{color:#fff;background-color:#000;font-size:13px;font-weight:800;text-transform:uppercase;line-height:45px;height:45px;width:45px;border-radius:50%;position:absolute;left:10px;top:15px;transition:all .3s}
.product-grid4 .product-discount-label{left:auto;right:10px;background-color:#d7292a}
.product-grid4:hover .product-new-label{opacity:0}
.product-grid4 .product-content{padding:25px}
.product-grid4 .title{font-size:15px;font-weight:400;text-transform:capitalize;margin:0 0 7px;transition:all .3s ease 0s}
.product-grid4 .title a{color:#222}
.product-grid4 .title a:hover{color:#000}
.product-grid4 .price{color:#000;font-size:17px;font-weight:700;margin:0 2px 15px 0;display:block}
.product-grid4 .price span{color:#909090;font-size:13px;font-weight:400;letter-spacing:0;text-decoration:line-through;text-align:left;vertical-align:middle;display:inline-block}
.product-grid4 .add-to-cart{border:1px solid #e5e5e5;display:inline-block;padding:10px 20px;color:#888;font-weight:600;font-size:14px;border-radius:4px;transition:all .3s}
.product-grid4:hover .add-to-cart{border:1px solid transparent;background:#000;color:#fff}
.product-grid4 .add-to-cart:hover{background-color:#505050;box-shadow:0 0 10px rgba(0,0,0,.5)}
@media only screen and (max-width:990px){.product-grid4{margin-bottom:30px}
}


/*-------------------------------------------------------------------------------------------------------------------------------*/
/* 01 - FONTS USAGE */
/*-------------------------------------------------------------------------------------------------------------------------------*/
body{font-family: 'Raleway', sans-serif;}


/*-------------------------------------------------------------------------------------------------------------------------------*/
/* 02 - RESET STYLES */
/*-------------------------------------------------------------------------------------------------------------------------------*/
html, body, div, span, applet, object, iframe, h1, h2, h3, h5, h6, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary, time, mark, audio, video {margin: 0; padding: 0; border: 0; vertical-align: baseline;}
 HTML5 display-role reset for older browsers
article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section {display: block;}
blockquote, q {quotes: none;}
blockquote:before, blockquote:after, q:before, q:after {content: ''; content: none;}
blockquote footer:before, blockquote footer:after{display: none;}
body *{-webkit-text-size-adjust:none;}
.clear{clear:both; overflow:hidden; height:0px; font-size:0px; display: block;}
input:focus, select:focus, textarea:focus, button:focus {outline: none;}
input, textarea, select{font-family: 'Raleway', sans-serif; font-weight: 300; border-radius: 0;}
a, a:link, a:visited, a:active, a:hover{cursor: pointer; text-decoration: none; outline: none;}
ul{list-style: none;}
/*body{font-family: 'Raleway', sans-serif; font-weight: 400; font-size: 14px; line-height: 1;}*/


/*-------------------------------------------------------------------------------------------------------------------------------*/
/* 03 - GLOBAL SETTINGS */
/*-------------------------------------------------------------------------------------------------------------------------------*/
/*table*/
.table-view{height: 100%; width: 100%; display: table;}
.row-view{display: table-row;}
.cell-view{display: table-cell; vertical-align: middle; height: inherit;}
/*content block*/
#content-block{position: relative; overflow: hidden;}
/*last child margins*/
/*#content-block *:last-child{margin-bottom: 0;}*/
/*nopadding class*/
.nopadding {padding-left: 0; padding-right: 0; margin-left: 0; margin-right: 0;}
/*content center*/
.content-center, .position-center{max-width: 1310px; margin: 0 auto; background: #fff; padding: 0 70px; position: relative;}
.position-center{background: none;}
.wide-center{max-width: 1760px; margin: 0 auto; padding: 0 30px;}
@media (max-width: 767px) {
    .wide-center{padding: 0 15px;}
}
/*simple block and its title*/
.information-blocks{margin-bottom: 70px;}
#content-block .sidebar-column .information-blocks{margin-bottom: 40px;}
.block-title{font-size: 20px; line-height: 24px; color: #2e2e2e; font-weight: 600; padding-bottom: 15px; border-bottom: 1px #ebebeb solid; margin-bottom: 25px;}
.block-title.size-1{font-size: 16px;}
.block-title.size-2{font-size: 18px;}
.block-title.size-3{font-size: 24px; margin-bottom: -1px;}
.block-title.size-4{font-size: 30px; font-weight: 400; line-height: 30px; margin-bottom: 20px; padding-bottom: 20px;}
/*buttons*/
.button{font-weight: 700; font-size: 12px; line-height: 14px; color: #373737; text-transform: uppercase; text-align: center; padding: 8px 10px; display: inline-block; margin-bottom: 12px; cursor: pointer; min-width: 127px; border: 2px #dadada solid; background: transparent; position: relative;}
.button .fa{margin-right: 5px;}
.button.style-2{background: #f2f2f2; border-color: #f2f2f2;}
.button.style-9{border-color: rgba(255,255,255,0.5);}
.button.style-1:hover, .button.style-9:hover{background: #fff; border: 2px transparent solid;}
.button.style-2:hover{background: #fff;}
.button.style-3{font-size: 12px; line-height: 16px; font-weight: 700; color: #000000; text-transform: uppercase; background: #f0f0f0; display: inline-block; text-align: center; border: 2px #f0f0f0 solid; padding: 10px 5px; min-width: 0;}
.button.style-4{font-size: 12px; line-height: 16px; font-weight: 700; color: #fff; text-transform: uppercase; background: #000000; display: inline-block; text-align: center; border: 2px #000000 solid; padding: 10px 5px; min-width: 0;}
.button.style-3:hover, .button.style-4:hover{background: transparent!important; color: #000000!important;}
.button.style-5{border-color: #fff; background: #fff;}
.button.style-5:hover{background: transparent; border-color: #bfbfbf;}
.button.style-6{border-color: #fff; background: #fff;}
.button.style-6:hover{color: #fff; background: transparent; border-color: #bfbfbf;}
.button.style-7{background: rgba(241, 126, 14, 0.9); border-color: rgba(241, 126, 14, 0.9); color: #fff;}
.button.style-7:hover{background: transparent;}
.button.style-8{background: transparent; color: #fff; border-color: rgba(204, 204, 204, 0.2);}
.button.style-8:hover{border-color: rgba(204, 204, 204, 1);}
.button.style-10, .button.style-12, .button.style-18{font-size: 14px; line-height: 18px; padding: 11px 40px; text-transform: uppercase; font-weight: 700; color: #fff; border: 2px #000000 solid; background: #000000; letter-spacing: 2px;}
.button.style-10:hover, .button.style-12:hover{background: #fff; color: #000000;}
.button.style-11{font-size: 13px; color: #000000; font-weight: 700; text-transform: uppercase; line-height: 18px; padding: 12px 40px; border: 1px #fff solid; background: #fff;}
.button.style-11:hover{color: #808080;}
.button.style-12{border-color: #000000; background: #000000;}
.button.style-14{border-color: #272727; background: #272727; font-size: 12px; color: #fff; font-weight: 600; line-height: 16px; padding: 10px 20px; min-width: 0;}
.button.style-14:hover{background: transparent; color: #272727;}
.button.style-15, .button.style-16, .button.style-15, .button.style-17{border: 1px #e0e0e0 solid; font-size: 12px; font-weight: 700; line-height: 17px; padding: 9px 18px; background: #fff; color: #2e2e2e; min-width: 0;}
.button.style-16, .button.style-15:hover{background: #f0f0f0; border-color: #f0f0f0;}
.button.style-16:hover{background: #fff; border-color: #e0e0e0;}
.button.style-17{border-color: #000000; background: #000000; color: #fff;}
.button.style-17:hover{background: transparent; color: #2e2e2e;}
.button.style-18{background: #f2f2f2; border-color: #f2f2f2; color: #000000;}
.button.style-18:hover{background: transparent;}
.button.style-19{background: #000000; border-color: #000000; color: #fff;}
.button.style-19:hover{background: transparent;}
.button-x{font-size: 12px; line-height: 15px; width: 15px; text-align: center; color: #808080;}
.button-x .fa{display: block; line-height: 15px;}
/*overflow*/
.overflow{overflow-y: auto; -webkit-overflow-scrolling: touch; -moz-overflow-scrolling: touch; -ms-overflow-scrolling: touch;}
/*placeholders*/
::-webkit-input-placeholder { color: #c2c2c2; opacity: 1;}
::-moz-placeholder { color: #c2c2c2; opacity: 1;} /* firefox 19+ */
:-ms-input-placeholder { color: #c2c2c2; opacity: 1;} /* ie */
input:-moz-placeholder { color: #c2c2c2; opacity: 1;}
/*toggle blocks in responsive navigation*/
@media (min-width: 1200px) {
    .responsive-menu-toggle-class{display: none!important;}
}
@media (max-width: 1199px) {
    .responsive-menu-hide-class{display: none!important;}
}
/*list styles*/
.list-type-1{font-size: 13px; line-height: 15px; color: #2e2e2e; font-weight: 500;}
.list-type-1 a{color: #2e2e2e;}
.list-type-1 a:hover{color: #8bab0a;}
.list-type-1 li{padding: 7px 0;}
.list-type-1 li .fa{display: inline-block; color: #806fc0; margin-right: 7px; vertical-align: middle; position: relative; top: -2px;}
ol{list-style: none; counter-reset: number;}
ol li{padding-left: 0; font-size: 13px; line-height: 24px; color: #a3a2a2; margin-bottom: 12px;}
ol li:before{counter-increment: number; content: counter(number); color: #fff; font-size: 13px; margin-right: 9px; margin-left: 3px; width: 20px; height: 20px; display: inline-block; vertical-align: middle; position: relative;top: -2px; line-height: 20px; font-weight: 600; background: #8bab0a; text-align: center; border-radius: 50%; -webkit-border-radius: 50%;}
/*loader*/
#loader-wrapper{position: fixed; width: 100%; height: 100%; background: #fff; z-index: 10;}
.bubbles{text-align: center; position: absolute; left: 0; width: 100%; top: 50%; margin-top: -30px;}
.bubbles .title{color: #a1a1a1; font-size: 25px; line-height: 25px; margin-bottom: 50px; font-weight: 500;}
.bubbles span {display: inline-block; vertical-align: middle; width: 15px; height: 15px; background: #03b4ea; border-radius: 50%; -moz-border-radius: 50%; -webkit-border-radius: 50%; animation: bubbly .9s infinite alternate;}
#bubble2 {animation-delay: .27s;}
#bubble3 {animation-delay: .54s;}
@-webkit-keyframes bubbly {
  0% {
    width: 15px;
    height: 15px;
    opacity: 1;
    -webkit-transform: translateY(0);
  }
  100% {
    width: 50px;
    height: 50px;
    opacity: 0.1;
    -webkit-transform: translateY(-32px);
  }
}
@keyframes bubbly {
  0% {
    width: 15px;
    height: 15px;
    opacity: 1;
    transform: translateY(0);
  }
  100% {
    width: 50px;
    height: 50px;
    opacity: 0.1;
    transform: translateY(-32px);
  }
}
/*form elements*/
.checkbox, .radio{margin-top: 0;}
.checkbox-entry{margin-bottom: 15px;}
.checkbox-entry{display: block; font-size: 13px; line-height: 14px; font-weight: 500;}
.checkbox-entry b{font-weight: 600!important; color: #313131!important;}
.checkbox-entry input + span{cursor: pointer; display: inline-block; border: 1px #d9d9d9 solid; width: 12px; height: 12px;  vertical-align: middle; color: #000000232; position: relative; top: -1px; margin-right: 7px; position: relative;}
.checkbox-entry.radio input + span{width: 15px; height: 15px; border-radius: 50%; -webkit-border-radius: 50%; border: 1px #e3e3e3 solid;}
.checkbox-entry input{display: none;}
.checkbox-entry input:checked + span{background: #000000;}
.checkbox-entry.radio input:checked + span:after{position: absolute; left: -1px; top: -1px; right: -1px; bottom: -1px; content: ""; box-shadow: inset 0 0 0 3px #fff; border-radius: 50%; -webkit-border-radius: 50%; border: 1px #e3e3e3 solid;}
/*boxed layout*/
.boxed-layout{max-width: 1270px; margin: 0 auto; background: #fafafa;}
.boxed-layout .fullwidth-block{width: auto; left: auto; margin-left: -50px; margin-right: -50px;transform:translateX(0);-webkit-transform:translateX(0);}
.boxed-layout .content-center, .boxed-layout .position-center{padding: 0 50px;}
.boxed-layout #content-block{background: #fff;}

/*Desktops (>=992px)*/
@media (max-width: 1199px) {
	#content-block .content-center, .position-center{padding: 0 30px;}
    .boxed-layout .fullwidth-block{margin-left: -30px; margin-right: -30px;}
	.responsive-menu-toggle-class{display: block;}
}
/* Tablets (>=768px)*/
@media (max-width: 991px) {
	.information-blocks{margin-bottom: 40px;}
    /*#content-block .sidebar-column .information-blocks{margin-bottom: 20px;}*/
}
/*Phones (<768px)*/
@media (max-width: 767px) {
	#content-block .content-center, .position-center{padding: 0 15px;}
}

/*-------------------------------------------------------------------------------------------------------------------------------*/
/* 04 - TEMPLATE TOYS */
/*-------------------------------------------------------------------------------------------------------------------------------*/

/* 04.01 - header */
header{-webkit-backface-visibility: hidden;}
header{ position: absolute; z-index: 5; background: #fff; padding: 0 70px; top: 0; left: 0; width: 100%;}
.navigation{font-size: 0; position: relative; border-bottom: 2px #f7f7f7 solid; height: 72px;}
nav{position: relative;}
nav>ul>li{float: left; padding-right: 20px; padding-left: 20px;}
nav>ul>li>a{font-size: 13px; font-weight: 700; color: #fff; line-height: 70px; text-transform: uppercase; display: inline-block;}
nav>ul>li>a .menu-label{position: absolute; right: 3px; top: 10px;}
nav>ul>li>.fa{color: #b9b9b9; font-size: 10px; margin-left: 3px; vertical-align: middle; position: relative; top: -5px;}
.submenu-container{position: absolute; top: 60px; left: 50%; transform: translateX(-50%); -moz-transform: translateX(-50%); -webkit-transform: translateX(-50%); -ms-transform: translateX(-50%); padding: 20px 10px; display: none; border-radius: 3px; background-color: #fff; -webkit-box-shadow: 0 0 15px rgba(0,0,0,.1); box-shadow: 0 0 15px rgba(0,0,0,.1); border: solid 1px #f4f4f4;}
nav>ul>li:hover{z-index: 1;}
nav>ul>li:hover>a, nav>ul>li>a.active{text-decoration: underline;}
nav>ul:nth-child(2){float: right;}
#content-block .submenu a:hover{color: #878787;}
.submenu .list-type-1 .fa{font-size: 13px; color: #cacaca!important; margin: 0 7px 0 0;}

/*submenu full width*/
.submenu{position: absolute; width: 100%; background: #fff; left: 0; top: 100%; border: 1px #f2f2f2 solid; display: none;}
@media (min-width: 1200px) {
    .submenu.left-align{left: 0!important; margin: 0!important;}
    .submenu.right-align{left: auto!important; right: 0; margin: 0!important;}
}
.submenu .row{position: relative;}
nav .full-width .submenu{padding: 50px 0; max-width: 1310px;}
.full-width-menu-items-right{width: 540px; margin-right: 50px; float: right;}
.full-width-menu-items-right .submenu-list-title{margin-right: 50px;}
.menu-slider-out{overflow: hidden;}
.menu-slider-in{width: 100000px; position: relative;}
.menu-slider-in .product-slide-entry{width: 150px;}
.menu-slider-entry{padding-right: 40px; float: left; text-align: center; }
.menu-slider-in .product-slide-entry .product-image{margin-bottom: 10px;}
.menu-slider-in .product-slide-entry .title{font-size: 14px;}
.menu-slider-in .price{font-size: 14px;}
.menu-slider-arrows{font-size: 0; text-align: right; margin-bottom: -22px;}
.menu-slider-arrows a{font-size: 13px; line-height: 22px; display: inline-block; width: 22px; text-align: center;}
#content-block .menu-slider-arrows a .fa{color: #cacaca;}
#content-block .menu-slider-arrows a:hover .fa{color: #2e2e2e;}
.full-width-menu-items-left{margin-right: 615px; margin-left: 45px;}
.submenu-list-title{font-size: 16px; line-height: 22px; color: #2e2e2e; font-weight: 700; text-transform: uppercase; display: inline-block; margin-bottom: 15px;}
.submenu-list-title a{color: #2e2e2e;}
#content-block .submenu-list-title a:hover{text-decoration: underline; color: #2e2e2e;}
.submenu .list-type-1{margin-bottom: 45px;}
.submenu .list-type-1 li{padding: 5px 0;}
.menu-label{font-size: 10px; line-height: 15px; color: #fff; font-weight: 600; text-transform: uppercase; position: relative; padding: 0 5px; display: inline-block; vertical-align: top; margin-top: -2px;}
.menu-label:before{width: 0; height: 0; border-style: solid; border-width: 6px 6px 0 0; position: absolute; left: 6px; top: 100%; content: "";}
.menu-label.blue{background: #03b4ea;}
.menu-label.blue:before{border-color: #03b4ea transparent transparent transparent;}
.menu-label.red{background: #cd0000;}
.menu-label.red:before{border-color: #cd0000 transparent transparent transparent;}
.menu-label.yellow{background: #e9bc21;}
.menu-label.yellow:before{border-color: #e9bc21 transparent transparent transparent;}

/*submenu drop-down menu bottom line*/
.submenu-links-line{position: absolute; left: 0; top: 100%; background: #f2f2f2; left: -1px; right: -1px; padding: 19px 45px; font-size: 14px; line-height: 24px; color: #575757; border: 1px #f2f2f2 solid;}
.submenu-links-line b{font-weight: 600; color: #000000;}
.submenu-links-line a{color: #575757;}
.submenu-links-line a:hover{text-decoration: underline;}
.submenu-links-line-container{display: table; width: 100%;}
.submenu-links-line-container .cell-view:first-child{width: 60%;}
.submenu-links-line .red-message, .submenu-links-line .red-message b{color: #000000;}

/*submenu full width columns inside*/
nav .full-width-columns .submenu{max-width: 1310px;}
.submenu .product-column-entry{float: left; width: 20%; border: none; border-right: 1px #f2f2f2 solid;}
.submenu .product-column-entry:last-child{border-color: transparent;}
.submenu .product-column-entry .submenu-list-title{margin-left: 30px; margin-right: 30px;}

/*submenu 2 columns*/
nav .column-2{position: relative;}
nav .column-2 .submenu{width: 600px; padding: 50px 0; left: 50%; margin-left: -300px;}
nav .column-2 .submenu .full-width-menu-items-left{margin-right: 190px;}
.submenu-background{position: absolute; right: 0; bottom: 0; height: 100%; width: auto;}

/*submenu 1 column*/
nav .column-1{position: relative;}
nav .column-1 .submenu{width: 400px; padding: 50px 0; left: 50%; margin-left: -200px;}
nav .column-1 .full-width-menu-items-left{margin-right: 200px;}
nav ul:first-child li:nth-child(1).column-1 .submenu, nav ul:first-child li:nth-child(2).column-1 .submenu{left: 0; margin-left: 0;}

/*submenu simple list*/
nav .simple-list{position: relative;}
nav .simple-list .submenu{width: 270px; left: 50%; margin-left: -135px;}
nav .simple-list .submenu a{font-size: 13px; line-height: 15px; color: #2e2e2e; padding: 16px 20px; border-top: 1px #f2f2f2 solid; display: block; margin-top: -1px;}
nav .simple-list .submenu a .fa{color: #cacaca; display: inline-block; position: relative; vertical-align: bottom; top: -2px; margin-right: 7px; font-size: 13px;}

.simple-list:hover {
    background-color:white;
    color:black !important;
}

.simple-list:hover a {
    color:black !important;
    text-decoration: none;
}
/*open desktop header drop-downs*/
@media (min-width: 1200px) {
  /*.submenu{display: block!important; transform: rotateX(90deg); -moz-transform: rotateX(90deg); -webkit-transform: rotateX(90deg); -ms-transform: rotateX(90deg); -moz-transition:all 300ms ease-out; -o-transition:all 300ms ease-out; -webkit-transition:all 300ms ease-out; transition:all 300ms ease-out; -ms-transition:all 300ms ease-out; transform-origin: 50% 0% 0px; -moz-transform-origin: 50% 0% 0px; -webkit-transform-origin: 50% 0% 0px; -ms-transform-origin: 50% 0% 0px; opacity: 0;}
  nav>ul>li:hover>.submenu{opacity: 1; transform: rotateX(0deg); -moz-transform: rotateX(0deg); -webkit-transform: rotateX(0deg); -ms-transform: rotateX(0deg);}*/
  .toggle-list-container{display: block!important;}
  /*.submenu .product-column-entry{min-height: 400px;}*/
}

/*scrolling page - fixed header*/
.fixed-header-visible{display: none;}
@media (min-width: 1200px) {
    header.fixed-header{z-index: 6;}
    header.fixed-header .full-width .submenu, header.fixed-header .full-width-columns .submenu{left: auto; right: 0;}
    header.fixed-header .nav-overflow{position: fixed; left: 0; top: 0; width: 100%; background: #000; color:white; border-bottom: 2px #000 solid; -webkit-backface-visibility: hidden;}
    header.fixed-header nav{max-width: 1310px; padding: 0 70px; margin: 0 auto; text-align: right;}
    header.fixed-header nav>ul:nth-child(2){float: none;}
    header.fixed-header nav>ul{display: inline-block; text-align: left;}
    header .additional-header-logo{position: absolute; left: 70px; top: 50%; transform: translateY(-50%); -moz-transform: translateY(-50%); -webkit-transform: translateY(-50%); -ms-transform: translateY(-50%);}
    header .additional-header-logo img{max-height: 50px; width: auto; display: block;}

    /*buttons*/
    header.fixed-header .fixed-header-visible{display: block;}
    header.fixed-header nav>ul>li>a{font-weight: 600;}
    .fixed-header-visible .header-functionality-entry{text-transform: none; margin-top: 27px; float: left; border: none; text-decoration: none!important;}
    .fixed-header-visible .header-functionality-entry:first-child{padding-left: 0;}
    .fixed-header-square-button{float: left; margin-top: 20px; line-height: 30px; width: 30px; text-align: center; text-decoration: none!important; margin-left: 20px; white-space: nowrap;}
    .fixed-header-square-button .fa{color: inherit!important;}
    .fixed-header-square-button:first-child{margin-left: 0;}
    .fixed-header-square-button .fa{font-size: 13px; line-height: 30px; color: #a0a0a0; display: inline-block;}
    .fixed-header-square-button:hover .fa{color: #3d3d3d;}
}

.header-top{border-bottom: 1px #f0f0f0 solid; position: relative;}
.header-top-entry{float: left; font-size: 13px; line-height: 15px; color: #010101; font-weight: 400; position: relative; padding: 20px 0;}
.header-top-entry .title{border-left: 1px #d0d0d0 solid; padding: 0 20px; cursor: pointer; white-space: nowrap;}
.header-top-entry:first-child .title{border-color: transparent; padding-left: 0;}
.header-top-entry .title img, .header-top-entry .list-entry img{display: inline-block; vertical-align: middle; margin-right: 7px; position: relative; top: -1px;}
.header-top-entry .title a{color: #010101;}
.header-top-entry .title a:hover{text-decoration: underline;}
.header-top-entry .title b{font-weight: 600;}
.header-top-entry .title .fa{margin-left: 7px; position: relative; top: -1px;}
.header-top-entry .title .fa:first-child{margin-left: 0; margin-right: 7px;}
.header-top-entry .list{position: absolute; min-width: 100%; left: 1px; top: 40px; border-radius: 3px; background-color: #fff; -webkit-box-shadow: 0 0 15px rgba(0,0,0,.1); box-shadow: 0 0 15px rgba(0,0,0,.1); border: solid 1px #f4f4f4; padding: 5px 20px; z-index: 1; text-align: left; transform: scale(0); -webkit-transform: scale(0); -moz-transform: scale(0); -ms-transform: scale(0); opacity: 0; -moz-transition:all 300ms ease-out; -o-transition:all 300ms ease-out; -webkit-transition:all 300ms ease-out; transition:all 300ms ease-out; -ms-transition:all 300ms ease-out; transform-origin: 50% 0% 0px; -moz-transform-origin: 50% 0% 0px; -webkit-transform-origin: 50% 0% 0px; -ms-transform-origin: 50% 0% 0px;}
.header-top-entry:hover .list{opacity: 1; transform: scale(1); -moz-transform: scale(1); -webkit-transform: scale(1); -ms-transform: scale(1);}
.header-top-entry:first-child .list{left: -20px;}
.header-top-entry .list-entry{white-space: nowrap; display: block; color: #747474; padding: 10px 0; border-top: 1px #f0f0f0 solid;}
.header-top-entry .list-entry:hover{color: #222;}
.header-top-entry .list-entry:first-child{border-top: none;}

.socials-box{font-size: 0;}
header .socials-box{float: right; margin-top: 12px; margin-right: -3px;}
.socials-box a{font-size: 16px; line-height: 30px; width: 30px; display: inline-block; color: #bababa; margin: 0 3px; text-align: center;}
.socials-box a .fa{line-height: 30px; position: relative; top: 0;}
.socials-box a:hover{color: #3d3d3d;}
body:not(.mobile) .socials-box a:hover .fa{top: -5px;}

.header-middle{border-bottom: 2px solid #f7f7f7; display: table; width: 100%; padding: 25px 0; position: relative;}
.header-middle .right-entries{display: table-cell; vertical-align: middle; width: 400px; text-align: right; font-size: 0;}
.header-functionality-entry{font-size: 13px; line-height: 15px; color: #747474; font-weight: 400; display: inline-block; vertical-align: bottom; padding: 0 14px; border-right: 1px #d0d0d0 solid; white-space: nowrap;}
.header-functionality-entry.open-search-popup{display: none;}
.header-functionality-entry:hover{color: #222;}
.header-functionality-entry:last-child{padding-right: 0; border-right: none;}
.responsive-search-button{display: none;}
.header-functionality-entry .fa{display: inline-block; vertical-align: middle; position: relative; top: -2px; margin-right: 5px;}
.header-functionality-entry b{font-size: 18px; color: #000000; font-weight: 700; font-family: 'Montserrat', sans-serif;}
.logo-wrapper{display: table-cell; vertical-align: middle; width: 300px;}
#logo{display: inline-block; max-width: 90%; height: auto; min-height: 45px;}
#logo img{display: block; width: 100%;}
.middle-entry{display: table-cell; vertical-align: middle;}
.search-box{background: #fff;}
.search-button{float: right; width: 45px; height: 45px; background: #000000; position: relative;}
.search-button:hover{background: #333!important;}
.search-button .fa{display: block; line-height: 45px; text-align: center; color: #fff; font-size: 14px;}
.search-button input[type="submit"]{position: absolute; left: 0; top: 0; width: 100%; height: 100%; opacity: 0;}
.search-drop-down{border-top: 1px #e8e8e8 solid; border-bottom: 1px #e8e8e8 solid; border-left: 1px #f2f2f2 solid; float: right; width: 135px; position: relative;}
.search-drop-down .title{line-height: 43px; padding: 0 30px 0 20px; position: relative; cursor: pointer; font-size: 12px; color: #999; font-weight: 400; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; -webkit-user-select: none; -moz-user-select: none; -ms-user-select: none;}
.search-drop-down .title .fa{position: absolute; top: 0; width: 10px; right: 20px; text-align: center; line-height: 45px;}
.search-drop-down .list{border-radius: 3px; background-color: #fff; -webkit-box-shadow: 0 0 15px rgba(0,0,0,.1); box-shadow: 0 0 15px rgba(0,0,0,.1); border: solid 1px #f4f4f4; position: absolute; left: 0; top: 100%; width: 100%; /*transform: scale(0); -moz-transform: scale(0); -webkit-transform: scale(0); -ms-transform: scale(0);*/ display: none; z-index: 1;}
.search-drop-down.active .list{/*transform: scale(1); -moz-transform: scale(1); -webkit-transform: scale(1); -ms-transform: scale(1);*/ display: block;}
.search-drop-down .overflow{max-height: 161px;}
.search-drop-down .category-entry{color: #999; font-size: 12px; font-weight: 400; padding: 7px 0 7px 15px; margin: 0 5px; border-bottom: 1px #f2f2f2 solid; cursor: pointer;}
.search-drop-down .category-entry:hover{color: #3d3d3d;}
.search-field{border: 1px #e8e8e8 solid; border-right: none; height: 45px; margin-right: 45px;}
.search-field input[type="text"]{width: 100%; height: 43px; line-height: 43px; border: none; background: none; font-size: 14px; padding: 0 20px; color: #3d3d3d;}
.navigation-copyright{font-size: 14px; line-height: 16px; color: #fff; padding: 25px 10px; text-align: center;}
.navigation-copyright a{color: #e5b81d; font-weight: 600;}
.navigation-copyright a:hover{text-decoration: underline;}

/*header popups*/
.popup *:last-child{margin-bottom: 0!important;}
.search-box.popup{position: fixed; border: 1px #ebebeb solid; background: #fff; padding: 18px; width: 460px;}
/*.popup{transform: rotateX(90deg); -webkit-transform: rotateX(90deg); -moz-transform: rotateX(90deg); -ms-transform: rotateX(90deg); opacity: 0; -moz-transition:all 300ms ease-out; -o-transition:all 300ms ease-out; -webkit-transition:all 300ms ease-out; transition:all 300ms ease-out; -ms-transition:all 300ms ease-out; transform-origin: 50% 0% 0px; -moz-transform-origin: 50% 0% 0px; -webkit-transform-origin: 50% 0% 0px; -ms-transform-origin: 50% 0% 0px;}*/
.loaded .popup{z-index: 7; display: none;}
.popup.active{display: block;}
.search-box.popup.bottom-align{top: auto!important; bottom: 75px;}
.search-box.popup.bottom-align .search-drop-down .list{position: absolute; top: auto; bottom: 100%;}
/*.popup.active{opacity: 1; transform: rotateX(0deg); -moz-transform: rotateX(0deg); -webkit-transform: rotateX(0deg); -ms-transform: rotateX(0deg);}*/
.search-box.popup:before{width: 28px; height: 15px; position: absolute; content: ""; top: -15px; right: 30px;}
.search-box.popup.bottom-align:before{transform: rotate(180deg); -moz-transform: rotate(180deg); -webkit-transform: rotate(180deg); -ms-transform: rotate(180deg); top: 100%;}
.cart-box.popup{position: fixed; padding: 15px 0 0 0; width: 300px;}
.cart-box.popup .popup-container{border: 2px #ebebeb solid; padding: 25px 25px 20px 25px; background: #fff; position: relative;overflow-y: auto; max-height: 500px;}
.cart-box.popup .image{float: left; width: 70px;}
.cart-box.popup .image img{display: block; width: 100%; height: auto;}
.cart-box.popup .cart-entry{padding-bottom: 25px; margin-bottom: 25px; border-bottom: 2px #ebebeb solid; position: relative;}
.cart-box.popup .content{margin: 0 20px 0 15px;}
.cart-box.popup .content .title{font-size: 14px; line-height: 18px; color: #2e2e2e; font-weight: 600; margin-bottom: 5px; display: block;}
.cart-box.popup .content .title:hover{text-decoration: underline;}
.cart-box.popup .content .quantity{font-size: 13px; line-height: 24px; color: #808080; margin-bottom: 3px;}
.cart-box.popup .content .price{font-size: 18px; line-height: 24px; color: #000000; font-weight: 600;}
.cart-box.popup .summary{text-align: right; margin-bottom: 25px;}
.cart-box.popup .summary .subtotal{font-size: 14px; line-height: 22px; color: #878787; font-weight: 600;}
.cart-box.popup .summary .grandtotal{font-size: 18px; line-height: 22px; color: #343434; font-weight: 600;}
.cart-box.popup .summary .grandtotal span{color: #000000;}
.cart-buttons .column{width: 50%; padding-left: 5px; float: left;}
.cart-buttons .column:first-child{padding-left: 0; padding-right: 5px;}
.cart-buttons .button{display: block; margin-bottom: 5px;}
.cart-box.popup .button-x{position: absolute; top: 0; right: 0; cursor: pointer;}
.cart-box.popup .popup-container:before { content: ""; height: 15px; position: absolute; right: 30px; top: -15px; width: 28px;}
.cart-box.popup.left-align{left: 15px!important;}
.cart-box.popup.left-align .popup-container:before{right: auto; left: 30px;}
.cart-box.popup.cart-left .popup-container:before{right: auto; left: 30px;}
.cart-box.popup.fixed-header-left{right: auto; left: 50%; margin-left: -615px; right: auto!important;}
body.style-0 .cart-box.popup .content .price{color: #03b4ea;}
body.style-0 .cart-box.popup .summary .grandtotal span{color: #03b4ea;}
body.style-0 .button.style-4{background: #03b4ea; border-color: #03b4ea;}

/*additional header block - search in navigation ("everything" template)*/
.navigation-search-content{margin-left: 300px; position: relative; z-index: 1;}
.navigation-search-content .search-box{margin-right: 160px; top: 15px; position: relative;}
.search-box.size-1 .search-button{height: 40px; width: 40px;}
.search-box.size-1 .search-drop-down .title{line-height: 38px;}
.search-box.size-1 .search-drop-down .title .fa{line-height: 40px;}
.search-box.size-1 .search-field{margin-right: 175px; height: 40px;}
.search-box.size-1 .search-field input[type="text"]{height: 38px; line-height: 38px;}
.search-box.size-1 .search-button .fa{line-height: 40px;}
header.type-1.fixed-header .navigation-search-content{display: none;}
.navigation-search-content .toggle-desktop-menu{float: right; font-size: 14px; line-height: 70px; font-weight: 700; color: #fff; text-transform: uppercase; cursor: pointer; width: 125px; border-left: 1px #1663c2 solid; text-align: center;}
.navigation-search-content .toggle-desktop-menu .fa{line-height: 70px; vertical-align: bottom; position: relative; top: -1px; margin-right: 5px; display: none;}
.navigation-search-content .toggle-desktop-menu .fa:first-child{display: inline-block;}
.navigation.active .navigation-search-content .search-box{display: none;}
.navigation.active .navigation-search-content .toggle-desktop-menu .fa{display: inline-block;}
.navigation.active .navigation-search-content .toggle-desktop-menu .fa:first-child{display: none;}

/*additional header block - square icons ("everything" template)*/
header .icon-entry{width: 50%; float: left;}
header .icon-entry .image{width: 45px; height: 45px; float: left; line-height: 45px; text-align: center; background: #f5f5f5;}
header .icon-entry .image .fa{line-height: 45px; display: block; color: #b4b4b4;}
header .icon-entry:hover .image{background: #0f51a3;}
header .icon-entry:hover .image .fa{color: #fff;}
header .icon-entry .text{margin-left: 60px; font-size: 13px; line-height: 18px; color: #747474; padding-top: 5px; display: block;}
header .icon-entry .text b{font-size: 16px; line-height: 18px; font-weight: 600; color: #404040;}

/*Desktops (>=992px)*/
@media (max-width: 1199px) {
    #content-block header{position: fixed; padding: 0 30px; top: 0;}
	.header-top .socials-box{display: none;}
	.navigation{position: fixed; left: 0; top: 0; width: 290px; background: #272727; height: 100%; border: none; z-index: 7; transform: translateX(-290px); -moz-transform: translateX(-290px); -webkit-transform: translateX(-290px); -ms-transform: translateX(-290px);}
	.nav-overflow{position: absolute; width: 100%; left: 0; top: 75px; bottom: 0; overflow-y: auto; -webkit-overflow-scrolling: touch; -moz-overflow-scrolling: touch; -ms-overflow-scrolling: touch;}
	.navigation-header{padding: 0 50px 0 20px; border-bottom: 1px #343434 solid;}
	.navigation-header .title{font-size: 20px; line-height: 75px; font-weight: 700; text-transform: uppercase; color: #fff;}
	.navigation-header .close-menu{width: 40px; height: 40px; line-height: 40px; position: absolute; right: 5px; top: 17px; cursor: pointer; text-transform: uppercase;}
    .navigation-header .close-menu:before, .navigation-header .close-menu:after{width: 18px; height: 2px; position: absolute; left: 50%; top: 50%; margin: -1px 0 0 -9px; content: ""; background: #fff;}
    .navigation-header .close-menu:before{transform: rotate(45deg); -moz-transform: rotate(45deg); -webkit-transform: rotate(45deg); -ms-transform: rotate(45deg);}
    .navigation-header .close-menu:after{transform: rotate(-45deg); -moz-transform: rotate(-45deg); -webkit-transform: rotate(-45deg); -ms-transform: rotate(-45deg);}
	.navigation-footer .socials-box{margin-top: -1px; margin-right: 0; float: none; border-top: 1px #343434 solid; border-bottom: 1px #343434 solid;}
	.navigation-footer .socials-box a{width: 14.25%; height: 41px; line-height: 39px; border-left: 1px #343434 solid; float: left; margin: 0; color: #fff;}
	body:not(.mobile) .navigation-footer .socials-box a:hover{background: #fff; color: #272727;}
	.navigation-footer .socials-box a:first-child{border-left: none;}
	.menu-button{font-size: 25px; color: #2f2f2f; cursor: pointer; position: absolute; right: 0; top: 14px;}
	.menu-button .fa{line-height: inherit; display: block;}

	body.opened-menu{overflow: scroll;}
	.navigation, .content-push{-moz-transition:all 300ms ease-out; -o-transition:all 300ms ease-out; -webkit-transition:all 300ms ease-out; transition:all 300ms ease-out; -ms-transition:all 300ms ease-out;}
	header.opened .navigation{ transform: translateX(0px); -moz-transform: translateX(0px); -webkit-transform: translateX(0px); -ms-transform: translateX(0px);}
	/*body.opened-menu .content-push{transform: translateX(200px); -moz-transform: translateX(200px); -webkit-transform: translateX(200px); -ms-transform: translateX(200px);}*/
	.close-header-layer{position: fixed; width: 100%; height: 100%; left: 0; top: 0; display: none; background: rgba(0,0,0,0.5);}

    #content-block nav>ul{float: none;}
    nav>ul>li{float: none; border-bottom: 1px #343434 solid; padding: 0; position: relative;}
    nav>ul>li>a{font-size: 12px; color: #fff; line-height: 14px; padding: 15px 45px 15px 20px; display: block;}
    nav>ul>li>.fa{position: absolute; right: 5px; top: 2px; line-height: 40px; width: 40px; text-align: center; cursor: pointer; margin: 0; font-size: 12px;}
    nav>ul>li.opened>.fa{transform: rotate(180deg); -moz-transform: rotate(180deg); -webkit-transform: rotate(180deg); -ms-transform: rotate(180deg);}
    .full-width-menu-items-right{display: none;}
    .full-width-menu-items-left{margin-left: 0; margin-right: 0;}
    .submenu{position: relative; top: auto; left: auto; padding: 0!important;}
    .submenu-links-line{display: none;}
    .submenu-list-title{margin: 0; display: block; position: relative;}
    .submenu-list-title a{display: block; margin: 0; font-size: 12px; line-height: 14px; padding: 15px 45px 15px 20px;}
    .submenu-list-title .toggle-list-button{width: 43px; height: 43px; position: absolute; top: 0; right: 2px; cursor: pointer;}
    .submenu-list-title .toggle-list-button:before{width: 11px; height: 1px; background: #878787; position: absolute; left: 50%; top: 50%; margin-top: -1px; margin-left: -6px; content: "";}
    .submenu-list-title .toggle-list-button:after{width: 1px; height: 11px; background: #878787; position: absolute; left: 50%; top: 50%; margin-top: -6px; margin-left: -1px; content: "";}
    .toggle-list-container{display: none; padding-left: 20px;}
    .submenu-list-title.opened .toggle-list-button:after{height: 0; margin-top: 0;}
    .submenu .list-type-1{margin-bottom: 0;}
    .submenu .list-type-1 li{padding: 10px 30px 10px 20px;}
    .submenu .product-column-entry{float: none; width: auto; padding: 0;}
    .submenu .product-column-entry .image{display: none;}
    .submenu .product-column-entry .hot-mark{display: none;}
    .submenu .product-column-entry .submenu-list-title{margin-left: 0; margin-right: 0;}
    .submenu .product-column-entry .description{margin: 0;}
    nav .column-2 .submenu .full-width-menu-items-left, nav .column-1 .full-width-menu-items-left{margin-right: 0;}
    nav .column-2 .submenu, nav .column-1 .submenu, nav .simple-list .submenu{width: auto; margin: 0; left: auto;}
    .submenu-background{display: none;}
    nav .simple-list .submenu a{display: block; font-size: 12px; line-height: 14px; margin: 0; padding: 15px 45px 15px 20px; color: #2e2e2e; font-weight: 700; text-transform: uppercase; border: none;}
    nav .simple-list .submenu a .fa{display: none;}
    nav>ul>li>a .menu-label{position: relative; right: auto; top: -7px; margin-left: 5px;}

	.responsive-search-button{display: inline-block;}
	.header-functionality-entry{padding: 0; border-right: none;}
	.header-functionality-entry span{display: none;}
	.header-functionality-entry .fa{width: 45px; height: 45px; line-height: 45px; font-size: 24px; color: #2f2f2f; text-align: center; margin: 0;}
    .header-functionality-entry.open-search-popup{display: inline-block;}
	.header-middle{border-bottom: 1px solid #f0f0f0;}
    #logo{min-height: 0;}
    header .middle-entry{display: none;}
    .cart-box.popup{display: none!important;}
    .navigation-search-content{display: none;}

    .full-width-menu-items-left .row > div{padding: 0;}
    .full-width-menu-items-left .row{margin: 0;}

}
/* Tablets (>=768px)*/
@media (max-width: 991px) {
	.header-middle{padding-top: 10px; padding-bottom: 10px;}
}
/*Phones (<768px)*/
@media (max-width: 767px) {
    #content-block header{padding: 0 15px;}
	.header-functionality-entry b{display: none;}
	.header-functionality-entry .fa{width: 33px; height: 33px; line-height: 33px; font-size: 23px;}
	#logo{max-width: 100%;}
}
@media (max-width: 480px) {
    .search-box.popup{width: 96%; right: 2%!important;}
    .search-box.popup:before{right: 50%; margin-right: -14px;}
}


/*-------------------------------------------------------------------------------------------------------------------------------*/
/* 05 - TEMPLATE FOOD */
/*-------------------------------------------------------------------------------------------------------------------------------*/

/* 05.01 - main color styles */
body.style-1{background-size: cover; background-attachment: fixed;}
body.style-1 .search-button, .header-wrapper.style-1 .search-button{background: #779307;}
body.style-1 .swiper-tabs .block-title:before{background: #8bab0a;}
body.style-1 .swiper-active-switch{background: #8bab0a; border-color: #8bab0a;}
body.style-1 .product-slide-entry{text-align: center;}
body.style-1 .price .current{color: #779307;}
.footer-wrapper.style-1 .footer-address a b{color: #8bab0a;}
.footer-wrapper.style-1 .copyright a{color: #8bab0a;}
.footer-wrapper.style-1 .footer-columns-entry .column a:hover, .footer-wrapper.style-1 .footer-bottom-navigation .footer-links a:hover{color: #8bab0a;}
body.style-1 .product-slide-entry .title:hover{color: #8bab0a;}
body.style-1 .bubbles span{background: #8bab0a;}
.header-wrapper.style-1 .header-functionality-entry.open-cart-popup b{color: #779307;}
body.style-1 .cart-box.popup .content .price{color: #779307;}
body.style-1 .cart-box.popup .summary .grandtotal span{color: #779307;}
body.style-1 .button.style-4{background: #779307; border-color: #779307;}
body.style-1 .footer-columns-entry{border-top: none; padding-top: 0;}
@media (min-width: 1200px) {
	.header-wrapper.style-1 .navigation{margin: 0 -70px; padding: 0 70px; border-bottom: none; background: #779307;}
	.header-wrapper.style-1 .header-middle{border-bottom: none;}
	.header-wrapper.style-1 header:not(.fixed-header) nav>ul>li>a{color: #fff;}
	.header-wrapper.style-1 header:not(.fixed-header) nav>ul>li .fa{color: #aec161;}
}

/* 05.02 - inline products */
.inline-product-column-title{margin-bottom: 20px;}
.inline-product-entry{margin-bottom: 20px; padding-bottom: 20px; border-bottom: 1px #f0f0f0 solid;}
.inline-product-entry .image{width: 55px; float: left; border: 1px transparent solid;}
.inline-product-entry .image:hover{border-color: #8bab0a;}
.inline-product-entry .image img{display: block; width: 100%; height: auto;}
.inline-product-entry .content{margin-left: 70px;}
.inline-product-entry .content .cell-view{height: 55px;}
.inline-product-entry .title{font-size: 15px; color: #5a5858; line-height: 20px; font-weight: 500; margin-bottom: 5px; display: inline-block;}
.inline-product-entry .title:hover{color: #8bab0a;}
.inline-product-entry .price .current{font-size: 15px;}

/* 05.03 - products in columns */
.product-column-entry{border: 2px #f2f2f2 solid; padding: 27px 0; position: relative; overflow: hidden;}
.product-column-entry .image{text-align: center; height: 160px; margin-bottom: 20px;}
.product-column-entry .image img{display: inline-block; max-height: 100%; width: auto;}
.product-column-entry .title{font-size: 16px; line-height: 20px; color: #2e2e2e; text-transform: uppercase; font-weight: 700; margin: 0 30px 15px 30px; display: block;}
.product-column-entry a.title:hover{text-decoration: underline;}
.product-column-entry .description{margin: 0 30px;}
/*Phones (<768px)*/
@media (max-width: 767px) {
	.product-column-entry{max-width: 300px; margin: 0 auto;}
}

/* 05.04 - from the blog */
.from-the-blog-entry{}
.from-the-blog-entry .image{float: left; width: 180px; margin-right: 20px; position: relative; overflow: hidden;}
.hover-class-1:after{background: #8bab0a; position: absolute; left: 0; top: 0; width: 100%; height: 100%; content: ""; opacity: 0;}
body:not(.mobile) .hover-class-1:hover:after{opacity: 0.7;}
.from-the-blog-entry .image img{display: block; width: 100%; height: auto; position: relative;}
.hover-class-1 .hover-label{position: absolute; width: 100%; text-align: center; top: 50%; margin-top: -10px; font-size: 14px; line-height: 20px; color: #fff; font-weight: 600; z-index: 1; left: -100%;}
body:not(.mobile) .hover-class-1:hover .hover-label{left: 0;}
.from-the-blog-entry .description{font-size: 13px; line-height: 24px; color: #a3a2a2;}

/* 05.05 - mozaic banner */
.mozaic-banners-wrapper{}
.mozaic-banners-wrapper .row{margin: 0 -4px;}
.mozaic-banners-wrapper .banner-column{padding: 0 4px; margin-bottom: 8px;}
.mozaic-banner-entry{border: 2px #ebebeb solid; background-position: right bottom; background-repeat: no-repeat; background-position: right bottom; background-repeat: no-repeat; position: relative; display: block;}
.mozaic-banner-entry.type-1{height: 505px; background-size: 470px;background-position: center bottom}
.mozaic-banner-entry.type-2{height: 248.5px; margin-bottom: 8px; background-size: auto 100%;}
.mozaic-banner-entry.type-3{height: 210px; margin-bottom: 8px; background-size: auto 100%;}
.mozaic-banner-content{padding: 50px 8.5%; max-width: 430px; position: relative;}
.mozaic-banner-content .subtitle{font-size: 22px; line-height: 22px; margin-bottom: 5px; color: #515151; text-transform: uppercase; font-weight: 600;}
.mozaic-banner-content .title{font-size: 60px; line-height: 55px; color: #779307; font-family: 'Montserrat', sans-serif; font-weight: 700; text-transform: uppercase; margin-bottom: 10px;}
.mozaic-banner-entry.type-2 .mozaic-banner-content .subtitle, .mozaic-banner-entry.type-3 .mozaic-banner-content .subtitle{font-size: 16px!important; margin-bottom: 2px; display: block;}
.mozaic-banner-entry.type-2 .mozaic-banner-content .title, .mozaic-banner-entry.type-3 .mozaic-banner-content .title{font-size: 32px; line-height: 32px; display: block;}
.mozaic-banner-content .description{font-size: 13px; line-height: 22px; color: #b3b3b3; margin-bottom: 15px; display: block;}
.mozaic-swiper{border: 2px #ebebeb solid; height: 505px; overflow: hidden;}
.mozaic-swiper .mozaic-banner-entry.type-1{border: none;background-size: 100%;}
.mozaic-swiper .pagination{position: absolute; left: 20px; bottom: 20px; width: auto;}
.mozaic-swiper .pagination .swiper-pagination-switch{margin: 0 6px 0 0; height: 10px; width: 10px; background: #dedede; border: none;}
.mozaic-swiper .pagination .swiper-active-switch{background: #bfbfbf;}
/*Phones (<768px)*/
@media (max-width: 767px) {
    .mozaic-banner-entry.type-1:before{content: ""; position: absolute; left: 0; top: 0; width: 100%; height: 100%; background: #fff; opacity: 0.7;}
	#content-block .mozaic-banner-entry.type-1, #content-block .mozaic-banner-entry.type-2, #content-block .mozaic-banner-entry.type-3, #content-block .mozaic-swiper{height: auto;}
	.mozaic-banner-content{padding: 25px 20px;}
	.mozaic-swiper .mozaic-banner-content{padding-bottom: 55px;}
}

@media only screen and (max-width: 992px){
    .mozaic-banner-entry.type-1{
        background-size: 400px;
        background-position: right bottom;
    }
}


/*-------------------------------------------------------------------------------------------------------------------------------*/
/* 06 - TEMPLATE EVERYTHING */
/*-------------------------------------------------------------------------------------------------------------------------------*/

/* 06.01 - main color styles */
body.style-2 .swiper-tabs .block-title:before{background: #0f51a3;}
.footer-wrapper.style-2 .footer-address a b{color: #0f51a3;}
.footer-wrapper.style-2 .copyright a{color: #0f51a3;}
.footer-wrapper.style-2 .footer-columns-entry .column a:hover, .footer-wrapper.style-2 .footer-bottom-navigation .footer-links a:hover{color: #0f51a3;}
body.style-2 .product-slide-entry .title:hover{color: #0f51a3;}
body.style-2 .bubbles span{background: #0f51a3;}
body.style-2 .swiper-active-switch{background: #0f51a3; border-color: #0f51a3;}
body.style-2 .price .current{color: #0f51a3; font-weight: 600;}
body.style-2 .block-title{font-size: 16px;}
body.style-2 .list-type-1 li .fa{color: #0f51a3;}
body.style-2 .list-type-1 a:hover{color: #0f51a3;}
body.style-2 .navigation-banner-content .subtitle{font-size: 30px; color: #0f51a3; font-weight: 300; font-family: 'Raleway', sans-serif; letter-spacing: -1px;}
body.style-2 .navigation-banner-content .title{font-weight: 700; font-family: 'Raleway', sans-serif; font-size: 60px; line-height: 60px;}
body.style-2 .navigation-banner-content .description{font-family: 'Raleway', sans-serif; font-style: normal;}
body.style-2 .search-button, .header-wrapper.style-2 .search-button{background: #e9b500;}
body.style-2 .sidebar-navigation{border: none;}
body.style-2 .sidebar-navigation .title{background: #0f51a3; margin-bottom: 4px;}
body.style-2 .sidebar-navigation .entry{border: 1px #f5f5f5 solid; background: #fafafa; margin-bottom: 4px;}
body.style-2 .sidebar-navigation .entry .fa{color: #0f51a3;}
body.style-2 .sidebar-navigation .entry:before{background: #0f51a3;}
body.style-2 .sidebar-navigation-title{line-height: 70px; padding: 0 25px; position: absolute; left: 0; top: 0; font-size: 13px; font-weight: 700; color: #fff; text-transform: uppercase;}
body.style-2 .cart-box.popup .content .price{color: #0f51a3;}
body.style-2 .cart-box.popup .summary .grandtotal span{color: #0f51a3;}
body.style-2 .button.style-4{background: #0f51a3; border-color: #0f51a3;}
body.style-2 .sidebar-navigation{margin-bottom: 50px;}
body.style-2 .navigation-search-content .search-box{position: absolute; left: 0; right: 160px; margin-right: 0;}
/**/
.sidebar-logos-row{margin-left: -8px; margin-right: -8px;}
.sidebar-logos-row .entry{max-width: 95px; float: left; width: 33.33%; padding: 0 8px 8px 8px; margin-bottom: 10px;}
.sidebar-logos-row a, .sidebar-logos-row img{display: block; width: 100%; height: auto;}
.sidebar-logos-row a img{-webkit-filter: grayscale(100%); filter: grayscale(100%);}
.sidebar-logos-row a:hover img{-webkit-filter: grayscale(0%); filter: grayscale(0%);}
@media (max-width: 1199px) {
    body.style-2 .sidebar-navigation-title{display: none;}
}
@media (min-width: 1200px) {
    .header-wrapper.style-2 .navigation{border-bottom: none; background: #0f51a3;}
    .header-wrapper.style-2 header:not(.fixed-header) nav>ul>li>a{color: #fff;}
    .header-wrapper.style-2 header:not(.fixed-header) nav>ul>li .fa{color: #6b9ddc;}
    .header-wrapper.style-2 header:not(.fixed-header) nav{display: block; padding-left: 300px; padding-right: 125px; position: absolute; left: 0; top: 0; width: 100%; -moz-transition:all 300ms ease-out; -o-transition:all 300ms ease-out; -webkit-transition:all 300ms ease-out; transition:all 300ms ease-out; -ms-transition:all 300ms ease-out; transform: scale(0); -moz-transform: scale(0); -webkit-transform: scale(0); -ms-transform: scale(0);}
    .header-wrapper.style-2 header:not(.fixed-header) .navigation.active nav{transform: scale(1); -moz-transform: scale(1); -webkit-transform: scale(1); -ms-transform: scale(1);}
    .header-wrapper.style-2 .navigation .navigation-search-content .search-box{transform: scale(1); -moz-transform: scale(1); -webkit-transform: scale(1); -ms-transform: scale(1); -moz-transition:all 300ms ease-out; -o-transition:all 300ms ease-out; -webkit-transition:all 300ms ease-out; transition:all 300ms ease-out; -ms-transition:all 300ms ease-out; display: block;}
    .header-wrapper.style-2 .navigation.active .navigation-search-content .search-box{transform: scale(0); -moz-transform: scale(0); -webkit-transform: scale(0); -ms-transform: scale(0);}
    body.style-2 .sidebar-navigation{margin-top: -95px; position: relative;}
    .header-wrapper.style-2 .sidebar-navigation .title, body.style-2 .sidebar-navigation .title{line-height: 16px; padding-top: 27px; padding-bottom: 27px; margin-bottom: 8px;}
}

/* 06.02 - navigation banner (size 1) */
.navigation-banner-swiper.size-1 .navigation-banner-content{height: 430px;}


/*-------------------------------------------------------------------------------------------------------------------------------*/
/* 07 - TEMPLATE ELECTRONIC */
/*-------------------------------------------------------------------------------------------------------------------------------*/

/* 07.01 - footer */
.footer-wrapper.style-3 footer:before{background: #000000; bottom: 0; content: ""; height: 100%; left: 50%; margin-left: -50000px; position: absolute; width: 100000px;}
.footer-wrapper.style-3 .footer-bottom-navigation:before{background: #2e2e2e; bottom: 0; content: ""; height: 100%; left: 50%; margin-left: -50000px; position: absolute; width: 100000px;}
.footer-wrapper.style-3 .footer-columns-entry .column a{color: #a6a6a6;}
.footer-wrapper.style-3 .footer-address a b{color: #fff;}
.footer-wrapper.style-3 .footer-columns-entry .column a:hover, .footer-wrapper.style-3 .footer-bottom-navigation .footer-links a:hover{color: #fff;}
.footer-wrapper.style-3 #content-block .footer-address a:hover, .footer-wrapper.style-3 #content-block .footer-address a:hover b{color: #fff; text-decoration: underline;}
.footer-wrapper.style-3 .footer-columns-entry .column-title{color: #fff;}
.footer-wrapper.style-3 .footer-description b{color: #fff;}
.footer-wrapper.style-3 .footer-columns-entry{border: none;}
.footer-wrapper.style-3 .footer-bottom-navigation .footer-links a{color: #aaa; border-color: #4a4a4a;}
.footer-wrapper.style-3 .copyright a{color: #fff;}
#content-block .footer-wrapper.style-3 .copyright a:hover{color: #fff; text-decoration: underline;}
.footer-wrapper.style-3 #content-block .copyright a:hover{color: #fff; text-decoration: underline;}

/* 07.02 - content styles */
body.style-3 .swiper-tabs .block-title:before{background: #008acc;}
body.style-3 .product-slide-entry .title:hover{color: #008acc;}
body.style-3 .bubbles span{background: #008acc;}
body.style-3 .swiper-active-switch{background: #008acc; border-color: #008acc;}
body.style-3 .price .current{color: #008acc; font-weight: 600;}
body.style-3 .list-type-1 li .fa{color: #008acc;}
body.style-3 .list-type-1 a:hover{color: #008acc;}
body.style-3 .sidebar-navigation .title{background: #008acc;}
body.style-3 .sidebar-navigation{border-color: #008acc;}
body.style-3 .sidebar-navigation .entry .fa{color: #008acc;}
body.style-3 .sidebar-navigation .entry:before{background: #008acc;}
body.style-3 .inline-product-column-title{font-size: 18px; line-height: 22px;}
body.style-3 .inline-product-entry .title:hover{color: #008acc;}
body.style-3 .inline-product-entry .image:hover{border-color: #008acc;}
body.style-3 .read-more:hover{color: #008acc;}
body.style-3 .cart-box.popup .content .price{color: #008acc;}
body.style-3 .cart-box.popup .summary .grandtotal span{color: #008acc;}
body.style-3 .button.style-4{background: #008acc; border-color: #008acc;}
@media (min-width: 1200px) {
    body.style-3 .information-blocks{margin-bottom: 60px;}
}

/* 07.03 - header */
.header-wrapper.style-3 header:before{background: red; position: absolute; height: 1000px; width: 100000px; left: 50%; margin-left: -50000px; bottom: 35px; content: ""; background: #0075ad;}
.header-wrapper.style-3 .header-top-entry{color: #add7eb;}
.header-wrapper.style-3 .header-top-entry .title{border-color: #348cb6;}
.header-wrapper.style-3 .header-top-entry .title a{color: #add7eb;}
.header-wrapper.style-3 .header-top .socials-box a{color: #add7eb;}
.header-wrapper.style-3 .header-top .socials-box a:hover{color: #fff;}
.header-wrapper.style-3 header .icon-entry .image{background: transparent; border: 2px #3391bd solid; border-radius: 50%;}
.header-wrapper.style-3 header .icon-entry .image .fa{line-height: 41px; color: #fff;}
.header-wrapper.style-3 header .icon-entry:hover .image{background: #3391bd;}
.header-wrapper.style-3 header .icon-entry .text{color: #add7eb;}
.header-wrapper.style-3 header .icon-entry .text b{color: #fff;}
.header-wrapper.style-3 .header-top{border-color: #378fb9;}
.header-wrapper.style-3 .header-functionality-entry{color: #add7eb; border-color: #3a91bb;}
.header-wrapper.style-3 .header-functionality-entry b{color: #fff;}
.header-wrapper.style-3 .header-middle{border: none;}
.header-wrapper.style-3 .navigation-search-content .toggle-desktop-menu{border-color: #309ed3; width: 140px;}
.header-wrapper.style-3 .navigation-search-content .search-box{margin-right: 175px;}
@media (min-width: 1200px) {
    .header-wrapper.style-3 .navigation{border-bottom: none; background: #008acc;}
    .header-wrapper.style-3 header:not(.fixed-header) nav>ul>li>a{color: #fff;}
    .header-wrapper.style-3 header:not(.fixed-header) nav>ul>li .fa{color: #6b9ddc;}
    .header-wrapper.style-3 header:not(.fixed-header) nav{position: absolute; left: 0; top: 0; width: 100%; padding: 0 140px 0 20px; -moz-transition:all 300ms ease-out; -o-transition:all 300ms ease-out; -webkit-transition:all 300ms ease-out; transition:all 300ms ease-out; -ms-transition:all 300ms ease-out; transform: scale(1); -moz-transform: scale(1); -webkit-transform: scale(1); -ms-transform: scale(1); transform-origin: 0% 50% 0px; -moz-transform-origin: 0% 50% 0px; -webkit-transform-origin: 0% 50% 0px; -ms-transform-origin: 0% 50% 0px;}
    .header-wrapper.style-3 header:not(.fixed-header) .navigation.active nav{transform: scale(0); -moz-transform: scale(0); -webkit-transform: scale(0); -ms-transform: scale(0);}
    .header-wrapper.style-3 .navigation .navigation-search-content .search-box{-moz-transition:all 300ms ease-out; -o-transition:all 300ms ease-out; -webkit-transition:all 300ms ease-out; transition:all 300ms ease-out; -ms-transition:all 300ms ease-out; transform: scale(0); -moz-transform: scale(0); -webkit-transform: scale(0); -ms-transform: scale(0); display: block; transform-origin: 100% 50% 0px; -moz-transform-origin: 100% 50% 0px; -webkit-transform-origin: 100% 50% 0px; -ms-transform-origin: 100% 50% 0px;}
    .header-wrapper.style-3 .navigation.active .navigation-search-content .search-box{transform: scale(1); -moz-transform: scale(1); -webkit-transform: scale(1); -ms-transform: scale(1);}
    .header-wrapper.style-3 .navigation .navigation-search-content{height: 0;}
}
@media (max-width: 1199px) {
    .header-wrapper.style-3 header:before{bottom: 0;}
    .header-wrapper.style-3 .header-functionality-entry .fa{color: #fff;}
    .header-wrapper.style-3 .menu-button{color: #fff;}
}

/* 07.04 - banners */
.mozaic-banners-wrapper.type-2 .mozaic-banner-content{padding-top: 0; padding-bottom: 0; position: absolute; left: 0; top: 50%; transform: translateY(-50%); -moz-transform: translateY(-50%); -webkit-transform: translateY(-50%); -ms-transform: translateY(-50%); max-width: 65%; display: block;}
.mozaic-banners-wrapper.type-2 .row{margin: 0 -8px;}
.mozaic-banners-wrapper.type-2 .banner-column{padding: 0 8px; margin-bottom: 16px;}
.mozaic-banners-wrapper.type-2 .mozaic-swiper{border: none;}
.mozaic-banners-wrapper.type-2 .mozaic-banner-entry{background-color: #f7f7f7; border: none;}
.mozaic-banners-wrapper.type-2 .mozaic-banner-entry.type-2{height: 244.5px;}
.mozaic-banners-wrapper.type-2 .mozaic-banner-entry.type-2, .mozaic-banners-wrapper.type-2 .mozaic-banner-entry.type-3{margin-bottom: 16px;}
.mozaic-banners-wrapper.type-2 .mozaic-banner-content .subtitle{font-size: 24px; color: #515151; font-weight: 600; display: block;}
.mozaic-banners-wrapper.type-2 .mozaic-banner-content .title{color: #008acc; display: block;}
.mozaic-banners-wrapper.type-2 a.mozaic-banner-entry:before{position: absolute; left: 0; top: 0; width: 100%; height: 100%; background: rgba(1,138,204,0.7); content: ""; opacity: 0;}
body:not(.mobile) .mozaic-banners-wrapper.type-2 a.mozaic-banner-entry:hover .subtitle{color: #fff;}
.mozaic-banners-wrapper.type-2 a.mozaic-banner-entry .title{font-weight: 400; letter-spacing: -1px;}
body:not(.mobile) .mozaic-banners-wrapper.type-2 a.mozaic-banner-entry:hover .title{color: #fff; transform: translateX(20px); -webkit-transform: translateX(20px); -moz-transform: translateX(20px); -ms-transform: translateX(20px);}
body:not(.mobile) .mozaic-banners-wrapper.type-2 a.mozaic-banner-entry:hover .description, body:not(.mobile) .mozaic-banners-wrapper.type-2 a.mozaic-banner-entry:hover .view{color: #fff; transform: translateX(40px); -webkit-transform: translateX(40px); -moz-transform: translateX(40px); -ms-transform: translateX(40px);}
body:not(.mobile) .mozaic-banners-wrapper.type-2 a.mozaic-banner-entry:hover:before{opacity: 1;}

.mozaic-banners-wrapper.type-2 .mozaic-swiper .pagination{bottom: auto; top: 20px; margin-top: 0;}
@media (max-width: 767px) {
    .mozaic-banners-wrapper.type-2 .mozaic-banner-content{padding-top: 20px; padding-bottom: 20px; position: relative; left: 0; top: 0; transform: translateY(0%); -moz-transform: translateY(0%); -webkit-transform: translateY(0%); -ms-transform: translateY(0%); max-width: 100%;}
    .mozaic-banners-wrapper.type-2 .mozaic-swiper .mozaic-banner-content{padding-top: 55px;}
}

/* 07.05 - sidebar text widget */
.text-widget{}
.text-widget .image{display: block; width: 100%; height: auto; max-width: 275px; margin-bottom: 15px;}
.text-widget .description{font-size: 13px; line-height: 24px; color: #a3a2a2; margin-bottom: 10px;}
/* Tablets (>=768px)*/
@media (max-width: 991px) {
    .text-widget .image{float: left; margin-right: 30px;}
}
/*Phones (<768px)*/
@media (max-width: 767px) {
    .text-widget .image{float: none; margin-right: 0;}
}

/* 07.06 - sidebar sales widget */
body.style-3 .sale-entry .sale-price span{color: #008acc;}
.sale-entry .sale-image{margin: 0 0 -35px 0!important; display: none; max-width: 100%; height: auto; position: relative;}
a.sale-entry:before{background: rgba(1,138,204,0.7);}
body:not(.mobile) a.sale-entry:hover:before{opacity: 1;}
body:not(.mobile) a.sale-entry:hover .sale-price, body:not(.mobile) a.sale-entry:hover .sale-price span, body:not(.mobile) a.sale-entry:hover .sale-description{color: #fff!important;}
@media (min-width: 992px) {
    .sale-entry .sale-image{display: block;}
    .sale-entry.vertical{text-align: center;}
    .sale-entry.vertical .sale-description{margin-left: 20px; margin-right: 20px;}
    .sale-entry.vertical .sale-price{float: none; width: auto; border: none; margin-bottom: 15px;}
}


/*-------------------------------------------------------------------------------------------------------------------------------*/
/* 08 - TEMPLATE MINIMAL */
/*-------------------------------------------------------------------------------------------------------------------------------*/

/* 08.01 - header (class "type-2") */
.header-wrapper.style-4 header{padding-left: 55px; padding-right: 55px;}
header.type-2 .full-width .submenu, header.type-2 .full-width-columns .submenu{left: auto; right: 0;}
header.type-2 .navigation-vertical-align{display: table; width: 100%; border-bottom: 1px #ebebeb solid; position: relative;}
header.type-2 .navigation{border: none;}
header.type-2 .nav-container{width: 80%;}
header.type-2 #logo{margin: 10px 0;}
header.type-2 .menu-button{position: relative; top: auto;}
header.type-2 .header-functionality-entry{float: right;}
header.type-2 .header-functionality-entry .fa{display: inline-block;}
@media (min-width: 1200px) {
    header.type-2:not(.fixed-header) nav, header.type-2:not(.fixed-header) .navigation{position: static;}
    header.type-2:not(.fixed-header) .submenu{top: 50%; margin-top: 35px!important;}
    header.type-2:not(.fixed-header) nav>ul>li>a{font-weight: 500;}
    header.type-2:not(.fixed-header) nav>ul{float: right;}
    header.type-2:not(.fixed-header) .navigation{margin: 60px 0;}
    .header-wrapper.style-4 li.fixed-header-visible{display: block;}
    .header-wrapper.style-4 header.fixed-header nav{padding: 0 55px;}
}
/*Desktops (>=992px)*/
@media (max-width: 1199px) {
    header.type-2 .logo-container{width: 300px;}
    header.type-2 .nav-container{width: 400px;}
}

/* 08.02 - footer */
.footer-wrapper.style-4 footer{border-top: 1px #f0f0f0 solid;}
.footer-wrapper.style-4 .copyright a{color: #c9ac37;}
.footer-wrapper.style-4 .copyright a:hover{color: #464646;}
.footer-wrapper.style-4 .footer-bottom-navigation .footer-links a:hover{color: #c9ac37;}

/* 08.03 - content styles */
body.style-4 .content-center{max-width: 1280px; margin: 35px auto; background: #fff; padding: 0 55px;}
body.style-4 .price .current{color: #c2a325; font-size: 18px; font-weight: 600;}
body.style-4 .product-slide-entry .title:hover{color: #c9ac37;}
body.style-4 .swiper-tabs .block-title:before{background: #c9ac37;}
body.style-4 .swiper-tabs .block-title{display: inline-block; float: none;}
body.style-4 .swiper-tabs{text-align: center;}
body.style-4 .read-more:hover{color: #c9ac37;}
body.style-4 .search-button{background: #c9ac37;}
body.style-4 .swiper-active-switch{background: #c9ac37; border-color: #c9ac37;}
body.style-4 .bubbles span{background: #c9ac37;}
body.style-4 .cart-box.popup .content .price{color: #c2a325;}
body.style-4 .cart-box.popup .summary .grandtotal span{color: #c2a325;}
body.style-4 .button.style-4{background: #c2a325; border-color: #c2a325;}
@media (max-width: 1199px) {
    body.style-4 .content-center{margin-top: 0; margin-bottom: 0;}
}

/* 08.04 - banner */
body.style-4 .navigation-banner-content{height: 600px; width: 62%;}
body.style-4 .navigation-banner-content .subtitle{font-size: 20px; line-height: 24px; color: #a58d2d; font-family: 'Raleway', sans-serif; font-weight: 600; letter-spacing: 2px; margin-bottom: 12px;}
body.style-4 .navigation-banner-content .title{font-family: 'Montserrat', sans-serif; font-weight: 700; font-size: 48px; line-height: 48px; letter-spacing: -3px; color: #000000; margin-bottom: 12px;}
body.style-4 .navigation-banner-content .description{font-size: 20px; line-height: 24px; color: #848484;}

/* 08.05 - products */
.custom-col-5-in-row{float: left; width: 20%; padding: 0 15px;}
.custom-col-5-in-row:nth-child(5n+1){clear: both;}
.products-grid{margin-bottom: 20px;}
body.style-4 .products-grid{text-align: center;}
/* Tablets (>=768px)*/
@media (max-width: 991px) {
    .custom-col-5-in-row{width: 25%;}
    .custom-col-5-in-row:nth-child(5n+1){clear: none;}
    .custom-col-5-in-row:nth-child(4n+1){clear: both;}
}
/*Phones (<768px)*/
@media (max-width: 767px) {
    .custom-col-5-in-row{width: 33.0003300033000%;}
    .custom-col-5-in-row:nth-child(4n+1){clear: none;}
    .custom-col-5-in-row:nth-child(3n+1){clear: both;}
}
@media (max-width: 450px) {
    .custom-col-5-in-row{width: 50%;}
    .custom-col-5-in-row:nth-child(3n+1){clear: none;}
    .custom-col-5-in-row:nth-child(2n+1){clear: both;}
}

/* 08.06 - content text widgets */
.content-text-widget-container{padding: 40px 0; border-top: 1px #f0f0f0 solid; margin-bottom: 0!important;}
.content-text-widget{padding: 30px 30px 30px 70px;}
.content-text-widget:first-child{padding: 30px 70px 30px 30px; border-right: 1px #f0f0f0 solid;}
.content-text-widget .title{font-size: 24px; color: #2e2e2e; line-height: 24px; font-weight: 400; margin-bottom: 15px;}
.content-text-widget .description{font-size: 14px; color: #999797; line-height: 24px; font-weight: 400; margin-bottom: 15px;}
/*Phones (<768px)*/
@media (max-width: 767px) {
    .content-text-widget, .content-text-widget:first-child{padding: 0; border: none;}
}


/*-------------------------------------------------------------------------------------------------------------------------------*/
/* 09 - TEMPLATE PARALLAX */
/*-------------------------------------------------------------------------------------------------------------------------------*/

/* 09.01 - header */
.header-wrapper.style-5 header.type-2{background: none;}
.header-wrapper.style-5 header.type-2 .navigation-vertical-align{border: none;}
.header-wrapper.style-5 .header-functionality-entry .fa{color: #fff;}
@media (min-width: 1200px) {
    .header-wrapper.style-5 header.type-2:not(.fixed-header) .navigation{margin: 45px 0;}
    .header-wrapper.style-5 header.fixed-header .nav-overflow{background: #000000; border: none;}
    .header-wrapper.style-5 nav>ul>li>a{color: #fff; font-weight: 700!important;}
    .header-wrapper.style-5 nav>ul>li>.fa{color: #6e6e6e;}
    .header-wrapper.style-5 .fixed-header-square-button .fa{color: #fff;}
    .header-wrapper.style-5 .fixed-header-square-button .fa:hover{color: #c7c7c7;}
    .header-wrapper.style-5 li.fixed-header-visible{display: block;}
}

/* 09.02 - footer */
footer.type-2{background: #000000; text-align: center; padding: 70px 0 70px 0;}
footer.type-2 .footer-logo{display: inline-block; vertical-align: bottom; margin-bottom: 30px;}
footer.type-2 .footer-links a{color: #fff; border-color: #3b3b3b;}
footer.type-2 .footer-links a:hover{color: #f17e0e;}
footer.type-2 .copyright a{color: #f17e0e;}
#content-block footer.type-2 .copyright a:hover{color: #fff;}
@media (max-width: 767px) {
    footer.type-2{padding: 50px 0 50px 0;}
    footer.type-2 .footer-links a{display: block; padding: 3px 0; border: none; margin: 0;}
    footer.type-2 .footer-links{margin-bottom: 25px;}
}

/* 09.03 - content styles */
body.style-5.opened-menu .content-push{transform: none; -moz-transform: none; -webkit-transform: none; -ms-transform: none;}
body.style-5 .search-button{background: #f17e0e;}
body.style-5 .bubbles span{background: #f17e0e;}
body.style-5 .cart-box.popup .content .price{color: #f17e0e;}
body.style-5 .cart-box.popup .summary .grandtotal span{color: #f17e0e;}
body.style-5 .button.style-4{background: #f17e0e; border-color: #f17e0e;}

/* 09.04 - parallax slide */
.parallax-slide{position: relative;}
.parallax-clip{ height: 100%; position: absolute; width: 100%; left: 0px; top: 0px; clip: rect(auto, auto, auto, auto);}
.fixed-parallax{position: fixed; width: 100%; height: 100%; left: 0; top: 0; background-size: cover; background-position: center top; -webkit-transform: translateZ(0);}
.fixed-parallax:before{position: absolute; width: 100%; height: 100%; left: 0; top: 0; background: rgba(0,0,0,0.2); content: "";}
.parallax-slide .position-center{height: inherit; min-height: inherit; position: relative;}
.parallax-vertical-align{position: absolute; width: 100%; left: 0; top: 50%; margin-top: -85px; text-align: center;}
.parallax-article{padding: 0 15px; position: relative;}
@media only screen and (max-width: 991px){
    .fixed-parallax.parallax-fullwidth{
        position: relative;
    }
    .information-blocks.parallax-fullwidth-inner{
        overflow: visible;

    }
}
@media (min-width: 1200px) {
    .parallax-article.left-align{transform: translateX(-10%); -moz-transform: translateX(-10%); -webkit-transform: translateX(-10%); -ms-transform: translateX(-10%);}

    .parallax-article.right-align{transform: translateX(10%); -moz-transform: translateX(10%); -webkit-transform: translateX(10%); -ms-transform: translateX(10%);}
}
.parallax-article .subtitle{color: #fff; font-size: 24px; line-height: 24px; text-transform: uppercase; font-family: 'Montserrat', sans-serif; font-weight: 700; margin-bottom: 10px;}
.parallax-article.dark-text .subtitle{color: #d62020;}
.parallax-article .title{color: #fff; font-size: 80px; line-height: 72px; text-transform: uppercase; font-family: 'Montserrat', sans-serif; font-weight: 700; margin-bottom: 5px;}
.parallax-article.dark-text .title{color: #303030; border-color: #303030!important;}
.parallax-article .description{font-size: 15px; line-height: 22px; color: #fff; max-width: 470px; margin: 0 auto 25px auto;}
.parallax-article.dark-text .description{color: #808080;}
.parallax-article .info{font-size: 0;}
.parallax-article .info .button{margin: 0 5px 5px 5px;}
.parallax-slide.auto-slide{height: auto!important; padding: 200px 0; text-align: center;}
/* Tablets (>=768px)*/
@media (max-width: 991px) {
    .parallax-slide.auto-slide{padding: 150px 0;}
}
/*Phones (<768px)*/
@media (max-width: 767px) {
    .parallax-article .subtitle{font-size: 18px; line-height: 18px;}
    .parallax-article .title{font-size: 40px; line-height: 38px;}
    .parallax-slide.auto-slide{padding: 100px 0;}
}


/*-------------------------------------------------------------------------------------------------------------------------------*/
/* 10 - TEMPLATE LEFTSIDEBAR */
/*-------------------------------------------------------------------------------------------------------------------------------*/

/* 10.01 - header */
.simple-search-form{border: 1px #e8e8e8 solid; padding: 6px 0 6px 12px; position: relative; background: #fff;}
.simple-search-form.active{border-color: #3d3d3d;}
.simple-search-form input[type="text"]{width: 100%; border: none; height: 25px; line-height: 25px; background: none; padding: 0 45px 0 0; font-size: 13px; color: #222; font-weight: 300;}
.simple-search-form .simple-submit{position: absolute; width: 38px; height: 25px; border-left: 1px #e8e8e8 solid; top: 6px; right: 0; cursor: pointer; color: #919191;}
.simple-search-form .simple-submit:hover{color: #222;}
.simple-search-form .simple-submit input{opacity: 0; position: absolute; left: 0; top: 0; width: 100%; height: 100%; border: none;}
.simple-search-form .simple-submit .fa{font-size: 13px; line-height: 25px; display: block; text-align: center; color: inherit;}
.sidebar-header-content{padding: 40px 30px 20px 30px;}
header.type-3{border: 1px #f7f7f7 solid;}
header.type-3 .logo-container{text-align: center; margin-bottom: 17px;}
header.type-3 .simple-search-form{margin-bottom: 30px;}
header.type-3 .header-functionality-entry{padding-left: 0;}
@media (min-width: 1200px) {
    header.type-3{position: absolute; left: 0; top: 0; height: 100%; width: 300px; padding: 0;}
    header.type-3 .navigation{border: none;}
    header.type-3:not(.fixed-header) nav>ul>li{padding: 0 40px 0 30px; float: left; position: relative;width: auto;clear: both;display: inline-block;}
    header.type-3:not(.fixed-header) nav>ul>li>a{line-height: 50px;}
    header.type-3:not(.fixed-header) nav>ul>li.fixed-header-visible{display: none;}
    #content-block header.type-3:not(.fixed-header) .submenu{top: 0; left: 100%; margin: 0;}
    header.type-3:not(.fixed-header) .full-width .submenu, header.type-3:not(.fixed-header) .full-width-columns .submenu{width: 1100px; width: calc(100vw - 300px); max-width: 1170px!important;}
    header.type-3:not(.fixed-header) nav > ul > li > a .menu-label{right: 10px;}
    header.type-3 .navigation-footer{display: block!important; position: fixed; left: 0; bottom: 0; width: 300px; padding: 0 15px; text-align: center;}
    header.type-3 .socials-box{float: none; margin: 0;}
    header.type-3 .socials-box a{margin: 0;}
    header.type-3 .navigation-copyright{color: #7f7f7f; padding: 15px 0;}
}
@media (min-width: 1200px) and (max-width: 1400px) {
    header.type-3:not(.fixed-header) .full-width .full-width-menu-items-left{margin-right: 450px;}
    header.type-3:not(.fixed-header) .full-width .full-width-menu-items-right{width: 380px;}
    header.type-3:not(.fixed-header) .full-width .menu-slider-in .product-slide-entry{width: 116px;}
}
@media (max-width: 1199px) {
    header.type-3 .simple-search-form{display: none;}
    .sidebar-header-content{display: table; padding: 10px 0; width: 100%;}
    header.type-3 .logo-container{display: table-cell; vertical-align: middle; text-align: left; width: 300px;}
    header.type-3 .header-responsive-column{display: table-cell; vertical-align: middle; width: 400px;}
    header.type-3 .header-responsive-column .responsive-menu-toggle-class{float: right;}
    header.type-3 .header-functionality-entry{float: right;}
    header.type-3 .menu-button{position: relative; float: right; top: auto;}
}

/* 10.02 - content */
.sidebar-content-wrapper{margin-left: 300px;}
.product-mix-box{padding-bottom: 100px;}
.product-mix-box .product-slide-entry{float: left; width: 16.6666666%; max-width: 100%; position: relative; margin-bottom: 0;}
.product-mix-box .product-slide-entry .product-image{margin-bottom: 0;}
.product-mix-box .product-slide-entry:nth-child(6n+1){clear: both;}
.product-mix-info{position: absolute; left: 25px; right: 25px; bottom: 25px; background: #fff;border-radius: 3px; text-align: center; padding: 25px 10px; transform: scale(0.7); -moz-transform: scale(0.7); -webkit-transform: scale(0.7); opacity: 0;}
.product-slide-entry:hover .product-mix-info{transform: scale(1); -moz-transform: scale(1); -webkit-transform: scale(1); -ms-transform: scale(1); opacity: 1;}
body.style-6 .bubbles span{background: #d88e00;}
body.style-6 .product-slide-entry .title:hover{color: #d88e00;}
body.style-6 .price .current{color: #d88e00;}
body.style-6 .socials-box a:hover{color: #f3a000;}
body.style-6 .navigation-copyright a{color: #f3a000;}
body.style-6 .search-button{background: #f3a000;}
body.style-6 .product-slide-entry:hover img{transform: scale(1.1); -moz-transform: scale(1.1); -webkit-transform: scale(1.1); -ms-transform: scale(1.1);}
body.style-6 .cart-box.popup .content .price{color: #d88e00;}
body.style-6 .cart-box.popup .summary .grandtotal span{color: #d88e00;}
body.style-6 .button.style-4{background: #d88e00; border-color: #d88e00;}
body.style-6 .submenu.right-align{left: 100%!important; right: auto;}
@media (min-width: 1200px) {
    .sidebar-content-wrapper.fixed-header-margin{padding-top: 0!important;}
}
@media (max-width: 1800px) {
    .product-mix-box .product-slide-entry{width: 20%;}
    .product-mix-box .product-slide-entry:nth-child(6n+1){clear: none;}
    .product-mix-box .product-slide-entry:nth-child(5n+1){clear: both;}
}
/*Desktops (>=992px)*/
@media (max-width: 1199px){
    .sidebar-content-wrapper{margin: 0 30px 30px 30px;}
    .product-mix-box{padding-bottom: 0;}
}
/* Tablets (>=768px)*/
@media (max-width: 991px) {
    .product-mix-box .product-slide-entry{width: 25%;}
    .product-mix-box .product-slide-entry:nth-child(5n+1){clear: none;}
    .product-mix-box .product-slide-entry:nth-child(4n+1){clear: both;}
    .product-mix-info{transform: scale(1); -moz-transform: scale(1); -webkit-transform: scale(1); -ms-transform: scale(1);}
}
/*Phones (<768px)*/
@media (max-width: 767px) {

    .sidebar-content-wrapper{margin: 0 15px 15px 15px;}
}
@media (max-width: 768px) {
    .product-mix-box .product-slide-entry{width: 50%;}
    .product-mix-box .product-slide-entry:nth-child(3n+1){clear: none;}
    .product-mix-box .product-slide-entry:nth-child(2n+1){clear: both;}
}
@media (max-width: 400px) {
    .product-mix-box .product-slide-entry{width: 100%;}
}


/*-------------------------------------------------------------------------------------------------------------------------------*/
/* 11 - TEMPLATE WIDE */
/*-------------------------------------------------------------------------------------------------------------------------------*/

/* 11.01 - header */
.header-wrapper.style-7 header.fixed-header nav{max-width: 100%;}
@media (max-width: 1199px) {
    .header-wrapper.style-7 header.type-2{background: #000000;}
}

/* 11.02 - content styles */
body.style-7 .bubbles span{background: #66900d;}
.footer-wrapper.style-7 footer.type-2 .copyright a{color: #66900d;}
.footer-wrapper.style-7 footer.type-2 .footer-links a:hover{color: #66900d;}
body.style-7 .search-button{background: #66900d;}
body.style-7 .product-slide-entry{max-width: 310px; text-align: center;}
body.style-7 .product-slide-entry .title:hover{color: #66900d;}
.product-slide-entry .subtitle{font-size: 15px; line-height: 22px; color: #2e2e2e; font-weight: 600; display: block; text-align: left;}
.product-slide-entry .subtitle:hover{color: #66900d;}
.product-slide-entry .date{font-size: 13px; line-height: 22px; color: #a3a2a2; text-align: left;}
body.style-7 .information-blocks{border-top: 1px #ebebeb solid;}
body.style-7 .information-blocks:first-child{border: none;}
body.style-7 .price .current{color: #66900d;}
body.style-7 .swiper-active-switch{background: #66900d; border-color: #66900d;}
body.style-7 .cart-box.popup .content .price{color: #66900d;}
body.style-7 .cart-box.popup .summary .grandtotal span{color: #66900d;}
body.style-7 .button.style-4{background: #66900d; border-color: #66900d;}
@media (min-width: 1200px) {
    body.style-7 .information-blocks{margin-bottom: 100px;}
}

.product-zoom-image{cursor: zoom-in;}
/* 11.03 - fullscreen banner */
.parallax-slide .swiper-container{height: inherit!important; position: absolute; left: 0; top: 0; width: 100%;}
.parallax-slide .swiper-wrapper{height: inherit!important;}
.parallax-slide .swiper-slide{background-size: cover; background-position: center center; position: relative;}
.parallax-slide .swiper-slide:before{position: absolute; width: 100%; height: 100%; left: 0; top: 0; background: rgba(0,0,0,0.5); content: "";}
.swiper-slide .parallax-article .subtitle{transform: translateX(300px); -moz-transform: translateX(300px); -webkit-transform: translateX(300px); -ms-transform: translateX(300px); opacity: 0;}
.swiper-slide .parallax-article .title{font-size: 100px; line-height: 90px; border-top: 4px #fff solid; border-bottom: 4px #fff solid; display: inline-block; margin-bottom: 25px; transform: scale(0); -moz-transform: scale(0); -webkit-transform: scale(0); -ms-transform: scale(0); opacity: 0; backface-visibility: hidden; -webki-backface-visibility: hidden;}
.swiper-slide .parallax-article .description{transform: translateX(-300px); -moz-transform: translateX(-300px); -webkit-transform: translateX(-300px); -ms-transform: translateX(-300px); opacity: 0;}
.swiper-slide .parallax-article .info{transform: translateX(300px); -moz-transform: translateX(300px); -webkit-transform: translateX(300px); -ms-transform: translateX(300px); opacity: 0;}
.swiper-slide.active .parallax-article .subtitle, .swiper-slide.active .parallax-article .description, .swiper-slide.active .parallax-article .info{transform: translateX(0px); -moz-transform: translateX(0px); -webkit-transform: translateX(0px); -ms-transform: translateX(0px); opacity: 1;}
.swiper-slide.active .parallax-article .title{transform: scale(1); -moz-transform: scale(1); -webkit-transform: scale(1); -ms-transform: scale(1); opacity: 1;}

/* 11.04 - creative square box */
.creative-square-box{background-size: cover; background-position: center center; position: relative; text-align: center; height: 360px; overflow: hidden;}
.creative-square-box .background-box{position: absolute; left: 0; top: 0; width: 100%; height: 100%; background-size: cover; background-position: center center;}
body:not(.mobile) .creative-square-box:hover .background-box{transform: scale(2); -moz-transform: scale(2); -webkit-transform: scale(2); -ms-transform: scale(2);}
.creative-square-box:before{position: absolute; left: 0; top: 0; width: 100%; height: 100%; content: ""; background: rgba(0,0,0,0.4); z-index: 1;}
body:not(.mobile) .creative-square-box:hover:before{background: rgba(0,0,0,0.7);}
.creative-square-box .cell-view{width: 1000px; position: relative; z-index: 2;}
.creative-square-box .parallax-article{max-width: 430px; margin: 0 auto;}
.creative-square-box .parallax-article .subtitle{font-size: 16px; line-height: 18px; margin-bottom: 12px;}
.creative-square-box .parallax-article .title{font-size: 60px; line-height: 55px; margin-bottom: 12px;}
/*Desktops (>=992px)*/
@media (max-width: 1199px) {
    .creative-square-box .parallax-article .title{font-size: 45px; line-height: 40px;}
}
/* Tablets (>=768px)*/
@media (max-width: 991px) {
    .creative-square-box{height: 300px;}
    .creative-square-box .parallax-article .title{font-size: 35px; line-height: 30px;}
    .creative-square-box .parallax-article .subtitle{font-size: 14px;}
}
/*Phones (<768px)*/
@media (max-width: 767px) {
    .creative-square-box{height: auto;}
    .creative-square-box .cell-view{display: block; width: auto; padding: 25px 0;}
    .swiper-slide .parallax-article .title{font-size: 55px; line-height: 50px;}
}

/* 11.05 - blog slider */
.block-header{text-align: center; max-width: 665px; padding: 85px 0 0 0; margin: 0 auto 45px auto;}
.block-header .title{font-size: 40px; line-height: 40px; color: #2e2e2e; font-weight: 400; margin-bottom: 15px;}
.block-header .description{font-size: 16px; line-height: 25px; color: #929292; font-weight: 300;}
/* Tablets (>=768px)*/
@media (max-width: 991px) {
    .block-header{padding-top: 40px;}
}

/*-------------------------------------------------------------------------------------------------------------------------------*/
/* 12 - TEMPLATE GRID */
/*-------------------------------------------------------------------------------------------------------------------------------*/

/* 12.01 - header */
.header-wrapper.style-8 header.type-1{margin-bottom: 0;}
@media (min-width: 1200px) {
    .header-wrapper.style-8 header.type-1{padding: 0;}
    .header-wrapper.style-8 header.type-1 .nav-overflow{position: fixed; left: 0; top: auto; bottom: 0; width: 100%; border: none; background: #fff;}
    .header-wrapper.style-8 header.type-1 nav{padding: 0 60px; max-width: 100%;}
    .header-wrapper.style-8 header.type-1 .fixed-header-visible{display: block;}
    .header-wrapper.style-8 header.type-1 nav{text-align: right;}
    .header-wrapper.style-8 header.type-1 nav > ul{display: inline-block;}
    .header-wrapper.style-8 header nav>ul>li>a{font-weight: 700; line-height: 100px;}
    .header-wrapper.style-8 header nav>ul>li:last-child{padding-right: 0;}
    .header-wrapper.style-8 header .additional-header-logo{left: 60px;}
    .header-wrapper.style-8 header .navigation{height: auto; border: none;}
    .header-wrapper.style-8 header .header-top{position: fixed; left: 0; top: 0; width: 100%; background: #8ab408; border: none; height: 55px; padding-left: 20px; z-index: 1;}
    .header-wrapper.style-8 header .header-top-entry, body.style-8 header .header-top-entry .title a{color: #fff;}
    .header-wrapper.style-8 header .additional-header-logo img{max-height: 70px;}
    .header-wrapper.style-8 header .fixed-header-square-button{margin-top: 0;}
    .header-wrapper.style-8 header .header-functionality-entry{color: #fff;}
    .header-wrapper.style-8 header .header-functionality-entry:hover{color: #e3e3e3;}
    .header-wrapper.style-8 header .header-functionality-entry b{display: inline-block; vertical-align: middle; position: relative;top: -1px; color: #fff;}
    .header-wrapper.style-8 header .logo-wrapper{display: none;}
    .header-wrapper.style-8 header .header-middle{border: none;}
    .header-wrapper.style-8 header .header-middle .right-entries{position: absolute; top: 20px; right: 0; position: fixed; z-index: 1;}
    .header-wrapper.style-8 header .header-middle .open-cart-popup{position: relative; padding: 0 30px; color: #cee094;}
    .header-wrapper.style-8 header .header-middle .open-cart-popup *{position: relative;}
    .header-wrapper.style-8 header .header-middle .open-cart-popup:before{position: absolute; width: 100%; height: 55px; top: -20px; left: -1px; background: #7fa606; content: "";}
    .header-wrapper.style-8 .fixed-header-margin{padding: 55px 0 100px 0!important;}
    .header-wrapper.style-8 header .submenu{bottom: 100%; top: auto; text-align: left;}
    .header-wrapper.style-8 header .submenu-links-line{top: auto; bottom: 100%;}
    .header-wrapper.style-8 header .full-width .submenu, body.style-8 header .full-width-columns .submenu{left: auto; right: 0;}
}

/* 12.02 - content styles */
body.style-8 .product-slide-entry .title:hover{color: #8ab408;}
body.style-8 .product-slide-entry .price .current{color: #8ab408;}
body.style-8 .search-button{background: #8ab408;}
body.style-8 .bubbles span{background: #8ab408;}
body.style-8 .product-slide-entry:hover img{transform: scale(1.1); -moz-transform: scale(1.1); -webkit-transform: scale(1.1); -ms-transform: scale(1.1);}
body.style-8 .cart-box.popup .content .price{color: #8ab408;}
body.style-8 .cart-box.popup .summary .grandtotal span{color: #8ab408;}
body.style-8 .button.style-4{background: #8ab408; border-color: #8ab408;}


/*-------------------------------------------------------------------------------------------------------------------------------*/
/* 13 - TEMPLATE FULLWIDTHHEADER */
/*-------------------------------------------------------------------------------------------------------------------------------*/

/* 13.01 - header */
.header-wrapper.style-9 header.type-1{margin-bottom: 30px;}
.departmets-drop-down{float: left; position: relative; z-index: 1; line-height: 55px;}
.departmets-drop-down .title{font-size: 14px; color: #2f2f2f; font-weight: 700; text-transform: uppercase; cursor: pointer;}
.departmets-drop-down .fa{display: inline-block; vertical-align: middle; position: relative; top: -2px; margin-right: 5px;}
.departmets-drop-down .title .fa{display: none; width: 14px; text-align: center;}
.departmets-drop-down .title .fa:first-child{display: inline-block;}
.departmets-drop-down .title.active .fa{display: inline-block;}
.departmets-drop-down .title.active .fa:first-child{display: none;}
.departmets-drop-down .list{position: absolute; width: 100%; left: 0; top: 100%; z-index: 1; background: #fff; border: 1px #ebebeb solid; min-width: 280px; display: none;}
.departmets-drop-down .list a{border-top: 1px solid #f2f2f2; color: #2e2e2e; display: block; font-size: 13px; line-height: 15px; margin-top: -1px; padding: 16px 20px;}
.departmets-drop-down .list a:hover{color: #878787;}
.departmets-drop-down .list a .fa{color: #bdbdbd; margin-right: 7px;}
@media (min-width: 1200px) {
    .header-wrapper.style-9 header.type-1 .header-top{padding-left: 30px;}
    .header-wrapper.style-9 header.type-1 .header-middle{padding-left: 30px; padding-right: 30px;}
    .header-wrapper.style-9 header.type-1 .header-top-entry{z-index: 1;}
    .header-wrapper.style-9 header.type-1 .full-width .submenu, body.style-9 header.type-1 .full-width-columns .submenu{left: auto; right: 0;}
    .header-wrapper.style-9 header.type-1{padding: 0;}
    .header-wrapper.style-9 header.type-1 .navigation{position: absolute; top: 0; right: 10px; left: 0; height: 55px; border: none;}
    .header-wrapper.style-9 header.type-1:not(.fixed-header) nav>ul>li>a{line-height: 55px;}
    .header-wrapper.style-9 header.type-1:not(.fixed-header) nav>ul{float: right;}
    .header-wrapper.style-9 header.type-1:not(.fixed-header) nav>ul>li>a .menu-label{top: 3px;}
    .header-wrapper.style-9 header.fixed-header nav{max-width: 100%; padding: 0 30px;}
    .header-wrapper.style-9 header .additional-header-logo{left: 30px;}
}

/* 13.02 - footer */
.footer-wrapper.style-9 footer.type-2{background: #f7f7f7;}
.footer-wrapper.style-9 footer.type-2 .footer-links a{color: #3d3d3d;}
.footer-wrapper.style-9 footer.type-2 .footer-links a:hover{color: #c19f00;}
.footer-wrapper.style-9 footer.type-2 .copyright a{color: #c19f00;}
.footer-wrapper.style-9 footer.type-2 .copyright a:hover{color: #3d3d3d!important;}

/* 13.03 - content styles */
body.style-9 .search-button, .header-wrapper.style-9 .search-button{background: #e4bc00;}
body.style-9 .block-title{font-size: 16px;}
body.style-9 .swiper-tabs .block-title:before{background: #e0ba06;}
body.style-9 .product-slide-entry .title:hover{color: #e4bc00;}
body.style-9 .price .current{color: #e4bc00;}
body.style-9 .bubbles span{background: #c19f00;}
body.style-9 .list-type-1 a:hover{color: #c19f00;}
body.style-9 .list-type-1 li .fa{color: #e0ba06;}
body.style-9 .swiper-active-switch{background: #e0ba06; border-color: #e0ba06;}
body.style-9 .cart-box.popup .content .price{color: #e4bc00;}
body.style-9 .cart-box.popup .summary .grandtotal span{color: #e4bc00;}
body.style-9 .button.style-4{background: #e4bc00; border-color: #e4bc00;}

/* 13.04 - promo banner */
.promo-banner-box{position: relative; background-size: cover; background-position: right top; height: 400px; margin-bottom: 30px; display: block;}
.promo-banner-box:before{position: absolute; left: 0; top: 0; width: 100%; height: 100%; opacity: 0; background-color: inherit; content: "";}
body:not(.mobile) .promo-banner-box:hover:before{opacity: 0.8;}
.promo-banner-box .promo-text{position: absolute; left: 15px; right: 15px; bottom: 30px; font-family: 'Lato', sans-serif; text-transform: uppercase;}
body:not(.mobile) .promo-banner-box:hover .promo-text{bottom: 50%; transform: translateY(50%); -moz-transform: translateY(50%); -webkit-transform: translateY(50%); -ms-transform: translateY(50%);}
.promo-banner-box .promo-text .title{font-size: 18px; line-height: 24px; color: #fff; font-weight: 400; display: block;}
.promo-banner-box .promo-text .description{font-size: 60px; line-height: 55px; color: #fff; font-weight: 900; letter-spacing: -3px; margin-bottom: 20px; display: block;}
body:not(.mobile) .promo-banner-box:hover .promo-text .description{margin-bottom: 5px;}
.promo-banner-box .promo-text .detail-link{font-size: 14px; line-height: 17px; color: #fff; font-weight: 400; display: inline-block; border-bottom:
    1px #fff solid;}
body:not(.mobile) .promo-banner-box .promo-text .detail-link:hover, body:not(.mobile) .promo-banner-box:hover .promo-text .detail-link{border-color: transparent;}
.custom-col-1, .custom-col-2, .custom-col-3, .custom-col-4, .custom-col-5{padding: 0 15px; float: left; position: relative;}
.custom-col-1{width: 26%;}
.custom-col-2{width: 22%;}
.custom-col-3{width: 78%; left: -22%;}
.custom-col-4{width: 22%; left: 78%;}
.custom-col-5{width: 100%;}


@media (max-width: 1500px) {
    .custom-col-1{width: 25%;}
    .custom-col-2{width: 25%;}
    .custom-col-3{width: 75%; left: -25%;}
    .custom-col-4{width: 25%; left: 75%;}
    .promo-banner-box{height: auto; padding-bottom: 100%;}
    .promo-banner-box .promo-text .description{font-size: 45px; line-height: 40px; letter-spacing: -2px;}
}
/*Desktops (>=992px)*/
@media (max-width: 1199px) {
    .promo-banner-box .promo-text .description{font-size: 35px; line-height: 32px; letter-spacing: -1px;}
}
/* Tablets (>=768px)*/
@media (max-width: 991px) {
    .custom-col-1{width: 50%;}
    .custom-col-2{width: 50%;}
    .custom-col-3{width: 100%; left: 0;}
    .custom-col-4{width: 100%; left: 0;}
    .custom-col-5{width: 50%;}

    .promo-banner-box .promo-text .description{font-size: 60px; line-height: 55px; letter-spacing: -3px;}
}
/*Phones (<768px)*/
@media (max-width: 767px) {
    .promo-banner-box .promo-text .description{font-size: 35px; line-height: 32px; letter-spacing: -1px;}
}
/*Phones (<768px)*/
@media (max-width: 450px) {
    .custom-col-1, .custom-col-2, .custom-col-5{width: 100%;}
    .custom-col-3:last-child{left: 0%;}
    .custom-col-2:first-child{left: 0%;}
}


/*-------------------------------------------------------------------------------------------------------------------------------*/
/* 14 - TEMPLATE PRODUCTS */
/*-------------------------------------------------------------------------------------------------------------------------------*/

/* 14.01 - header */
.header-product{display: table; width: 100%;}
.header-product .logo-wrapper{padding: 10px 0; width: 250px;}
.product-header-message{display: table-cell; vertical-align: middle; font-size: 12px; line-height: 16px; text-transform: uppercase; font-weight: 700; letter-spacing: 1px; text-align: center;}
.product-header-content{display: table-cell; vertical-align: middle; text-align: right; width: 450px;}
.product-header-content .line-entry{display: inline-block; vertical-align: bottom;}
header .line-entry{white-space: nowrap;}
.product-header-content .middle-line{height: 1px; background: #ebebeb;}
.header-wrapper.style-10 .line-entry:last-child{padding-top: 0px; padding-bottom: 0px;}
.header-wrapper.style-10 .header-top-entry:last-child .title{padding-right: 0;}
@media (min-width: 1200px) {
    .header-wrapper.style-10 header:not(.fixed-header) nav>ul>li>a{color: #fff;text-decoration: none;}
    .header-wrapper.style-10 nav>ul>li>.fa{color: #cecece;}
    .header-wrapper.style-10 .navigation{border: none;}
    .header-wrapper.style-10 header:not(.fixed-header) .nav-overflow{background: #000000; border: none;}
    .header-wrapper.style-10 .nav-overflow:before{content: ""; width: 100000px; left: 50%; margin-left: -50000px; position: absolute; top: 0; height: 100%; background: inherit;}
}
/*Desktops (>=992px)*/
@media (max-width: 1199px) {
    .header-wrapper.style-10 header{padding-top: 40px!important;}
    .product-header-message{display: none;}
    .product-header-content .line-entry:first-child{position: absolute; left: 30px; right: 30px; top: 0; border-bottom: 1px solid #f0f0f0;}
    .header-wrapper.style-10 .header-top-entry .title{border: none; padding-left: 0;}
    .increase-icon-responsive span{display: none;}
    .product-header-content{width: 400px;}
    .header-product .logo-wrapper{width: 400px;}
    .product-header-content .middle-line{display: none;}
}
/*Phones (<768px)*/
@media (max-width: 767px) {
    .product-header-content .line-entry:first-child{left: 15px; right: 15px;}
}

/*-------------------------------------------------------------------------------------------------------------------------------*/
/* 23 - ABOUT */
/*-------------------------------------------------------------------------------------------------------------------------------*/
#content-block .continue-link{font-size: 14px; line-height: 18px; color: #d14242; display: inline-block; margin-bottom: 15px; font-weight: 600;}
#content-block .continue-link:hover{color: #000000;}
.heading-article{margin-bottom: 25px;}
.heading-article .title{font-size: 32px; line-height: 32px; color: #2e2e2e; font-weight: 500; margin-bottom: 15px;}
.heading-article .description{font-size: 24px; line-height: 32px; color: #000000; font-weight: 300; margin-bottom: 15px;}


/*

/*-------------------------------------------------------------------------------------------------------------------------------*/
/* 27 - CART */
/*-------------------------------------------------------------------------------------------------------------------------------*/
.cart-table{width: 100%; font-size: 14px; line-height: 28px; color: #2e2e2e; font-weight: 600;}
.cart-table .column-1{}
.cart-table .column-2{width: 150px;}
.cart-table .column-3{width: 180px;}
.cart-table .column-4{width: 130px;}
.cart-table .column-5{width: 35px;}
.cart-table .subtotal{font-size: 20px; line-height: 28px; font-weight: 600;}
.cart-table td{vertical-align: middle; padding: 15px 30px; border-bottom: 1px #e6e6e6 solid;}
.cart-table th{vertical-align: middle; padding: 25px 30px; font-size: 16px; line-height: 20px; color: #343434; border-top: 1px #e6e6e6 solid; border-bottom: 1px #e6e6e6 solid;}
.cart-table td:first-child{padding-left: 0!important;}
.cart-table th:first-child{padding-left: 100px!important;}
.cart-table td:last-child, .cart-table th:last-child{padding-right: 0; padding-left: 0;}
.table-responsive{overflow-y: hidden; border: none;}
.cart-submit-buttons-box{padding: 25px 0 13px 0; text-align: right; font-size: 0;}
.cart-submit-buttons-box .button{margin-left: 11px;}
.cart-column-title{font-size: 16px; line-height: 20px; color: #000000232; font-weight: 600; border-top: 1px #e6e6e6 solid; border-bottom: 1px #e6e6e6 solid; padding: 20px 0; margin-bottom: 20px;}
.cart-column-title.size-1{font-size: 18px; padding: 25px 0;}
.cart-column-title.size-2{padding: 23px 0;}
.cart-summary-box{border: 2px #e6e6e6 solid; padding: 40px 15px; text-align: right;}
.cart-summary-box .button{padding-left: 10px; padding-right: 10px; display: block; margin-bottom: 18px;}
.cart-summary-box .sub-total{font-size: 15px; line-height: 20px; color: #878787; font-weight: 600; margin-bottom: 5px;}
.cart-summary-box .grand-total{font-size: 22px; line-height: 30px; color: #343434; font-weight: 600; margin-bottom: 15px;}
.cart-summary-box .simple-link{font-size: 13px; color: #808080; line-height: 24px; font-weight: 400;}
.cart-summary-box .simple-link:hover{color: #343434;}
.sidebar-subtotal{margin-bottom: 30px;}
.sidebar-subtotal .price-data{text-align: center; padding-bottom: 25px; border-bottom: 1px #e6e6e6 solid; margin-bottom: 30px;}
.sidebar-subtotal .price-data .main{font-size: 40px; line-height: 40px; color: #000000232; font-weight: 700; font-family: 'Montserrat', sans-serif; margin-bottom: 15px;}
.sidebar-subtotal .price-data .title{font-size: 13px; line-height: 18px; color: #666666; margin-bottom: 5px;}
.sidebar-subtotal .price-data .subtitle{font-size: 12px; line-height: 16px; color: #000000232; font-weight: 600; text-transform: uppercase; margin-bottom: 10px;}
.sidebar-subtotal .additional-data .title{font-size: 16px; line-height: 24px; color: #000000232; font-weight: 600; margin-bottom: 20px;}
.sidebar-subtotal .additional-data .title .inline-label{margin-left: 0; margin-right: 10px;}
.sidebar-subtotal .additional-data .button{display: block; padding-left: 10px; padding-right: 10px;}

/* Tablets (>=768px)*/
@media (max-width: 991px) {
    .cart-table td, .cart-table th{padding-left: 15px; padding-right: 15px;}
    .cart-table .column-2{width: 105px;}
    .cart-table .column-3{width: 150px;}
}
/*Phones (<768px)*/
@media (max-width: 767px) {
    .cart-table{min-width: 800px;}
    .cart-summary-box{padding: 30px 15px;}
}


/*-------------------------------------------------------------------------------------------------------------------------------*/
/* 28 - CHECKOUT */
/*-------------------------------------------------------------------------------------------------------------------------------*/
.forgot-password{color: #000000!important; font-weight: 500; margin-left: 20px;}
.forgot-password:hover{text-decoration: underline;}
.checkout-progress-widget{margin-bottom: 25px;}
.checkout-progress-widget .step-entry{display: block; font-size: 14px; line-height: 26px; color: #343434; font-weight: 600;}
.checkout-progress-widget a.step-entry:hover{color: #000000;}


/*-------------------------------------------------------------------------------------------------------------------------------*/
/* 29 - TEMPLATE UNDERWEAR */
/*-------------------------------------------------------------------------------------------------------------------------------*/

/* 29.01 - header (class "type-2") */
.header-wrapper.style-11 header{}
header.type-4 .header-top:before{background: #2e2e2e; position: absolute; width: 10000px; left: 50%; margin-left: -5000px; height: 100%; content: "";}
@media (min-width: 1200px) {
    /*header.type-2:not(.fixed-header) nav, header.type-2:not(.fixed-header) .navigation{position: static;}*/
    header.type-4 .header-top-entry, body.style-8 header .header-top-entry .title a{color: #fff;}
    header.type-4 .additional-header-logo img{max-height: 70px;}
    /*header.type-4 .fixed-header-square-button{margin-top: 0;}*/
    header.type-4 .header-functionality-entry{color: #fff;}
    header.type-4 .header-functionality-entry:hover{color: #e3e3e3;}
    header.type-4 .header-functionality-entry b{display: inline-block; vertical-align: middle; position: relative;top: -1px; color: #fff;}
    header.type-4 .logo-wrapper{width: auto; text-align: center;}
    /*header.type-4 .header-middle{border: none;}*/
    header.type-4 .header-middle .right-entries{position: absolute; top: -36px; right: 0; z-index: 1;}
    header.type-4 .header-middle .open-cart-popup{position: relative; padding: 0 30px; color: #9c9c9c;}
    header.type-4 .header-middle .open-cart-popup .fa{color: #fff;}
    header.type-4 .header-middle .open-cart-popup *{position: relative;}
    header.type-4 .header-middle .open-cart-popup:before{position: absolute; width: 100%; height: 55px; top: -20px; left: -1px; background: #383838; content: "";}
    /*.header-wrapper.style-8 .fixed-header-margin{padding: 55px 0 100px 0!important;}
    .header-wrapper.style-8 header .submenu{bottom: 100%; top: auto; text-align: left;}
    .header-wrapper.style-8 header .submenu-links-line{top: auto; bottom: 100%;}
    .header-wrapper.style-8 header .full-width .submenu, body.style-8 header .full-width-columns .submenu{left: auto; right: 0;}*/
    header.type-4 .header-simple-search{position: absolute; width: 100%; left: 0; top: 0; padding-top: 14px;}
    header.type-4 .header-simple-search .simple-search-form{z-index: 1;}
    header.type-4:not(.fixed-header) nav>ul{width: 75%;}
    header.type-4 .header-top-entry .title{border-color: #4c4c4c;}
    header.type-4 .header-functionality-entry{border-color: #4c4c4c;}
    header.type-4 .header-top-entry .title .fa{color: #fff;}
    header.type-4 .header-top-entry .title .fa:last-child{color: #6c6c6c;}
    header.type-4 .header-top-entry.hidden-xs{color: #8c8c8c;}
    header.type-4 .header-top-entry.hidden-xs a{color: #fff;}
}

@media (max-width: 1199px) {
    .header-wrapper.center-container header.type-3{background: #000000; border: none;}
    .header-wrapper.center-container header.type-3 .header-functionality-entry *{color: #fff;}
    .sidebar-content-wrapper.center-container .content-center{padding-top: 30px!important;}
}
/* Tablets (>=768px)*/
@media (max-width: 991px) {

}
/*Phones (<768px)*/
@media (max-width: 767px) {
    .sidebar-content-wrapper.center-container .content-center{padding-top: 15px!important;}
    .custom-col-4-in-row{width: 33.0003300033000%;}
    .custom-col-4-in-row:nth-child(4n+1){clear: none;}
    .custom-col-4-in-row:nth-child(3n+1){clear: both;}
    .newsletter-join .cell-view{height: auto;}
    .information-entry-xs{margin-bottom: 10px;}
    body.style-20 .products-swiper{margin: 0;}
}
@media (max-width: 450px) {
    .custom-col-4-in-row{width: 50%;}
    .custom-col-4-in-row:nth-child(3n+1){clear: none;}
    .custom-col-4-in-row:nth-child(2n+1){clear: both;}
}


/*-------------------------------------------------------------------------------------------------------------------------------*/
/* 00 - MEDIA QUERIES */
/*-------------------------------------------------------------------------------------------------------------------------------*/
/*Desktops (>=1200px)*/
@media (min-width: 1200px) {

}
/*Desktops (>=992px)*/
@media (max-width: 1199px) {

}
/* Tablets (>=768px)*/
@media (max-width: 991px) {

}
/*Phones (<768px)*/
@media (max-width: 767px) {

}

/*-------------------------------------------------------------------------------------------------------------------------------*/
/* 00 - CSS ANIMATIONS */
/*-------------------------------------------------------------------------------------------------------------------------------*/
.sidebar-navigation .entry:before, .sidebar-navigation .entry, .button, .socials-box a, .socials-box a .fa, .search-drop-down .category-entry, .search-button, .header-functionality-entry, footer a, .product-slide-entry .title, .product-slide-entry .tag, .inline-product-entry .title, .inline-product-entry .image, .list-type-1 a, .hover-class-1:after, .hover-label, .menu-slider-arrows a .fa, .bottom-line-a, .top-line-a, .fixed-header-square-button .fa, .read-more, .product-mix-info, .simple-search-form .simple-submit, .departmets-drop-down .list a, .copyright a, .styled-form .submit-wrapper, .socials-box a .fa, .sidebar-logos-row a img, a.sale-entry:before, a.sale-entry .sale-price, a.sale-entry .sale-price span, a.sale-entry .sale-description, .breadcrumb-box a, .icon-entry .image, .quantity-selector .entry.number-minus, .quantity-selector .entry.number-plus, .tabs-container.style-1 .tab-switcher, .size-selector .entry:after, .color-selector .entry:after, .color-selector .entry:before, .blog-entry .title, .blog-entry .subtitle a, .blog-entry .subtitle a b, .blog-entry .readmore, .square-button, .tags-box a, .categories-list ul li a, .container-404 .text a, .portfolio-navigation a, .portfolio-entry .title, .action-button, .hover-layer, .continue-link, .accordeon-title, .traditional-cart-entry .tag, .traditional-cart-entry .title, .remove-button, .cart-summary-box .simple-link, .checkout-progress-widget a.step-entry, .simple-field, .column-article-entry .title, .product-slide-entry .subtitle, .parallax-view, .simple-form .submit, .latest-entries-heading .latest-more, .demo-categories-entry .title, .demo-categories-entry .list a, .sale-entry-border, .sale-entry-border:before, .color-text-widget, .color-text-widget .cell-view, .color-text-widget .title, .color-text-widget .description, .sale-entry, .simple-search-form, .special-item-entry>img{-moz-transition:all 0.15s ease-out; -o-transition:all 0.15s ease-out; -webkit-transition:all 0.15s ease-out; transition:all 0.15s ease-out; -ms-transition:all 0.15s ease-out;}
.product-slide-entry .product-image:after, .sidebar-navigation .title .fa, .navigation-banner-content, .from-the-blog-entry .image:after, .toggle-list-button:after, .product-image .bottom-line, .product-image .top-line-a, .navigation-banner-content .subtitle, .navigation-banner-content .title, .navigation-banner-content .description, .navigation-banner-content .info, .swiper-slide .parallax-article .subtitle, .swiper-slide .parallax-article .description, .swiper-slide .parallax-article .info, a.mozaic-banner-entry .subtitle, a.mozaic-banner-entry .title, a.mozaic-banner-entry .description, a.mozaic-banner-entry:before, .creative-square-box .background-box, .creative-square-box:before, .promo-banner-box:before, .promo-banner-box .promo-text, .promo-banner-box .promo-text .description, .product-image img, .product-thumbnails-swiper .paddings-container, .blog-entry .image img, .comment-image:after, .hover-layer .info, .title-info, .actions, a.mozaic-banner-entry .view{-moz-transition:all 300ms ease-out; -o-transition:all 300ms ease-out; -webkit-transition:all 300ms ease-out; transition:all 300ms ease-out; -ms-transition:all 300ms ease-out;}
.swiper-slide .parallax-article .title, .portfolio-entry .image img, .portfolio-entry:hover .portfolio-drop-down, .overlay-popup .close-layer, .overlay-popup .popup-container{-moz-transition:all 500ms ease-out; -o-transition:all 500ms ease-out; -webkit-transition:all 500ms ease-out; transition:all 500ms ease-out; -ms-transition:all 500ms ease-out;}
.creative-square-box:hover .background-box, .blog-entry .image:hover img, .portfolio-entry:hover .image img{-moz-transition:all 15000ms linear!important; -o-transition:all 15000ms linear!important; -webkit-transition:all 15000ms linear!important; transition:all 15000ms linear!important; -ms-transition:all 15000ms linear!important;}
.disable-animation, .shop-grid .product-slide-entry .title{-moz-transition: none!important; -o-transition: none!important; -webkit-transition: none!important; transition: none!important; -ms-transition: none!important;}

/*transition delay*/
.navigation-banner-content .subtitle, .swiper-slide .parallax-article .subtitle, .swiper-slide .parallax-article .description, .overlay-popup.active .popup-container{transition-delay:200ms; -moz-transition-delay:200ms; -webkit-transition-delay:200ms; -ms-transition-delay:200ms;}
.navigation-banner-content .title{transition-delay:150ms; -moz-transition-delay:150ms; -webkit-transition-delay:150ms; -ms-transition-delay:150ms;}
.swiper-slide .parallax-article .info{transition-delay:400ms; -moz-transition-delay:400ms; -webkit-transition-delay:400ms; -ms-transition-delay:400ms;}

.header-demo{height: 250px; position: relative; background-size: cover; background-position: center top; margin-bottom: 50px;}
.header-demo.background-demo:before{background: rgba(0, 0, 0, 0.2) none repeat scroll 0 0; content: ""; height: 100%; left: 0; position: absolute; top: 0; width: 100%;}
.header-demo .header-wrapper.style-3 header:before{height: 205px;}
.header-demo header{position: absolute!important;}

/*ie*/
_:-ms-input-placeholder, :root .simple-field.simple-drop-down select {padding-right: 22px;}
_:-ms-input-placeholder, :root .size-1.simple-field.simple-drop-down select{padding-right: 14px;}
_:-ms-input-placeholder, :root .simple-drop-down select{padding-right: 10px;}

@media (max-width: 991px) and (min-width: 768px){
    .header-functionality-entry{margin-left: 15px;}
}


.rating-box{color: #f5c10c; font-size: 14px; line-height: 14px; margin-bottom: 10px;}
.rating-box .star{display: inline-block;}


/*-------------------------------------------------------------------------------------------------------------------------------*/
/* 15 - PRODUCTS DETAIL BOX */
/*-------------------------------------------------------------------------------------------------------------------------------*/
/*preview box*/
.product-preview-box{max-width: 570px;}
.product-preview-box .pagination{display: none;}
.product-preview-box .swiper-slide img{display: block; width: 100%; height: auto;}
.product-zoom-container{position: absolute; left: 0; top: 0; width: 100%; height: 100%; overflow: hidden; display: none; opacity: 0;}
.product-zoom-container.visible{display: block;}
.product-zoom-container .move-box{position: absolute; width: 300%; left: 0; top: 0;}
.product-zoom-container .default-image{display: block; width: 100%; height: auto;}
.product-zoom-container .zoomed-image{position: absolute; left: 0; top: 0; width: 100%; height: auto;}
.product-zoom-container .zoom-area{position: absolute; left: 0; top: 0; width: 35%; height: 35%; border: 3px rgba(255,255,255,0.4) solid;}
.product-preview-swiper{margin-bottom: 15px;}
.swiper-hidden-edges{overflow: hidden;}
.product-thumbnails-swiper{margin-left: -8px; margin-right: -8px;}
.product-thumbnails-swiper .paddings-container{padding: 0 8px;}
.product-thumbnails-swiper .swiper-slide{cursor: pointer;}
.product-thumbnails-swiper .swiper-slide.selected .paddings-container{opacity: 0.5;}
/*breadcrumb*/
.breadcrumb-box{font-size: 0; margin-bottom: 25px;}
.breadcrumb-box a{display: inline-block; font-size: 13px; color: #696969; line-height: 16px; margin-right: 7px; padding: 7px 0;}
.breadcrumb-box a:after{content: "\f105"; font-family: FontAwesome; display: inline-block; margin-left: 7px;}
.breadcrumb-box a:last-child:after{display: none;}
.breadcrumb-box a:hover{color: #2e2e2e;}
.breadcrumb-entry{padding: 40px 0; background-position: center center; background-repeat: no-repeat; border-top: 1px #eee solid; border-bottom: 1px #eee solid; text-align: center; background-size: cover;}
.breadcrumb-entry.align-left{text-align: left;}
.breadcrumb-entry.align-right{text-align: right;}
.breadcrumb-entry .breadcrumb-title.style-1{font-size: 36px; line-height: 36px; color: #312926; font-weight: 400; letter-spacing: -1px;}
.breadcrumb-entry .breadcrumb-title.style-2{font-size: 26px; line-height: 26px; text-transform: uppercase; font-weight: 600;}
.breadcrumb-entry .breadcrumb-title.dark{color: #312926;}
.breadcrumb-entry .breadcrumb-title.light{color: #fff;}
.breadcrumb-box.light a{color: rgba(255, 255, 255, 0.5);}
.breadcrumb-box.light a:hover{color: rgba(255, 255, 255, 1);}
/*product information*/
.product-detail-box{margin-bottom: 40px;}
.product-detail-box .product-title{font-size: 30px; line-height: 34px; margin-bottom: 14px; color: #3d3d3d; font-weight: 400;}
.product-detail-box .product-subtitle{font-size: 14px; line-height: 18px; margin-bottom: 14px; color: #007f06; font-weight: 500;}
.product-detail-box .product-subtitle2{font-size: 14px; line-height: 18px; margin-bottom: 14px; color: #d60600; font-weight: 500;}
.product-detail-box .rating-box{padding: 8px 0; margin-bottom: 15px;}
/*.product-detail-box .rating-box .star{color: #313131;}*/
.product-detail-box .rating-box .rating-number{font-size: 14px; color: #000000; line-height: 14px; font-weight: 500; display: inline-block; margin-left: 10px;}
.product-description{font-size: 14px; line-height: 24px; color: #000000330003300033000; font-weight: 400;}
.detail-info-entry{margin-bottom: 25px;}
.detail-info-entry-title{font-size: 14px; color: #313131; line-height: 18px; font-weight: 600; margin-bottom: 7px;}
.product-detail-box .price{line-height: 36px; font-family: 'Lato', sans-serif; letter-spacing: -2px;}
.product-detail-box .price .prev{font-size: 25px; color: #9c9c9c; font-weight: 400; display: inline-block; vertical-align: middle; margin-right: 7px;text-decoration: line-through;}
.product-detail-box .price .current{font-size: 36px; color: #000000!important; font-weight: 700; display: inline-block; vertical-align: middle;}
.size-selector{font-size: 0;}
.size-selector .spacer{height: 0; margin-top: -12px;}
.size-selector .entry{display: inline-block; width: 40px; height: 40px; line-height: 37px; border: 1px #d9d9d9 solid; text-align: center; font-size: 12px; color: #4c4c4c; font-weight: 500; margin-right: 12px; position: relative; text-transform: uppercase; cursor: pointer; margin-bottom: 12px;}
.size-selector .entry:after{position: absolute; left: -1px; top: -1px; right: -1px; bottom: -1px; border: 3px #d9d9d9 solid; content: ""; opacity: 0;}
.size-selector .entry.active:after{opacity: 1; border: 3px #000000 solid;}
.size-selector .entry:hover:after{opacity: 1;}
.color-selector{font-size: 0;}
.color-selector .spacer{height: 0; margin-top: -12px;}
.color-selector .entry{width: 37px; height: 37px; display: inline-block; margin-right: 12px; cursor: pointer; position: relative; margin-bottom: 12px; line-height: 35px;}
.color-selector .entry:after{position: absolute; left: -1px; top: -1px; right: -1px; bottom: -1px; border: 3px #d9d9d9 solid; content: ""; opacity: 0;}
.color-selector .entry.active:after{opacity: 1; border: 3px #000000 solid;}
.color-selector .entry:hover:after{opacity: 1;}
.color-selector .entry:before{opacity: 0; border: 1px #fff solid; left: 2px; top: 2px; right: 2px; bottom: 2px; content: ""; position: absolute;}
.color-selector .entry.active:before{opacity: 1;}
.color-selector .entry:hover:before{opacity: 1;}
.quantity-selector{font-size: 0;}
.quantity-selector .button{margin-right: 20px;}
.quantity-selector .entry{border: 1px #d1d1d1 solid; height: 37px; line-height: 35px; width: 37px; margin-left: -1px; display: inline-block; cursor: pointer; position: relative; font-size: 12px; color: #4c4c4c; text-align: center; user-select: none; -webkit-user-select: none; -moz-user-select: none;}
.quantity-selector .entry.number-minus:before, .quantity-selector .entry.number-plus:before{content: ""; width: 11px; height: 1px; background: #4d4d4d; left: 50%; margin-left: -5.5px; top: 50%; margin-top: -0.5px; position: absolute;}
.quantity-selector .entry.number-plus:after{content: ""; height: 11px; width: 1px; background: #4d4d4d; left: 50%; margin-left: -0.5px; top: 50%; margin-top: -5.5px; position: absolute;}
.quantity-selector .entry.number{cursor: default; width: 44px; padding: 0 5px; width: auto; min-width: 44px;}
.quantity-selector .entry.number-minus:hover, .quantity-selector .entry.number-plus:hover{background: #000000;}
.quantity-selector .entry.number-minus{
    margin-left: 0;
}
.quantity-selector .entry:hover:before, .quantity-selector .entry:hover:after{background: #fff!important;}
.quantity-selector .entry.number-minus:active, .quantity-selector .entry.number-plus:active{background: #f71414;}
.tags-selector{font-size: 13px; line-height: 18px; color: #808080; font-weight: 300;}
.tags-selector .detail-info-entry-title{display: inline-block; text-transform: uppercase; position: relative; top: 1px;}
.tags-selector a{color: #808080;}
.tags-selector a:hover{text-decoration: underline;}
.share-box{border-top: 1px #ebebeb solid; border-bottom: 0px #ebebeb solid; padding: 12px 0; position: relative;}
.share-box:after{width: 100%; height: 0; clear: both; display: block; content: "";}
.share-box .title{font-size: 14px; color: #808080; font-weight: 300; line-height: 30px; float: left;}
.share-box .socials-box{float: right;}
.share-box .socials-box a{margin: 0;}
.product-detail-box .button.style-10, .product-detail-box .button.style-11{float: left; width: 50%; padding-left: 10px; padding-right: 10px;}
@media (min-width: 767px) {
    .product-detail-box .button.style-10, .product-detail-box .button.style-11{max-width: 187px;}
}
.product-sidebar .products-list{padding: 30px 30px 15px 30px; border: 1px #f0f0f0 solid;}
.product-sidebar .block-title{font-size: 18px;}
.product-sidebar .inline-product-entry:last-child{border-bottom: none;}
.production-logo{text-align: center; margin-bottom: 30px; padding-bottom: 15px;}
.production-logo .background{background: #fafafa; margin-bottom: 15px; padding: 45px 25px 30px 25px;}
.production-logo .logo{padding-bottom: 15px; border-bottom: 2px #e6e6e6 solid; margin-bottom: 12px;}
.production-logo .logo img{max-width: 100%; height: auto; display: inline-block;}
.production-logo a{font-size: 12px; line-height: 14px; color: #000000; font-weight: 600;}
.production-logo a:hover{color: #808080;}

/* Tablets (>=768px)*/
@media (max-width: 991px) {

}

/*Phones (<768px)*/
@media (max-width: 767px) {
    .product-detail-box .button{float: none!important; width: auto!important; display: block!important;}
    .share-box .title, .share-box .socials-box{float: none; text-align: center;}
}

/*product tabs*/
.tabs-container.style-1 .swiper-tabs{font-size: 0;}
.tabs-container.style-1 .tab-switcher{font-weight: 600; font-size: 13px; line-height: 13px; color: #000000; padding: 15px 20px; border: 1px #e6e6e6 solid; display: inline-block; margin-right: 14px; text-transform: uppercase;}
.tabs-container.style-1 .tab-switcher.active{background: #000000; color: #fff; border-color: #000000;}
.tabs-container.style-1 .swiper-tabs:before{bottom: 0;}
.tabs-container.style-1 .tabs-entry{padding: 55px; border: 1px #e6e6e6 solid; border-top: none;}

/* Tablets (>=768px)*/
@media (max-width: 991px) {
    .tabs-container.style-1 .tabs-entry{padding: 25px;}
}

/*Phones (<768px)*/
@media (max-width: 767px) {
    .tabs-container.style-1 .tabs-entry{padding: 15px;}
    .tabs-container.style-1 .tab-switcher{display: block; margin: -1px 0 0 0;}
    .tabs-container.style-1 .swiper-tabs{margin-bottom: 0;}
}
/*accordeon*/
.accordeon{margin-bottom: 40px;}
.accordeon-title{font-size: 13px; line-height: 18px; padding: 15px 0 15px 0; color: #000000; text-transform: uppercase; font-weight: 600; border-top: 1px #ebebeb solid; cursor: pointer; padding-right: 15px; position: relative;}
.accordeon-title:hover{color: #808080;}
.accordeon-title .number{display: inline-block; width: 40px; line-height: 40px; background: #f2f2f2; text-align: center; font-size: 18px; color: #000000; font-weight: 600; margin-right: 18px;}
.inline-label{font-size: 11px; color: #fff; line-height: 19px; font-weight: 600; text-transform: uppercase; display: inline-block; vertical-align: middle; padding: 0 10px; background: #d14242; position: relative; margin-top: -2px; margin-left: 7px;}
.inline-label.red{background: #d14242;}
.inline-label.green{background: #aac840;}
.accordeon-title:after{content: "\f107"; position: absolute; height: 50px; line-height: 50px; top: 0; right: 0; font-size: 13px; color: #000000; font-family: FontAwesome;}
.accordeon-title.active:after{content: "\f106";}
.accordeon-entry{padding: 0 0 20px 0; display: none;}
.accordeon.size-1 .accordeon-title{font-size: 16px; line-height: 40px; text-transform: none; padding: 13px 0; border-bottom: 1px #ebebeb solid; margin-top: -1px;}
.accordeon.size-1 .accordeon-title:after{line-height: 66px;}
.accordeon.size-1 .accordeon-entry{padding: 30px 0 55px 0;}


/*-------------------------------------------------------------------------------------------------------------------------------*/
/* 00 - X */
/*-------------------------------------------------------------------------------------------------------------------------------*/
.jspPane{margin-left: 0!important; margin-right: 10px;}
.jspContainer{overflow: hidden; position: relative;}
.jspPane{position: absolute;}
.jspVerticalBar{position: absolute; top: 0; right: 0; width: 10px; height: 100%; background: red; border-left: 1px solid #f2f2f2;}
.jspHorizontalBar{position: absolute; bottom: 0; left: 0; width: 100%; height: 16px; background: red;}
.jspCap{display: none;}
.jspHorizontalBar .jspCap{float: left;}
.jspTrack{background: #fff; position: relative;}
.jspDrag{background: #c2c2c2; position: relative; top: 0; left: 0; cursor: pointer;}
.jspHorizontalBar .jspTrack, .jspHorizontalBar .jspDrag{float: left; height: 100%;}
.jspArrow{background: #50506d; text-indent: -20000px; display: block; cursor: pointer; padding: 0; margin: 0;}
.jspArrow.jspDisabled{cursor: default; background: #80808d;}
.jspVerticalBar .jspArrow{height: 16px;}
.jspHorizontalBar .jspArrow{width: 16px; float: left; height: 100%;}
.jspVerticalBar .jspArrow:focus{outline: none;}
.jspCorner{background: #eeeef4; float: left; height: 100%;}

/*-------------------------------------------------------------------------------------------------------------------------------*/
/* 00 - X */
/*-------------------------------------------------------------------------------------------------------------------------------*/
.article-container{font-size: 13px; line-height: 22px; color: #808080; margin-bottom: 25px;}
.article-container b{font-weight: 500; color: #2e2e2e;}
.article-container a{color: #d14242;}
.article-container li a{color: #808080;}
.article-container a:hover{color: #2e2e2e;}
.article-container.columns-2{-webkit-column-count: 2; -moz-column-count: 2; column-count: 2; -webkit-column-gap: 30px; -moz-column-gap: 30px; column-gap: 30px;}
.article-container.columns-3{-webkit-column-count: 3; -moz-column-count: 3; column-count: 3; -webkit-column-gap: 30px; -moz-column-gap: 30px; column-gap: 30px;}
.article-container p, .article-container ul, .article-container ol, .article-container img{margin-bottom: 15px;}
.article-container ol li{font-size: inherit; line-height: inherit; color: inherit;}
.article-container ul li{padding: 4px 0 4px 10px;}
.article-container ul li:before{content: "\f105"; font-family: FontAwesome; display: inline-block; margin-right: 5px;}
.article-container h1, .h1{font-size: 32px; line-height: 32px; color: #2e2e2e; font-weight: 500; margin-bottom: 15px;}
.article-container h2, .h2{font-size: 28px; line-height: 34px; color: #000000; font-weight: 300; margin-bottom: 15px;}
.article-container h3, .h3{font-size: 24px; font-weight: 600; line-height: 28px; margin-bottom: 11px; color: #000000;}
.article-container h4, .h4{font-size: 14px; line-height: 22px; color: #000000; font-weight: 600; margin-bottom: 15px; text-transform: uppercase;}
.article-container h5, .h5{font-size: 13px; line-height: 30px; color: #000000; font-weight: 600; text-transform: uppercase;}
.article-container h5 .fa, .h5 .fa{font-size: 20px; color: #d14242; display: inline-block; vertical-align: middle; position: relative; top: -3px; margin-right: 5px;}
.article-container h6, .h6{font-size: 11px; line-height: 18px; color: #000000; font-weight: 700; margin-bottom: 15px;}
.article-container.style-1{font-size: 14px; line-height: 25px; font-weight: 300;}
/*Phones (<768px)*/
@media (max-width: 767px) {
    .article-container.columns-2, .article-container.columns-3{-webkit-column-count: 1; -moz-column-count: 1; column-count: 1; -webkit-column-gap: 0px; -moz-column-gap: 0px; column-gap: 0px;}
}

/*-------------------------------------------------------------------------------------------------------------------------------*/
/* 00 - MEDIA QUERIES */
/*-------------------------------------------------------------------------------------------------------------------------------*/
/*Desktops (>=1200px)*/
@media (min-width: 1200px) {

}
/*Desktops (>=992px)*/
@media (max-width: 1199px) {

}
/* Tablets (>=768px)*/
@media (max-width: 991px) {

}
/*Phones (<768px)*/
@media (max-width: 767px) {

}


/*-------------------------------------------------------------------------------------------------------------------------------*/
/* 22 - PROJECT */
/*-------------------------------------------------------------------------------------------------------------------------------*/
.project-thumbnail{width: 100%; height: auto; display: block; margin-bottom: 40px;}
.share-box .title b{font-weight: 500; color: #2e2e2e;}
.detail-info-lines .share-box{margin-top: -1px;}
.detail-info-lines .share-box:last-child{border-bottom: none;}
.detail-info-lines.border-box{border: 10px #f5f5f5 solid; padding: 10px 30px;}
.detail-info-lines.border-box .share-box:first-child{border-top: none;}
/* Tablets (>=768px)*/
@media (max-width: 991px) {

}


/*-------------------------------------------------------------------------------------------------------------------------------*/
/* 23 - ABOUT */
/*-------------------------------------------------------------------------------------------------------------------------------*/
#content-block .continue-link{font-size: 14px; line-height: 18px; color: #d14242; display: inline-block; margin-bottom: 15px; font-weight: 600;}
#content-block .continue-link:hover{color: #000000;}
.heading-article{margin-bottom: 25px;}
.heading-article .title{font-size: 32px; line-height: 32px; color: #2e2e2e; font-weight: 500; margin-bottom: 15px;}
.heading-article .description{font-size: 24px; line-height: 32px; color: #000000; font-weight: 300; margin-bottom: 15px;}


/*-------------------------------------------------------------------------------------------------------------------------------*/
/* 24 - SHOP */
/*-------------------------------------------------------------------------------------------------------------------------------*/
.categories-border-wrapper{border: 3px #e6e6e6 solid; padding: 30px 20px 25px 20px;}
.categories-border-wrapper .accordeon-title{text-transform: none;}
/*jQuery UI Styles */
.ui-slider{position: relative; height: 2px; background: #d9d9d9; margin-right: 8px; margin-bottom: 18px;}
.ui-slider-range{height: 100%; position: absolute; left: 0; top: 0; background: #000000;}
.ui-slider-handle{width: 8px; height: 8px; background: #000000; margin: -3px 0 0 0; position: absolute; cursor: pointer;}
.range-price{font-size: 14px; color: #4c4c4c; line-height: 18px; float: left; line-height: 36px;}
.range-price b{color: #000000232; font-weight: 600;}
.min-price, .max-price{display: inline-block;}
.range-wrapper .button{float: right;}
.range-wrapper:after{width: 100%; height: 0; clear: both; content: ""; display: block;}
/**/
.blog-sidebar .color-selector{margin-right: -10px;}
.blog-sidebar .color-selector .entry{width: 36px; height: 36px; margin-right: 10px; margin-bottom: 14px; vertical-align: top;}
/**/
.shop-grid-item:nth-child(4n+1){clear: both;}
.shop-grid-controls{margin-right: 200px; font-size: 14px; font-weight: 600; margin-bottom: -15px;}
#content-block .shop-grid-controls .entry{line-height: 30px; padding-right: 16px; float: left; border-right: 1px #ebebeb solid; margin-bottom: 15px!important; margin-right: 16px; min-height: 30px;}
#content-block .shop-grid-controls .entry:last-child{border: none;}
#content-block .shop-grid-controls .entry:first-child{padding-left: 0;}
.shop-grid-controls .inline-text{float: left; margin-right: 10px;}
.simple-drop-down{width: 130px; position: relative;}
.simple-drop-down select{height: 30px; line-height: 28px; border: 1px #ebebeb solid; padding: 0 40px 0 10px;  white-space: nowrap; text-overflow: ellipsis; -moz-appearance: none; -webkit-appearance: none; appearance: none; width: 100%; cursor: pointer; font-size: 13px; font-weight: 400; color: #7c7c7c;}
.simple-drop-down:after{width: 30px; height: 30px; position: absolute; top: 0; right: 0; border: 1px #ebebeb solid; content: "\f107"; font-family: FontAwesome; font-size: 12px; color: #7c7c7c; text-align: center; cursor: pointer; pointer-events: none; line-height: 30px; background: #fff;}
.shop-grid-controls .simple-drop-down{float: left; margin-right: 10px;}
.sort-button{font-family: FontAwesome; float: left; cursor: pointer;}
.sort-button:before{content: "\f063";}
.sort-button.active:before{content: "\f062";}
.view-button{float: left; width: 30px; position: relative; margin-right: 10px; text-align: center; color: #b5b5b5; cursor: pointer;}
.view-button:last-child{margin-right: 0;}
.view-button:after{border: 1px #ebebeb solid; position: absolute; left: 0; top: 0; width: 100%; height: 100%; content: "";}
.view-button.active{color: #000000;}
.view-button.active:after{border: 2px #000000 solid;}
/*list view*/
.list-view .shop-grid-item{width: 100%;}
.list-view .product-slide-entry{max-width: 100%; margin-left: 230px; padding-bottom: 45px; margin-bottom: 44px; text-align: left!important;}
.list-view .product-slide-entry:after{content: ""; display: block; clear: both; height: 1px; background: #ebebeb; margin-left: -230px; top: 45px; position: relative;}
.list-view .product-slide-entry .product-image{max-width: 200px; margin-left: -230px; float: left; margin-bottom: 0;}
.product-slide-entry .price{margin-bottom: 20px;}
.product-slide-entry .article-container{display: none; margin-bottom: 15px;}
.product-slide-entry .list-buttons{display: none; margin-bottom: 15px;}
.product-slide-entry .reviews-number{display: none;}
.list-view .product-slide-entry .reviews-number{display: inline-block; font-size: 14px; font-weight: 500; color: #000000; line-height: 14px; margin-left: 10px;}
.list-view .product-slide-entry .article-container, .list-view .product-slide-entry .list-buttons{display: block;}
.list-view .product-slide-entry .price{font-size: 17px;}
.list-view .product-slide-entry .price .current{font-size: 22px;}
.list-view .product-slide-entry .title{font-size: 17px;}




/*-------------------------------------------------------------------------------------------------------------------------------*/
/* 26 - WISHLIST */
/*-------------------------------------------------------------------------------------------------------------------------------*/
.categories-list.account-links ul li a{font-size: 14px;}
.wishlist-entry{padding-bottom: 32px; margin-bottom: 27px; border-bottom: 1px #ebebeb solid; position: relative;}
.wishlist-entry .column-1{margin-right: 250px;}
.wishlist-entry .column-2{position: absolute; width: 230px; right: 0; top: 50%; margin-top: -32px; text-align: right;}
.wishlist-entry .button.style-14{padding: 8px 30px; float: left;}
.traditional-cart-entry.style-1{padding-bottom: 33px; border-bottom: 1px #ebebeb solid; margin-bottom: 32px;}
.traditional-cart-entry:after{display: block; clear: both; content:"";}
.traditional-cart-entry .image{float: left; width: 85px;}
.traditional-cart-entry.style-1 .image{width: 170px;}
.traditional-cart-entry .image img{max-width: 100%; height: auto; display: block;}
.traditional-cart-entry .content{margin-left: 100px;}
.traditional-cart-entry.style-1 .content{margin-left: 200px;}
.traditional-cart-entry .cell-view{height: 95px;}
.traditional-cart-entry .tag{font-size: 10px; line-height: 10px; color: #8b8b8b; font-weight: 500; text-transform: uppercase; display: inline-block; margin-bottom: 5px;}
.traditional-cart-entry .tag:hover{color: #2e2e2e;}
.traditional-cart-entry .title{font-size: 20px; line-height: 28px; color: #2e2e2e; font-weight: 600; display: block; margin-bottom: 10px;}
.traditional-cart-entry .title:hover{color: #000000;}
.traditional-cart-entry .inline-description{font-size: 13px; line-height: 15px; color: #808080; font-weight: 400; margin-bottom: 5px;}
.traditional-cart-entry .price{margin-bottom: 20px; padding-top: 15px;}
.traditional-cart-entry .quantity-selector .entry{margin-bottom: 20px;}
.traditional-cart-entry .quantity-selector .entry.number-plus{margin-right: 20px;}
.remove-button{display: inline-block; border: 1px #e6e6e6 solid; width: 34px; line-height: 32px; text-align: center; font-size: 12px;  background: transparent; color: #2e2e2e;}
.remove-button:hover{background: #000000; color: #fff; border: 1px #000000 solid;}
.wishlist-entry .column-2 .remove-button{margin-left: 50px;}
.wishlist-header{border-bottom: 1px #e6e6e6 solid; border-top: 1px #e6e6e6 solid; margin-bottom: 32px; line-height: 68px; position: relative; font-size: 16px; color: #343434; font-weight: 600;}
.wishlist-header .title-1{margin-left: 100px; margin-right: 230px;}
.wishlist-header .title-2{width: 230px; position: absolute; top: 0; right: 0;}
/*Phones (<768px)*/
@media (max-width: 767px) {
    .wishlist-entry .column-1{margin-right: 0; margin-bottom: 20px;}
    .wishlist-entry .column-2{position: relative; margin: 0 0 0 100px; top: auto; width: auto;}
    .wishlist-entry .column-2 .remove-button{margin-left: 10px;}
    .wishlist-entry .button.style-14{padding-left: 10px; padding-right: 10px; width: 140px;}
    .traditional-cart-entry .image{margin-bottom: 15px; display: inline-block;}
}

@media (max-width:480px){
    .traditional-cart-entry.style-1 .image{
        width: 100px;
    }
    .traditional-cart-entry.style-1 .content{
        margin-left: 115px;
    }
    .traditional-cart-entry.style-1 .quantity-selector .button{
        margin-right: 10px;
    }
    .traditional-cart-entry.style-1 .detail-info-entry-title{
        display: none;
    }
    .traditional-cart-entry.style-1 .quantity-selector .entry.number-plus{
        margin-right: 15px;
    }
    .quantity-selector .entry.number-minus{
        margin-left: 0;
    }
}
/*!
 * Bootstrap v3.3.7 (http://getbootstrap.com)
 * Copyright 2011-2016 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 *//*! normalize.css v3.0.3 | MIT License | github.com/necolas/normalize.css */html{font-family:sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%}body{margin:0}article,aside,details,figcaption,figure,footer,header,hgroup,main,menu,nav,section,summary{display:block}audio,canvas,progress,video{display:inline-block;vertical-align:baseline}audio:not([controls]){display:none;height:0}[hidden],template{display:none}a{background-color:transparent}a:active,a:hover{outline:0}abbr[title]{border-bottom:1px dotted}b,strong{font-weight:700}dfn{font-style:italic}h1{margin:.67em 0;font-size:2em}mark{color:#000;background:#ff0}small{font-size:80%}sub,sup{position:relative;font-size:75%;line-height:0;vertical-align:baseline}sup{top:-.5em}sub{bottom:-.25em}img{border:0}svg:not(:root){overflow:hidden}figure{margin:1em 40px}hr{height:0;-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box}pre{overflow:auto}code,kbd,pre,samp{font-family:monospace,monospace;font-size:1em}button,input,optgroup,select,textarea{margin:0;font:inherit;color:inherit}button{overflow:visible}button,select{text-transform:none}button,html input[type=button],input[type=reset],input[type=submit]{-webkit-appearance:button;cursor:pointer}button[disabled],html input[disabled]{cursor:default}button::-moz-focus-inner,input::-moz-focus-inner{padding:0;border:0}input{line-height:normal}input[type=checkbox],input[type=radio]{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;padding:0}input[type=number]::-webkit-inner-spin-button,input[type=number]::-webkit-outer-spin-button{height:auto}input[type=search]{-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box;-webkit-appearance:textfield}input[type=search]::-webkit-search-cancel-button,input[type=search]::-webkit-search-decoration{-webkit-appearance:none}fieldset{padding:.35em .625em .75em;margin:0 2px;border:1px solid silver}legend{padding:0;border:0}textarea{overflow:auto}optgroup{font-weight:700}table{border-spacing:0;border-collapse:collapse}td,th{padding:0}/*! Source: https://github.com/h5bp/html5-boilerplate/blob/master/src/css/main.css */@media print{*,:after,:before{color:#000!important;text-shadow:none!important;background:0 0!important;-webkit-box-shadow:none!important;box-shadow:none!important}a,a:visited{text-decoration:underline}a[href]:after{content:" (" attr(href) ")"}abbr[title]:after{content:" (" attr(title) ")"}a[href^="javascript:"]:after,a[href^="#"]:after{content:""}blockquote,pre{border:1px solid #999;page-break-inside:avoid}thead{display:table-header-group}img,tr{page-break-inside:avoid}img{max-width:100%!important}h2,h3,p{orphans:3;widows:3}h2,h3{page-break-after:avoid}.navbar{display:none}.btn>.caret,.dropup>.btn>.caret{border-top-color:#000!important}.label{border:1px solid #000}.table{border-collapse:collapse!important}.table td,.table th{background-color:#fff!important}.table-bordered td,.table-bordered th{border:1px solid #ddd!important}}@font-face{font-family:'Glyphicons Halflings';src:url(../fonts/glyphicons-halflings-regular.eot);src:url(../fonts/glyphicons-halflings-regular.eot?#iefix) format('embedded-opentype'),url(../fonts/glyphicons-halflings-regular.woff2) format('woff2'),url(../fonts/glyphicons-halflings-regular.woff) format('woff'),url(../fonts/glyphicons-halflings-regular.ttf) format('truetype'),url(../fonts/glyphicons-halflings-regular.svg#glyphicons_halflingsregular) format('svg')}.glyphicon{position:relative;top:1px;display:inline-block;font-family:'Glyphicons Halflings';font-style:normal;font-weight:400;line-height:1;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.glyphicon-asterisk:before{content:"\002a"}.glyphicon-plus:before{content:"\002b"}.glyphicon-eur:before,.glyphicon-euro:before{content:"\20ac"}.glyphicon-minus:before{content:"\2212"}.glyphicon-cloud:before{content:"\2601"}.glyphicon-envelope:before{content:"\2709"}.glyphicon-pencil:before{content:"\270f"}.glyphicon-glass:before{content:"\e001"}.glyphicon-music:before{content:"\e002"}.glyphicon-search:before{content:"\e003"}.glyphicon-heart:before{content:"\e005"}.glyphicon-star:before{content:"\e006"}.glyphicon-star-empty:before{content:"\e007"}.glyphicon-user:before{content:"\e008"}.glyphicon-film:before{content:"\e009"}.glyphicon-th-large:before{content:"\e010"}.glyphicon-th:before{content:"\e011"}.glyphicon-th-list:before{content:"\e012"}.glyphicon-ok:before{content:"\e013"}.glyphicon-remove:before{content:"\e014"}.glyphicon-zoom-in:before{content:"\e015"}.glyphicon-zoom-out:before{content:"\e016"}.glyphicon-off:before{content:"\e017"}.glyphicon-signal:before{content:"\e018"}.glyphicon-cog:before{content:"\e019"}.glyphicon-trash:before{content:"\e020"}.glyphicon-home:before{content:"\e021"}.glyphicon-file:before{content:"\e022"}.glyphicon-time:before{content:"\e023"}.glyphicon-road:before{content:"\e024"}.glyphicon-download-alt:before{content:"\e025"}.glyphicon-download:before{content:"\e026"}.glyphicon-upload:before{content:"\e027"}.glyphicon-inbox:before{content:"\e028"}.glyphicon-play-circle:before{content:"\e029"}.glyphicon-repeat:before{content:"\e030"}.glyphicon-refresh:before{content:"\e031"}.glyphicon-list-alt:before{content:"\e032"}.glyphicon-lock:before{content:"\e033"}.glyphicon-flag:before{content:"\e034"}.glyphicon-headphones:before{content:"\e035"}.glyphicon-volume-off:before{content:"\e036"}.glyphicon-volume-down:before{content:"\e037"}.glyphicon-volume-up:before{content:"\e038"}.glyphicon-qrcode:before{content:"\e039"}.glyphicon-barcode:before{content:"\e040"}.glyphicon-tag:before{content:"\e041"}.glyphicon-tags:before{content:"\e042"}.glyphicon-book:before{content:"\e043"}.glyphicon-bookmark:before{content:"\e044"}.glyphicon-print:before{content:"\e045"}.glyphicon-camera:before{content:"\e046"}.glyphicon-font:before{content:"\e047"}.glyphicon-bold:before{content:"\e048"}.glyphicon-italic:before{content:"\e049"}.glyphicon-text-height:before{content:"\e050"}.glyphicon-text-width:before{content:"\e051"}.glyphicon-align-left:before{content:"\e052"}.glyphicon-align-center:before{content:"\e053"}.glyphicon-align-right:before{content:"\e054"}.glyphicon-align-justify:before{content:"\e055"}.glyphicon-list:before{content:"\e056"}.glyphicon-indent-left:before{content:"\e057"}.glyphicon-indent-right:before{content:"\e058"}.glyphicon-facetime-video:before{content:"\e059"}.glyphicon-picture:before{content:"\e060"}.glyphicon-map-marker:before{content:"\e062"}.glyphicon-adjust:before{content:"\e063"}.glyphicon-tint:before{content:"\e064"}.glyphicon-edit:before{content:"\e065"}.glyphicon-share:before{content:"\e066"}.glyphicon-check:before{content:"\e067"}.glyphicon-move:before{content:"\e068"}.glyphicon-step-backward:before{content:"\e069"}.glyphicon-fast-backward:before{content:"\e070"}.glyphicon-backward:before{content:"\e071"}.glyphicon-play:before{content:"\e072"}.glyphicon-pause:before{content:"\e073"}.glyphicon-stop:before{content:"\e074"}.glyphicon-forward:before{content:"\e075"}.glyphicon-fast-forward:before{content:"\e076"}.glyphicon-step-forward:before{content:"\e077"}.glyphicon-eject:before{content:"\e078"}.glyphicon-chevron-left:before{content:"\e079"}.glyphicon-chevron-right:before{content:"\e080"}.glyphicon-plus-sign:before{content:"\e081"}.glyphicon-minus-sign:before{content:"\e082"}.glyphicon-remove-sign:before{content:"\e083"}.glyphicon-ok-sign:before{content:"\e084"}.glyphicon-question-sign:before{content:"\e085"}.glyphicon-info-sign:before{content:"\e086"}.glyphicon-screenshot:before{content:"\e087"}.glyphicon-remove-circle:before{content:"\e088"}.glyphicon-ok-circle:before{content:"\e089"}.glyphicon-ban-circle:before{content:"\e090"}.glyphicon-arrow-left:before{content:"\e091"}.glyphicon-arrow-right:before{content:"\e092"}.glyphicon-arrow-up:before{content:"\e093"}.glyphicon-arrow-down:before{content:"\e094"}.glyphicon-share-alt:before{content:"\e095"}.glyphicon-resize-full:before{content:"\e096"}.glyphicon-resize-small:before{content:"\e097"}.glyphicon-exclamation-sign:before{content:"\e101"}.glyphicon-gift:before{content:"\e102"}.glyphicon-leaf:before{content:"\e103"}.glyphicon-fire:before{content:"\e104"}.glyphicon-eye-open:before{content:"\e105"}.glyphicon-eye-close:before{content:"\e106"}.glyphicon-warning-sign:before{content:"\e107"}.glyphicon-plane:before{content:"\e108"}.glyphicon-calendar:before{content:"\e109"}.glyphicon-random:before{content:"\e110"}.glyphicon-comment:before{content:"\e111"}.glyphicon-magnet:before{content:"\e112"}.glyphicon-chevron-up:before{content:"\e113"}.glyphicon-chevron-down:before{content:"\e114"}.glyphicon-retweet:before{content:"\e115"}.glyphicon-shopping-cart:before{content:"\e116"}.glyphicon-folder-close:before{content:"\e117"}.glyphicon-folder-open:before{content:"\e118"}.glyphicon-resize-vertical:before{content:"\e119"}.glyphicon-resize-horizontal:before{content:"\e120"}.glyphicon-hdd:before{content:"\e121"}.glyphicon-bullhorn:before{content:"\e122"}.glyphicon-bell:before{content:"\e123"}.glyphicon-certificate:before{content:"\e124"}.glyphicon-thumbs-up:before{content:"\e125"}.glyphicon-thumbs-down:before{content:"\e126"}.glyphicon-hand-right:before{content:"\e127"}.glyphicon-hand-left:before{content:"\e128"}.glyphicon-hand-up:before{content:"\e129"}.glyphicon-hand-down:before{content:"\e130"}.glyphicon-circle-arrow-right:before{content:"\e131"}.glyphicon-circle-arrow-left:before{content:"\e132"}.glyphicon-circle-arrow-up:before{content:"\e133"}.glyphicon-circle-arrow-down:before{content:"\e134"}.glyphicon-globe:before{content:"\e135"}.glyphicon-wrench:before{content:"\e136"}.glyphicon-tasks:before{content:"\e137"}.glyphicon-filter:before{content:"\e138"}.glyphicon-briefcase:before{content:"\e139"}.glyphicon-fullscreen:before{content:"\e140"}.glyphicon-dashboard:before{content:"\e141"}.glyphicon-paperclip:before{content:"\e142"}.glyphicon-heart-empty:before{content:"\e143"}.glyphicon-link:before{content:"\e144"}.glyphicon-phone:before{content:"\e145"}.glyphicon-pushpin:before{content:"\e146"}.glyphicon-usd:before{content:"\e148"}.glyphicon-gbp:before{content:"\e149"}.glyphicon-sort:before{content:"\e150"}.glyphicon-sort-by-alphabet:before{content:"\e151"}.glyphicon-sort-by-alphabet-alt:before{content:"\e152"}.glyphicon-sort-by-order:before{content:"\e153"}.glyphicon-sort-by-order-alt:before{content:"\e154"}.glyphicon-sort-by-attributes:before{content:"\e155"}.glyphicon-sort-by-attributes-alt:before{content:"\e156"}.glyphicon-unchecked:before{content:"\e157"}.glyphicon-expand:before{content:"\e158"}.glyphicon-collapse-down:before{content:"\e159"}.glyphicon-collapse-up:before{content:"\e160"}.glyphicon-log-in:before{content:"\e161"}.glyphicon-flash:before{content:"\e162"}.glyphicon-log-out:before{content:"\e163"}.glyphicon-new-window:before{content:"\e164"}.glyphicon-record:before{content:"\e165"}.glyphicon-save:before{content:"\e166"}.glyphicon-open:before{content:"\e167"}.glyphicon-saved:before{content:"\e168"}.glyphicon-import:before{content:"\e169"}.glyphicon-export:before{content:"\e170"}.glyphicon-send:before{content:"\e171"}.glyphicon-floppy-disk:before{content:"\e172"}.glyphicon-floppy-saved:before{content:"\e173"}.glyphicon-floppy-remove:before{content:"\e174"}.glyphicon-floppy-save:before{content:"\e175"}.glyphicon-floppy-open:before{content:"\e176"}.glyphicon-credit-card:before{content:"\e177"}.glyphicon-transfer:before{content:"\e178"}.glyphicon-cutlery:before{content:"\e179"}.glyphicon-header:before{content:"\e180"}.glyphicon-compressed:before{content:"\e181"}.glyphicon-earphone:before{content:"\e182"}.glyphicon-phone-alt:before{content:"\e183"}.glyphicon-tower:before{content:"\e184"}.glyphicon-stats:before{content:"\e185"}.glyphicon-sd-video:before{content:"\e186"}.glyphicon-hd-video:before{content:"\e187"}.glyphicon-subtitles:before{content:"\e188"}.glyphicon-sound-stereo:before{content:"\e189"}.glyphicon-sound-dolby:before{content:"\e190"}.glyphicon-sound-5-1:before{content:"\e191"}.glyphicon-sound-6-1:before{content:"\e192"}.glyphicon-sound-7-1:before{content:"\e193"}.glyphicon-copyright-mark:before{content:"\e194"}.glyphicon-registration-mark:before{content:"\e195"}.glyphicon-cloud-download:before{content:"\e197"}.glyphicon-cloud-upload:before{content:"\e198"}.glyphicon-tree-conifer:before{content:"\e199"}.glyphicon-tree-deciduous:before{content:"\e200"}.glyphicon-cd:before{content:"\e201"}.glyphicon-save-file:before{content:"\e202"}.glyphicon-open-file:before{content:"\e203"}.glyphicon-level-up:before{content:"\e204"}.glyphicon-copy:before{content:"\e205"}.glyphicon-paste:before{content:"\e206"}.glyphicon-alert:before{content:"\e209"}.glyphicon-equalizer:before{content:"\e210"}.glyphicon-king:before{content:"\e211"}.glyphicon-queen:before{content:"\e212"}.glyphicon-pawn:before{content:"\e213"}.glyphicon-bishop:before{content:"\e214"}.glyphicon-knight:before{content:"\e215"}.glyphicon-baby-formula:before{content:"\e216"}.glyphicon-tent:before{content:"\26fa"}.glyphicon-blackboard:before{content:"\e218"}.glyphicon-bed:before{content:"\e219"}.glyphicon-apple:before{content:"\f8ff"}.glyphicon-erase:before{content:"\e221"}.glyphicon-hourglass:before{content:"\231b"}.glyphicon-lamp:before{content:"\e223"}.glyphicon-duplicate:before{content:"\e224"}.glyphicon-piggy-bank:before{content:"\e225"}.glyphicon-scissors:before{content:"\e226"}.glyphicon-bitcoin:before{content:"\e227"}.glyphicon-btc:before{content:"\e227"}.glyphicon-xbt:before{content:"\e227"}.glyphicon-yen:before{content:"\00a5"}.glyphicon-jpy:before{content:"\00a5"}.glyphicon-ruble:before{content:"\20bd"}.glyphicon-rub:before{content:"\20bd"}.glyphicon-scale:before{content:"\e230"}.glyphicon-ice-lolly:before{content:"\e231"}.glyphicon-ice-lolly-tasted:before{content:"\e232"}.glyphicon-education:before{content:"\e233"}.glyphicon-option-horizontal:before{content:"\e234"}.glyphicon-option-vertical:before{content:"\e235"}.glyphicon-menu-hamburger:before{content:"\e236"}.glyphicon-modal-window:before{content:"\e237"}.glyphicon-oil:before{content:"\e238"}.glyphicon-grain:before{content:"\e239"}.glyphicon-sunglasses:before{content:"\e240"}.glyphicon-text-size:before{content:"\e241"}.glyphicon-text-color:before{content:"\e242"}.glyphicon-text-background:before{content:"\e243"}.glyphicon-object-align-top:before{content:"\e244"}.glyphicon-object-align-bottom:before{content:"\e245"}.glyphicon-object-align-horizontal:before{content:"\e246"}.glyphicon-object-align-left:before{content:"\e247"}.glyphicon-object-align-vertical:before{content:"\e248"}.glyphicon-object-align-right:before{content:"\e249"}.glyphicon-triangle-right:before{content:"\e250"}.glyphicon-triangle-left:before{content:"\e251"}.glyphicon-triangle-bottom:before{content:"\e252"}.glyphicon-triangle-top:before{content:"\e253"}.glyphicon-console:before{content:"\e254"}.glyphicon-superscript:before{content:"\e255"}.glyphicon-subscript:before{content:"\e256"}.glyphicon-menu-left:before{content:"\e257"}.glyphicon-menu-right:before{content:"\e258"}.glyphicon-menu-down:before{content:"\e259"}.glyphicon-menu-up:before{content:"\e260"}*{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}:after,:before{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}html{font-size:10px;-webkit-tap-highlight-color:rgba(0,0,0,0)}body{font-family:"Helvetica Neue",Helvetica,Arial,sans-serif;font-size:14px;line-height:1.42857143;color:#333;background-color:#fff}button,input,select,textarea{font-family:inherit;font-size:inherit;line-height:inherit}a{color:#337ab7;text-decoration:none}a:focus,a:hover{color:#23527c;text-decoration:underline}a:focus{outline:5px auto -webkit-focus-ring-color;outline-offset:-2px}figure{margin:0}img{vertical-align:middle}.carousel-inner>.item>a>img,.carousel-inner>.item>img,.img-responsive,.thumbnail a>img,.thumbnail>img{display:block;max-width:100%;height:auto}.img-rounded{border-radius:6px}.img-thumbnail{display:inline-block;max-width:100%;height:auto;padding:4px;line-height:1.42857143;background-color:#fff;border:1px solid #ddd;border-radius:4px;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;transition:all .2s ease-in-out}.img-circle{border-radius:50%}hr{margin-top:20px;margin-bottom:20px;border:0;border-top:1px solid #eee}.sr-only{position:absolute;width:1px;height:1px;padding:0;margin:-1px;overflow:hidden;clip:rect(0,0,0,0);border:0}.sr-only-focusable:active,.sr-only-focusable:focus{position:static;width:auto;height:auto;margin:0;overflow:visible;clip:auto}[role=button]{cursor:pointer}.h1,.h2,.h3,.h4,.h5,.h6,h1,h2,h3,h4,h5,h6{font-family:inherit;font-weight:500;line-height:1.1;color:inherit}.h1 .small,.h1 small,.h2 .small,.h2 small,.h3 .small,.h3 small,.h4 .small,.h4 small,.h5 .small,.h5 small,.h6 .small,.h6 small,h1 .small,h1 small,h2 .small,h2 small,h3 .small,h3 small,h4 .small,h4 small,h5 .small,h5 small,h6 .small,h6 small{font-weight:400;line-height:1;color:#777}.h1,.h2,.h3,h1,h2,h3{margin-top:20px;margin-bottom:10px}.h1 .small,.h1 small,.h2 .small,.h2 small,.h3 .small,.h3 small,h1 .small,h1 small,h2 .small,h2 small,h3 .small,h3 small{font-size:65%}.h4,.h5,.h6,h4,h5,h6{margin-top:10px;margin-bottom:10px}.h4 .small,.h4 small,.h5 .small,.h5 small,.h6 .small,.h6 small,h4 .small,h4 small,h5 .small,h5 small,h6 .small,h6 small{font-size:75%}.h1,h1{font-size:36px}.h2,h2{font-size:30px}.h3,h3{font-size:24px}.h4,h4{font-size:18px}.h5,h5{font-size:14px}.h6,h6{font-size:12px}p{margin:0 0 10px}.lead{margin-bottom:20px;font-size:16px;font-weight:300;line-height:1.4}@media (min-width:768px){.lead{font-size:21px}}.small,small{font-size:85%}.mark,mark{padding:.2em;background-color:#fcf8e3}.text-left{text-align:left}.text-right{text-align:right}.text-center{text-align:center}.text-justify{text-align:justify}.text-nowrap{white-space:nowrap}.text-lowercase{text-transform:lowercase}.text-uppercase{text-transform:uppercase}.text-capitalize{text-transform:capitalize}.text-muted{color:#777}.text-primary{color:#337ab7}a.text-primary:focus,a.text-primary:hover{color:#286090}.text-success{color:#3c763d}a.text-success:focus,a.text-success:hover{color:#2b542c}.text-info{color:#31708f}a.text-info:focus,a.text-info:hover{color:#245269}.text-warning{color:#8a6d3b}a.text-warning:focus,a.text-warning:hover{color:#66512c}.text-danger{color:#a94442}a.text-danger:focus,a.text-danger:hover{color:#843534}.bg-primary{color:#fff;background-color:#337ab7}a.bg-primary:focus,a.bg-primary:hover{background-color:#286090}.bg-success{background-color:#dff0d8}a.bg-success:focus,a.bg-success:hover{background-color:#c1e2b3}.bg-info{background-color:#d9edf7}a.bg-info:focus,a.bg-info:hover{background-color:#afd9ee}.bg-warning{background-color:#fcf8e3}a.bg-warning:focus,a.bg-warning:hover{background-color:#f7ecb5}.bg-danger{background-color:#f2dede}a.bg-danger:focus,a.bg-danger:hover{background-color:#e4b9b9}.page-header{padding-bottom:9px;margin:40px 0 20px;border-bottom:1px solid #eee}ol,ul{margin-top:0;margin-bottom:10px}ol ol,ol ul,ul ol,ul ul{margin-bottom:0}.list-unstyled{padding-left:0;list-style:none}.list-inline{padding-left:0;margin-left:-5px;list-style:none}.list-inline>li{display:inline-block;padding-right:5px;padding-left:5px}dl{margin-top:0;margin-bottom:20px}dd,dt{line-height:1.42857143}dt{font-weight:700}dd{margin-left:0}@media (min-width:768px){.dl-horizontal dt{float:left;width:160px;overflow:hidden;clear:left;text-align:right;text-overflow:ellipsis;white-space:nowrap}.dl-horizontal dd{margin-left:180px}}abbr[data-original-title],abbr[title]{cursor:help;border-bottom:1px dotted #777}.initialism{font-size:90%;text-transform:uppercase}blockquote{padding:10px 20px;margin:0 0 20px;font-size:17.5px;border-left:5px solid #eee}blockquote ol:last-child,blockquote p:last-child,blockquote ul:last-child{margin-bottom:0}blockquote .small,blockquote footer,blockquote small{display:block;font-size:80%;line-height:1.42857143;color:#777}blockquote .small:before,blockquote footer:before,blockquote small:before{content:'\2014 \00A0'}.blockquote-reverse,blockquote.pull-right{padding-right:15px;padding-left:0;text-align:right;border-right:5px solid #eee;border-left:0}.blockquote-reverse .small:before,.blockquote-reverse footer:before,.blockquote-reverse small:before,blockquote.pull-right .small:before,blockquote.pull-right footer:before,blockquote.pull-right small:before{content:''}.blockquote-reverse .small:after,.blockquote-reverse footer:after,.blockquote-reverse small:after,blockquote.pull-right .small:after,blockquote.pull-right footer:after,blockquote.pull-right small:after{content:'\00A0 \2014'}address{margin-bottom:20px;font-style:normal;line-height:1.42857143}code,kbd,pre,samp{font-family:Menlo,Monaco,Consolas,"Courier New",monospace}code{padding:2px 4px;font-size:90%;color:#c7254e;background-color:#f9f2f4;border-radius:4px}kbd{padding:2px 4px;font-size:90%;color:#fff;background-color:#333;border-radius:3px;-webkit-box-shadow:inset 0 -1px 0 rgba(0,0,0,.25);box-shadow:inset 0 -1px 0 rgba(0,0,0,.25)}kbd kbd{padding:0;font-size:100%;font-weight:700;-webkit-box-shadow:none;box-shadow:none}pre{display:block;padding:9.5px;margin:0 0 10px;font-size:13px;line-height:1.42857143;color:#333;word-break:break-all;word-wrap:break-word;background-color:#f5f5f5;border:1px solid #ccc;border-radius:4px}pre code{padding:0;font-size:inherit;color:inherit;white-space:pre-wrap;background-color:transparent;border-radius:0}.pre-scrollable{max-height:340px;overflow-y:scroll}.container{padding-right:15px;padding-left:15px;margin-right:auto;margin-left:auto}@media (min-width:768px){.container{width:750px}}@media (min-width:992px){.container{width:970px}}@media (min-width:1200px){.container{width:1170px}}.container-fluid{padding-right:15px;padding-left:15px;margin-right:auto;margin-left:auto}.row{margin-right:-15px;margin-left:-15px}.col-lg-1,.col-lg-10,.col-lg-11,.col-lg-12,.col-lg-2,.col-lg-3,.col-lg-4,.col-lg-5,.col-lg-6,.col-lg-7,.col-lg-8,.col-lg-9,.col-md-1,.col-md-10,.col-md-11,.col-md-12,.col-md-2,.col-md-3,.col-md-4,.col-md-5,.col-md-6,.col-md-7,.col-md-8,.col-md-9,.col-sm-1,.col-sm-10,.col-sm-11,.col-sm-12,.col-sm-2,.col-sm-3,.col-sm-4,.col-sm-5,.col-sm-6,.col-sm-7,.col-sm-8,.col-sm-9,.col-xs-1,.col-xs-10,.col-xs-11,.col-xs-12,.col-xs-2,.col-xs-3,.col-xs-4,.col-xs-5,.col-xs-6,.col-xs-7,.col-xs-8,.col-xs-9{position:relative;min-height:1px;padding-right:15px;padding-left:15px}.col-xs-1,.col-xs-10,.col-xs-11,.col-xs-12,.col-xs-2,.col-xs-3,.col-xs-4,.col-xs-5,.col-xs-6,.col-xs-7,.col-xs-8,.col-xs-9{float:left}.col-xs-12{width:100%}.col-xs-11{width:91.66666667%}.col-xs-10{width:83.33333333%}.col-xs-9{width:75%}.col-xs-8{width:66.66666667%}.col-xs-7{width:58.33333333%}.col-xs-6{width:50%}.col-xs-5{width:41.66666667%}.col-xs-4{width:33.33333333%}.col-xs-3{width:25%}.col-xs-2{width:16.66666667%}.col-xs-1{width:8.33333333%}.col-xs-pull-12{right:100%}.col-xs-pull-11{right:91.66666667%}.col-xs-pull-10{right:83.33333333%}.col-xs-pull-9{right:75%}.col-xs-pull-8{right:66.66666667%}.col-xs-pull-7{right:58.33333333%}.col-xs-pull-6{right:50%}.col-xs-pull-5{right:41.66666667%}.col-xs-pull-4{right:33.33333333%}.col-xs-pull-3{right:25%}.col-xs-pull-2{right:16.66666667%}.col-xs-pull-1{right:8.33333333%}.col-xs-pull-0{right:auto}.col-xs-push-12{left:100%}.col-xs-push-11{left:91.66666667%}.col-xs-push-10{left:83.33333333%}.col-xs-push-9{left:75%}.col-xs-push-8{left:66.66666667%}.col-xs-push-7{left:58.33333333%}.col-xs-push-6{left:50%}.col-xs-push-5{left:41.66666667%}.col-xs-push-4{left:33.33333333%}.col-xs-push-3{left:25%}.col-xs-push-2{left:16.66666667%}.col-xs-push-1{left:8.33333333%}.col-xs-push-0{left:auto}.col-xs-offset-12{margin-left:100%}.col-xs-offset-11{margin-left:91.66666667%}.col-xs-offset-10{margin-left:83.33333333%}.col-xs-offset-9{margin-left:75%}.col-xs-offset-8{margin-left:66.66666667%}.col-xs-offset-7{margin-left:58.33333333%}.col-xs-offset-6{margin-left:50%}.col-xs-offset-5{margin-left:41.66666667%}.col-xs-offset-4{margin-left:33.33333333%}.col-xs-offset-3{margin-left:25%}.col-xs-offset-2{margin-left:16.66666667%}.col-xs-offset-1{margin-left:8.33333333%}.col-xs-offset-0{margin-left:0}@media (min-width:768px){.col-sm-1,.col-sm-10,.col-sm-11,.col-sm-12,.col-sm-2,.col-sm-3,.col-sm-4,.col-sm-5,.col-sm-6,.col-sm-7,.col-sm-8,.col-sm-9{float:left}.col-sm-12{width:100%}.col-sm-11{width:91.66666667%}.col-sm-10{width:83.33333333%}.col-sm-9{width:75%}.col-sm-8{width:66.66666667%}.col-sm-7{width:58.33333333%}.col-sm-6{width:50%}.col-sm-5{width:41.66666667%}.col-sm-4{width:33.33333333%}.col-sm-3{width:25%}.col-sm-2{width:16.66666667%}.col-sm-1{width:8.33333333%}.col-sm-pull-12{right:100%}.col-sm-pull-11{right:91.66666667%}.col-sm-pull-10{right:83.33333333%}.col-sm-pull-9{right:75%}.col-sm-pull-8{right:66.66666667%}.col-sm-pull-7{right:58.33333333%}.col-sm-pull-6{right:50%}.col-sm-pull-5{right:41.66666667%}.col-sm-pull-4{right:33.33333333%}.col-sm-pull-3{right:25%}.col-sm-pull-2{right:16.66666667%}.col-sm-pull-1{right:8.33333333%}.col-sm-pull-0{right:auto}.col-sm-push-12{left:100%}.col-sm-push-11{left:91.66666667%}.col-sm-push-10{left:83.33333333%}.col-sm-push-9{left:75%}.col-sm-push-8{left:66.66666667%}.col-sm-push-7{left:58.33333333%}.col-sm-push-6{left:50%}.col-sm-push-5{left:41.66666667%}.col-sm-push-4{left:33.33333333%}.col-sm-push-3{left:25%}.col-sm-push-2{left:16.66666667%}.col-sm-push-1{left:8.33333333%}.col-sm-push-0{left:auto}.col-sm-offset-12{margin-left:100%}.col-sm-offset-11{margin-left:91.66666667%}.col-sm-offset-10{margin-left:83.33333333%}.col-sm-offset-9{margin-left:75%}.col-sm-offset-8{margin-left:66.66666667%}.col-sm-offset-7{margin-left:58.33333333%}.col-sm-offset-6{margin-left:50%}.col-sm-offset-5{margin-left:41.66666667%}.col-sm-offset-4{margin-left:33.33333333%}.col-sm-offset-3{margin-left:25%}.col-sm-offset-2{margin-left:16.66666667%}.col-sm-offset-1{margin-left:8.33333333%}.col-sm-offset-0{margin-left:0}}@media (min-width:992px){.col-md-1,.col-md-10,.col-md-11,.col-md-12,.col-md-2,.col-md-3,.col-md-4,.col-md-5,.col-md-6,.col-md-7,.col-md-8,.col-md-9{float:left}.col-md-12{width:100%}.col-md-11{width:91.66666667%}.col-md-10{width:83.33333333%}.col-md-9{width:75%}.col-md-8{width:66.66666667%}.col-md-7{width:58.33333333%}.col-md-6{width:50%}.col-md-5{width:41.66666667%}.col-md-4{width:33.33333333%}.col-md-3{width:25%}.col-md-2{width:16.66666667%}.col-md-1{width:8.33333333%}.col-md-pull-12{right:100%}.col-md-pull-11{right:91.66666667%}.col-md-pull-10{right:83.33333333%}.col-md-pull-9{right:75%}.col-md-pull-8{right:66.66666667%}.col-md-pull-7{right:58.33333333%}.col-md-pull-6{right:50%}.col-md-pull-5{right:41.66666667%}.col-md-pull-4{right:33.33333333%}.col-md-pull-3{right:25%}.col-md-pull-2{right:16.66666667%}.col-md-pull-1{right:8.33333333%}.col-md-pull-0{right:auto}.col-md-push-12{left:100%}.col-md-push-11{left:91.66666667%}.col-md-push-10{left:83.33333333%}.col-md-push-9{left:75%}.col-md-push-8{left:66.66666667%}.col-md-push-7{left:58.33333333%}.col-md-push-6{left:50%}.col-md-push-5{left:41.66666667%}.col-md-push-4{left:33.33333333%}.col-md-push-3{left:25%}.col-md-push-2{left:16.66666667%}.col-md-push-1{left:8.33333333%}.col-md-push-0{left:auto}.col-md-offset-12{margin-left:100%}.col-md-offset-11{margin-left:91.66666667%}.col-md-offset-10{margin-left:83.33333333%}.col-md-offset-9{margin-left:75%}.col-md-offset-8{margin-left:66.66666667%}.col-md-offset-7{margin-left:58.33333333%}.col-md-offset-6{margin-left:50%}.col-md-offset-5{margin-left:41.66666667%}.col-md-offset-4{margin-left:33.33333333%}.col-md-offset-3{margin-left:25%}.col-md-offset-2{margin-left:16.66666667%}.col-md-offset-1{margin-left:8.33333333%}.col-md-offset-0{margin-left:0}}@media (min-width:1200px){.col-lg-1,.col-lg-10,.col-lg-11,.col-lg-12,.col-lg-2,.col-lg-3,.col-lg-4,.col-lg-5,.col-lg-6,.col-lg-7,.col-lg-8,.col-lg-9{float:left}.col-lg-12{width:100%}.col-lg-11{width:91.66666667%}.col-lg-10{width:83.33333333%}.col-lg-9{width:75%}.col-lg-8{width:66.66666667%}.col-lg-7{width:58.33333333%}.col-lg-6{width:50%}.col-lg-5{width:41.66666667%}.col-lg-4{width:33.33333333%}.col-lg-3{width:25%}.col-lg-2{width:16.66666667%}.col-lg-1{width:8.33333333%}.col-lg-pull-12{right:100%}.col-lg-pull-11{right:91.66666667%}.col-lg-pull-10{right:83.33333333%}.col-lg-pull-9{right:75%}.col-lg-pull-8{right:66.66666667%}.col-lg-pull-7{right:58.33333333%}.col-lg-pull-6{right:50%}.col-lg-pull-5{right:41.66666667%}.col-lg-pull-4{right:33.33333333%}.col-lg-pull-3{right:25%}.col-lg-pull-2{right:16.66666667%}.col-lg-pull-1{right:8.33333333%}.col-lg-pull-0{right:auto}.col-lg-push-12{left:100%}.col-lg-push-11{left:91.66666667%}.col-lg-push-10{left:83.33333333%}.col-lg-push-9{left:75%}.col-lg-push-8{left:66.66666667%}.col-lg-push-7{left:58.33333333%}.col-lg-push-6{left:50%}.col-lg-push-5{left:41.66666667%}.col-lg-push-4{left:33.33333333%}.col-lg-push-3{left:25%}.col-lg-push-2{left:16.66666667%}.col-lg-push-1{left:8.33333333%}.col-lg-push-0{left:auto}.col-lg-offset-12{margin-left:100%}.col-lg-offset-11{margin-left:91.66666667%}.col-lg-offset-10{margin-left:83.33333333%}.col-lg-offset-9{margin-left:75%}.col-lg-offset-8{margin-left:66.66666667%}.col-lg-offset-7{margin-left:58.33333333%}.col-lg-offset-6{margin-left:50%}.col-lg-offset-5{margin-left:41.66666667%}.col-lg-offset-4{margin-left:33.33333333%}.col-lg-offset-3{margin-left:25%}.col-lg-offset-2{margin-left:16.66666667%}.col-lg-offset-1{margin-left:8.33333333%}.col-lg-offset-0{margin-left:0}}table{background-color:transparent}caption{padding-top:8px;padding-bottom:8px;color:#777;text-align:left}th{text-align:left}.table{width:100%;max-width:100%;margin-bottom:20px}.table>tbody>tr>td,.table>tbody>tr>th,.table>tfoot>tr>td,.table>tfoot>tr>th,.table>thead>tr>td,.table>thead>tr>th{padding:8px;line-height:1.42857143;vertical-align:top;border-top:1px solid #ddd}.table>thead>tr>th{vertical-align:bottom;border-bottom:2px solid #ddd}.table>caption+thead>tr:first-child>td,.table>caption+thead>tr:first-child>th,.table>colgroup+thead>tr:first-child>td,.table>colgroup+thead>tr:first-child>th,.table>thead:first-child>tr:first-child>td,.table>thead:first-child>tr:first-child>th{border-top:0}.table>tbody+tbody{border-top:2px solid #ddd}.table .table{background-color:#fff}.table-condensed>tbody>tr>td,.table-condensed>tbody>tr>th,.table-condensed>tfoot>tr>td,.table-condensed>tfoot>tr>th,.table-condensed>thead>tr>td,.table-condensed>thead>tr>th{padding:5px}.table-bordered{border:1px solid #ddd}.table-bordered>tbody>tr>td,.table-bordered>tbody>tr>th,.table-bordered>tfoot>tr>td,.table-bordered>tfoot>tr>th,.table-bordered>thead>tr>td,.table-bordered>thead>tr>th{border:1px solid #ddd}.table-bordered>thead>tr>td,.table-bordered>thead>tr>th{border-bottom-width:2px}.table-striped>tbody>tr:nth-of-type(odd){background-color:#f9f9f9}.table-hover>tbody>tr:hover{background-color:#f5f5f5}table col[class*=col-]{position:static;display:table-column;float:none}table td[class*=col-],table th[class*=col-]{position:static;display:table-cell;float:none}.table>tbody>tr.active>td,.table>tbody>tr.active>th,.table>tbody>tr>td.active,.table>tbody>tr>th.active,.table>tfoot>tr.active>td,.table>tfoot>tr.active>th,.table>tfoot>tr>td.active,.table>tfoot>tr>th.active,.table>thead>tr.active>td,.table>thead>tr.active>th,.table>thead>tr>td.active,.table>thead>tr>th.active{background-color:#f5f5f5}.table-hover>tbody>tr.active:hover>td,.table-hover>tbody>tr.active:hover>th,.table-hover>tbody>tr:hover>.active,.table-hover>tbody>tr>td.active:hover,.table-hover>tbody>tr>th.active:hover{background-color:#e8e8e8}.table>tbody>tr.success>td,.table>tbody>tr.success>th,.table>tbody>tr>td.success,.table>tbody>tr>th.success,.table>tfoot>tr.success>td,.table>tfoot>tr.success>th,.table>tfoot>tr>td.success,.table>tfoot>tr>th.success,.table>thead>tr.success>td,.table>thead>tr.success>th,.table>thead>tr>td.success,.table>thead>tr>th.success{background-color:#dff0d8}.table-hover>tbody>tr.success:hover>td,.table-hover>tbody>tr.success:hover>th,.table-hover>tbody>tr:hover>.success,.table-hover>tbody>tr>td.success:hover,.table-hover>tbody>tr>th.success:hover{background-color:#d0e9c6}.table>tbody>tr.info>td,.table>tbody>tr.info>th,.table>tbody>tr>td.info,.table>tbody>tr>th.info,.table>tfoot>tr.info>td,.table>tfoot>tr.info>th,.table>tfoot>tr>td.info,.table>tfoot>tr>th.info,.table>thead>tr.info>td,.table>thead>tr.info>th,.table>thead>tr>td.info,.table>thead>tr>th.info{background-color:#d9edf7}.table-hover>tbody>tr.info:hover>td,.table-hover>tbody>tr.info:hover>th,.table-hover>tbody>tr:hover>.info,.table-hover>tbody>tr>td.info:hover,.table-hover>tbody>tr>th.info:hover{background-color:#c4e3f3}.table>tbody>tr.warning>td,.table>tbody>tr.warning>th,.table>tbody>tr>td.warning,.table>tbody>tr>th.warning,.table>tfoot>tr.warning>td,.table>tfoot>tr.warning>th,.table>tfoot>tr>td.warning,.table>tfoot>tr>th.warning,.table>thead>tr.warning>td,.table>thead>tr.warning>th,.table>thead>tr>td.warning,.table>thead>tr>th.warning{background-color:#fcf8e3}.table-hover>tbody>tr.warning:hover>td,.table-hover>tbody>tr.warning:hover>th,.table-hover>tbody>tr:hover>.warning,.table-hover>tbody>tr>td.warning:hover,.table-hover>tbody>tr>th.warning:hover{background-color:#faf2cc}.table>tbody>tr.danger>td,.table>tbody>tr.danger>th,.table>tbody>tr>td.danger,.table>tbody>tr>th.danger,.table>tfoot>tr.danger>td,.table>tfoot>tr.danger>th,.table>tfoot>tr>td.danger,.table>tfoot>tr>th.danger,.table>thead>tr.danger>td,.table>thead>tr.danger>th,.table>thead>tr>td.danger,.table>thead>tr>th.danger{background-color:#f2dede}.table-hover>tbody>tr.danger:hover>td,.table-hover>tbody>tr.danger:hover>th,.table-hover>tbody>tr:hover>.danger,.table-hover>tbody>tr>td.danger:hover,.table-hover>tbody>tr>th.danger:hover{background-color:#ebcccc}.table-responsive{min-height:.01%;overflow-x:auto}@media screen and (max-width:767px){.table-responsive{width:100%;margin-bottom:15px;overflow-y:hidden;-ms-overflow-style:-ms-autohiding-scrollbar;border:1px solid #ddd}.table-responsive>.table{margin-bottom:0}.table-responsive>.table>tbody>tr>td,.table-responsive>.table>tbody>tr>th,.table-responsive>.table>tfoot>tr>td,.table-responsive>.table>tfoot>tr>th,.table-responsive>.table>thead>tr>td,.table-responsive>.table>thead>tr>th{white-space:nowrap}.table-responsive>.table-bordered{border:0}.table-responsive>.table-bordered>tbody>tr>td:first-child,.table-responsive>.table-bordered>tbody>tr>th:first-child,.table-responsive>.table-bordered>tfoot>tr>td:first-child,.table-responsive>.table-bordered>tfoot>tr>th:first-child,.table-responsive>.table-bordered>thead>tr>td:first-child,.table-responsive>.table-bordered>thead>tr>th:first-child{border-left:0}.table-responsive>.table-bordered>tbody>tr>td:last-child,.table-responsive>.table-bordered>tbody>tr>th:last-child,.table-responsive>.table-bordered>tfoot>tr>td:last-child,.table-responsive>.table-bordered>tfoot>tr>th:last-child,.table-responsive>.table-bordered>thead>tr>td:last-child,.table-responsive>.table-bordered>thead>tr>th:last-child{border-right:0}.table-responsive>.table-bordered>tbody>tr:last-child>td,.table-responsive>.table-bordered>tbody>tr:last-child>th,.table-responsive>.table-bordered>tfoot>tr:last-child>td,.table-responsive>.table-bordered>tfoot>tr:last-child>th{border-bottom:0}}fieldset{min-width:0;padding:0;margin:0;border:0}legend{display:block;width:100%;padding:0;margin-bottom:20px;font-size:21px;line-height:inherit;color:#333;border:0;border-bottom:1px solid #e5e5e5}label{display:inline-block;max-width:100%;margin-bottom:5px;font-weight:700}input[type=search]{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}input[type=checkbox],input[type=radio]{margin:4px 0 0;margin-top:1px\9;line-height:normal}input[type=file]{display:block}input[type=range]{display:block;width:100%}select[multiple],select[size]{height:auto}input[type=file]:focus,input[type=checkbox]:focus,input[type=radio]:focus{outline:5px auto -webkit-focus-ring-color;outline-offset:-2px}output{display:block;padding-top:7px;font-size:14px;line-height:1.42857143;color:#555}.form-control{display:block;width:100%;height:34px;padding:6px 12px;font-size:14px;line-height:1.42857143;color:#555;background-color:#fff;background-image:none;border:1px solid #ccc;border-radius:4px;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075);box-shadow:inset 0 1px 1px rgba(0,0,0,.075);-webkit-transition:border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;-o-transition:border-color ease-in-out .15s,box-shadow ease-in-out .15s;transition:border-color ease-in-out .15s,box-shadow ease-in-out .15s}.form-control:focus{border-color:#66afe9;outline:0;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6)}.form-control::-moz-placeholder{color:#999;opacity:1}.form-control:-ms-input-placeholder{color:#999}.form-control::-webkit-input-placeholder{color:#999}.form-control::-ms-expand{background-color:transparent;border:0}.form-control[disabled],.form-control[readonly],fieldset[disabled] .form-control{background-color:#eee;opacity:1}.form-control[disabled],fieldset[disabled] .form-control{cursor:not-allowed}textarea.form-control{height:auto}input[type=search]{-webkit-appearance:none}@media screen and (-webkit-min-device-pixel-ratio:0){input[type=date].form-control,input[type=time].form-control,input[type=datetime-local].form-control,input[type=month].form-control{line-height:34px}.input-group-sm input[type=date],.input-group-sm input[type=time],.input-group-sm input[type=datetime-local],.input-group-sm input[type=month],input[type=date].input-sm,input[type=time].input-sm,input[type=datetime-local].input-sm,input[type=month].input-sm{line-height:30px}.input-group-lg input[type=date],.input-group-lg input[type=time],.input-group-lg input[type=datetime-local],.input-group-lg input[type=month],input[type=date].input-lg,input[type=time].input-lg,input[type=datetime-local].input-lg,input[type=month].input-lg{line-height:46px}}.form-group{margin-bottom:15px}.checkbox,.radio{position:relative;display:block;margin-top:10px;margin-bottom:10px}.checkbox label,.radio label{min-height:20px;padding-left:20px;margin-bottom:0;font-weight:400;cursor:pointer}.checkbox input[type=checkbox],.checkbox-inline input[type=checkbox],.radio input[type=radio],.radio-inline input[type=radio]{position:absolute;margin-top:4px\9;margin-left:-20px}.checkbox+.checkbox,.radio+.radio{margin-top:-5px}.checkbox-inline,.radio-inline{position:relative;display:inline-block;padding-left:20px;margin-bottom:0;font-weight:400;vertical-align:middle;cursor:pointer}.checkbox-inline+.checkbox-inline,.radio-inline+.radio-inline{margin-top:0;margin-left:10px}fieldset[disabled] input[type=checkbox],fieldset[disabled] input[type=radio],input[type=checkbox].disabled,input[type=checkbox][disabled],input[type=radio].disabled,input[type=radio][disabled]{cursor:not-allowed}.checkbox-inline.disabled,.radio-inline.disabled,fieldset[disabled] .checkbox-inline,fieldset[disabled] .radio-inline{cursor:not-allowed}.checkbox.disabled label,.radio.disabled label,fieldset[disabled] .checkbox label,fieldset[disabled] .radio label{cursor:not-allowed}.form-control-static{min-height:34px;padding-top:7px;padding-bottom:7px;margin-bottom:0}.form-control-static.input-lg,.form-control-static.input-sm{padding-right:0;padding-left:0}.input-sm{height:30px;padding:5px 10px;font-size:12px;line-height:1.5;border-radius:3px}select.input-sm{height:30px;line-height:30px}select[multiple].input-sm,textarea.input-sm{height:auto}.form-group-sm .form-control{height:30px;padding:5px 10px;font-size:12px;line-height:1.5;border-radius:3px}.form-group-sm select.form-control{height:30px;line-height:30px}.form-group-sm select[multiple].form-control,.form-group-sm textarea.form-control{height:auto}.form-group-sm .form-control-static{height:30px;min-height:32px;padding:6px 10px;font-size:12px;line-height:1.5}.input-lg{height:46px;padding:10px 16px;font-size:18px;line-height:1.3333333;border-radius:6px}select.input-lg{height:46px;line-height:46px}select[multiple].input-lg,textarea.input-lg{height:auto}.form-group-lg .form-control{height:46px;padding:10px 16px;font-size:18px;line-height:1.3333333;border-radius:6px}.form-group-lg select.form-control{height:46px;line-height:46px}.form-group-lg select[multiple].form-control,.form-group-lg textarea.form-control{height:auto}.form-group-lg .form-control-static{height:46px;min-height:38px;padding:11px 16px;font-size:18px;line-height:1.3333333}.has-feedback{position:relative}.has-feedback .form-control{padding-right:42.5px}.form-control-feedback{position:absolute;top:0;right:0;z-index:2;display:block;width:34px;height:34px;line-height:34px;text-align:center;pointer-events:none}.form-group-lg .form-control+.form-control-feedback,.input-group-lg+.form-control-feedback,.input-lg+.form-control-feedback{width:46px;height:46px;line-height:46px}.form-group-sm .form-control+.form-control-feedback,.input-group-sm+.form-control-feedback,.input-sm+.form-control-feedback{width:30px;height:30px;line-height:30px}.has-success .checkbox,.has-success .checkbox-inline,.has-success .control-label,.has-success .help-block,.has-success .radio,.has-success .radio-inline,.has-success.checkbox label,.has-success.checkbox-inline label,.has-success.radio label,.has-success.radio-inline label{color:#3c763d}.has-success .form-control{border-color:#3c763d;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075);box-shadow:inset 0 1px 1px rgba(0,0,0,.075)}.has-success .form-control:focus{border-color:#2b542c;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #67b168;box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #67b168}.has-success .input-group-addon{color:#3c763d;background-color:#dff0d8;border-color:#3c763d}.has-success .form-control-feedback{color:#3c763d}.has-warning .checkbox,.has-warning .checkbox-inline,.has-warning .control-label,.has-warning .help-block,.has-warning .radio,.has-warning .radio-inline,.has-warning.checkbox label,.has-warning.checkbox-inline label,.has-warning.radio label,.has-warning.radio-inline label{color:#8a6d3b}.has-warning .form-control{border-color:#8a6d3b;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075);box-shadow:inset 0 1px 1px rgba(0,0,0,.075)}.has-warning .form-control:focus{border-color:#66512c;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #c0a16b;box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #c0a16b}.has-warning .input-group-addon{color:#8a6d3b;background-color:#fcf8e3;border-color:#8a6d3b}.has-warning .form-control-feedback{color:#8a6d3b}.has-error .checkbox,.has-error .checkbox-inline,.has-error .control-label,.has-error .help-block,.has-error .radio,.has-error .radio-inline,.has-error.checkbox label,.has-error.checkbox-inline label,.has-error.radio label,.has-error.radio-inline label{color:#a94442}.has-error .form-control{border-color:#a94442;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075);box-shadow:inset 0 1px 1px rgba(0,0,0,.075)}.has-error .form-control:focus{border-color:#843534;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #ce8483;box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #ce8483}.has-error .input-group-addon{color:#a94442;background-color:#f2dede;border-color:#a94442}.has-error .form-control-feedback{color:#a94442}.has-feedback label~.form-control-feedback{top:25px}.has-feedback label.sr-only~.form-control-feedback{top:0}.help-block{display:block;margin-top:5px;margin-bottom:10px;color:#737373}@media (min-width:768px){.form-inline .form-group{display:inline-block;margin-bottom:0;vertical-align:middle}.form-inline .form-control{display:inline-block;width:auto;vertical-align:middle}.form-inline .form-control-static{display:inline-block}.form-inline .input-group{display:inline-table;vertical-align:middle}.form-inline .input-group .form-control,.form-inline .input-group .input-group-addon,.form-inline .input-group .input-group-btn{width:auto}.form-inline .input-group>.form-control{width:100%}.form-inline .control-label{margin-bottom:0;vertical-align:middle}.form-inline .checkbox,.form-inline .radio{display:inline-block;margin-top:0;margin-bottom:0;vertical-align:middle}.form-inline .checkbox label,.form-inline .radio label{padding-left:0}.form-inline .checkbox input[type=checkbox],.form-inline .radio input[type=radio]{position:relative;margin-left:0}.form-inline .has-feedback .form-control-feedback{top:0}}.form-horizontal .checkbox,.form-horizontal .checkbox-inline,.form-horizontal .radio,.form-horizontal .radio-inline{padding-top:7px;margin-top:0;margin-bottom:0}.form-horizontal .checkbox,.form-horizontal .radio{min-height:27px}.form-horizontal .form-group{margin-right:-15px;margin-left:-15px}@media (min-width:768px){.form-horizontal .control-label{padding-top:7px;margin-bottom:0;text-align:right}}.form-horizontal .has-feedback .form-control-feedback{right:15px}@media (min-width:768px){.form-horizontal .form-group-lg .control-label{padding-top:11px;font-size:18px}}@media (min-width:768px){.form-horizontal .form-group-sm .control-label{padding-top:6px;font-size:12px}}.btn{display:inline-block;padding:6px 12px;margin-bottom:0;font-size:14px;font-weight:400;line-height:1.42857143;text-align:center;white-space:nowrap;vertical-align:middle;-ms-touch-action:manipulation;touch-action:manipulation;cursor:pointer;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;background-image:none;border:1px solid transparent;border-radius:4px}.btn.active.focus,.btn.active:focus,.btn.focus,.btn:active.focus,.btn:active:focus,.btn:focus{outline:5px auto -webkit-focus-ring-color;outline-offset:-2px}.btn.focus,.btn:focus,.btn:hover{color:#333;text-decoration:none}.btn.active,.btn:active{background-image:none;outline:0;-webkit-box-shadow:inset 0 3px 5px rgba(0,0,0,.125);box-shadow:inset 0 3px 5px rgba(0,0,0,.125)}.btn.disabled,.btn[disabled],fieldset[disabled] .btn{cursor:not-allowed;filter:alpha(opacity=65);-webkit-box-shadow:none;box-shadow:none;opacity:.65}a.btn.disabled,fieldset[disabled] a.btn{pointer-events:none}.btn-default{color:#333;background-color:#fff;border-color:#ccc}.btn-default.focus,.btn-default:focus{color:#333;background-color:#e6e6e6;border-color:#8c8c8c}.btn-default:hover{color:#333;background-color:#e6e6e6;border-color:#adadad}.btn-default.active,.btn-default:active,.open>.dropdown-toggle.btn-default{color:#333;background-color:#e6e6e6;border-color:#adadad}.btn-default.active.focus,.btn-default.active:focus,.btn-default.active:hover,.btn-default:active.focus,.btn-default:active:focus,.btn-default:active:hover,.open>.dropdown-toggle.btn-default.focus,.open>.dropdown-toggle.btn-default:focus,.open>.dropdown-toggle.btn-default:hover{color:#333;background-color:#d4d4d4;border-color:#8c8c8c}.btn-default.active,.btn-default:active,.open>.dropdown-toggle.btn-default{background-image:none}.btn-default.disabled.focus,.btn-default.disabled:focus,.btn-default.disabled:hover,.btn-default[disabled].focus,.btn-default[disabled]:focus,.btn-default[disabled]:hover,fieldset[disabled] .btn-default.focus,fieldset[disabled] .btn-default:focus,fieldset[disabled] .btn-default:hover{background-color:#fff;border-color:#ccc}.btn-default .badge{color:#fff;background-color:#333}.btn-primary{color:#fff;background-color:#337ab7;border-color:#2e6da4}.btn-primary.focus,.btn-primary:focus{color:#fff;background-color:#286090;border-color:#122b40}.btn-primary:hover{color:#fff;background-color:#286090;border-color:#204d74}.btn-primary.active,.btn-primary:active,.open>.dropdown-toggle.btn-primary{color:#fff;background-color:#286090;border-color:#204d74}.btn-primary.active.focus,.btn-primary.active:focus,.btn-primary.active:hover,.btn-primary:active.focus,.btn-primary:active:focus,.btn-primary:active:hover,.open>.dropdown-toggle.btn-primary.focus,.open>.dropdown-toggle.btn-primary:focus,.open>.dropdown-toggle.btn-primary:hover{color:#fff;background-color:#204d74;border-color:#122b40}.btn-primary.active,.btn-primary:active,.open>.dropdown-toggle.btn-primary{background-image:none}.btn-primary.disabled.focus,.btn-primary.disabled:focus,.btn-primary.disabled:hover,.btn-primary[disabled].focus,.btn-primary[disabled]:focus,.btn-primary[disabled]:hover,fieldset[disabled] .btn-primary.focus,fieldset[disabled] .btn-primary:focus,fieldset[disabled] .btn-primary:hover{background-color:#337ab7;border-color:#2e6da4}.btn-primary .badge{color:#337ab7;background-color:#fff}.btn-success{color:#fff;background-color:#5cb85c;border-color:#4cae4c}.btn-success.focus,.btn-success:focus{color:#fff;background-color:#449d44;border-color:#255625}.btn-success:hover{color:#fff;background-color:#449d44;border-color:#398439}.btn-success.active,.btn-success:active,.open>.dropdown-toggle.btn-success{color:#fff;background-color:#449d44;border-color:#398439}.btn-success.active.focus,.btn-success.active:focus,.btn-success.active:hover,.btn-success:active.focus,.btn-success:active:focus,.btn-success:active:hover,.open>.dropdown-toggle.btn-success.focus,.open>.dropdown-toggle.btn-success:focus,.open>.dropdown-toggle.btn-success:hover{color:#fff;background-color:#398439;border-color:#255625}.btn-success.active,.btn-success:active,.open>.dropdown-toggle.btn-success{background-image:none}.btn-success.disabled.focus,.btn-success.disabled:focus,.btn-success.disabled:hover,.btn-success[disabled].focus,.btn-success[disabled]:focus,.btn-success[disabled]:hover,fieldset[disabled] .btn-success.focus,fieldset[disabled] .btn-success:focus,fieldset[disabled] .btn-success:hover{background-color:#5cb85c;border-color:#4cae4c}.btn-success .badge{color:#5cb85c;background-color:#fff}.btn-info{color:#fff;background-color:#5bc0de;border-color:#46b8da}.btn-info.focus,.btn-info:focus{color:#fff;background-color:#31b0d5;border-color:#1b6d85}.btn-info:hover{color:#fff;background-color:#31b0d5;border-color:#269abc}.btn-info.active,.btn-info:active,.open>.dropdown-toggle.btn-info{color:#fff;background-color:#31b0d5;border-color:#269abc}.btn-info.active.focus,.btn-info.active:focus,.btn-info.active:hover,.btn-info:active.focus,.btn-info:active:focus,.btn-info:active:hover,.open>.dropdown-toggle.btn-info.focus,.open>.dropdown-toggle.btn-info:focus,.open>.dropdown-toggle.btn-info:hover{color:#fff;background-color:#269abc;border-color:#1b6d85}.btn-info.active,.btn-info:active,.open>.dropdown-toggle.btn-info{background-image:none}.btn-info.disabled.focus,.btn-info.disabled:focus,.btn-info.disabled:hover,.btn-info[disabled].focus,.btn-info[disabled]:focus,.btn-info[disabled]:hover,fieldset[disabled] .btn-info.focus,fieldset[disabled] .btn-info:focus,fieldset[disabled] .btn-info:hover{background-color:#5bc0de;border-color:#46b8da}.btn-info .badge{color:#5bc0de;background-color:#fff}.btn-warning{color:#fff;background-color:#f0ad4e;border-color:#eea236}.btn-warning.focus,.btn-warning:focus{color:#fff;background-color:#ec971f;border-color:#985f0d}.btn-warning:hover{color:#fff;background-color:#ec971f;border-color:#d58512}.btn-warning.active,.btn-warning:active,.open>.dropdown-toggle.btn-warning{color:#fff;background-color:#ec971f;border-color:#d58512}.btn-warning.active.focus,.btn-warning.active:focus,.btn-warning.active:hover,.btn-warning:active.focus,.btn-warning:active:focus,.btn-warning:active:hover,.open>.dropdown-toggle.btn-warning.focus,.open>.dropdown-toggle.btn-warning:focus,.open>.dropdown-toggle.btn-warning:hover{color:#fff;background-color:#d58512;border-color:#985f0d}.btn-warning.active,.btn-warning:active,.open>.dropdown-toggle.btn-warning{background-image:none}.btn-warning.disabled.focus,.btn-warning.disabled:focus,.btn-warning.disabled:hover,.btn-warning[disabled].focus,.btn-warning[disabled]:focus,.btn-warning[disabled]:hover,fieldset[disabled] .btn-warning.focus,fieldset[disabled] .btn-warning:focus,fieldset[disabled] .btn-warning:hover{background-color:#f0ad4e;border-color:#eea236}.btn-warning .badge{color:#f0ad4e;background-color:#fff}.btn-danger{color:#fff;background-color:#d9534f;border-color:#d43f3a}.btn-danger.focus,.btn-danger:focus{color:#fff;background-color:#c9302c;border-color:#761c19}.btn-danger:hover{color:#fff;background-color:#c9302c;border-color:#ac2925}.btn-danger.active,.btn-danger:active,.open>.dropdown-toggle.btn-danger{color:#fff;background-color:#c9302c;border-color:#ac2925}.btn-danger.active.focus,.btn-danger.active:focus,.btn-danger.active:hover,.btn-danger:active.focus,.btn-danger:active:focus,.btn-danger:active:hover,.open>.dropdown-toggle.btn-danger.focus,.open>.dropdown-toggle.btn-danger:focus,.open>.dropdown-toggle.btn-danger:hover{color:#fff;background-color:#ac2925;border-color:#761c19}.btn-danger.active,.btn-danger:active,.open>.dropdown-toggle.btn-danger{background-image:none}.btn-danger.disabled.focus,.btn-danger.disabled:focus,.btn-danger.disabled:hover,.btn-danger[disabled].focus,.btn-danger[disabled]:focus,.btn-danger[disabled]:hover,fieldset[disabled] .btn-danger.focus,fieldset[disabled] .btn-danger:focus,fieldset[disabled] .btn-danger:hover{background-color:#d9534f;border-color:#d43f3a}.btn-danger .badge{color:#d9534f;background-color:#fff}.btn-link{font-weight:400;color:#337ab7;border-radius:0}.btn-link,.btn-link.active,.btn-link:active,.btn-link[disabled],fieldset[disabled] .btn-link{background-color:transparent;-webkit-box-shadow:none;box-shadow:none}.btn-link,.btn-link:active,.btn-link:focus,.btn-link:hover{border-color:transparent}.btn-link:focus,.btn-link:hover{color:#23527c;text-decoration:underline;background-color:transparent}.btn-link[disabled]:focus,.btn-link[disabled]:hover,fieldset[disabled] .btn-link:focus,fieldset[disabled] .btn-link:hover{color:#777;text-decoration:none}.btn-group-lg>.btn,.btn-lg{padding:10px 16px;font-size:18px;line-height:1.3333333;border-radius:6px}.btn-group-sm>.btn,.btn-sm{padding:5px 10px;font-size:12px;line-height:1.5;border-radius:3px}.btn-group-xs>.btn,.btn-xs{padding:1px 5px;font-size:12px;line-height:1.5;border-radius:3px}.btn-block{display:block;width:100%}.btn-block+.btn-block{margin-top:5px}input[type=button].btn-block,input[type=reset].btn-block,input[type=submit].btn-block{width:100%}.fade{opacity:0;-webkit-transition:opacity .15s linear;-o-transition:opacity .15s linear;transition:opacity .15s linear}.fade.in{opacity:1}.collapse{display:none}.collapse.in{display:block}tr.collapse.in{display:table-row}tbody.collapse.in{display:table-row-group}.collapsing{position:relative;height:0;overflow:hidden;-webkit-transition-timing-function:ease;-o-transition-timing-function:ease;transition-timing-function:ease;-webkit-transition-duration:.35s;-o-transition-duration:.35s;transition-duration:.35s;-webkit-transition-property:height,visibility;-o-transition-property:height,visibility;transition-property:height,visibility}.caret{display:inline-block;width:0;height:0;margin-left:2px;vertical-align:middle;border-top:4px dashed;border-top:4px solid\9;border-right:4px solid transparent;border-left:4px solid transparent}.dropdown,.dropup{position:relative}.dropdown-toggle:focus{outline:0}.dropdown-menu{position:absolute;top:100%;left:0;z-index:1000;display:none;float:left;min-width:160px;padding:5px 0;margin:2px 0 0;font-size:14px;text-align:left;list-style:none;background-color:#fff;-webkit-background-clip:padding-box;background-clip:padding-box;border:1px solid #ccc;border:1px solid rgba(0,0,0,.15);border-radius:4px;-webkit-box-shadow:0 6px 12px rgba(0,0,0,.175);box-shadow:0 6px 12px rgba(0,0,0,.175)}.dropdown-menu.pull-right{right:0;left:auto}.dropdown-menu .divider{height:1px;margin:9px 0;overflow:hidden;background-color:#e5e5e5}.dropdown-menu>li>a{display:block;padding:3px 20px;clear:both;font-weight:400;line-height:1.42857143;color:#333;white-space:nowrap}.dropdown-menu>li>a:focus,.dropdown-menu>li>a:hover{color:#262626;text-decoration:none;background-color:#f5f5f5}.dropdown-menu>.active>a,.dropdown-menu>.active>a:focus,.dropdown-menu>.active>a:hover{color:#fff;text-decoration:none;background-color:#337ab7;outline:0}.dropdown-menu>.disabled>a,.dropdown-menu>.disabled>a:focus,.dropdown-menu>.disabled>a:hover{color:#777}.dropdown-menu>.disabled>a:focus,.dropdown-menu>.disabled>a:hover{text-decoration:none;cursor:not-allowed;background-color:transparent;background-image:none;filter:progid:DXImageTransform.Microsoft.gradient(enabled=false)}.open>.dropdown-menu{display:block}.open>a{outline:0}.dropdown-menu-right{right:0;left:auto}.dropdown-menu-left{right:auto;left:0}.dropdown-header{display:block;padding:3px 20px;font-size:12px;line-height:1.42857143;color:#777;white-space:nowrap}.dropdown-backdrop{position:fixed;top:0;right:0;bottom:0;left:0;z-index:990}.pull-right>.dropdown-menu{right:0;left:auto}.dropup .caret,.navbar-fixed-bottom .dropdown .caret{content:"";border-top:0;border-bottom:4px dashed;border-bottom:4px solid\9}.dropup .dropdown-menu,.navbar-fixed-bottom .dropdown .dropdown-menu{top:auto;bottom:100%;margin-bottom:2px}@media (min-width:768px){.navbar-right .dropdown-menu{right:0;left:auto}.navbar-right .dropdown-menu-left{right:auto;left:0}}.btn-group,.btn-group-vertical{position:relative;display:inline-block;vertical-align:middle}.btn-group-vertical>.btn,.btn-group>.btn{position:relative;float:left}.btn-group-vertical>.btn.active,.btn-group-vertical>.btn:active,.btn-group-vertical>.btn:focus,.btn-group-vertical>.btn:hover,.btn-group>.btn.active,.btn-group>.btn:active,.btn-group>.btn:focus,.btn-group>.btn:hover{z-index:2}.btn-group .btn+.btn,.btn-group .btn+.btn-group,.btn-group .btn-group+.btn,.btn-group .btn-group+.btn-group{margin-left:-1px}.btn-toolbar{margin-left:-5px}.btn-toolbar .btn,.btn-toolbar .btn-group,.btn-toolbar .input-group{float:left}.btn-toolbar>.btn,.btn-toolbar>.btn-group,.btn-toolbar>.input-group{margin-left:5px}.btn-group>.btn:not(:first-child):not(:last-child):not(.dropdown-toggle){border-radius:0}.btn-group>.btn:first-child{margin-left:0}.btn-group>.btn:first-child:not(:last-child):not(.dropdown-toggle){border-top-right-radius:0;border-bottom-right-radius:0}.btn-group>.btn:last-child:not(:first-child),.btn-group>.dropdown-toggle:not(:first-child){border-top-left-radius:0;border-bottom-left-radius:0}.btn-group>.btn-group{float:left}.btn-group>.btn-group:not(:first-child):not(:last-child)>.btn{border-radius:0}.btn-group>.btn-group:first-child:not(:last-child)>.btn:last-child,.btn-group>.btn-group:first-child:not(:last-child)>.dropdown-toggle{border-top-right-radius:0;border-bottom-right-radius:0}.btn-group>.btn-group:last-child:not(:first-child)>.btn:first-child{border-top-left-radius:0;border-bottom-left-radius:0}.btn-group .dropdown-toggle:active,.btn-group.open .dropdown-toggle{outline:0}.btn-group>.btn+.dropdown-toggle{padding-right:8px;padding-left:8px}.btn-group>.btn-lg+.dropdown-toggle{padding-right:12px;padding-left:12px}.btn-group.open .dropdown-toggle{-webkit-box-shadow:inset 0 3px 5px rgba(0,0,0,.125);box-shadow:inset 0 3px 5px rgba(0,0,0,.125)}.btn-group.open .dropdown-toggle.btn-link{-webkit-box-shadow:none;box-shadow:none}.btn .caret{margin-left:0}.btn-lg .caret{border-width:5px 5px 0;border-bottom-width:0}.dropup .btn-lg .caret{border-width:0 5px 5px}.btn-group-vertical>.btn,.btn-group-vertical>.btn-group,.btn-group-vertical>.btn-group>.btn{display:block;float:none;width:100%;max-width:100%}.btn-group-vertical>.btn-group>.btn{float:none}.btn-group-vertical>.btn+.btn,.btn-group-vertical>.btn+.btn-group,.btn-group-vertical>.btn-group+.btn,.btn-group-vertical>.btn-group+.btn-group{margin-top:-1px;margin-left:0}.btn-group-vertical>.btn:not(:first-child):not(:last-child){border-radius:0}.btn-group-vertical>.btn:first-child:not(:last-child){border-top-left-radius:4px;border-top-right-radius:4px;border-bottom-right-radius:0;border-bottom-left-radius:0}.btn-group-vertical>.btn:last-child:not(:first-child){border-top-left-radius:0;border-top-right-radius:0;border-bottom-right-radius:4px;border-bottom-left-radius:4px}.btn-group-vertical>.btn-group:not(:first-child):not(:last-child)>.btn{border-radius:0}.btn-group-vertical>.btn-group:first-child:not(:last-child)>.btn:last-child,.btn-group-vertical>.btn-group:first-child:not(:last-child)>.dropdown-toggle{border-bottom-right-radius:0;border-bottom-left-radius:0}.btn-group-vertical>.btn-group:last-child:not(:first-child)>.btn:first-child{border-top-left-radius:0;border-top-right-radius:0}.btn-group-justified{display:table;width:100%;table-layout:fixed;border-collapse:separate}.btn-group-justified>.btn,.btn-group-justified>.btn-group{display:table-cell;float:none;width:1%}.btn-group-justified>.btn-group .btn{width:100%}.btn-group-justified>.btn-group .dropdown-menu{left:auto}[data-toggle=buttons]>.btn input[type=checkbox],[data-toggle=buttons]>.btn input[type=radio],[data-toggle=buttons]>.btn-group>.btn input[type=checkbox],[data-toggle=buttons]>.btn-group>.btn input[type=radio]{position:absolute;clip:rect(0,0,0,0);pointer-events:none}.input-group{position:relative;display:table;border-collapse:separate}.input-group[class*=col-]{float:none;padding-right:0;padding-left:0}.input-group .form-control{position:relative;z-index:2;float:left;width:100%;margin-bottom:0}.input-group .form-control:focus{z-index:3}.input-group-lg>.form-control,.input-group-lg>.input-group-addon,.input-group-lg>.input-group-btn>.btn{height:46px;padding:10px 16px;font-size:18px;line-height:1.3333333;border-radius:6px}select.input-group-lg>.form-control,select.input-group-lg>.input-group-addon,select.input-group-lg>.input-group-btn>.btn{height:46px;line-height:46px}select[multiple].input-group-lg>.form-control,select[multiple].input-group-lg>.input-group-addon,select[multiple].input-group-lg>.input-group-btn>.btn,textarea.input-group-lg>.form-control,textarea.input-group-lg>.input-group-addon,textarea.input-group-lg>.input-group-btn>.btn{height:auto}.input-group-sm>.form-control,.input-group-sm>.input-group-addon,.input-group-sm>.input-group-btn>.btn{height:30px;padding:5px 10px;font-size:12px;line-height:1.5;border-radius:3px}select.input-group-sm>.form-control,select.input-group-sm>.input-group-addon,select.input-group-sm>.input-group-btn>.btn{height:30px;line-height:30px}select[multiple].input-group-sm>.form-control,select[multiple].input-group-sm>.input-group-addon,select[multiple].input-group-sm>.input-group-btn>.btn,textarea.input-group-sm>.form-control,textarea.input-group-sm>.input-group-addon,textarea.input-group-sm>.input-group-btn>.btn{height:auto}.input-group .form-control,.input-group-addon,.input-group-btn{display:table-cell}.input-group .form-control:not(:first-child):not(:last-child),.input-group-addon:not(:first-child):not(:last-child),.input-group-btn:not(:first-child):not(:last-child){border-radius:0}.input-group-addon,.input-group-btn{width:1%;white-space:nowrap;vertical-align:middle}.input-group-addon{padding:6px 12px;font-size:14px;font-weight:400;line-height:1;color:#555;text-align:center;background-color:#eee;border:1px solid #ccc;border-radius:4px}.input-group-addon.input-sm{padding:5px 10px;font-size:12px;border-radius:3px}.input-group-addon.input-lg{padding:10px 16px;font-size:18px;border-radius:6px}.input-group-addon input[type=checkbox],.input-group-addon input[type=radio]{margin-top:0}.input-group .form-control:first-child,.input-group-addon:first-child,.input-group-btn:first-child>.btn,.input-group-btn:first-child>.btn-group>.btn,.input-group-btn:first-child>.dropdown-toggle,.input-group-btn:last-child>.btn-group:not(:last-child)>.btn,.input-group-btn:last-child>.btn:not(:last-child):not(.dropdown-toggle){border-top-right-radius:0;border-bottom-right-radius:0}.input-group-addon:first-child{border-right:0}.input-group .form-control:last-child,.input-group-addon:last-child,.input-group-btn:first-child>.btn-group:not(:first-child)>.btn,.input-group-btn:first-child>.btn:not(:first-child),.input-group-btn:last-child>.btn,.input-group-btn:last-child>.btn-group>.btn,.input-group-btn:last-child>.dropdown-toggle{border-top-left-radius:0;border-bottom-left-radius:0}.input-group-addon:last-child{border-left:0}.input-group-btn{position:relative;font-size:0;white-space:nowrap}.input-group-btn>.btn{position:relative}.input-group-btn>.btn+.btn{margin-left:-1px}.input-group-btn>.btn:active,.input-group-btn>.btn:focus,.input-group-btn>.btn:hover{z-index:2}.input-group-btn:first-child>.btn,.input-group-btn:first-child>.btn-group{margin-right:-1px}.input-group-btn:last-child>.btn,.input-group-btn:last-child>.btn-group{z-index:2;margin-left:-1px}.nav{padding-left:0;margin-bottom:0;list-style:none}.nav>li{position:relative;display:block}.nav>li>a{position:relative;display:block;padding:10px 15px}.nav>li>a:focus,.nav>li>a:hover{text-decoration:none;background-color:#eee}.nav>li.disabled>a{color:#777}.nav>li.disabled>a:focus,.nav>li.disabled>a:hover{color:#777;text-decoration:none;cursor:not-allowed;background-color:transparent}.nav .open>a,.nav .open>a:focus,.nav .open>a:hover{background-color:#eee;border-color:#337ab7}.nav .nav-divider{height:1px;margin:9px 0;overflow:hidden;background-color:#e5e5e5}.nav>li>a>img{max-width:none}.nav-tabs{border-bottom:1px solid #ddd}.nav-tabs>li{float:left;margin-bottom:-1px}.nav-tabs>li>a{margin-right:2px;line-height:1.42857143;border:1px solid transparent;border-radius:4px 4px 0 0}.nav-tabs>li>a:hover{border-color:#eee #eee #ddd}.nav-tabs>li.active>a,.nav-tabs>li.active>a:focus,.nav-tabs>li.active>a:hover{color:#555;cursor:default;background-color:#fff;border:1px solid #ddd;border-bottom-color:transparent}.nav-tabs.nav-justified{width:100%;border-bottom:0}.nav-tabs.nav-justified>li{float:none}.nav-tabs.nav-justified>li>a{margin-bottom:5px;text-align:center}.nav-tabs.nav-justified>.dropdown .dropdown-menu{top:auto;left:auto}@media (min-width:768px){.nav-tabs.nav-justified>li{display:table-cell;width:1%}.nav-tabs.nav-justified>li>a{margin-bottom:0}}.nav-tabs.nav-justified>li>a{margin-right:0;border-radius:4px}.nav-tabs.nav-justified>.active>a,.nav-tabs.nav-justified>.active>a:focus,.nav-tabs.nav-justified>.active>a:hover{border:1px solid #ddd}@media (min-width:768px){.nav-tabs.nav-justified>li>a{border-bottom:1px solid #ddd;border-radius:4px 4px 0 0}.nav-tabs.nav-justified>.active>a,.nav-tabs.nav-justified>.active>a:focus,.nav-tabs.nav-justified>.active>a:hover{border-bottom-color:#fff}}.nav-pills>li{float:left}.nav-pills>li>a{border-radius:4px}.nav-pills>li+li{margin-left:2px}.nav-pills>li.active>a,.nav-pills>li.active>a:focus,.nav-pills>li.active>a:hover{color:#fff;background-color:#337ab7}.nav-stacked>li{float:none}.nav-stacked>li+li{margin-top:2px;margin-left:0}.nav-justified{width:100%}.nav-justified>li{float:none}.nav-justified>li>a{margin-bottom:5px;text-align:center}.nav-justified>.dropdown .dropdown-menu{top:auto;left:auto}@media (min-width:768px){.nav-justified>li{display:table-cell;width:1%}.nav-justified>li>a{margin-bottom:0}}.nav-tabs-justified{border-bottom:0}.nav-tabs-justified>li>a{margin-right:0;border-radius:4px}.nav-tabs-justified>.active>a,.nav-tabs-justified>.active>a:focus,.nav-tabs-justified>.active>a:hover{border:1px solid #ddd}@media (min-width:768px){.nav-tabs-justified>li>a{border-bottom:1px solid #ddd;border-radius:4px 4px 0 0}.nav-tabs-justified>.active>a,.nav-tabs-justified>.active>a:focus,.nav-tabs-justified>.active>a:hover{border-bottom-color:#fff}}.tab-content>.tab-pane{display:none}.tab-content>.active{display:block}.nav-tabs .dropdown-menu{margin-top:-1px;border-top-left-radius:0;border-top-right-radius:0}.navbar{position:relative;min-height:50px;margin-bottom:20px;border:1px solid transparent}@media (min-width:768px){.navbar{border-radius:4px}}@media (min-width:768px){.navbar-header{float:left}}.navbar-collapse{padding-right:15px;padding-left:15px;overflow-x:visible;-webkit-overflow-scrolling:touch;border-top:1px solid transparent;-webkit-box-shadow:inset 0 1px 0 rgba(255,255,255,.1);box-shadow:inset 0 1px 0 rgba(255,255,255,.1)}.navbar-collapse.in{overflow-y:auto}@media (min-width:768px){.navbar-collapse{width:auto;border-top:0;-webkit-box-shadow:none;box-shadow:none}.navbar-collapse.collapse{display:block!important;height:auto!important;padding-bottom:0;overflow:visible!important}.navbar-collapse.in{overflow-y:visible}.navbar-fixed-bottom .navbar-collapse,.navbar-fixed-top .navbar-collapse,.navbar-static-top .navbar-collapse{padding-right:0;padding-left:0}}.navbar-fixed-bottom .navbar-collapse,.navbar-fixed-top .navbar-collapse{max-height:340px}@media (max-device-width:480px) and (orientation:landscape){.navbar-fixed-bottom .navbar-collapse,.navbar-fixed-top .navbar-collapse{max-height:200px}}.container-fluid>.navbar-collapse,.container-fluid>.navbar-header,.container>.navbar-collapse,.container>.navbar-header{margin-right:-15px;margin-left:-15px}@media (min-width:768px){.container-fluid>.navbar-collapse,.container-fluid>.navbar-header,.container>.navbar-collapse,.container>.navbar-header{margin-right:0;margin-left:0}}.navbar-static-top{z-index:1000;border-width:0 0 1px}@media (min-width:768px){.navbar-static-top{border-radius:0}}.navbar-fixed-bottom,.navbar-fixed-top{position:fixed;right:0;left:0;z-index:1030}@media (min-width:768px){.navbar-fixed-bottom,.navbar-fixed-top{border-radius:0}}.navbar-fixed-top{top:0;border-width:0 0 1px}.navbar-fixed-bottom{bottom:0;margin-bottom:0;border-width:1px 0 0}.navbar-brand{float:left;height:50px;padding:15px 15px;font-size:18px;line-height:20px}.navbar-brand:focus,.navbar-brand:hover{text-decoration:none}.navbar-brand>img{display:block}@media (min-width:768px){.navbar>.container .navbar-brand,.navbar>.container-fluid .navbar-brand{margin-left:-15px}}.navbar-toggle{position:relative;float:right;padding:9px 10px;margin-top:8px;margin-right:15px;margin-bottom:8px;background-color:transparent;background-image:none;border:1px solid transparent;border-radius:4px}.navbar-toggle:focus{outline:0}.navbar-toggle .icon-bar{display:block;width:22px;height:2px;border-radius:1px}.navbar-toggle .icon-bar+.icon-bar{margin-top:4px}@media (min-width:768px){.navbar-toggle{display:none}}.navbar-nav{margin:7.5px -15px}.navbar-nav>li>a{padding-top:10px;padding-bottom:10px;line-height:20px}@media (max-width:767px){.navbar-nav .open .dropdown-menu{position:static;float:none;width:auto;margin-top:0;background-color:transparent;border:0;-webkit-box-shadow:none;box-shadow:none}.navbar-nav .open .dropdown-menu .dropdown-header,.navbar-nav .open .dropdown-menu>li>a{padding:5px 15px 5px 25px}.navbar-nav .open .dropdown-menu>li>a{line-height:20px}.navbar-nav .open .dropdown-menu>li>a:focus,.navbar-nav .open .dropdown-menu>li>a:hover{background-image:none}}@media (min-width:768px){.navbar-nav{float:left;margin:0}.navbar-nav>li{float:left}.navbar-nav>li>a{padding-top:15px;padding-bottom:15px}}.navbar-form{padding:10px 15px;margin-top:8px;margin-right:-15px;margin-bottom:8px;margin-left:-15px;border-top:1px solid transparent;border-bottom:1px solid transparent;-webkit-box-shadow:inset 0 1px 0 rgba(255,255,255,.1),0 1px 0 rgba(255,255,255,.1);box-shadow:inset 0 1px 0 rgba(255,255,255,.1),0 1px 0 rgba(255,255,255,.1)}@media (min-width:768px){.navbar-form .form-group{display:inline-block;margin-bottom:0;vertical-align:middle}.navbar-form .form-control{display:inline-block;width:auto;vertical-align:middle}.navbar-form .form-control-static{display:inline-block}.navbar-form .input-group{display:inline-table;vertical-align:middle}.navbar-form .input-group .form-control,.navbar-form .input-group .input-group-addon,.navbar-form .input-group .input-group-btn{width:auto}.navbar-form .input-group>.form-control{width:100%}.navbar-form .control-label{margin-bottom:0;vertical-align:middle}.navbar-form .checkbox,.navbar-form .radio{display:inline-block;margin-top:0;margin-bottom:0;vertical-align:middle}.navbar-form .checkbox label,.navbar-form .radio label{padding-left:0}.navbar-form .checkbox input[type=checkbox],.navbar-form .radio input[type=radio]{position:relative;margin-left:0}.navbar-form .has-feedback .form-control-feedback{top:0}}@media (max-width:767px){.navbar-form .form-group{margin-bottom:5px}.navbar-form .form-group:last-child{margin-bottom:0}}@media (min-width:768px){.navbar-form{width:auto;padding-top:0;padding-bottom:0;margin-right:0;margin-left:0;border:0;-webkit-box-shadow:none;box-shadow:none}}.navbar-nav>li>.dropdown-menu{margin-top:0;border-top-left-radius:0;border-top-right-radius:0}.navbar-fixed-bottom .navbar-nav>li>.dropdown-menu{margin-bottom:0;border-top-left-radius:4px;border-top-right-radius:4px;border-bottom-right-radius:0;border-bottom-left-radius:0}.navbar-btn{margin-top:8px;margin-bottom:8px}.navbar-btn.btn-sm{margin-top:10px;margin-bottom:10px}.navbar-btn.btn-xs{margin-top:14px;margin-bottom:14px}.navbar-text{margin-top:15px;margin-bottom:15px}@media (min-width:768px){.navbar-text{float:left;margin-right:15px;margin-left:15px}}@media (min-width:768px){.navbar-left{float:left!important}.navbar-right{float:right!important;margin-right:-15px}.navbar-right~.navbar-right{margin-right:0}}.navbar-default{background-color:#f8f8f8;border-color:#e7e7e7}.navbar-default .navbar-brand{color:#777}.navbar-default .navbar-brand:focus,.navbar-default .navbar-brand:hover{color:#5e5e5e;background-color:transparent}.navbar-default .navbar-text{color:#777}.navbar-default .navbar-nav>li>a{color:#777}.navbar-default .navbar-nav>li>a:focus,.navbar-default .navbar-nav>li>a:hover{color:#333;background-color:transparent}.navbar-default .navbar-nav>.active>a,.navbar-default .navbar-nav>.active>a:focus,.navbar-default .navbar-nav>.active>a:hover{color:#555;background-color:#e7e7e7}.navbar-default .navbar-nav>.disabled>a,.navbar-default .navbar-nav>.disabled>a:focus,.navbar-default .navbar-nav>.disabled>a:hover{color:#ccc;background-color:transparent}.navbar-default .navbar-toggle{border-color:#ddd}.navbar-default .navbar-toggle:focus,.navbar-default .navbar-toggle:hover{background-color:#ddd}.navbar-default .navbar-toggle .icon-bar{background-color:#888}.navbar-default .navbar-collapse,.navbar-default .navbar-form{border-color:#e7e7e7}.navbar-default .navbar-nav>.open>a,.navbar-default .navbar-nav>.open>a:focus,.navbar-default .navbar-nav>.open>a:hover{color:#555;background-color:#e7e7e7}@media (max-width:767px){.navbar-default .navbar-nav .open .dropdown-menu>li>a{color:#777}.navbar-default .navbar-nav .open .dropdown-menu>li>a:focus,.navbar-default .navbar-nav .open .dropdown-menu>li>a:hover{color:#333;background-color:transparent}.navbar-default .navbar-nav .open .dropdown-menu>.active>a,.navbar-default .navbar-nav .open .dropdown-menu>.active>a:focus,.navbar-default .navbar-nav .open .dropdown-menu>.active>a:hover{color:#555;background-color:#e7e7e7}.navbar-default .navbar-nav .open .dropdown-menu>.disabled>a,.navbar-default .navbar-nav .open .dropdown-menu>.disabled>a:focus,.navbar-default .navbar-nav .open .dropdown-menu>.disabled>a:hover{color:#ccc;background-color:transparent}}.navbar-default .navbar-link{color:#777}.navbar-default .navbar-link:hover{color:#333}.navbar-default .btn-link{color:#777}.navbar-default .btn-link:focus,.navbar-default .btn-link:hover{color:#333}.navbar-default .btn-link[disabled]:focus,.navbar-default .btn-link[disabled]:hover,fieldset[disabled] .navbar-default .btn-link:focus,fieldset[disabled] .navbar-default .btn-link:hover{color:#ccc}.navbar-inverse{background-color:#222;border-color:#080808}.navbar-inverse .navbar-brand{color:#9d9d9d}.navbar-inverse .navbar-brand:focus,.navbar-inverse .navbar-brand:hover{color:#fff;background-color:transparent}.navbar-inverse .navbar-text{color:#9d9d9d}.navbar-inverse .navbar-nav>li>a{color:#9d9d9d}.navbar-inverse .navbar-nav>li>a:focus,.navbar-inverse .navbar-nav>li>a:hover{color:#fff;background-color:transparent}.navbar-inverse .navbar-nav>.active>a,.navbar-inverse .navbar-nav>.active>a:focus,.navbar-inverse .navbar-nav>.active>a:hover{color:#fff;background-color:#080808}.navbar-inverse .navbar-nav>.disabled>a,.navbar-inverse .navbar-nav>.disabled>a:focus,.navbar-inverse .navbar-nav>.disabled>a:hover{color:#444;background-color:transparent}.navbar-inverse .navbar-toggle{border-color:#333}.navbar-inverse .navbar-toggle:focus,.navbar-inverse .navbar-toggle:hover{background-color:#333}.navbar-inverse .navbar-toggle .icon-bar{background-color:#fff}.navbar-inverse .navbar-collapse,.navbar-inverse .navbar-form{border-color:#101010}.navbar-inverse .navbar-nav>.open>a,.navbar-inverse .navbar-nav>.open>a:focus,.navbar-inverse .navbar-nav>.open>a:hover{color:#fff;background-color:#080808}@media (max-width:767px){.navbar-inverse .navbar-nav .open .dropdown-menu>.dropdown-header{border-color:#080808}.navbar-inverse .navbar-nav .open .dropdown-menu .divider{background-color:#080808}.navbar-inverse .navbar-nav .open .dropdown-menu>li>a{color:#9d9d9d}.navbar-inverse .navbar-nav .open .dropdown-menu>li>a:focus,.navbar-inverse .navbar-nav .open .dropdown-menu>li>a:hover{color:#fff;background-color:transparent}.navbar-inverse .navbar-nav .open .dropdown-menu>.active>a,.navbar-inverse .navbar-nav .open .dropdown-menu>.active>a:focus,.navbar-inverse .navbar-nav .open .dropdown-menu>.active>a:hover{color:#fff;background-color:#080808}.navbar-inverse .navbar-nav .open .dropdown-menu>.disabled>a,.navbar-inverse .navbar-nav .open .dropdown-menu>.disabled>a:focus,.navbar-inverse .navbar-nav .open .dropdown-menu>.disabled>a:hover{color:#444;background-color:transparent}}.navbar-inverse .navbar-link{color:#9d9d9d}.navbar-inverse .navbar-link:hover{color:#fff}.navbar-inverse .btn-link{color:#9d9d9d}.navbar-inverse .btn-link:focus,.navbar-inverse .btn-link:hover{color:#fff}.navbar-inverse .btn-link[disabled]:focus,.navbar-inverse .btn-link[disabled]:hover,fieldset[disabled] .navbar-inverse .btn-link:focus,fieldset[disabled] .navbar-inverse .btn-link:hover{color:#444}.breadcrumb{padding:8px 15px;margin-bottom:20px;list-style:none;background-color:#f5f5f5;border-radius:4px}.breadcrumb>li{display:inline-block}.breadcrumb>li+li:before{padding:0 5px;color:#ccc;content:"/\00a0"}.breadcrumb>.active{color:#777}.pagination{display:inline-block;padding-left:0;margin:20px 0;border-radius:4px}.pagination>li{display:inline}.pagination>li>a,.pagination>li>span{position:relative;float:left;padding:6px 12px;margin-left:-1px;line-height:1.42857143;color:#337ab7;text-decoration:none;background-color:#fff;border:1px solid #ddd}.pagination>li:first-child>a,.pagination>li:first-child>span{margin-left:0;border-top-left-radius:4px;border-bottom-left-radius:4px}.pagination>li:last-child>a,.pagination>li:last-child>span{border-top-right-radius:4px;border-bottom-right-radius:4px}.pagination>li>a:focus,.pagination>li>a:hover,.pagination>li>span:focus,.pagination>li>span:hover{z-index:2;color:#23527c;background-color:#eee;border-color:#ddd}.pagination>.active>a,.pagination>.active>a:focus,.pagination>.active>a:hover,.pagination>.active>span,.pagination>.active>span:focus,.pagination>.active>span:hover{z-index:3;color:#fff;cursor:default;background-color:#337ab7;border-color:#337ab7}.pagination>.disabled>a,.pagination>.disabled>a:focus,.pagination>.disabled>a:hover,.pagination>.disabled>span,.pagination>.disabled>span:focus,.pagination>.disabled>span:hover{color:#777;cursor:not-allowed;background-color:#fff;border-color:#ddd}.pagination-lg>li>a,.pagination-lg>li>span{padding:10px 16px;font-size:18px;line-height:1.3333333}.pagination-lg>li:first-child>a,.pagination-lg>li:first-child>span{border-top-left-radius:6px;border-bottom-left-radius:6px}.pagination-lg>li:last-child>a,.pagination-lg>li:last-child>span{border-top-right-radius:6px;border-bottom-right-radius:6px}.pagination-sm>li>a,.pagination-sm>li>span{padding:5px 10px;font-size:12px;line-height:1.5}.pagination-sm>li:first-child>a,.pagination-sm>li:first-child>span{border-top-left-radius:3px;border-bottom-left-radius:3px}.pagination-sm>li:last-child>a,.pagination-sm>li:last-child>span{border-top-right-radius:3px;border-bottom-right-radius:3px}.pager{padding-left:0;margin:20px 0;text-align:center;list-style:none}.pager li{display:inline}.pager li>a,.pager li>span{display:inline-block;padding:5px 14px;background-color:#fff;border:1px solid #ddd;border-radius:15px}.pager li>a:focus,.pager li>a:hover{text-decoration:none;background-color:#eee}.pager .next>a,.pager .next>span{float:right}.pager .previous>a,.pager .previous>span{float:left}.pager .disabled>a,.pager .disabled>a:focus,.pager .disabled>a:hover,.pager .disabled>span{color:#777;cursor:not-allowed;background-color:#fff}.label{display:inline;padding:.2em .6em .3em;font-size:75%;font-weight:700;line-height:1;color:#fff;text-align:center;white-space:nowrap;vertical-align:baseline;border-radius:.25em}a.label:focus,a.label:hover{color:#fff;text-decoration:none;cursor:pointer}.label:empty{display:none}.btn .label{position:relative;top:-1px}.label-default{background-color:#777}.label-default[href]:focus,.label-default[href]:hover{background-color:#5e5e5e}.label-primary{background-color:#337ab7}.label-primary[href]:focus,.label-primary[href]:hover{background-color:#286090}.label-success{background-color:#5cb85c}.label-success[href]:focus,.label-success[href]:hover{background-color:#449d44}.label-info{background-color:#5bc0de}.label-info[href]:focus,.label-info[href]:hover{background-color:#31b0d5}.label-warning{background-color:#f0ad4e}.label-warning[href]:focus,.label-warning[href]:hover{background-color:#ec971f}.label-danger{background-color:#d9534f}.label-danger[href]:focus,.label-danger[href]:hover{background-color:#c9302c}.badge{display:inline-block;min-width:10px;padding:3px 7px;font-size:12px;font-weight:700;line-height:1;color:#fff;text-align:center;white-space:nowrap;vertical-align:middle;background-color:#777;border-radius:10px}.badge:empty{display:none}.btn .badge{position:relative;top:-1px}.btn-group-xs>.btn .badge,.btn-xs .badge{top:0;padding:1px 5px}a.badge:focus,a.badge:hover{color:#fff;text-decoration:none;cursor:pointer}.list-group-item.active>.badge,.nav-pills>.active>a>.badge{color:#337ab7;background-color:#fff}.list-group-item>.badge{float:right}.list-group-item>.badge+.badge{margin-right:5px}.nav-pills>li>a>.badge{margin-left:3px}.jumbotron{padding-top:30px;padding-bottom:30px;margin-bottom:30px;color:inherit;background-color:#eee}.jumbotron .h1,.jumbotron h1{color:inherit}.jumbotron p{margin-bottom:15px;font-size:21px;font-weight:200}.jumbotron>hr{border-top-color:#d5d5d5}.container .jumbotron,.container-fluid .jumbotron{padding-right:15px;padding-left:15px;border-radius:6px}.jumbotron .container{max-width:100%}@media screen and (min-width:768px){.jumbotron{padding-top:48px;padding-bottom:48px}.container .jumbotron,.container-fluid .jumbotron{padding-right:60px;padding-left:60px}.jumbotron .h1,.jumbotron h1{font-size:63px}}.thumbnail{display:block;padding:4px;margin-bottom:20px;line-height:1.42857143;background-color:#fff;border:1px solid #ddd;border-radius:4px;-webkit-transition:border .2s ease-in-out;-o-transition:border .2s ease-in-out;transition:border .2s ease-in-out}.thumbnail a>img,.thumbnail>img{margin-right:auto;margin-left:auto}a.thumbnail.active,a.thumbnail:focus,a.thumbnail:hover{border-color:#337ab7}.thumbnail .caption{padding:9px;color:#333}.alert{padding:15px;margin-bottom:20px;border:1px solid transparent;border-radius:4px}.alert h4{margin-top:0;color:inherit}.alert .alert-link{font-weight:700}.alert>p,.alert>ul{margin-bottom:0}.alert>p+p{margin-top:5px}.alert-dismissable,.alert-dismissible{padding-right:35px}.alert-dismissable .close,.alert-dismissible .close{position:relative;top:-2px;right:-21px;color:inherit}.alert-success{color:#3c763d;background-color:#dff0d8;border-color:#d6e9c6}.alert-success hr{border-top-color:#c9e2b3}.alert-success .alert-link{color:#2b542c}.alert-info{color:#31708f;background-color:#d9edf7;border-color:#bce8f1}.alert-info hr{border-top-color:#a6e1ec}.alert-info .alert-link{color:#245269}.alert-warning{color:#8a6d3b;background-color:#fcf8e3;border-color:#faebcc}.alert-warning hr{border-top-color:#f7e1b5}.alert-warning .alert-link{color:#66512c}.alert-danger{color:#a94442;background-color:#f2dede;border-color:#ebccd1}.alert-danger hr{border-top-color:#e4b9c0}.alert-danger .alert-link{color:#843534}@-webkit-keyframes progress-bar-stripes{from{background-position:40px 0}to{background-position:0 0}}@-o-keyframes progress-bar-stripes{from{background-position:40px 0}to{background-position:0 0}}@keyframes progress-bar-stripes{from{background-position:40px 0}to{background-position:0 0}}.progress{height:20px;margin-bottom:20px;overflow:hidden;background-color:#f5f5f5;border-radius:4px;-webkit-box-shadow:inset 0 1px 2px rgba(0,0,0,.1);box-shadow:inset 0 1px 2px rgba(0,0,0,.1)}.progress-bar{float:left;width:0;height:100%;font-size:12px;line-height:20px;color:#fff;text-align:center;background-color:#337ab7;-webkit-box-shadow:inset 0 -1px 0 rgba(0,0,0,.15);box-shadow:inset 0 -1px 0 rgba(0,0,0,.15);-webkit-transition:width .6s ease;-o-transition:width .6s ease;transition:width .6s ease}.progress-bar-striped,.progress-striped .progress-bar{background-image:-webkit-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);background-image:-o-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);background-image:linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);-webkit-background-size:40px 40px;background-size:40px 40px}.progress-bar.active,.progress.active .progress-bar{-webkit-animation:progress-bar-stripes 2s linear infinite;-o-animation:progress-bar-stripes 2s linear infinite;animation:progress-bar-stripes 2s linear infinite}.progress-bar-success{background-color:#5cb85c}.progress-striped .progress-bar-success{background-image:-webkit-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);background-image:-o-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);background-image:linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent)}.progress-bar-info{background-color:#5bc0de}.progress-striped .progress-bar-info{background-image:-webkit-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);background-image:-o-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);background-image:linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent)}.progress-bar-warning{background-color:#f0ad4e}.progress-striped .progress-bar-warning{background-image:-webkit-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);background-image:-o-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);background-image:linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent)}.progress-bar-danger{background-color:#d9534f}.progress-striped .progress-bar-danger{background-image:-webkit-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);background-image:-o-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);background-image:linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent)}.media{margin-top:15px}.media:first-child{margin-top:0}.media,.media-body{overflow:hidden;zoom:1}.media-body{width:10000px}.media-object{display:block}.media-object.img-thumbnail{max-width:none}.media-right,.media>.pull-right{padding-left:10px}.media-left,.media>.pull-left{padding-right:10px}.media-body,.media-left,.media-right{display:table-cell;vertical-align:top}.media-middle{vertical-align:middle}.media-bottom{vertical-align:bottom}.media-heading{margin-top:0;margin-bottom:5px}.media-list{padding-left:0;list-style:none}.list-group{padding-left:0;margin-bottom:20px}.list-group-item{position:relative;display:block;padding:10px 15px;margin-bottom:-1px;background-color:#fff;border:1px solid #ddd}.list-group-item:first-child{border-top-left-radius:4px;border-top-right-radius:4px}.list-group-item:last-child{margin-bottom:0;border-bottom-right-radius:4px;border-bottom-left-radius:4px}a.list-group-item,button.list-group-item{color:#555}a.list-group-item .list-group-item-heading,button.list-group-item .list-group-item-heading{color:#333}a.list-group-item:focus,a.list-group-item:hover,button.list-group-item:focus,button.list-group-item:hover{color:#555;text-decoration:none;background-color:#f5f5f5}button.list-group-item{width:100%;text-align:left}.list-group-item.disabled,.list-group-item.disabled:focus,.list-group-item.disabled:hover{color:#777;cursor:not-allowed;background-color:#eee}.list-group-item.disabled .list-group-item-heading,.list-group-item.disabled:focus .list-group-item-heading,.list-group-item.disabled:hover .list-group-item-heading{color:inherit}.list-group-item.disabled .list-group-item-text,.list-group-item.disabled:focus .list-group-item-text,.list-group-item.disabled:hover .list-group-item-text{color:#777}.list-group-item.active,.list-group-item.active:focus,.list-group-item.active:hover{z-index:2;color:#fff;background-color:#337ab7;border-color:#337ab7}.list-group-item.active .list-group-item-heading,.list-group-item.active .list-group-item-heading>.small,.list-group-item.active .list-group-item-heading>small,.list-group-item.active:focus .list-group-item-heading,.list-group-item.active:focus .list-group-item-heading>.small,.list-group-item.active:focus .list-group-item-heading>small,.list-group-item.active:hover .list-group-item-heading,.list-group-item.active:hover .list-group-item-heading>.small,.list-group-item.active:hover .list-group-item-heading>small{color:inherit}.list-group-item.active .list-group-item-text,.list-group-item.active:focus .list-group-item-text,.list-group-item.active:hover .list-group-item-text{color:#c7ddef}.list-group-item-success{color:#3c763d;background-color:#dff0d8}a.list-group-item-success,button.list-group-item-success{color:#3c763d}a.list-group-item-success .list-group-item-heading,button.list-group-item-success .list-group-item-heading{color:inherit}a.list-group-item-success:focus,a.list-group-item-success:hover,button.list-group-item-success:focus,button.list-group-item-success:hover{color:#3c763d;background-color:#d0e9c6}a.list-group-item-success.active,a.list-group-item-success.active:focus,a.list-group-item-success.active:hover,button.list-group-item-success.active,button.list-group-item-success.active:focus,button.list-group-item-success.active:hover{color:#fff;background-color:#3c763d;border-color:#3c763d}.list-group-item-info{color:#31708f;background-color:#d9edf7}a.list-group-item-info,button.list-group-item-info{color:#31708f}a.list-group-item-info .list-group-item-heading,button.list-group-item-info .list-group-item-heading{color:inherit}a.list-group-item-info:focus,a.list-group-item-info:hover,button.list-group-item-info:focus,button.list-group-item-info:hover{color:#31708f;background-color:#c4e3f3}a.list-group-item-info.active,a.list-group-item-info.active:focus,a.list-group-item-info.active:hover,button.list-group-item-info.active,button.list-group-item-info.active:focus,button.list-group-item-info.active:hover{color:#fff;background-color:#31708f;border-color:#31708f}.list-group-item-warning{color:#8a6d3b;background-color:#fcf8e3}a.list-group-item-warning,button.list-group-item-warning{color:#8a6d3b}a.list-group-item-warning .list-group-item-heading,button.list-group-item-warning .list-group-item-heading{color:inherit}a.list-group-item-warning:focus,a.list-group-item-warning:hover,button.list-group-item-warning:focus,button.list-group-item-warning:hover{color:#8a6d3b;background-color:#faf2cc}a.list-group-item-warning.active,a.list-group-item-warning.active:focus,a.list-group-item-warning.active:hover,button.list-group-item-warning.active,button.list-group-item-warning.active:focus,button.list-group-item-warning.active:hover{color:#fff;background-color:#8a6d3b;border-color:#8a6d3b}.list-group-item-danger{color:#a94442;background-color:#f2dede}a.list-group-item-danger,button.list-group-item-danger{color:#a94442}a.list-group-item-danger .list-group-item-heading,button.list-group-item-danger .list-group-item-heading{color:inherit}a.list-group-item-danger:focus,a.list-group-item-danger:hover,button.list-group-item-danger:focus,button.list-group-item-danger:hover{color:#a94442;background-color:#ebcccc}a.list-group-item-danger.active,a.list-group-item-danger.active:focus,a.list-group-item-danger.active:hover,button.list-group-item-danger.active,button.list-group-item-danger.active:focus,button.list-group-item-danger.active:hover{color:#fff;background-color:#a94442;border-color:#a94442}.list-group-item-heading{margin-top:0;margin-bottom:5px}.list-group-item-text{margin-bottom:0;line-height:1.3}.panel{margin-bottom:20px;background-color:#fff;border:1px solid transparent;border-radius:4px;-webkit-box-shadow:0 1px 1px rgba(0,0,0,.05);box-shadow:0 1px 1px rgba(0,0,0,.05)}.panel-body{padding:15px}.panel-heading{padding:10px 15px;border-bottom:1px solid transparent;border-top-left-radius:3px;border-top-right-radius:3px}.panel-heading>.dropdown .dropdown-toggle{color:inherit}.panel-title{margin-top:0;margin-bottom:0;font-size:16px;color:inherit}.panel-title>.small,.panel-title>.small>a,.panel-title>a,.panel-title>small,.panel-title>small>a{color:inherit}.panel-footer{padding:10px 15px;background-color:#f5f5f5;border-top:1px solid #ddd;border-bottom-right-radius:3px;border-bottom-left-radius:3px}.panel>.list-group,.panel>.panel-collapse>.list-group{margin-bottom:0}.panel>.list-group .list-group-item,.panel>.panel-collapse>.list-group .list-group-item{border-width:1px 0;border-radius:0}.panel>.list-group:first-child .list-group-item:first-child,.panel>.panel-collapse>.list-group:first-child .list-group-item:first-child{border-top:0;border-top-left-radius:3px;border-top-right-radius:3px}.panel>.list-group:last-child .list-group-item:last-child,.panel>.panel-collapse>.list-group:last-child .list-group-item:last-child{border-bottom:0;border-bottom-right-radius:3px;border-bottom-left-radius:3px}.panel>.panel-heading+.panel-collapse>.list-group .list-group-item:first-child{border-top-left-radius:0;border-top-right-radius:0}.panel-heading+.list-group .list-group-item:first-child{border-top-width:0}.list-group+.panel-footer{border-top-width:0}.panel>.panel-collapse>.table,.panel>.table,.panel>.table-responsive>.table{margin-bottom:0}.panel>.panel-collapse>.table caption,.panel>.table caption,.panel>.table-responsive>.table caption{padding-right:15px;padding-left:15px}.panel>.table-responsive:first-child>.table:first-child,.panel>.table:first-child{border-top-left-radius:3px;border-top-right-radius:3px}.panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child,.panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child,.panel>.table:first-child>tbody:first-child>tr:first-child,.panel>.table:first-child>thead:first-child>tr:first-child{border-top-left-radius:3px;border-top-right-radius:3px}.panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child td:first-child,.panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child th:first-child,.panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child td:first-child,.panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child th:first-child,.panel>.table:first-child>tbody:first-child>tr:first-child td:first-child,.panel>.table:first-child>tbody:first-child>tr:first-child th:first-child,.panel>.table:first-child>thead:first-child>tr:first-child td:first-child,.panel>.table:first-child>thead:first-child>tr:first-child th:first-child{border-top-left-radius:3px}.panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child td:last-child,.panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child th:last-child,.panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child td:last-child,.panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child th:last-child,.panel>.table:first-child>tbody:first-child>tr:first-child td:last-child,.panel>.table:first-child>tbody:first-child>tr:first-child th:last-child,.panel>.table:first-child>thead:first-child>tr:first-child td:last-child,.panel>.table:first-child>thead:first-child>tr:first-child th:last-child{border-top-right-radius:3px}.panel>.table-responsive:last-child>.table:last-child,.panel>.table:last-child{border-bottom-right-radius:3px;border-bottom-left-radius:3px}.panel>.table-responsive:last-child>.table:last-child>tbody:last-child>tr:last-child,.panel>.table-responsive:last-child>.table:last-child>tfoot:last-child>tr:last-child,.panel>.table:last-child>tbody:last-child>tr:last-child,.panel>.table:last-child>tfoot:last-child>tr:last-child{border-bottom-right-radius:3px;border-bottom-left-radius:3px}.panel>.table-responsive:last-child>.table:last-child>tbody:last-child>tr:last-child td:first-child,.panel>.table-responsive:last-child>.table:last-child>tbody:last-child>tr:last-child th:first-child,.panel>.table-responsive:last-child>.table:last-child>tfoot:last-child>tr:last-child td:first-child,.panel>.table-responsive:last-child>.table:last-child>tfoot:last-child>tr:last-child th:first-child,.panel>.table:last-child>tbody:last-child>tr:last-child td:first-child,.panel>.table:last-child>tbody:last-child>tr:last-child th:first-child,.panel>.table:last-child>tfoot:last-child>tr:last-child td:first-child,.panel>.table:last-child>tfoot:last-child>tr:last-child th:first-child{border-bottom-left-radius:3px}.panel>.table-responsive:last-child>.table:last-child>tbody:last-child>tr:last-child td:last-child,.panel>.table-responsive:last-child>.table:last-child>tbody:last-child>tr:last-child th:last-child,.panel>.table-responsive:last-child>.table:last-child>tfoot:last-child>tr:last-child td:last-child,.panel>.table-responsive:last-child>.table:last-child>tfoot:last-child>tr:last-child th:last-child,.panel>.table:last-child>tbody:last-child>tr:last-child td:last-child,.panel>.table:last-child>tbody:last-child>tr:last-child th:last-child,.panel>.table:last-child>tfoot:last-child>tr:last-child td:last-child,.panel>.table:last-child>tfoot:last-child>tr:last-child th:last-child{border-bottom-right-radius:3px}.panel>.panel-body+.table,.panel>.panel-body+.table-responsive,.panel>.table+.panel-body,.panel>.table-responsive+.panel-body{border-top:1px solid #ddd}.panel>.table>tbody:first-child>tr:first-child td,.panel>.table>tbody:first-child>tr:first-child th{border-top:0}.panel>.table-bordered,.panel>.table-responsive>.table-bordered{border:0}.panel>.table-bordered>tbody>tr>td:first-child,.panel>.table-bordered>tbody>tr>th:first-child,.panel>.table-bordered>tfoot>tr>td:first-child,.panel>.table-bordered>tfoot>tr>th:first-child,.panel>.table-bordered>thead>tr>td:first-child,.panel>.table-bordered>thead>tr>th:first-child,.panel>.table-responsive>.table-bordered>tbody>tr>td:first-child,.panel>.table-responsive>.table-bordered>tbody>tr>th:first-child,.panel>.table-responsive>.table-bordered>tfoot>tr>td:first-child,.panel>.table-responsive>.table-bordered>tfoot>tr>th:first-child,.panel>.table-responsive>.table-bordered>thead>tr>td:first-child,.panel>.table-responsive>.table-bordered>thead>tr>th:first-child{border-left:0}.panel>.table-bordered>tbody>tr>td:last-child,.panel>.table-bordered>tbody>tr>th:last-child,.panel>.table-bordered>tfoot>tr>td:last-child,.panel>.table-bordered>tfoot>tr>th:last-child,.panel>.table-bordered>thead>tr>td:last-child,.panel>.table-bordered>thead>tr>th:last-child,.panel>.table-responsive>.table-bordered>tbody>tr>td:last-child,.panel>.table-responsive>.table-bordered>tbody>tr>th:last-child,.panel>.table-responsive>.table-bordered>tfoot>tr>td:last-child,.panel>.table-responsive>.table-bordered>tfoot>tr>th:last-child,.panel>.table-responsive>.table-bordered>thead>tr>td:last-child,.panel>.table-responsive>.table-bordered>thead>tr>th:last-child{border-right:0}.panel>.table-bordered>tbody>tr:first-child>td,.panel>.table-bordered>tbody>tr:first-child>th,.panel>.table-bordered>thead>tr:first-child>td,.panel>.table-bordered>thead>tr:first-child>th,.panel>.table-responsive>.table-bordered>tbody>tr:first-child>td,.panel>.table-responsive>.table-bordered>tbody>tr:first-child>th,.panel>.table-responsive>.table-bordered>thead>tr:first-child>td,.panel>.table-responsive>.table-bordered>thead>tr:first-child>th{border-bottom:0}.panel>.table-bordered>tbody>tr:last-child>td,.panel>.table-bordered>tbody>tr:last-child>th,.panel>.table-bordered>tfoot>tr:last-child>td,.panel>.table-bordered>tfoot>tr:last-child>th,.panel>.table-responsive>.table-bordered>tbody>tr:last-child>td,.panel>.table-responsive>.table-bordered>tbody>tr:last-child>th,.panel>.table-responsive>.table-bordered>tfoot>tr:last-child>td,.panel>.table-responsive>.table-bordered>tfoot>tr:last-child>th{border-bottom:0}.panel>.table-responsive{margin-bottom:0;border:0}.panel-group{margin-bottom:20px}.panel-group .panel{margin-bottom:0;border-radius:4px}.panel-group .panel+.panel{margin-top:5px}.panel-group .panel-heading{border-bottom:0}.panel-group .panel-heading+.panel-collapse>.list-group,.panel-group .panel-heading+.panel-collapse>.panel-body{border-top:1px solid #ddd}.panel-group .panel-footer{border-top:0}.panel-group .panel-footer+.panel-collapse .panel-body{border-bottom:1px solid #ddd}.panel-default{border-color:#ddd}.panel-default>.panel-heading{color:#333;background-color:#f5f5f5;border-color:#ddd}.panel-default>.panel-heading+.panel-collapse>.panel-body{border-top-color:#ddd}.panel-default>.panel-heading .badge{color:#f5f5f5;background-color:#333}.panel-default>.panel-footer+.panel-collapse>.panel-body{border-bottom-color:#ddd}.panel-primary{border-color:#337ab7}.panel-primary>.panel-heading{color:#fff;background-color:#337ab7;border-color:#337ab7}.panel-primary>.panel-heading+.panel-collapse>.panel-body{border-top-color:#337ab7}.panel-primary>.panel-heading .badge{color:#337ab7;background-color:#fff}.panel-primary>.panel-footer+.panel-collapse>.panel-body{border-bottom-color:#337ab7}.panel-success{border-color:#d6e9c6}.panel-success>.panel-heading{color:#3c763d;background-color:#dff0d8;border-color:#d6e9c6}.panel-success>.panel-heading+.panel-collapse>.panel-body{border-top-color:#d6e9c6}.panel-success>.panel-heading .badge{color:#dff0d8;background-color:#3c763d}.panel-success>.panel-footer+.panel-collapse>.panel-body{border-bottom-color:#d6e9c6}.panel-info{border-color:#bce8f1}.panel-info>.panel-heading{color:#31708f;background-color:#d9edf7;border-color:#bce8f1}.panel-info>.panel-heading+.panel-collapse>.panel-body{border-top-color:#bce8f1}.panel-info>.panel-heading .badge{color:#d9edf7;background-color:#31708f}.panel-info>.panel-footer+.panel-collapse>.panel-body{border-bottom-color:#bce8f1}.panel-warning{border-color:#faebcc}.panel-warning>.panel-heading{color:#8a6d3b;background-color:#fcf8e3;border-color:#faebcc}.panel-warning>.panel-heading+.panel-collapse>.panel-body{border-top-color:#faebcc}.panel-warning>.panel-heading .badge{color:#fcf8e3;background-color:#8a6d3b}.panel-warning>.panel-footer+.panel-collapse>.panel-body{border-bottom-color:#faebcc}.panel-danger{border-color:#ebccd1}.panel-danger>.panel-heading{color:#a94442;background-color:#f2dede;border-color:#ebccd1}.panel-danger>.panel-heading+.panel-collapse>.panel-body{border-top-color:#ebccd1}.panel-danger>.panel-heading .badge{color:#f2dede;background-color:#a94442}.panel-danger>.panel-footer+.panel-collapse>.panel-body{border-bottom-color:#ebccd1}.embed-responsive{position:relative;display:block;height:0;padding:0;overflow:hidden}.embed-responsive .embed-responsive-item,.embed-responsive embed,.embed-responsive iframe,.embed-responsive object,.embed-responsive video{position:absolute;top:0;bottom:0;left:0;width:100%;height:100%;border:0}.embed-responsive-16by9{padding-bottom:56.25%}.embed-responsive-4by3{padding-bottom:75%}.well{min-height:20px;padding:19px;margin-bottom:20px;background-color:#f5f5f5;border:1px solid #e3e3e3;border-radius:4px;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.05);box-shadow:inset 0 1px 1px rgba(0,0,0,.05)}.well blockquote{border-color:#ddd;border-color:rgba(0,0,0,.15)}.well-lg{padding:24px;border-radius:6px}.well-sm{padding:9px;border-radius:3px}.close{float:right;font-size:21px;font-weight:700;line-height:1;color:#000;text-shadow:0 1px 0 #fff;filter:alpha(opacity=20);opacity:.2}.close:focus,.close:hover{color:#000;text-decoration:none;cursor:pointer;filter:alpha(opacity=50);opacity:.5}button.close{-webkit-appearance:none;padding:0;cursor:pointer;background:0 0;border:0}.modal-open{overflow:hidden}.modal{position:fixed;top:0;right:0;bottom:0;left:0;z-index:1050;display:none;overflow:hidden;-webkit-overflow-scrolling:touch;outline:0}.modal.fade .modal-dialog{-webkit-transition:-webkit-transform .3s ease-out;-o-transition:-o-transform .3s ease-out;transition:transform .3s ease-out;-webkit-transform:translate(0,-25%);-ms-transform:translate(0,-25%);-o-transform:translate(0,-25%);transform:translate(0,-25%)}.modal.in .modal-dialog{-webkit-transform:translate(0,0);-ms-transform:translate(0,0);-o-transform:translate(0,0);transform:translate(0,0)}.modal-open .modal{overflow-x:hidden;overflow-y:auto}.modal-dialog{position:relative;width:auto;margin:10px}.modal-content{position:relative;background-color:#fff;-webkit-background-clip:padding-box;background-clip:padding-box;border:1px solid #999;border:1px solid rgba(0,0,0,.2);border-radius:6px;outline:0;-webkit-box-shadow:0 3px 9px rgba(0,0,0,.5);box-shadow:0 3px 9px rgba(0,0,0,.5)}.modal-backdrop{position:fixed;top:0;right:0;bottom:0;left:0;z-index:1040;background-color:#000}.modal-backdrop.fade{filter:alpha(opacity=0);opacity:0}.modal-backdrop.in{filter:alpha(opacity=50);opacity:.5}.modal-header{padding:15px;border-bottom:1px solid #e5e5e5}.modal-header .close{margin-top:-2px}.modal-title{margin:0;line-height:1.42857143}.modal-body{position:relative;padding:15px}.modal-footer{padding:15px;text-align:right;border-top:1px solid #e5e5e5}.modal-footer .btn+.btn{margin-bottom:0;margin-left:5px}.modal-footer .btn-group .btn+.btn{margin-left:-1px}.modal-footer .btn-block+.btn-block{margin-left:0}.modal-scrollbar-measure{position:absolute;top:-9999px;width:50px;height:50px;overflow:scroll}@media (min-width:768px){.modal-dialog{width:600px;margin:30px auto}.modal-content{-webkit-box-shadow:0 5px 15px rgba(0,0,0,.5);box-shadow:0 5px 15px rgba(0,0,0,.5)}.modal-sm{width:300px}}@media (min-width:992px){.modal-lg{width:900px}}.tooltip{position:absolute;z-index:1070;display:block;font-family:"Helvetica Neue",Helvetica,Arial,sans-serif;font-size:12px;font-style:normal;font-weight:400;line-height:1.42857143;text-align:left;text-align:start;text-decoration:none;text-shadow:none;text-transform:none;letter-spacing:normal;word-break:normal;word-spacing:normal;word-wrap:normal;white-space:normal;filter:alpha(opacity=0);opacity:0;line-break:auto}.tooltip.in{filter:alpha(opacity=90);opacity:.9}.tooltip.top{padding:5px 0;margin-top:-3px}.tooltip.right{padding:0 5px;margin-left:3px}.tooltip.bottom{padding:5px 0;margin-top:3px}.tooltip.left{padding:0 5px;margin-left:-3px}.tooltip-inner{max-width:200px;padding:3px 8px;color:#fff;text-align:center;background-color:#000;border-radius:4px}.tooltip-arrow{position:absolute;width:0;height:0;border-color:transparent;border-style:solid}.tooltip.top .tooltip-arrow{bottom:0;left:50%;margin-left:-5px;border-width:5px 5px 0;border-top-color:#000}.tooltip.top-left .tooltip-arrow{right:5px;bottom:0;margin-bottom:-5px;border-width:5px 5px 0;border-top-color:#000}.tooltip.top-right .tooltip-arrow{bottom:0;left:5px;margin-bottom:-5px;border-width:5px 5px 0;border-top-color:#000}.tooltip.right .tooltip-arrow{top:50%;left:0;margin-top:-5px;border-width:5px 5px 5px 0;border-right-color:#000}.tooltip.left .tooltip-arrow{top:50%;right:0;margin-top:-5px;border-width:5px 0 5px 5px;border-left-color:#000}.tooltip.bottom .tooltip-arrow{top:0;left:50%;margin-left:-5px;border-width:0 5px 5px;border-bottom-color:#000}.tooltip.bottom-left .tooltip-arrow{top:0;right:5px;margin-top:-5px;border-width:0 5px 5px;border-bottom-color:#000}.tooltip.bottom-right .tooltip-arrow{top:0;left:5px;margin-top:-5px;border-width:0 5px 5px;border-bottom-color:#000}.popover{position:absolute;top:0;left:0;z-index:1060;display:none;max-width:276px;padding:1px;font-family:"Helvetica Neue",Helvetica,Arial,sans-serif;font-size:14px;font-style:normal;font-weight:400;line-height:1.42857143;text-align:left;text-align:start;text-decoration:none;text-shadow:none;text-transform:none;letter-spacing:normal;word-break:normal;word-spacing:normal;word-wrap:normal;white-space:normal;background-color:#fff;-webkit-background-clip:padding-box;background-clip:padding-box;border:1px solid #ccc;border:1px solid rgba(0,0,0,.2);border-radius:6px;-webkit-box-shadow:0 5px 10px rgba(0,0,0,.2);box-shadow:0 5px 10px rgba(0,0,0,.2);line-break:auto}.popover.top{margin-top:-10px}.popover.right{margin-left:10px}.popover.bottom{margin-top:10px}.popover.left{margin-left:-10px}.popover-title{padding:8px 14px;margin:0;font-size:14px;background-color:#f7f7f7;border-bottom:1px solid #ebebeb;border-radius:5px 5px 0 0}.popover-content{padding:9px 14px}.popover>.arrow,.popover>.arrow:after{position:absolute;display:block;width:0;height:0;border-color:transparent;border-style:solid}.popover>.arrow{border-width:11px}.popover>.arrow:after{content:"";border-width:10px}.popover.top>.arrow{bottom:-11px;left:50%;margin-left:-11px;border-top-color:#999;border-top-color:rgba(0,0,0,.25);border-bottom-width:0}.popover.top>.arrow:after{bottom:1px;margin-left:-10px;content:" ";border-top-color:#fff;border-bottom-width:0}.popover.right>.arrow{top:50%;left:-11px;margin-top:-11px;border-right-color:#999;border-right-color:rgba(0,0,0,.25);border-left-width:0}.popover.right>.arrow:after{bottom:-10px;left:1px;content:" ";border-right-color:#fff;border-left-width:0}.popover.bottom>.arrow{top:-11px;left:50%;margin-left:-11px;border-top-width:0;border-bottom-color:#999;border-bottom-color:rgba(0,0,0,.25)}.popover.bottom>.arrow:after{top:1px;margin-left:-10px;content:" ";border-top-width:0;border-bottom-color:#fff}.popover.left>.arrow{top:50%;right:-11px;margin-top:-11px;border-right-width:0;border-left-color:#999;border-left-color:rgba(0,0,0,.25)}.popover.left>.arrow:after{right:1px;bottom:-10px;content:" ";border-right-width:0;border-left-color:#fff}.carousel{position:relative}.carousel-inner{position:relative;width:100%;overflow:hidden}.carousel-inner>.item{position:relative;display:none;-webkit-transition:.6s ease-in-out left;-o-transition:.6s ease-in-out left;transition:.6s ease-in-out left}.carousel-inner>.item>a>img,.carousel-inner>.item>img{line-height:1}@media all and (transform-3d),(-webkit-transform-3d){.carousel-inner>.item{-webkit-transition:-webkit-transform .6s ease-in-out;-o-transition:-o-transform .6s ease-in-out;transition:transform .6s ease-in-out;-webkit-backface-visibility:hidden;backface-visibility:hidden;-webkit-perspective:1000px;perspective:1000px}.carousel-inner>.item.active.right,.carousel-inner>.item.next{left:0;-webkit-transform:translate3d(100%,0,0);transform:translate3d(100%,0,0)}.carousel-inner>.item.active.left,.carousel-inner>.item.prev{left:0;-webkit-transform:translate3d(-100%,0,0);transform:translate3d(-100%,0,0)}.carousel-inner>.item.active,.carousel-inner>.item.next.left,.carousel-inner>.item.prev.right{left:0;-webkit-transform:translate3d(0,0,0);transform:translate3d(0,0,0)}}.carousel-inner>.active,.carousel-inner>.next,.carousel-inner>.prev{display:block}.carousel-inner>.active{left:0}.carousel-inner>.next,.carousel-inner>.prev{position:absolute;top:0;width:100%}.carousel-inner>.next{left:100%}.carousel-inner>.prev{left:-100%}.carousel-inner>.next.left,.carousel-inner>.prev.right{left:0}.carousel-inner>.active.left{left:-100%}.carousel-inner>.active.right{left:100%}.carousel-control{position:absolute;top:0;bottom:0;left:0;width:15%;font-size:20px;color:#fff;text-align:center;text-shadow:0 1px 2px rgba(0,0,0,.6);background-color:rgba(0,0,0,0);filter:alpha(opacity=50);opacity:.5}.carousel-control.left{background-image:-webkit-linear-gradient(left,rgba(0,0,0,.5) 0,rgba(0,0,0,.0001) 100%);background-image:-o-linear-gradient(left,rgba(0,0,0,.5) 0,rgba(0,0,0,.0001) 100%);background-image:-webkit-gradient(linear,left top,right top,from(rgba(0,0,0,.5)),to(rgba(0,0,0,.0001)));background-image:linear-gradient(to right,rgba(0,0,0,.5) 0,rgba(0,0,0,.0001) 100%);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#80000000', endColorstr='#00000000', GradientType=1);background-repeat:repeat-x}.carousel-control.right{right:0;left:auto;background-image:-webkit-linear-gradient(left,rgba(0,0,0,.0001) 0,rgba(0,0,0,.5) 100%);background-image:-o-linear-gradient(left,rgba(0,0,0,.0001) 0,rgba(0,0,0,.5) 100%);background-image:-webkit-gradient(linear,left top,right top,from(rgba(0,0,0,.0001)),to(rgba(0,0,0,.5)));background-image:linear-gradient(to right,rgba(0,0,0,.0001) 0,rgba(0,0,0,.5) 100%);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#80000000', GradientType=1);background-repeat:repeat-x}.carousel-control:focus,.carousel-control:hover{color:#fff;text-decoration:none;filter:alpha(opacity=90);outline:0;opacity:.9}.carousel-control .glyphicon-chevron-left,.carousel-control .glyphicon-chevron-right,.carousel-control .icon-next,.carousel-control .icon-prev{position:absolute;top:50%;z-index:5;display:inline-block;margin-top:-10px}.carousel-control .glyphicon-chevron-left,.carousel-control .icon-prev{left:50%;margin-left:-10px}.carousel-control .glyphicon-chevron-right,.carousel-control .icon-next{right:50%;margin-right:-10px}.carousel-control .icon-next,.carousel-control .icon-prev{width:20px;height:20px;font-family:serif;line-height:1}.carousel-control .icon-prev:before{content:'\2039'}.carousel-control .icon-next:before{content:'\203a'}.carousel-indicators{position:absolute;bottom:10px;left:50%;z-index:15;width:60%;padding-left:0;margin-left:-30%;text-align:center;list-style:none}.carousel-indicators li{display:inline-block;width:10px;height:10px;margin:1px;text-indent:-999px;cursor:pointer;background-color:#000\9;background-color:rgba(0,0,0,0);border:1px solid #fff;border-radius:10px}.carousel-indicators .active{width:12px;height:12px;margin:0;background-color:#fff}.carousel-caption{position:absolute;right:15%;bottom:20px;left:15%;z-index:10;padding-top:20px;padding-bottom:20px;color:#fff;text-align:center;text-shadow:0 1px 2px rgba(0,0,0,.6)}.carousel-caption .btn{text-shadow:none}@media screen and (min-width:768px){.carousel-control .glyphicon-chevron-left,.carousel-control .glyphicon-chevron-right,.carousel-control .icon-next,.carousel-control .icon-prev{width:30px;height:30px;margin-top:-10px;font-size:30px}.carousel-control .glyphicon-chevron-left,.carousel-control .icon-prev{margin-left:-10px}.carousel-control .glyphicon-chevron-right,.carousel-control .icon-next{margin-right:-10px}.carousel-caption{right:20%;left:20%;padding-bottom:30px}.carousel-indicators{bottom:20px}}.btn-group-vertical>.btn-group:after,.btn-group-vertical>.btn-group:before,.btn-toolbar:after,.btn-toolbar:before,.clearfix:after,.clearfix:before,.container-fluid:after,.container-fluid:before,.container:after,.container:before,.dl-horizontal dd:after,.dl-horizontal dd:before,.form-horizontal .form-group:after,.form-horizontal .form-group:before,.modal-footer:after,.modal-footer:before,.modal-header:after,.modal-header:before,.nav:after,.nav:before,.navbar-collapse:after,.navbar-collapse:before,.navbar-header:after,.navbar-header:before,.navbar:after,.navbar:before,.pager:after,.pager:before,.panel-body:after,.panel-body:before,.row:after,.row:before{display:table;content:" "}.btn-group-vertical>.btn-group:after,.btn-toolbar:after,.clearfix:after,.container-fluid:after,.container:after,.dl-horizontal dd:after,.form-horizontal .form-group:after,.modal-footer:after,.modal-header:after,.nav:after,.navbar-collapse:after,.navbar-header:after,.navbar:after,.pager:after,.panel-body:after,.row:after{clear:both}.center-block{display:block;margin-right:auto;margin-left:auto}.pull-right{float:right!important}.pull-left{float:left!important}.hide{display:none!important}.show{display:block!important}.invisible{visibility:hidden}.text-hide{font:0/0 a;color:transparent;text-shadow:none;background-color:transparent;border:0}.hidden{display:none!important}.affix{position:fixed}@-ms-viewport{width:device-width}.visible-lg,.visible-md,.visible-sm,.visible-xs{display:none!important}.visible-lg-block,.visible-lg-inline,.visible-lg-inline-block,.visible-md-block,.visible-md-inline,.visible-md-inline-block,.visible-sm-block,.visible-sm-inline,.visible-sm-inline-block,.visible-xs-block,.visible-xs-inline,.visible-xs-inline-block{display:none!important}@media (max-width:767px){.visible-xs{display:block!important}table.visible-xs{display:table!important}tr.visible-xs{display:table-row!important}td.visible-xs,th.visible-xs{display:table-cell!important}}@media (max-width:767px){.visible-xs-block{display:block!important}}@media (max-width:767px){.visible-xs-inline{display:inline!important}}@media (max-width:767px){.visible-xs-inline-block{display:inline-block!important}}@media (min-width:768px) and (max-width:991px){.visible-sm{display:block!important}table.visible-sm{display:table!important}tr.visible-sm{display:table-row!important}td.visible-sm,th.visible-sm{display:table-cell!important}}@media (min-width:768px) and (max-width:991px){.visible-sm-block{display:block!important}}@media (min-width:768px) and (max-width:991px){.visible-sm-inline{display:inline!important}}@media (min-width:768px) and (max-width:991px){.visible-sm-inline-block{display:inline-block!important}}@media (min-width:992px) and (max-width:1199px){.visible-md{display:block!important}table.visible-md{display:table!important}tr.visible-md{display:table-row!important}td.visible-md,th.visible-md{display:table-cell!important}}@media (min-width:992px) and (max-width:1199px){.visible-md-block{display:block!important}}@media (min-width:992px) and (max-width:1199px){.visible-md-inline{display:inline!important}}@media (min-width:992px) and (max-width:1199px){.visible-md-inline-block{display:inline-block!important}}@media (min-width:1200px){.visible-lg{display:block!important}table.visible-lg{display:table!important}tr.visible-lg{display:table-row!important}td.visible-lg,th.visible-lg{display:table-cell!important}}@media (min-width:1200px){.visible-lg-block{display:block!important}}@media (min-width:1200px){.visible-lg-inline{display:inline!important}}@media (min-width:1200px){.visible-lg-inline-block{display:inline-block!important}}@media (max-width:767px){.hidden-xs{display:none!important}}@media (min-width:768px) and (max-width:991px){.hidden-sm{display:none!important}}@media (min-width:992px) and (max-width:1199px){.hidden-md{display:none!important}}@media (min-width:1200px){.hidden-lg{display:none!important}}.visible-print{display:none!important}@media print{.visible-print{display:block!important}table.visible-print{display:table!important}tr.visible-print{display:table-row!important}td.visible-print,th.visible-print{display:table-cell!important}}.visible-print-block{display:none!important}@media print{.visible-print-block{display:block!important}}.visible-print-inline{display:none!important}@media print{.visible-print-inline{display:inline!important}}.visible-print-inline-block{display:none!important}@media print{.visible-print-inline-block{display:inline-block!important}}@media print{.hidden-print{display:none!important}}
 /*# sourceMappingURL=bootstrap.min.css.map */
</style>

<center><h1>{{$title}}</h1></center>
<center><p>{{$content}}</p></center>
<footer class="v2_bnc_footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 v2_bnc_footer_left">
                    <div class="v2_bnc_footer_info_company"><br>
                        <br>
                        <strong><span style="color:rgb(255, 255, 255)">THỜI TRANG HÀ NỘI</span><br>
                            Địa chỉ:</strong>&nbsp; Hoàng liệt - Hoàng Mai - Hà Nội<br>
                        <strong>Email:</strong> hieuleadergin@rog.vn<br>
                        <strong>Điên thoại :</strong> <a href="tel:0968051632"><span style="color:rgb(255, 255, 255);">033 600 1860</span></a>                    &amp; <a href="tel:0983982821"><span style="color:rgb(255, 255, 255);">0983 982 821</span></a> - Fax:<br>                    &nbsp;
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="v2_bnc_footer_right">
                        <div class="v2_bnc_footer_right_top">
                            <div class="col-md-4 col-sm-6 col-xs-6 full-xs">
                                <h4 class="v2_bnc_footer_title">Giới thiệu</h4>
                                <ul class="v2_bnc_footer_links">
                                    <li>
                                        <a href="#" class="lienket sm-link sm-link_padding-all sm-link5">
                                                <span class="sm-link__label">Dịch vụ</span>
                                            </a>
                                    </li>
                                    <li>
                                        <a href="#" class="lienket sm-link sm-link_padding-all sm-link5">
                                                    <span class="sm-link__label">Liên hệ chúng tôi</span>
                                                </a>
                                    </li>
                                    <li>
                                        <a href="#" class="lienket sm-link sm-link_padding-all sm-link5">
                                                        <span class="sm-link__label">Giới thiệu công ty</span>
                                                    </a>
                                    </li>
                                    <li>
                                        <a href="#" class="lienket sm-link sm-link_padding-all sm-link5">
                                                <span class="sm-link__label">Giới thiệu sản phẩm</span>
                                            </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6 full-xs">
                                <h4 class="v2_bnc_footer_title">Chính sách</h4>
                                <ul class="v2_bnc_footer_links">
                                    <li>
                                        <a href="#" class="lienket sm-link sm-link_padding-all sm-link1">
                                                        <span class="sm-link__label">Vận chuyển và trả hàng</span>
                                                    </a>
                                    </li>
                                    <li>
                                        <a href="#" class="lienket sm-link sm-link_padding-all sm-link1">
                                                            <span class="sm-link__label">Câu hỏi thường gặp</span>
                                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="lienket sm-link sm-link_padding-all sm-link1">
                                                                <span class="sm-link__label">Quy chế hoạt động</span>
                                                            </a>
                                    </li>
                                    <li>
                                        <a href="#" class="lienket sm-link sm-link_padding-all sm-link1">
                                                <span class="sm-link__label">Chính sách bảo mật</span>
                                            </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="section">
                                <h4 class="v2_bnc_footer_title">Sản phẩm</h4>
                                <div class="section__item">
                                    <a href="#" class="lienket sm-link sm-link_padding-all sm-link1">
                                                <span class="sm-link__label">Phụ kiện</span>
                                            </a>
                                    <a href="#" class="lienket sm-link sm-link_padding-all sm-link1">
                                                <span class="sm-link__label">Quần áo nam</span>
                                            </a>
                                    <a href="#" class="lienket sm-link sm-link_padding-all sm-link1">
                                                <span class="sm-link__label">Bộ sưu tập</span>
                                            </a>
                                    <a href="#" class="lienket sm-link sm-link_padding-all sm-link1">
                                                <span class="sm-link__label">Mùa hè</span>
                                            </a>
                                </div>
                            </div>
                        </div>
                        <div class="v2_bnc_footer_right_bottom">
                            <div class="v2_bnc_footer_follow_me"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="v2_bnc_footer_bottom"><small class="copyright ">Thiết kế bởi <a rel="nofollow" href="https://fb.com/bossgin.vhb" target="_blank">Rog.vn</a></small></div>
                </div>
            </div>
        </div>
    </footer>  
</body>
</html>