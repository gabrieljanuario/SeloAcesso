<!--
/*
* THIS SOURCE FILE, ITS MACHINE READABLE FORM, AND ANY REPRESENTATION
* OF THE MATERIAL CONTAINED HEREIN ARE OWNED BY ACESSIBILIDADE BRASIL.
* THESE MATERIALS ARE PROPRIETARY AND CONFIDENTIAL AND MAY NOT BE
* REPRODUCED IN ANY FORM WITHOUT THE PRIOR WRITTEN PERMISSION OF
* ACESSIBILIDADE BRASIL.
* COPYRIGHT (C) 2013 BY ACESSIBILIDADE BRASIL, GRUPO W2B
* ALL RIGHTS RESERVED
*/

seloAcessibilidade = function (dados){
	data__id = dados.slice(dados.indexOf("{")+1, dados.indexOf("}")); 
   data__title = dados.replace("{"+data__id+"}","");
	  
   
	 ac__lk = "http://www.acessibilidadebrasil.org.br/sign/aprovado/cod="+data__id;
	ac__tit = "Aprova\u00e7\u00e3o pelas Normas Brasileiras de Acessibilidade na Internet para "+data__title+" ";
	ac__alt = "Imagem Representando o Selo de Aprova\u00e7\u00e3o pelas Normas Brasileiras de Acessibilidade na Internet";
		
	return {	
		insertSign: function (size = '92x47'){
			document.write("<div style=\"display:block\">");
			document.write("<a title=\""+ac__tit+"\" target=\"_blank\" href=\""+ac__lk+"\" >");
			document.write("<img src=\"http://www.acessibilidadebrasil.org.br/sign/selo_acessobr"+size+".gif\" alt=\""+ac__alt+"\" />");
			document.write("</a>");
			document.write("</div>");
		}
	}
}; 

// -->
