<?php

function btc_price_custom_css()
{
    echo '<style>
   span.btc-price {
        display: flex;
        align-items: center;
        gap: 5px;
        padding: 5px 0px;
        font-weight: bold!important;
    }
	body .product .summary.entry-summary p.price {
		display: flex!important;
		align-content: center;
		flex-wrap: wrap;
		flex-direction: row-reverse;
		align-items: center;
		justify-content: flex-start;
		line-height: 1em;
		vertical-align: middle;
		gap: 6px;
	}
	
	body .product .price {
	    display: flex!important;
	    align-content: center;
	    flex-wrap: wrap;
	    flex-direction: row-reverse;
	    align-items: center;
	    justify-content: center;
	    line-height: 1em;
	    vertical-align: middle;
	    gap: 6px;
	}
	.product .price .btc-price{
	font-weight:400!important;
		font-size: 1.05em;
	}
	.product .price br{
		display:none;
	}
	.product .price .btc-price:after{
		content:"/";
	}
	.product .price .btc-price svg path{
	 fill: #ff9c00!important;
	}
	.product .price .btc-price svg{
	width:21px!important;
		height:21px!important;

	}
	.woocommerce ul.products li.product .price {
	    font-size: 12px!important;
	    font-family: "Montserrat";
	    padding: 4px 4px!important;
	    flex: 1 1 100%!important;
	}
	.header-mini-cart .btc-price svg path,.cart_dropdown .btc-price svg path{
	    fill: #ff9c00!important;
	}
    </style>';
}

add_action('wp_enqueue_scripts', 'btc_price_custom_css');
