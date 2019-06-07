<?php
/**
 * The7 theme.
 *
 * @since 1.0.0
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since 1.0.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1200; /* pixels */
}

/**
 * Initialize theme.
 *
 * @since 1.0.0
 */
require( trailingslashit( get_template_directory() ) . 'inc/init.php' );

add_action( 'wp_footer', 'mycustom_wp_footer' );
add_action( 'wp_ajax_my_action', 'my_action' );

function my_action() {
	global $wpdb; // access to the database

	$short_url = $_POST['url_short'];

	// $url=${url_short}; 
	$ch = curl_init(); 
	curl_setopt($ch, CURLOPT_URL, $short_url); 
	curl_setopt($ch, CURLOPT_HEADER, true); 
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
	$a = curl_exec($ch); 
	$url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL); 

	echo $url;

	wp_die();
}
 

function mycustom_wp_footer() {
?>

<script type="text/javascript">
	
// 	JQuery

	(function ($, document, undefined) {

		$('#pum-1932').on('pumBeforeOpen', function() { $('body').css('margin-right','-15px') });
		$('#pum-1932').on('pumAfterClose', function() { $('body').css('margin-right','0px') });

		/* turn short url into long */
			// $(document).ready(function($) {
			// 	const url_address = window.location.href;
			// 	const data = {
			// 		'action': 'my_action',
			// 		'url_short': url_address
			// 	};
			// 	$.post(ajaxurl, data, function(response) {
			// 		console.log(response);
			// 	});
			// });

		setTimeout(function() {
			$('#pozvonim-chat-frame').contents().find("html").append(
     	$("<style type='text/css'>"+
       		"#pozvonim-chat.pozvonim-chat--panel {"+
         	"background: green" +
       		"} "+ "#pozvonim-chat.pozvonim-chat--panel .consultant__avatar svg {"+
       		"fill: green" + "} "+ "#pozvonim-chat.pozvonim-chat--panel .consultant__avatar {"+
       		"border-color: green" +
       		"} "+
       		"</style>")
   		);
		}, 5000);

    }(jQuery, document));

	// jQuery(document).ready(function() {
	// 	// jQuery('.scroll-top').trigger("click");
	// 	// alert( jQuery("#phantom").css("transform") == "translateY(-110px)");  
	// 	});

	
// JS

	let discount = document.querySelectorAll('.vc_btn3');

	const price = [3000, 3000, 3000, 4500, 3000];
	// const count = [[0,5], [1,6], [2,7], [3,8], [4,9], [0,5], [1,6], [2,7], [3,8], [4,9]];
	const numb = document.querySelectorAll('.middle-inner');
	const price_list = document.querySelectorAll('.price_options');

	const ult_plus = document.querySelectorAll('.ult_dual2');
	const ult_minus = document.querySelectorAll('.ult_dual1');

	const sum = document.querySelector('.sum');
	
	const f_inpts = document.querySelectorAll('input[name="your-name"], input[name="tel-634"], input[name="your-email"]');
	
	// const accordI = document.getElementById('accord_section');
	// const accordII = document.getElementById('accord_section_quiz');

	const subm_I = document.getElementById('audit_sbmt'); 
	const subm_II = document.getElementById('price_sbmt');
	const subm_III = document.getElementById('quiz_sbmt');

	subm_I.setAttribute("data-target", "hid_utm_2"); 
	subm_II.setAttribute("data-target", "hid_utm_1"); 
	subm_III.setAttribute("data-target", "hid_utm_3"); 

	const forms_valid_I = document.getElementById('wpcf7-f2461-p2-o2');
	const forms_valid_II = document.getElementById('wpcf7-f5-p2-o3');
	const forms_valid_III = document.getElementById('wpcf7-f3014-p2-o1');

	// subm_capch_I.setAttribute("data-target", "anr_captcha_field_1");
	// subm_capch_II.setAttribute("data-target", "anr_captcha_field_2");
	// subm_capch_III.setAttribute("data-target", "anr_captcha_field_3");
	subm_I.addEventListener('click', hid_info);
	subm_II.addEventListener('click', hid_info);
	subm_III.addEventListener('click', hid_info);

	forms_valid_I.setAttribute("data-msg", ".audit_valid_msg");
	forms_valid_II.setAttribute("data-msg", ".valid_msg");
	forms_valid_III.setAttribute("data-msg", ".quiz_valid_msg");
	
	// accordI.addEventListener('click', arrow_direct);
	// accordII.addEventListener('click', arrow_direct);
	
	
		numb.forEach(function(val, i) {
			val.innerHTML = 0;
			val.setAttribute("data-link", price_list[i].textContent);
		});

		ult_plus.forEach(function(val, i) {
			val.addEventListener('click', plus);
			val.setAttribute('price', price[i]);
			val.setAttribute('ref_num', i);
		});

		ult_minus.forEach(function(val, i) {
			val.addEventListener('click', minus);
			val.setAttribute('price', price[i]);
			val.setAttribute('ref_num', i);
		});

		sum.innerHTML = 0 +' p.';
	
	// for (let i = 0; i < ult_plus.length; i++) {
	// 		ult_plus[i].addEventListener('click', plus);
	// 		ult_plus[i].setAttribute('price', price[i]);
	// 		ult_plus[i].setAttribute('ref_num', i);
	// 	}
	
	// for (let i = 0; i < ult_minus.length; i++) {
	// 		ult_minus[i].addEventListener('click', minus);
	// 		ult_minus[i].setAttribute('price', price[i]);
	// 		ult_minus[i].setAttribute('ref_num', i);
	// 	}
	
	// for (let i = 0; i < sum.length; i++) {
	// 	sum[i].innerHTML = 0 +' p.';
	// 	}

	
window.onload = function() {			// Floating navbar refresh smooth slide
	let pha = document.getElementById("phantom");
	setTimeout( function() { 
		pha.style.display = "block";
	}, 1000 );
	setTimeout( function() { 
		pha.style.transform = "translateY(0px)"; 
	}, 1100 );

	// setTimeout(function() {
	// 	var x = document.querySelector('#pozvonim-chat-frame');
	// 	console.log(x.childNodes);
	// }, 5000);
}


window.addEventListener('resize', resize);

		function resize() {

		    if (window.innerWidth < 991.5) {
				f_inpts.forEach(function(i) { i.blur() });
		    	discount[1].setAttribute('href', '#collapsed_form');
		    }
		    else {
		    	discount[1].setAttribute('href', '#pricing');
		    }
		}
	
function setVendor(element, property, value) {
  element.style["webkit" + property] = value;
  element.style["moz" + property] = value;
  element.style["ms" + property] = value;
  element.style["o" + property] = value;
  element.style[property] = value;
}

// function plus_minus(sign, btn) {

// 	const plus_sum = (+parseInt(sum.innerHTML) + +btn.getAttribute('price')) + ' p.';
// 	const minus_sum = (+parseInt(sum.innerHTML) - +btn.getAttribute('price')) + ' p.';
// 	const plus_cond = +numb[btn.getAttribute('ref_num')].innerHTML < 99;
// 	const minus_cond = +numb[btn.getAttribute('ref_num')].innerHTML;
// 	let calc = Number(numb[btn.getAttribute('ref_num')].innerHTML);

// 	sign === 'plus' ? action(plus_cond, plus_sum, calc++, btn) : action(minus_cond, minus_sum, calc--, btn);

// 	function action(state_I, state_II, mathm, but) {
// 		if ( state_I ) {
// 			// let calc = Number(numb[but.getAttribute('ref_num')].innerHTML);
// 			// calc++;
// 			numb[but.getAttribute('ref_num')].innerHTML = mathm;
// 			// for (let i of count[this.getAttribute('ref_num')]) { numb[i].innerHTML = calc; }
// 			sum.innerHTML = state_II;
// 		}
// 	}
// }

function plus() {

	if ( +numb[this.getAttribute('ref_num')].innerHTML < 99 ) {

		let calc = Number(numb[this.getAttribute('ref_num')].innerHTML);
		calc++;
		numb[this.getAttribute('ref_num')].innerHTML = calc;
		sum.innerHTML = (+parseInt(sum.innerHTML) + +this.getAttribute('price')) + ' p.';
	}
}

function minus() {

	if ( +numb[this.getAttribute('ref_num')].innerHTML ) {

		let calc = Number(numb[this.getAttribute('ref_num')].innerHTML);
		calc--;
		numb[this.getAttribute('ref_num')].innerHTML = calc;
		sum.innerHTML = (+parseInt(sum.innerHTML) - +this.getAttribute('price')) + ' p.';
	}
}
	
	// function arrow_direct() {
	// 	let chck = true;
	// 	const arrow = document.getElementsByClassName('wpb_accordion_header')[0].getElementsByTagName('a')[0];
		
	// 	if (chck) {
	// 		arrow.classList.toggle('special');
	// 		chck = false;
	// 	}
	// 	else {
	// 		arrow.classList.toggle('special');
	// 		chck = true;
	// 	}
	// }

	// function hid_val() {
		// const captcha = this.getAttribute('data-target');
		// document.getElementById( captcha ).style.display = 'block';

		// hid_info();
		// checkbox_check(this.getAttribute('id'));
	// }

	function hid_info() {

		hidden_price();
		hidden_utm(this);

			function hidden_price() {
				const hid_text = document.querySelector('#hid_price');
				let choice = "";

				numb.forEach(function(val, i) {
					if (val.innerHTML !== '0' && i < 5) {
						choice += price_list[i].textContent +' - '+ val.innerHTML +'чел  ';
						const strgf = JSON.stringify( choice );
						const escapedJSONString = strgf.replace(/\\n/g, " ").replace(/"/g, '');
						hid_text.value = escapedJSONString;
					} 
				});

				if ( choice ) hid_text.value += 'Сумма: ' + sum.innerHTML;
			}

			function hidden_utm(btn) {
				const hid_utm = document.getElementById(btn.getAttribute('data-target'));
				const url_adrs = window.location.href;
				const regex = /\?(.+)/;
				const mtch_arr = url_adrs.match(regex);

				if (!mtch_arr) hid_utm.value = 'UTM: поисковик';
				else hid_utm.value = 'UTM: ' + mtch_arr[1];
			}
	}



	// function checkbox_check(form) {
	// 	if (form === 'price_sbmt') {
	// 		const check_box = document.querySelector('input[name="checkbox-38[]"]');
	// 		const check_txt = document.querySelector('span.wpcf7-list-item-label');

	// 		  if( !check_box.checked ) setVendor(check_txt, 'animation', 'txtredblink .8s linear 2 forwards');
	// 	}
	// }
	
	
	// let check_boxes = document.querySelectorAll('input[name="checkbox-38[]"]');
	
	// check_boxes.forEach(function(i) { i.addEventListener('click', check_state) });
	
	// function check_state() {
	// 	if (this.checked === true) {
	// 		check_boxes[0].checked = true;
	// 		check_boxes[1].checked = true;
	// 	}
	// 	else {
	// 		check_boxes[0].checked = false;
	// 		check_boxes[1].checked = false;
	// 	}
	// }
	
	// for (let i = 3, x = 0; i <= 5; i++) { 
	// 	f_inpts[i].setAttribute('numb', x++);
	// 	f_inpts[i].addEventListener('input', transfer);
	// };
	
	// for (let i = 0, x = 3; i <= 2; i++) { 
	// 	f_inpts[i].setAttribute('numb', x++);
	// 	f_inpts[i].addEventListener('input', transfer);
	// };

	
	// function transfer() { 
	// 	f_inpts[this.getAttribute('numb')].value = this.value; 
	// };
	
	
document.addEventListener( 'animationend', function() {
	let valid_err = document.querySelectorAll('input[aria-invalid="true"], select[aria-invalid="true"]');
	let check_txt = document.querySelectorAll('span.wpcf7-list-item-label');
	
	valid_err.forEach(function(i) { setVendor(i, 'animation', 'none'); });
	check_txt.forEach(function(i) { setVendor(i, 'animation', 'none'); });
} );
	
	
	
document.addEventListener( 'wpcf7mailsent', function( event ) {

	const form = event.target.getAttribute( 'id' );
	const msg = event.target.getAttribute( 'data-msg' );
	
	// let forms = document.querySelectorAll('.form_box .vc_column-inner');
	// let forms_inpts = document.querySelectorAll('input[name="your-name"], input[name="tel-634"], input[name="your-email"], input[type="submit"]');
	// let msgs = document.querySelectorAll( msg );

	// const all_elem_attr = document.querySelectorAll(`[data-msg="${msg}"]`);
	// all_elem_attr.forEach(function(val) {
	// 	val.style.visibility = 'hidden';
	// });

	document.getElementById(form).style.opacity = '0';
	document.querySelector(msg).className += ' js-vaild-msg';

	// setTimeout(show_msg, 1000);

	// 	function show_msg() {
	// 		document.querySelector(msg).className += ' js-vaild-msg';
	// 	}
	

	// if ( msg === '.valid_msg' ) {

		// forms.forEach(function(i) { 
		// 						   i.style.setProperty('background-color','white','important'); 
								  // });
		// forms_inpts.forEach(function(i) { setVendor(i, 'transition', 'none'); });
	// }
	
	// msgs.forEach(function(i) { i.style.display = 'block'; i.style.position = 'absolute'; i.style.width = '100%'; i.style.top = '50%'; i.style.left = '50%'; setVendor(i, 'transform', 'translate(-50%, -50%)'); });
}, false );
	
	
	
	document.addEventListener( 'wpcf7invalid', function( event ) {

    	let errors = document.querySelectorAll('input[name="your-name"], input[name="your-email"], input[name="checkbox-38[]"], input[name="text-189"], input[name="tel-761"], input[name="tel-634"], input[name="tel-590"], input[name="text-877"]');
		let valid_err = document.querySelectorAll('input[aria-invalid="true"], select[aria-invalid="true"]');
		
		// check_txt.forEach(function(i) { 
		// 		if (check_boxes[0].checked === false) {
		// 			setVendor(i, 'animation', 'txtredblink .8s linear 2 forwards');
		// 		}
		// 	});

		checkbox_check(valid_err);
		
		errors.forEach(function(i) { i.style.marginBottom = '0'; });
		
		valid_err.forEach(function(i) { 
			setVendor(i, 'animation', 'redblink .8s linear 2 forwards');
			
			// BORDERS INSTEAD OF ANIMATION FOR OLDER BROWSERS
// 			i.style.border = '1.5px solid red'; 
// 			f_inpts[i.getAttribute('numb')].style.border = '1.5px solid red'; 
		});
	}, false );


	function checkbox_check(arr) {

		const check_box = document.querySelector('input[name="checkbox-38[]"]');
		const check_txt = document.querySelector('span.wpcf7-list-item-label');

		arr.forEach(function(val) {
			if (val.getAttribute('id') === 'chkbx1' || val.getAttribute('id') === 'chkbx2') {
				chckbx_anim();
			}
		});

			function chckbx_anim() {
			  if( !check_box.checked ) setVendor(check_txt, 'animation', 'txtredblink .8s linear 2 forwards');
			}
	}


(function custom_accordion() {
	const acc_but = document.querySelector('#accord_btn button');
	const acc_txt = document.querySelector('#accord_text');
	const acc_block = document.querySelector('#accord_blck');

		acc_but.addEventListener('click', accordion);

		const func_height_I = function() { no_click('auto', func_height_I); }
		const func_height_II = function() { no_click('0', func_height_II); }

			function accordion() {
				const block_height = acc_block.offsetHeight;
				acc_block.style.height = block_height +'px';
				acc_but.removeEventListener('click', accordion);

				if ( block_height === 0 ) {
					const h = acc_txt.offsetHeight;
					acc_block.style.height = h +'px';
					acc_but.innerHTML = "Убрать";
					acc_block.addEventListener('transitionend', func_height_I);
				}

				else {
					setTimeout(function() { 
						acc_block.style.height = '0';
						acc_but.innerHTML = "Показать";
						acc_block.addEventListener('transitionend', func_height_II);
					}, 0);
				}
			}; 

		function no_click(val,val2) {
			acc_block.style.height = val;
			acc_but.addEventListener('click', accordion);
			acc_block.removeEventListener('transitionend', val2);
		};
})();

(function quiz() {
	const q_block = document.querySelector('#quiz_block');
	const next_but = document.querySelector('#quiz_btn');
	const quiz_inner = document.querySelector('#quiz_block div');
	const quests = document.querySelectorAll('.quest');
	const correct_answ = ['c','b','b','a','b','b','a','a'];
	let wrong = 0;
	let count = 0;

	next_but.addEventListener('click', next_quest);

		function next_quest() {
				radio(count);
				fin_check();
		}

		function radio(val) {
			const radio_buts = document.querySelectorAll(`input[name="${val + 'r'}"]`);
			
			radio_buts.forEach(function(i) {
				if (i.checked) {
					wrong_check(i);
					// quest_trans();
					quests[count].style.display = 'none';
					quests[++count].style.display = 'block';
				};
			});
		}

		function quest_trans() {
			quests[count].setAttribute('style','height: 0; visibility: hidden;');
			quests[++count].setAttribute('style','height: auto; visibility: visible;');
		}

		function quest_trans() {	/* smooth trans on question change */
			const q_block_height = q_block.offsetHeight;

			q_block.style.height = q_block_height + 'px';

			quests[count].setAttribute('style','display: none;');
			quests[++count].setAttribute('style','position: absolute; top: -5000px; display: block;');

				setTimeout(function() {
					const hh = quiz_inner.offsetHeight;
					const h = quests[count].offsetHeight;

					q_block.style.height = hh + h + 40 + 'px';
					setTimeout(function() {
						quests[count].setAttribute('style','position: relative; display: block;');
					}, 0);
				}, 0);

			// quests[count].style.display = 'none';
			// quests[++count].style.display = 'block';

				// setTimeout(function() {
				// 	const curr_h = quests[count].offsetHeight;
				// 	const block_h = quiz_inner.offsetHeight;
				// 	q_block.style.height = block_h + 'px';
				// 	setTimeout(function() {
				// 		quiz_inner.style.visibility = 'visible';
				// 	}, 5000);
				// }, 0);
		}

		function wrong_check(val) {
			if (val.value !== correct_answ[count]) wrong++;
		}

		function fin_check() {
			if ( count === (quests.length - 1) ) {
				const quiz_head_btn = document.querySelectorAll('#quiz_head, #quiz_btn');
				quiz_head_btn.forEach(function(i) { i.style.display = 'none'; });
				document.querySelector('#wrong_amount').innerHTML = wrong;
				wrong_right_msg();
			}	
		}

		function wrong_right_msg() {
			if (!wrong) {
				const w = document.querySelectorAll('.wrong_msg');
				const r = document.querySelectorAll('.right_msg');
				style_chng(w, 'none');
				style_chng(r, 'block');
			}

				function style_chng(arr, dply) {
					arr.forEach(function(val) {
						val.style.display = dply;
					});
				}
		}
})();

(function footer_link() {
	const lnk = document.querySelector('.bottom-text-block p:nth-child(2)');
	lnk.addEventListener('click', function() {
		window.open("http://cdpo-argus.ru/pravoustavnye-dokumenty/","_self");
	});
})();

/* POZVONIM API FIXED CALL ICON */

// let monitor = setTimeout(pozvon_show, 10);

// 	function pozvon_show() {
// 		clearTimeout(monitor);
// 		document.querySelector('.actionShow') ? fixed_pozvon() : monitor = setTimeout(pozvon_show, 10);
// 	}

// 	function fixed_pozvon() {
// 		const elem = document.querySelector('#pozvonim-button');
// 		const msngr_block = document.querySelector('#chat-24-desktop');
// 		elem.setAttribute('style', 'visibility: hidden; display: none;');
//     	elemClone = elem.cloneNode(true);
//     	elemClone.setAttribute('style', 'position: fixed; top: 0; left: 0; visibility: visible; display: block;');
//     	elemClone.addEventListener('click', clickHidden);
// 		alert(msngr_block);

// 			function clickHidden() {
// 				document.querySelector('.actionShow').click();
// 			}
// 	};
		
</script>



<?php
add_filter('script_loader_tag', 'add_async_attribute', 10, 2);

function add_async_attribute($tag, $handle)
{
    if(!is_admin()){
        if ('jquery-core' == $handle) {
            return $tag;
        }
        return str_replace(' src', ' defer src', $tag);
    }else{
        return $tag;
    }



}


}