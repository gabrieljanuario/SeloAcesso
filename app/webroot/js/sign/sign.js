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

seloAcessibilidade = function (data__id, data__title){
	 ac__lk = "http://www.acessibilidadebrasil.org.br/selo/valida/"+data__id;
	ac__tit = "Aprova\u00e7\u00e3o pelas Normas Brasileiras de Acessibilidade na Internet para "+data__title+" ";
	ac__alt = "Imagem Representando o Selo de Aprova\u00e7\u00e3o pelas Normas Brasileiras de Acessibilidade na Internet";
		
	return {	
		insertSign: function (sign__size = '92x47'){
			document.write("<div style=\"display:block\" class=\"seloAcessibilidade\">");
			document.write("<a title=\""+ac__tit+"\" target=\"_blank\" href=\""+ac__lk+"\" >");
			document.write("<img src=\"http://www.acessibilidadebrasil.org.br/sign/selo_acessobr"+sign__size+".gif\" alt=\""+ac__alt+"\" />");
			document.write("</a>");
			document.write("</div>");
		}
	}
}; 

// -->
