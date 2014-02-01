// DOM #####
$(document).ready(function(){ 

	if ($('#global').hasClass('home')) { // HOME
		if((!$('#global').hasClass('fanpage')) && (!$('#global').hasClass('search'))){		
			if ($('#home-carousel').hasClass('store')) { // CAROUSEL		
				$('#carousel').bxSlider({ minSlides: 2,maxSlides: 5,moveSlides: 1,auto: true});
			}else{
				$('#carousel').bxSlider({ minSlides: 3,maxSlides: 9,moveSlides: 3,auto: true});				
			}
		}
	} else if ($('#global').hasClass('product')) { // PRODUCT
		$('#global').addClass('store');	
		$('.gal_thumb ul li:first-child').addClass('selected');
		$('.gal_thumb ul li a').click(function(e){
			e.preventDefault();											   
			var linkz = $(this).attr('name');
			$('.gal_thumb ul li').removeClass('selected');
			$(this).parent().addClass('selected');
			$('.gal_large ul li').hide();
			$('.gal_large ul li.'+linkz).show();
		});											   
		
		if ($('#global').hasClass('view')) {
				$(".thumbs li:first-child").addClass('selected');
				$(function(){
					$(".thumbs img").click(function(){
						var src = $(this).attr("src");
						var large = $(this).data("large");
						$("#zoomblock > img").attr("src",src);
						$("#zoomblock .he-zoom > img").attr("src",large);
						$(".thumbs li").removeClass('selected');
						$(this).parent().addClass('selected');
						
					});
				});	
					
		}

		if($('input').hasClass('qtd_aval')) {
			$('.infop > div.qtd > a').click(function(e){
					e.preventDefault();
					var now_quantity = parseInt($('input.qtd_aval').val());
					
					if($(this).hasClass('mais')){
						vlx = now_quantity+1;
						if(product_quantity_available>=vlx){ $('input.qtd_aval').val(vlx); }
					}else{
						vlx = now_quantity-1;						
						if(vlx!=0){ $('input.qtd_aval').val(vlx); }
					}
			});											   
	
			$('input.qtd_aval').blur(function() {
				var	now_quantity = parseInt($('input.qtd_aval').val());
				if((now_quantity > product_quantity_available) || (now_quantity == 0)){ $('input.qtd_aval').val('1'); }
			});											   										  
	
		}

	}else if ($('#global').hasClass('how-works')) { // HOW WORKS
		$('fieldset > div').click(function() { $(this).next('p').slideToggle(); });

	}else if ($('#global').hasClass('edit')) { // SELL ADD/EDIT
		$(".maskCPF").mask("999.999.999-99"); // CPF
		$('a.add-more-photo').click(function(e) { e.preventDefault(); $(this).next('div').toggle(); });
		if($('div').hasClass('collapse')){
			$('div.collapse > div').click(function() { $(this).next('p').slideToggle(); });
		}
			
	}
	
	fdefault();
	fbuy();
	inviteFriends();

});


function fdefault(){

	menus();
	searchVal();

	// Go top
	if (typeof(FB) != "undefined" && FB !== null){ FB.Canvas.scrollTo(0,0); FB.Canvas.setSize(); }
	
	// Inputs, Forms
	$("select, input:checkbox, input:radio").filter(":not(.nostyle)").uniform(); //, input:file //	input:radio(:not(.nostyle))
	
	if ($(".tooltip").length > 0) {
		$(".tooltip").tipTip();
	}
	$('input.maskmoney').maskMoney({thousands:''});
	$('input.masknumber').numeric(false);

	$("form").filter(":not(.personalvalidate)").submit(function(){ // Form Submit
		errorF = 0;
		if ($("input.required").length > 0){		
			$("input.required").each(function(i) {
				if($(this).val()==""){ 
					$(this).addClass('warning'); 
					errorMessage($(this).attr('id'));
					errorF = 1;
				}
			});
		}
		
		if ($(".maskCPF").length > 0){		
			cpf = $(".maskCPF").val(); cpf = cpf.split('.').join(''); cpf = cpf.split('-').join('');
			if(($(".maskCPF").val()=="") || (!valida_cpf(cpf))){
				errorMessage('EmaskCPF');
				errorF = 1;
			}
		}

		if(errorF == 1){ alert('Por favor verifique o preenchimento dos campos'); return false; }else{ return true; }
		
		$("input.required").blur(function() { 
			if($(this).val()==""){ 
				$(this).addClass('warning'); 
				errorMessage($(this).attr('id'));
				alert('Este campo é de preenchimento Obrigatório!'); 
			}else{
				$(this).removeClass('warning'); 			
				errorMessageStop($(this).attr('id'));
			} 
		});
		
	});	
	
}

function fbuy(){
	if ($('#global').hasClass('buy')) {
		$(".maskCPF").mask("999.999.999-99"); $(".maskCep").mask("99999-999"); // Masks
		$("input.required").blur(function() { 
			if($(this).val()==""){ 
				$(this).addClass('warning'); 
				errorMessage($(this).attr('id'));
				alert('Este campo é de preenchimento Obrigatório!'); 
			}else{
				$(this).removeClass('warning'); 			
				errorMessageStop($(this).attr('id'));
			} 
		});
					
		$(".buyform").submit(function(){ // Form Submit
			errorF = 0;
			$("input.required").each(function(i) {
 				if($(this).val()==""){ 
					$(this).addClass('warning'); 
					errorMessage($(this).attr('id'));
					errorF = 1;
				}				
        	});	

			cpf = $(".maskCPF").val(); cpf = cpf.split('.').join(''); cpf = cpf.split('-').join('');
			if(($(".maskCPF").val()=="") || (!valida_cpf(cpf))){
				errorMessage('EmaskCPF');
				errorF = 1;
			}
			
			if(errorF == 1){ alert('Por favor verifique o preenchimento dos campos'); return false; }else{ loadScreen(); return true; }
			
		});

	}

}

function errorMessage(local){var local = "."+local; $(local).show(); BZ.hideLoadingScreen(); }	
function errorMessageStop(local){var local = "."+local; $(local).hide(); }	

function menus(){
	// Top Menu
	$("#menu > div").hover(function(){ $(this).children("div").show() }, function(){ $(this).children("div").hide(); });	
	
	$(".menu-categories").hover(function(){ 
		$(this).addClass("selected");
		$(this).children("div.categories").children("div#nav_cats").show();
		$("#nav_cats > ul > li").hover(function(){
			$("#nav_cats > ul > li").removeClass("selected");
			$(this).addClass("selected");
			itemId = "#"+$(this).attr('id').replace("cat","subcat"); ;
			$("#nav_subcats > div").hide();
			$(itemId).show();
			if ($(itemId).hasClass('notEmpty'))
			{
				$("#nav_subcats").show();
				$("#nav_subcats").css('top',$(this).position().top+'px');
			}
			else
			{
				$("#nav_subcats").hide();
			}
		})
	}, function(){ 
		$(this).removeClass("selected");	
		$("#nav_cats > ul > li").removeClass("selected");
		$(this).children("div.categories").children("div#nav_cats").hide(); 
		$(this).children("div.categories").children("div#nav_subcats").hide(); 		
	});		
}

function searchVal(){
	$("input.search-field").focus(function(){ if(($(this).val()=="") || ($(this).val()==$(this).attr("title"))){ $(this).val(""); } });
	$("input.search-field").blur(function() { if($(this).val()==""){ $(this).val($(this).attr("title")); } });	

	$("input.valueHover").focus(function(){ if(($(this).val()=="") || ($(this).val()==$(this).attr("title"))){ $(this).val(""); } });
	$("input.valueHover").blur(function() { if($(this).val()==""){ $(this).val($(this).attr("title")); } });	
}

function valida_cpf(cpf){
      var numeros, digitos, soma, i, resultado, digitos_iguais;
      digitos_iguais = 1;
	  
      if (cpf.length < 11)
            return false;
      for (i = 0; i < cpf.length - 1; i++)
            if (cpf.charAt(i) != cpf.charAt(i + 1))
                  {
                  digitos_iguais = 0;
                  break;
                  }
      if (!digitos_iguais)
            {
            numeros = cpf.substring(0,9);
            digitos = cpf.substring(9);
            soma = 0;
            for (i = 10; i > 1; i--)
                  soma += numeros.charAt(10 - i) * i;
            resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
            if (resultado != digitos.charAt(0))
                  return false;
            numeros = cpf.substring(0,10);
            soma = 0;
            for (i = 11; i > 1; i--)
                  soma += numeros.charAt(11 - i) * i;
            resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
            if (resultado != digitos.charAt(1))
                  return false;
            return true;
            }
      else
            return false;
}

function inviteFriends(){
	if ($("a").hasClass('inviteFriends')) {	
		$("a.inviteFriends").click(function(e){
			e.preventDefault();
			inviteLink = $(this).attr("inviteLink");
			invitePicture = $(this).attr("invitePicture");
			inviteName = $(this).attr("inviteName");
			FB.ui({
			  method: "send",
			  link: inviteLink,
			  picture: invitePicture,
			  name: inviteName
			});
		});
	}
}