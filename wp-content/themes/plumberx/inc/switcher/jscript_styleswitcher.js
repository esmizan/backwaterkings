/**
 *
 * Color picker
 * Author: Stefan Petre www.eyecon.ro
 *
 * Dual licensed under the MIT and GPL licenses
 *
 */
!function(e){var o=function(){var o=65,t='<div class="colorpicker"><div class="colorpicker_color"><div><div></div></div></div><div class="colorpicker_hue"><div></div></div><div class="colorpicker_new_color"></div><div class="colorpicker_current_color"></div><div class="colorpicker_hex"><input type="text" maxlength="6" size="6" /></div><div class="colorpicker_rgb_r colorpicker_field"><input type="text" maxlength="3" size="3" /><span></span></div><div class="colorpicker_rgb_g colorpicker_field"><input type="text" maxlength="3" size="3" /><span></span></div><div class="colorpicker_rgb_b colorpicker_field"><input type="text" maxlength="3" size="3" /><span></span></div><div class="colorpicker_hsb_h colorpicker_field"><input type="text" maxlength="3" size="3" /><span></span></div><div class="colorpicker_hsb_s colorpicker_field"><input type="text" maxlength="3" size="3" /><span></span></div><div class="colorpicker_hsb_b colorpicker_field"><input type="text" maxlength="3" size="3" /><span></span></div><div class="colorpicker_submit"></div></div>',r={eventName:"click",onShow:function(){},onBeforeShow:function(){},onHide:function(){},onChange:function(){},onSubmit:function(){},color:"ff0000",livePreview:!0,flat:!1},i=function(o,t){var r=j(o);e(t).data("colorpicker").fields.eq(1).val(r.r).end().eq(2).val(r.g).end().eq(3).val(r.b).end()},a=function(o,t){e(t).data("colorpicker").fields.eq(4).val(o.h).end().eq(5).val(o.s).end().eq(6).val(o.b).end()},c=function(o,t){e(t).data("colorpicker").fields.eq(0).val(B(o)).end()},n=function(o,t){e(t).data("colorpicker").selector.css("backgroundColor","#"+B({h:o.h,s:100,b:100})),e(t).data("colorpicker").selectorIndic.css({left:parseInt(150*o.s/100,10),top:parseInt(150*(100-o.b)/100,10)})},d=function(o,t){e(t).data("colorpicker").hue.css("top",parseInt(150-150*o.h/360,10))},l=function(o,t){e(t).data("colorpicker").currentColor.css("backgroundColor","#"+B(o))},s=function(o,t){e(t).data("colorpicker").newColor.css("backgroundColor","#"+B(o))},p=function(t){var r=t.charCode||t.keyCode||-1;if(r>o&&90>=r||32==r)return!1;var i=e(this).parent().parent();i.data("colorpicker").livePreview===!0&&u.apply(this)},u=function(o){var t,r=e(this).parent().parent();this.parentNode.className.indexOf("_hex")>0?r.data("colorpicker").color=t=E(z(this.value)):this.parentNode.className.indexOf("_hsb")>0?r.data("colorpicker").color=t=H({h:parseInt(r.data("colorpicker").fields.eq(4).val(),10),s:parseInt(r.data("colorpicker").fields.eq(5).val(),10),b:parseInt(r.data("colorpicker").fields.eq(6).val(),10)}):r.data("colorpicker").color=t=T(O({r:parseInt(r.data("colorpicker").fields.eq(1).val(),10),g:parseInt(r.data("colorpicker").fields.eq(2).val(),10),b:parseInt(r.data("colorpicker").fields.eq(3).val(),10)})),o&&(i(t,r.get(0)),c(t,r.get(0)),a(t,r.get(0))),n(t,r.get(0)),d(t,r.get(0)),s(t,r.get(0)),r.data("colorpicker").onChange.apply(r,[t,B(t),j(t)])},h=function(o){var t=e(this).parent().parent();t.data("colorpicker").fields.parent().removeClass("colorpicker_focus")},f=function(){o=this.parentNode.className.indexOf("_hex")>0?70:65,e(this).parent().parent().data("colorpicker").fields.parent().removeClass("colorpicker_focus"),e(this).parent().addClass("colorpicker_focus")},v=function(o){var t=e(this).parent().find("input").focus(),r={el:e(this).parent().addClass("colorpicker_slider"),max:this.parentNode.className.indexOf("_hsb_h")>0?360:this.parentNode.className.indexOf("_hsb")>0?100:255,y:o.pageY,field:t,val:parseInt(t.val(),10),preview:e(this).parent().parent().data("colorpicker").livePreview};e(document).bind("mouseup",r,g),e(document).bind("mousemove",r,m)},m=function(e){return e.data.field.val(Math.max(0,Math.min(e.data.max,parseInt(e.data.val+e.pageY-e.data.y,10)))),e.data.preview&&u.apply(e.data.field.get(0),[!0]),!1},g=function(o){return u.apply(o.data.field.get(0),[!0]),o.data.el.removeClass("colorpicker_slider").find("input").focus(),e(document).unbind("mouseup",g),e(document).unbind("mousemove",m),!1},k=function(o){var t={cal:e(this).parent(),y:e(this).offset().top};t.preview=t.cal.data("colorpicker").livePreview,e(document).bind("mouseup",t,_),e(document).bind("mousemove",t,b)},b=function(e){return u.apply(e.data.cal.data("colorpicker").fields.eq(4).val(parseInt(360*(150-Math.max(0,Math.min(150,e.pageY-e.data.y)))/150,10)).get(0),[e.data.preview]),!1},_=function(o){return i(o.data.cal.data("colorpicker").color,o.data.cal.get(0)),c(o.data.cal.data("colorpicker").color,o.data.cal.get(0)),e(document).unbind("mouseup",_),e(document).unbind("mousemove",b),!1},x=function(o){var t={cal:e(this).parent(),pos:e(this).offset()};t.preview=t.cal.data("colorpicker").livePreview,e(document).bind("mouseup",t,y),e(document).bind("mousemove",t,w)},w=function(e){return u.apply(e.data.cal.data("colorpicker").fields.eq(6).val(parseInt(100*(150-Math.max(0,Math.min(150,e.pageY-e.data.pos.top)))/150,10)).end().eq(5).val(parseInt(100*Math.max(0,Math.min(150,e.pageX-e.data.pos.left))/150,10)).get(0),[e.data.preview]),!1},y=function(o){return i(o.data.cal.data("colorpicker").color,o.data.cal.get(0)),c(o.data.cal.data("colorpicker").color,o.data.cal.get(0)),e(document).unbind("mouseup",y),e(document).unbind("mousemove",w),!1},C=function(o){e(this).addClass("colorpicker_focus")},M=function(o){e(this).removeClass("colorpicker_focus")},I=function(o){var t=e(this).parent(),r=t.data("colorpicker").color;t.data("colorpicker").origColor=r,l(r,t.get(0)),t.data("colorpicker").onSubmit(r,B(r),j(r),t.data("colorpicker").el)},q=function(o){var t=e("#"+e(this).data("colorpickerId"));t.data("colorpicker").onBeforeShow.apply(this,[t.get(0)]);var r=e(this).offset(),i=S(),a=r.top+this.offsetHeight,c=r.left;return a+176>i.t+i.h&&(a-=this.offsetHeight+176),c+356>i.l+i.w&&(c-=356),t.css({left:c+"px",top:a+"px"}),0!=t.data("colorpicker").onShow.apply(this,[t.get(0)])&&t.show(),e(document).bind("mousedown",{cal:t},P),!1},P=function(o){N(o.data.cal.get(0),o.target,o.data.cal.get(0))||(0!=o.data.cal.data("colorpicker").onHide.apply(this,[o.data.cal.get(0)])&&o.data.cal.hide(),e(document).unbind("mousedown",P))},N=function(e,o,t){if(e==o)return!0;if(e.contains)return e.contains(o);if(e.compareDocumentPosition)return!!(16&e.compareDocumentPosition(o));for(var r=o.parentNode;r&&r!=t;){if(r==e)return!0;r=r.parentNode}return!1},S=function(){var e="CSS1Compat"==document.compatMode;return{l:window.pageXOffset||(e?document.documentElement.scrollLeft:document.body.scrollLeft),t:window.pageYOffset||(e?document.documentElement.scrollTop:document.body.scrollTop),w:window.innerWidth||(e?document.documentElement.clientWidth:document.body.clientWidth),h:window.innerHeight||(e?document.documentElement.clientHeight:document.body.clientHeight)}},H=function(e){return{h:Math.min(360,Math.max(0,e.h)),s:Math.min(100,Math.max(0,e.s)),b:Math.min(100,Math.max(0,e.b))}},O=function(e){return{r:Math.min(255,Math.max(0,e.r)),g:Math.min(255,Math.max(0,e.g)),b:Math.min(255,Math.max(0,e.b))}},z=function(e){var o=6-e.length;if(o>0){for(var t=[],r=0;o>r;r++)t.push("0");t.push(e),e=t.join("")}return e},Y=function(e){var e=parseInt(e.indexOf("#")>-1?e.substring(1):e,16);return{r:e>>16,g:(65280&e)>>8,b:255&e}},E=function(e){return T(Y(e))},T=function(e){var o={h:0,s:0,b:0},t=Math.min(e.r,e.g,e.b),r=Math.max(e.r,e.g,e.b),i=r-t;return o.b=r,o.s=0!=r?255*i/r:0,0!=o.s?e.r==r?o.h=(e.g-e.b)/i:e.g==r?o.h=2+(e.b-e.r)/i:o.h=4+(e.r-e.g)/i:o.h=-1,o.h*=60,o.h<0&&(o.h+=360),o.s*=100/255,o.b*=100/255,o},j=function(e){var o={},t=Math.round(e.h),r=Math.round(255*e.s/100),i=Math.round(255*e.b/100);if(0==r)o.r=o.g=o.b=i;else{var a=i,c=(255-r)*i/255,n=(a-c)*(t%60)/60;360==t&&(t=0),60>t?(o.r=a,o.b=c,o.g=c+n):120>t?(o.g=a,o.b=c,o.r=a-n):180>t?(o.g=a,o.r=c,o.b=c+n):240>t?(o.b=a,o.r=c,o.g=a-n):300>t?(o.b=a,o.g=c,o.r=c+n):360>t?(o.r=a,o.g=c,o.b=a-n):(o.r=0,o.g=0,o.b=0)}return{r:Math.round(o.r),g:Math.round(o.g),b:Math.round(o.b)}},W=function(o){var t=[o.r.toString(16),o.g.toString(16),o.b.toString(16)];return e.each(t,function(e,o){1==o.length&&(t[e]="0"+o)}),t.join("")},B=function(e){return W(j(e))},D=function(){var o=e(this).parent(),t=o.data("colorpicker").origColor;o.data("colorpicker").color=t,i(t,o.get(0)),c(t,o.get(0)),a(t,o.get(0)),n(t,o.get(0)),d(t,o.get(0)),s(t,o.get(0))};return{init:function(o){if(o=e.extend({},r,o||{}),"string"==typeof o.color)o.color=E(o.color);else if(void 0!=o.color.r&&void 0!=o.color.g&&void 0!=o.color.b)o.color=T(o.color);else{if(void 0==o.color.h||void 0==o.color.s||void 0==o.color.b)return this;o.color=H(o.color)}return this.each(function(){if(!e(this).data("colorpickerId")){var r=e.extend({},o);r.origColor=o.color;var m="collorpicker_"+parseInt(1e3*Math.random());e(this).data("colorpickerId",m);var g=e(t).attr("id",m);r.flat?g.appendTo(this).show():g.appendTo(document.body),r.fields=g.find("input").bind("keyup",p).bind("change",u).bind("blur",h).bind("focus",f),g.find("span").bind("mousedown",v).end().find(">div.colorpicker_current_color").bind("click",D),r.selector=g.find("div.colorpicker_color").bind("mousedown",x),r.selectorIndic=r.selector.find("div div"),r.el=this,r.hue=g.find("div.colorpicker_hue div"),g.find("div.colorpicker_hue").bind("mousedown",k),r.newColor=g.find("div.colorpicker_new_color"),r.currentColor=g.find("div.colorpicker_current_color"),g.data("colorpicker",r),g.find("div.colorpicker_submit").bind("mouseenter",C).bind("mouseleave",M).bind("click",I),i(r.color,g.get(0)),a(r.color,g.get(0)),c(r.color,g.get(0)),d(r.color,g.get(0)),n(r.color,g.get(0)),l(r.color,g.get(0)),s(r.color,g.get(0)),r.flat?g.css({position:"relative",display:"block"}):e(this).bind(r.eventName,q)}})},showPicker:function(){return this.each(function(){e(this).data("colorpickerId")&&q.apply(this)})},hidePicker:function(){return this.each(function(){e(this).data("colorpickerId")&&e("#"+e(this).data("colorpickerId")).hide()})},setColor:function(o){if("string"==typeof o)o=E(o);else if(void 0!=o.r&&void 0!=o.g&&void 0!=o.b)o=T(o);else{if(void 0==o.h||void 0==o.s||void 0==o.b)return this;o=H(o)}return this.each(function(){if(e(this).data("colorpickerId")){var t=e("#"+e(this).data("colorpickerId"));t.data("colorpicker").color=o,t.data("colorpicker").origColor=o,i(o,t.get(0)),a(o,t.get(0)),c(o,t.get(0)),d(o,t.get(0)),n(o,t.get(0)),l(o,t.get(0)),s(o,t.get(0))}})}}}();e.fn.extend({ColorPicker:o.init,ColorPickerHide:o.hidePicker,ColorPickerShow:o.showPicker,ColorPickerSetColor:o.setColor})}(jQuery);

/* Style Switcher */
/**
* Styleswitch stylesheet switcher built on jQuery
* Under an Attribution, Share Alike License
* By Kelvin Luck ( http://www.kelvinluck.com/ )
**/

jQuery(document).ready(function($){

	$('#colorSelector').ColorPicker({
		color: '#0000ff',
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$('#colorSelector div').css('backgroundColor', '#' + hex);
			$.cookie('ttcookie1', hex, { expires: 7 });
		}
	});


	$('#colorSelector_2').ColorPicker({
		color: '#0000ff',
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$('#colorSelector_2 div').css('backgroundColor', '#' + hex);
			$.cookie('ttcookie2', hex, { expires: 7 });
		}
	});

	$('.switchapply').click(function(e) {
		e.preventDefault();
		location.reload();
	});
	$('.switcherreset').click(function(e) {
		e.preventDefault();
		$.cookie('ttcookie1', '31AFE2', { expires: 7 });
		$.cookie('ttcookie2', 'FE5454', { expires: 7 });
/*
		$.removeCookie('ttcookie1');
		$.removeCookie('ttcookie2');
*/

		location.reload();
	});

});


// Switcher
jQuery(document).ready(function($){

	jQuery('.demo_changer .demo-icon').click(function(){

		if(jQuery('.demo_changer').hasClass("active")){
			jQuery('.demo_changer').animate({"left":"-180px"},function(){
				jQuery('.demo_changer').toggleClass("active");
			});
		}else{
			jQuery('.demo_changer').animate({"left":"0px"},function(){
				jQuery('.demo_changer').toggleClass("active");
			});
		}
	});

});

