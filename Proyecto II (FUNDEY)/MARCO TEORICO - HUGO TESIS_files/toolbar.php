var includeToolBar = true;
document.write('<style>\n#matb_adszone{background:none;border:0px;padding:0px;margin:0px;width:100%;text-align:center;background:#5363f1;border-bottom:1px solid #7783f4;}\n#matb_adszone #matb_adszone_cont{margin:auto;}\n#ma_toolbar{padding:6px 0px;line-height:20px;position:relative;border-bottom:1px solid #7783f4;height:20px;background:#3C4EEF;overflow:hidden;}\n#ma_toolbar *{border:none;padding:0px;margin:0px;font-family:trebuchet ms;font-size:12px;text-align:left;font-weigth:normal;line-height:20px;color:#bfc5fa;}\n#ma_toolbar .matb_left{float:left;padding:1px 0px 1px 2px;}\n#ma_toolbar .matb_right{float:right;padding:1px 2px 1px 0px;}\n#ma_toolbar a.matb_boton{text-decoration:none;display:block;height:20px;line-height20px;position:relative;top:-1px;}\n#ma_toolbar a.matb_boton img{filter:alpha(opacity=67);-moz-opacity:0.67;-khtml-opacity:0.67;opacity:0.67;;width:20px;height:20px;vertical-align:-6px;background-color:#3C4EEF;background-repeat: no-repeat;}\n#ma_toolbar a.matb_boton:hover,#ma_toolbar a.matb_boton:hover *{color:#969ff6;}\n#ma_toolbar a.matb_boton:hover img{filter:alpha(opacity=46);-moz-opacity:0.46;-khtml-opacity:0.46;opacity:0.46;;}\n#ma_toolbar a.matb_boton img.blinking{filter:alpha(opacity=46);-moz-opacity:0.46;-khtml-opacity:0.46;opacity:0.46;}\n#ma_toolbar .matb_logo{ display:block;height:28px;width:26px;position:relative;top:-5px; }\n#ma_toolbar .tb_logo img{ height:28px;width:26px;background-repeat:no-repeat;}\n#ma_toolbar .matb_search_div{margin:0px;padding:0px;height:22px;min-width:85px;position:relative;top:-3px;display:inline-block;border:1px solid #7783f4;background:#4859f0 URL(https://miarroba.st/205/iconos/vacio.gif);}\n#ma_toolbar .formover{background:#5f6ef2;}\n#ma_toolbar #mtb_search_img{background-color:#4859f0;}\n#ma_toolbar .formover #mtb_search_img{background-color:#5f6ef2;}\n#ma_toolbar .buscaren{display:block;line-height:22px;padding-left:4px;filter:alpha(opacity=50);-moz-opacity:0.5;-khtml-opacity:0.5;opacity:0.5;cursor:default;}#ma_toolbar .matb_search_div .c{position:absolute;width:1px;height:1px;background:#3C4EEF;}\n#ma_toolbar .matb_search_div .lt{top:-1px;left:-1px;}\n#ma_toolbar .matb_search_div .rt{right:-1px;top:-1px;}\n#ma_toolbar .matb_search_div .lb{left:-1px;bottom:-1px;}\n#ma_toolbar .matb_search_div .rb{right:-1px;bottom:-1px;}\n#ma_toolbar .matb_search_form{margin:0px;padding:0px;height:22px;width:128px;position:relative;display:block;background:#ffffff;}\n#ma_toolbar .matb_search_input{ margin:0px;padding:1px 4px !important;height:20px;width:38px;background:transparent;color:#9A9A9A;}\n#ma_toolbar .matb_search_input:focus{outline:none;width:98px;}\n#ma_toolbar .matb_search_submit{width:16px;height:16px;position:absolute;top:3px;right:3px;background-color:#ffffff;filter:alpha(opacity=67);-moz-opacity:0.67;-khtml-opacity:0.67;opacity:0.67;}#ma_toolbar a.matb_boton img, #ma_toolbar .tb_logo img, #ma_toolbar .matb_search_submit, #ma_toolbar .tb_facebook_button img{background-image: URL(https://miarroba.st/205/layout_miarroba/sprites/toolbar.png); }\n#ma_toolbar .tb_logo img{background-position: -0px -40px;}\n#ma_toolbar .tb_logo:hover img{ background-position: -26px -40px; }\n#ma_toolbar .tb_facebook_button img{ background-position: -0px -0px;}\n#ma_toolbar .tb_facebook_button:hover img{ background-position: -0px -20px;}\n#ma_toolbar .tb_lupa_b { background-position: -72px -40px; }\n#ma_toolbar .tb_lupa_on { background-position: -80px -96px; }\n#ma_toolbar .tb_lupa_w { background-position: -182px -0px; }\n#ma_toolbar .tb_editar_b img{ background-position: -0px -68px; }\n#ma_toolbar .tb_editar_w img{ background-position: -0px -88px; }\n#ma_toolbar .tb_engranaje_b img{ background-position: -20px -68px; }\n#ma_toolbar .tb_engranaje_w img{ background-position: -52px -40px; }\n#ma_toolbar .tb_exit_b img{ background-position: -20px -88px; }\n#ma_toolbar .tb_exit_w img{ background-position: -40px -68px; }\n#ma_toolbar .tb_index_b img{ background-position: -60px -60px; }\n#ma_toolbar .tb_index_w img{ background-position: -40px -88px; }\n#ma_toolbar .tb_llave_b img{ background-position: -60px -80px; }\n#ma_toolbar .tb_llave_w img{ background-position: -80px -56px; }\n#ma_toolbar .tb_mi_fotolog_b img{ background-position: -80px -76px; }\n#ma_toolbar .tb_mi_fotolog_w img{ background-position: -100px -56px; }\n#ma_toolbar .tb_nuevo_articulo_b img{ background-position: -100px -76px; }\n#ma_toolbar .tb_nuevo_articulo_w img{ background-position: -122px -0px; }\n#ma_toolbar .tb_plus_b img{ background-position: -122px -20px; }\n#ma_toolbar .tb_plus_w img{ background-position: -142px -0px; }\n#ma_toolbar .tb_random_b img{ background-position: -122px -40px; }\n#ma_toolbar .tb_random_w img{ background-position: -162px -0px; }\n#ma_toolbar .tb_sobre_b img{ background-position: -142px -20px; }\n#ma_toolbar .tb_sobre_w img{ background-position: -142px -40px; }\n#ma_toolbar .tb_mencion_b img{ background-position: -160px -94px; }\n#ma_toolbar .tb_mencion_w img{ background-position: -180px -94px; }\n#ma_toolbar .tb_subir_b img{ background-position: -162px -20px; }\n#ma_toolbar .tb_subir_w img{ background-position: -120px -60px; }\n#ma_toolbar .tb_user_b img{ background-position: -120px -80px; }\n#ma_toolbar .tb_user_w img{ background-position: -140px -60px; }\n#ma_toolbar .tb_user_foto_b img{ background-position: -89px -0px; }\n#ma_toolbar .tb_user_foto_w img{ background-position: -89px -28px; }\n#ma_toolbar .tb_facebook_button{display:block;width:89px;height:20px;padding:0px;margin:0px;position:relative;top:-1px;cursor:pointer}\n#ma_toolbar .tb_facebook_button img{ background-repeat:no-repeat;width:89px;height:20px;}\n#ma_toolbar a.tb_user_foto_b, #ma_toolbar a.tb_user_foto_w{display:block;position:relative;height:20px;line-height:20px;top:-9px;}\n#ma_toolbar .tb_user_foto_b img.tb_marcofoto,#ma_toolbar .tb_user_foto_w img.tb_marcofoto{position:relative;width:33px;height:28px;top:4px; }\n#ma_toolbar .tb_user_foto_b img.tb_userfoto,#ma_toolbar .tb_user_foto_w img.tb_userfoto{filter:alpha(opacity=100);-moz-opacity:1;-khtml-opacity:1;opacity:1;top:5px;left:1px;position:absolute;width:26px;height:26px;}\n#ma_toolbar a.tb_user_foto_b:hover img.tb_userfoto,#ma_toolbar a.tb_user_foto_w:hover img.tb_userfoto{filter:alpha(opacity=100);-moz-opacity:1;-khtml-opacity:1;opacity:1;}\n#ma_toolbar .matb_bullets{display:block;padding:0px 3px;text-align:center;height:20px;}#ma_toolbar .matb_bullets .vSep{height:18px;width:1px;margin:0px 5px;padding:0px;background-color:#7783f4;position:relative;top:0px;}\n*:first-child+html #ma_toolbar .matb_bullets .vSepS{padding:0px 5px;}*:first-child+html #ma_toolbar .matb_bullets .vSep{margin:0px;}/*Caja de share de la cabecera*/\n\t\t\t#miarrobaShareBox{\n\t\t\t\tmargin:0px;\n\t\t\t\tpadding:0px;\n\t\t\t\tdisplay:inline-block;\n\t\t\t\t//display:inline;\n\t\t\t\theight:19px;\n\t\t\t\twidth:auto;\n\t\t\t\tpadding:4px 4px 3px 4px;\n\t\t\t\tvertical-align:top;\n\t\t\t\tposition:relative;\n\t\t\t\tborder-radius: 3px;\n\t\t\t\tbackground-color:rgba(255,255,255,0.67);\n\t\t\t\tbackground-color:#bfc5fa\\9;\n\t\t\t\ttop:-4px;\n\t\t\t}\n\t\t\t*:first-child+html #miarrobaShareBox{top:0px;}\n\t\t\t\n\t\t\t#miarrobaShareBox .shareContainer{\n\t\t\t\tmargin:0px;\n\t\t\t\tpadding:0px;\n\t\t\t\tbackground:transparent;\n\t\t\t\tdisplay:inline-block;\n\t\t\t\theight:19px;\n\t\t\t}\n\t\t\t#miarrobaShareBox .shareContainer a.shlink{\n\t\t\t\tmargin:0px;\n\t\t\t\tmargin-right:3px;\n\t\t\t\tpadding:0px;\n\t\t\t\tdisplay:inline-block !important;\n\t\t\t\twidth:18px;\n\t\t\t\theight:19px !important;\n\t\t\t\tbackground-repeat:no-repeat;\n\t\t\t\toverflow:hidden;\n\t\t\t}\n\t\t\t#miarrobaShareBox .shareContainer a.moreshareopts, #miarrobaShareBox .shareContainer a.allshareopts{\n\t\t\t\twidth:10px;\n\t\t\t\theight:18px !important;\n\t\t\t\tmargin-right:0px;\n\t\t\t\tposition:relative;\n\t\t\t\ttop:0px;\n\t\t\t}\n\t\t\t#miarrobaShareBox .shareContainer a.shlink img{\n\t\t\t\tmargin:0px !important;\n\t\t\t\tpadding:0px !important;\n\t\t\t\twidth:18px;\n\t\t\t\theight:19px !important;\n\t\t\t\tborder:0px solid #ff0000;\n\t\t\t\tbackground-image:url(\'https://miarroba.st/205/layout_miarroba/sprites/toolbar.png\');\n\t\t\t}\n\t\t\n\t\t\t#miarrobaShareBox .shareContainer a.facebook img{\n\t\t\t\tbackground-position: -162px -40px;\n\t\t\t}\n\t\t\t#miarrobaShareBox .shareContainer a.facebook:hover img{\n\t\t\t\tbackground-position: -162px -39px;\n\t\t\t}\n\t\t\t#miarrobaShareBox .shareContainer a.meneame img{\n\t\t\t\tbackground-position: -180px -40px;\n\t\t\t}\n\t\t\t#miarrobaShareBox .shareContainer a.meneame:hover img{\n\t\t\t\tbackground-position: -180px -39px;\n\t\t\t}\n\t\t\t#miarrobaShareBox .shareContainer a.twitter img{\n\t\t\t\tbackground-position: -140px -80px;\n\t\t\t}\n\t\t\t#miarrobaShareBox .shareContainer a.twitter:hover img{\n\t\t\t\tbackground-position: -140px -79px;\n\t\t\t}\n\t\t\t#miarrobaShareBox .shareContainer a.reddit img{\n\t\t\t\tbackground-position: -160px -60px;\n\t\t\t}\n\t\t\t#miarrobaShareBox .shareContainer a.reddit:hover img{\n\t\t\t\tbackground-position: -160px -59px;\n\t\t\t}\n\t\t\t#miarrobaShareBox .shareContainer a.moreshareopts img, #miarrobaShareBox .shareContainer a.allshareopts img{\n\t\t\t\tbackground-position:-182px -17px;\n\t\t\t\twidth:10px;\n\t\t\t}\n\t\t\t#miarrobaShareBox .shareContainer a.moreshareopts:hover img, #miarrobaShareBox .shareContainer a.allshareopts:hover img{\n\t\t\t\tbackground-position:-182px -16px;\n\t\t\t\twidth:10px;\n\t\t\t}\n\n\t\t#matb_parentdiv {position:absolute;top:0px;left:0px;width:100%;}#matb_forceWidth{margin:auto;}\n#matb_forceWidth{max-width: 1000px;}\n</style>\n<!--[if IE]>\n<style>\n#ma_toolbar{text-align:center;}\n#matb_forceWidth{text-align:left;width: expression(document.body.clientWidth>1024 ? \'1000px\' : \'auto\');}\n</style>\n<![endif]-->\n');
document.write('<scr'+'ipt type="text/javasc'+'ript" src="https://miarroba.st/205/toolbar/toolbar.js" ></sc'+'ript>');
document.write('');
function IncludeInDiv()
{
	if(includeToolBar===true)
	{
		myBody=document.getElementsByTagName('BODY')[0];
		BB=document.createElement('DIV');
		BB.id='matb_parentdiv';
		BB.innerHTML='<div id="ma_toolbar"><div id="ma_auxie6_bg"></div><div id="matb_forceWidth"><div class="matb_left"><a href="https://miarroba.com" onclick="" class="matb_logo tb_logo" title="miarroba.com"><img src="https://miarroba.st/205/iconos/vacio.gif" width="26" height="28" border="0" alt="miarroba.com"/></a></div><div class="matb_left"><div class="matb_search_div" id="matb_div_search_form" title="Buscar en miarroba"><form class="matb_search_form" id="matb_search_form" action="https://buscar.miarroba.com/" method="GET" onsubmit="return toolbarMiarroba.mtb_checkform(this);" style="display:none;"><input type="text" name="q" id="mtb_search_what" class="matb_search_input" /><input type="image" src="https://miarroba.st/205/iconos/vacio.gif" class="matb_search_submit tb_lupa_on" name="mtb_search_submit" id="mtb_search_submit" /></form><img src="https://miarroba.st/205/iconos/vacio.gif" class="c lt" alt=""/><img src="https://miarroba.st/205/iconos/vacio.gif" class="c rt" alt=""/><img src="https://miarroba.st/205/iconos/vacio.gif" class="c lb" alt=""/><img src="https://miarroba.st/205/iconos/vacio.gif" class="c rb" alt=""/><span class="buscaren" id="buscaren">Buscar ...</span><img src="https://miarroba.st/205/iconos/vacio.gif" class="matb_search_submit tb_lupa_w" id="mtb_search_img" /></div></div><div class="matb_left"><span class="matb_bullets"></span></div><div class="matb_left"><a href="https://blogs.miarroba.com/blog.php?accion=nuevo" class="matb_boton tb_plus_w" title="Crea tu blog GRATIS"><img src="https://miarroba.st/205/iconos/vacio.gif" width="24" height="24" class="matb_ico"/> Crea tu blog GRATIS</a></div><div class="matb_left"><span class="matb_bullets"></span></div><div class="matb_left"><a href="https://blogs.miarroba.com/nextblog.php?bid=100717" class="matb_boton tb_random_w" title="Visita al azar otro blog de la misma categoría"><img src="https://miarroba.st/205/iconos/vacio.gif" width="24" height="24" class="matb_ico"/> Blog aleatorio</a></div><div class="matb_right"><a href="https://miarroba.com/usuarios/nuevo.php"  onclick=""  class="matb_boton tb_user_w" title="Nuevo usuario"><img src="https://miarroba.st/205/iconos/vacio.gif" width="24" height="24" class="matb_ico"/> Regístrate</a></div><div class="matb_right"><span class="matb_bullets"><span class="vSepS"><img src="https://miarroba.st/205/iconos/vacio.gif" class="vSep" /></span></span></div><div class="matb_right"><a href="https://miarroba.com/usuarios/entrar.php" onclick="toolbarMiarroba.loginscr'+'ipt(\'https://miarroba.com\');return false;"  onclick=""  class="matb_boton tb_llave_w" title="Conectar usuario"><img src="https://miarroba.st/205/iconos/vacio.gif" width="24" height="24" class="matb_ico"/> Entrar</a></div><div class="matb_right"><span class="matb_bullets"><span class="vSepS"><img src="https://miarroba.st/205/iconos/vacio.gif" class="vSep" /></span></span></div><div class="matb_right"><a href="#" class="tb_facebook_button" title="Conectar usando Facebook" onclick="$mia.fblogin(\'https://miarroba.com/fb/?mfbacc=login&domain=blogs.miarroba.com\');return false;"><img src="https://miarroba.st/205/iconos/vacio.gif"/></a></div><div class="matb_right"><span class="matb_bullets"><span class="vSepS"><img src="https://miarroba.st/205/iconos/vacio.gif" class="vSep" /></span></span></div><div class="matb_right"><div id="miarrobaShareBox"><span id="sharer_267cc808" class="shareContainer"></span></div></div></div></div>';
		IMG=document.createElement('IMG');
		IMG.src='https://miarroba.st/205/iconos/vacio.gif'
		IMG.style.height='33px';
		IMG.style.width='100%';
		myBody.insertBefore(IMG,myBody.childNodes[0]);
		myBody.insertBefore(BB,myBody.childNodes[0]);
		includeToolBar=false;
		toolbarMiarroba.init();	}
}

jQuery(function() {
toolbarMiarroba= new MiarrobaToolBar('toolbarMiarroba');
toolbarMiarroba.mtb_search_error_1 = 'La cadena buscada no es válida';
var sc_267cc808=function(){var code = '';code +='<'+'a h'+'ref="https://servicios.miarroba.com/share.php?a=rd&s=facebook&u='+encodeURIComponent(document.location.href)+'&t='+encodeURIComponent(document.title)+'&k=1aa53e3d18d0192efcdce14e504f4396" class="shlink facebook" onclick="return share_window_open(this,\'popup|width=990,height=600\');" title="Compartir en Facebook" target="_share_"><img src="https://miarroba.st/205/iconos/vacio.gif" class="sl_img" /></a>';code +='<'+'a h'+'ref="https://servicios.miarroba.com/share.php?a=rd&s=twitter&u='+encodeURIComponent(document.location.href)+'&t='+encodeURIComponent(document.title)+'&k=12a0352334eea4b960491802f3351b77" class="shlink twitter" onclick="return share_window_open(this,\'popup|width=700,height=250\');" title="Compartir en Twitter" target="_share_"><img src="https://miarroba.st/205/iconos/vacio.gif" class="sl_img" /></a>';code +='<'+'a h'+'ref="https://servicios.miarroba.com/share.php?a=rd&s=meneame&u='+encodeURIComponent(document.location.href)+'&t='+encodeURIComponent(document.title)+'&k=e9bfbbf4bf389d473c80ec2e4fb6daad" class="shlink meneame" onclick="return share_window_open(this,\'popup|width=970,height=500\');" title="Compartir en Meneame" target="_share_"><img src="https://miarroba.st/205/iconos/vacio.gif" class="sl_img" /></a>';code +='<'+'a h'+'ref="https://servicios.miarroba.com/share.php?a=al&t='+encodeURIComponent(document.title)+'&u='+encodeURIComponent(document.location.href)+'&k=dad3b01fb21eedb13cfb34dd9ede1ed7" class="shlink allshareopts" onclick="return window.top.share_window_iframe_more(this);" title="Ver todos los servicios" target="_share_"><img src="https://miarroba.st/205/iconos/vacio.gif" class="sl_img" /></a>';var si = false;  si=setInterval( function(){ if( typeof(document.getElementById('sharer_267cc808'))!='undefined' ){clearInterval(si);document.getElementById('sharer_267cc808').innerHTML=code;} },50 )};sc_267cc808();		ajustaBackground(33);
		IncludeInDiv();
		$mia.social.parse('#ma_toolbar');
});
function ajustaBackground(pixels) {
	var img,bP,dD,dif;
	
	var t = this;
	var D = document;
	var obj = D.getElementsByTagName('body')[0];
	
	this.css = function(o,p) {
		if( o.currentStyle ) {
			return o.currentStyle[p];
		} else {
			return document.defaultView.getComputedStyle(o,null)[p];
		}
	}
	
	this.getBackPos = function() {
		var bP,ret={};
		bP = t.css(obj,'backgroundPosition');
		if( !bP ) {
			ret = {'x':t.css(obj,'backgroundPositionX'),'y':t.css(obj,'backgroundPositionY')}
		} else {
			if( bP.indexOf(' ')!==-1 ) {
				var foo = bP.split(' ');
				if( bP.search(/[0-9]/)!==-1 ) {
					ret = {'x':foo[0],'y':foo[1]};
				} else {
					ret = {'x':foo[1],'y':foo[0]};
				}
			} else {
				if( bP=='top' || bp=='bottom' ) {
					ret = {'x':'center','y':bP}
				} else {
					ret = {'x':bP,'y':'center'}
				}
			}
		}
		return ret;
	}
	
	this.getDocDimension = function() {
		return {'x':t.getDocWidth(),'y':t.getDocHeight()};
	}

	this.getDocHeight = function() {
		return Math.max(D.body.clientHeight, D.documentElement.clientHeight);
	}

	this.getDocWidth = function() {
		return Math.max(D.body.clientWidth, D.documentElement.clientWidth);
	}
	
	// Ejecutamos todo ;)
	img = this.css(obj,'backgroundImage');
	if( img!='none' && img!='' ) {
		bP = t.getBackPos(obj);
		dD = t.getDocDimension();
		
		if( bP.x.indexOf('px')!==-1 ) {
			dif = Math.abs(parseInt(bP.x)-(parseInt(dD.x)/2));
			if( dif<10 ) {
				bP.x='center';
			}
		}
		
		if( bP.y.indexOf('px')!==-1 ) {
			dif = Math.abs(parseInt(bP.y)-(parseInt(dD.y)/2));
			if( dif<10 ) {
				bP.y='center';
			}
		}
		
		if( bP.y=='0%'|| bP.y=='top' ) bP.y = '0px';
		
		if( bP.y.indexOf('px')!==-1 ) {
			bP.y = parseInt(bP.y)+pixels+'px';
			obj.style.backgroundPosition = bP.x+' '+bP.y;
		}
	}
}
document.write('<scr'+'ipt TYPE="text/javascr'+'ipt" SRC="//stats.miarroba.info/?r=cde0df4b43e43c409a253294c8a87446&d=blogs&t=0"></scr'+'ipt>');
document.write('<scr'+'ipt type="text/javascr'+'ipt" src="/cookie.php?a=1&r='+encodeURIComponent(document.referrer)+'"></scr'+'ipt>');
