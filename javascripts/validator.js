// @-----------------------------------------------------@
// |MGMD FORM VALIDATOR V 1.0					  _||_   |
// |MGMD LTDA 2008 TODOS LOS DERECHOS RESERVADOS |T\/T|  |
// |											 |I__I|  |
// |http://www.magdalenamedio.net				   ||    |
// @-----------------------------------------------------@

var validInst ; // VARIABLE DE INSTANCIACION DE LA CLASE


// CONSTRUCTOR
// RECEBE TIPOS DE ALERTA (INT, 1-2)
// RECIBE DIV (STRING, DIV ID)
function Validator(msgAlertType, div, extra)
{
	// INSTANCIACION DE VARIABLES GLOBALES
	this.msgAlertType  = msgAlertType ? msgAlertType : 1 ;
	this.div           = div ? div : '' ;
	this.validables    = new Array() ; // INSTANCIA DE ARREGLO DE CAMPOS VALIDABLES
	this.valid         = true ;
	this.validatorMsg  = '' ;
	this.extra         = extra ? extra : true ;
	this.form          = this.getForm() ; // INSTANCIAMIENTO DE LA VARIABLE GLOBAL DEL FORMULARIO CON LA FUNCION LO BUSCA
	// VERIFICA SI HAY O NO HAY FORMULARIO
	if ( (typeof this.form != "undefined") && (this.form != null) )
	{
		this.searchRequiredFields() ; // BUSCA CAMPOS REQUERIDOS
		
		this.addButtonEventHandler() ; // AGREGA EL HANDLER AL EVENTO CLICK DEL BOTON
	}
}

// BUSCA EL FORMULARIO QUE TENGA ID 'VALIDABLE' Y RETORNA EL FORMULARIO
Validator.prototype.getForm = function () {
									return document.getElementById('validable');
									
								 } ;
// BUSCA LOS CAMPOS REQUERIDOS
Validator.prototype.searchRequiredFields = function () {
											 var count = 0 ;
											 
											 for ( i = 0 ; i < this.form.elements.length ; i++ )
											 {
												 //	SI EL NOMBRE DE LA CLASE DEL CAMPO ES 'REQUIRED', EL CAMPO ES REQUERIDO																						
												 if  ( (typeof this.form.elements[i].className != "undefined") && (this.form.elements[i].className.search("notValidable") == -1) ) 
												 {
													// AGREGAMOS UN CAMPO VALIDABLE AL ARREGLO																							
													this.validables[count] = this.form.elements[i] ; 
													// ENVIAMOS EL CAMPO A LA FUNCION DE VERIFICACION DE HANDLERS REQUERIDOS	
													this.addNeededEventHandler(this.validables[count]) ;
													
													count++ ;
													
												 }
											 }												 
										   } ;
// AGREGA EL HANDLER AL BOTON PARA EL EVENTO 'CLICK'										   
Validator.prototype.addButtonEventHandler = function () {

												this.form.onsubmit = function (e) {
																				return validInst.checkRequiredFields(e) ;
																				 };
							
											} ;
// VERIFICA EL VALOR Y EL ESTADO DE LOS CAMPOS REQUERIDOS LUEGO DEL EVENTO 'CLICK' DEL BOTON
Validator.prototype.checkRequiredFields = function (e) {
												var actualElement = '' ;
												this.validatorMsg = '' ;
												this.valid        = true ; // FORMULARIO VALIDO POR DEFECTO
												
												// RECORRE EL ARREGLO DE CAMPOS REQUERIDOS 
												for(field in this.validables)
												{
													actualElement   = this.validables[field] ; // DEFINE EL ELEMENTO ACTUAL
													var actualValid = true ; // CAMPO ACTUAL POR DEFECTO VALIDO
													var extra       = '' ; // VARIABLE VACIA PARA DATO EXTRA DEL CAMPO NO VALIDO

													// SWITCH POR TIPO DE CAMPO
													switch (actualElement.type){
														case 'text':
															// VERIFICAR SI EL CAMPO ESTA VACIO
															if((actualElement.value == "") && (actualElement.className.search("optional") == -1))
															{
																this.valid = false ; // CAMBIA EL ESTADO DEL FORMULARIO 
																					 // A INVALIDO
																
																actualValid = false ; // CAMBIA EL ESTADO DEL CAMPO ACTUAL
																					  // A INVALIDO
																
																extra = 'Campo Vacio' ; // INFORMACION EXTRA DEL CAMPO INVALIDO
																
															}
															// VERIFICAR SI E� CAMPO TIENE DATO EXTRA DE EMAIL
															else if(actualElement.className.search("email") > -1)
															{
																// VERIFICA SI LA FUNCION VERIFICADORA DE ESTRUCTURA DE MAIL
																// RETORNA VERDADERO O FALSO
																if(!this.checkEmail(actualElement.value))
																{
																	this.valid = false ; 
																						 
																	actualValid = false ; 
																						  
																	extra = 'Formato Invalido' ;
																}
															}
															else if(actualElement.className.search("retype") > -1)
															{
																// VERIFICA SI LA FUNCION VERIFICADORA DE ESTRUCTURA DE MAIL
																// RETORNA VERDADERO O FALSO
																if(actualElement.value != document.getElementById(actualElement.alt).value)
																{
																	this.valid = false ; 
																						 
																	actualValid = false ; 
																						  
																	extra = 'No coincide con el valor de ' + document.getElementById(actualElement.alt).title;
																}
															}	
														break;
														case 'select-one':
															// RECORRE CADA OPCION DEL CAMPO SELECT
															for(i=0;i<actualElement.options.length;i++)
															{	
																// ENTRA SI EL CAMPO ESTA SELECCIONADO
																if(actualElement.options[i].selected == true)
																{
																	// VERIFICA SI EL VALOR DEL CAMPO ACTUAL ES 'NULL'
																	if(actualElement.options[i].value == 'NULL')
																	{
																		this.valid = false ;
																		actualValid = false ;
																		extra = 'Ninguna Opcion Seleccionada' ;
																	}
																	break;
																}
															}
														break;
														case 'textarea':
															// VERIFICAR SI EL CAMPO ESTA VACIO
															if(actualElement.value == "")
															{
																this.valid = false ;
																actualValid = false ;
																extra = 'Campo Vacio' ;
																
															}
														break;
														case 'password':
															if((actualElement.value == "") && (actualElement.className.search("optional") == -1))
															{
																this.valid = false ; // CAMBIA EL ESTADO DEL FORMULARIO 
																					 // A INVALIDO
																
																actualValid = false ; // CAMBIA EL ESTADO DEL CAMPO ACTUAL
																					  // A INVALIDO
																
																extra = 'Campo Vacio' ; // INFORMACION EXTRA DEL CAMPO INVALIDO
																
															}														
															else if(actualElement.className.search("retype") > -1)
															{
																// VERIFICA SI LA FUNCION VERIFICADORA DE ESTRUCTURA DE MAIL
																// RETORNA VERDADERO O FALSO
																if(!((document.getElementById(actualElement.alt).className.search("optional") > -1) && (document.getElementById(actualElement.alt).value == "")))
																{
																	if(actualElement.value != document.getElementById(actualElement.alt).value)
																	{
																		this.valid = false ; 
																							 
																		actualValid = false ; 
																							  
																		extra = 'No coincide con el valor de ' + document.getElementById(actualElement.alt).title;
																	}
																}
															}	
															else if((actualElement.className.search("minimum") > -1) && (actualElement.value != ""))
															{
																// VERIFICA SI LA FUNCION VERIFICADORA DE ESTRUCTURA DE MAIL
																// RETORNA VERDADERO O FALSO
																if(actualElement.value.length < actualElement.alt)
																{
																	this.valid = false ; 
																						 
																	actualValid = false ; 
																						  
																	extra = 'Numero de caracteres menor a ' + actualElement.alt;
																}
															}																
														break;
														case 'checkbox':
															if(actualElement.className.search("accept") > -1)
															{
																// VERIFICA SI LA FUNCION VERIFICADORA DE ESTRUCTURA DE MAIL
																// RETORNA VERDADERO O FALSO
																if(actualElement.checked == false)
																{
																	this.valid = false ; 
																						 
																	actualValid = false ; 
																						  
																	extra = 'Debe aceptar los terminos y condiciones para continuar' ;
																}
															}														
														break;
														case 'file':
															// VERIFICAR SI EL CAMPO ESTA VACIO
															if(actualElement.value == "")
															{
																this.valid = false ; // CAMBIA EL ESTADO DEL FORMULARIO 
																					 // A INVALIDO
																
																actualValid = false ; // CAMBIA EL ESTADO DEL CAMPO ACTUAL
																					  // A INVALIDO
																
																extra = 'Campo Vacio' ; // INFORMACION EXTRA DEL CAMPO INVALIDO
																
															}													
														break;														
													}
													// ENTRA SI EL CAMPO ACTUAL NO ES VALIDO
													if(!actualValid)
													{
														// CONSTRUYE EL MENSAJE QUE SALE SI EL FORMULARIO NO ES VALIDO
														this.validatorMsg += '- ' + actualElement.title ;
														
														// VERIFICA SI TIENE QUE SACAR LA INFORMACION EXTRA DEL CAMPO ACTUAL
														if(this.extra)
															this.validatorMsg += '. ' + extra + ' ' ;
														
														this.validatorMsg += '{linebreak}' ;
													}
												}
												// ENTRA SI EL FORMULARIO NO ES VALIDO
												if(!this.valid) 
												{
													// TIRA LA ALERTA
													this.throwAlert() ;
													return false;
												}
											} ;
 // FUNCION QUE VERIFICA LA ESTRUCTURA DEL MAIL	
 Validator.prototype.checkEmail = function(elementValue) {

									var at="@"
									var dot="."
									var lat=elementValue.indexOf(at)
									var lstr=elementValue.length
									var ldot=elementValue.indexOf(dot)
									if (elementValue.indexOf(at)==-1){
									   return false
									}
									if (elementValue.indexOf(at)==-1 || elementValue.indexOf(at)==0 || elementValue.indexOf(at)==lstr){
									   return false
									}
									if (elementValue.indexOf(dot)==-1 || elementValue.indexOf(dot)==0 || elementValue.indexOf(dot)==lstr){
									   return false
									}
                                    if (elementValue.indexOf(at,(lat+1))!=-1){
									   return false
									}
									if (elementValue.substring(lat-1,lat)==dot || elementValue.substring(lat+1,lat+2)==dot){
									   return false
									}
								    if (elementValue.indexOf(dot,(lat+2))==-1){
									   return false
									}
									
									if (elementValue.indexOf(" ")!=-1){
									   return false
									}
								
									return true					
								} ;
								
// AGREGA LOS HANDLERS NECESARIOS A CAMPOS DE VERIFICACION
Validator.prototype.addNeededEventHandler = function(element) {
												// SWITCH CON EL TAG 'ALT' DEL CAMPO
												if (element.className.search('text-only') > -1){
													// AGREGA LA FUNCION DE VERIFICACION DE SOLO TEXTO AL EVENTO 'KEYPRESS'
													element.onkeypress = function (e) {
																			return	validInst.validateText(e) ;
																};
	
												}
												else if (element.className.search('numeric') > -1) {
													// AGREGA LA FUNCION DE VERIFICACION DE SOLO NUMEROS AL EVENTO 'KEYPRESS'
													element.onkeypress =	function (e) {
																			 return	validInst.validateNumber(e) ;
																			};
												}
											} ;
											
// VALIDA QUE EL CAMPO TENGA SOLO TEXTO
Validator.prototype.validateText = function (e) {
		
									// REVISA QUE TECLA SE PRESIONO UTILIZANDO EL EVENTO LANZADO
									var key = (e) ? e.which : window.event.keyCode;
									
									// ENTRA SI LA TECLA NO ES SOLO TEXTO
									if ((key < 65 && key != 32 && key != 46 & key != 8 & key != 0) || key > 122 || (key > 90 && key < 97)) 
											return false;

									return true;  
									} ;

// VALIDA QUE EL CAMPO TENGA SOLO NUMEROS
Validator.prototype.validateNumber = function (e) {
									
									// REVISA QUE TECLA SE PRESIONO UTILIZANDO EL EVENTO LANZADO
									var key = (e) ? e.which : window.event.keyCode;

									// ENTRA SI LA TECLA NO ES SOLO NUMEROS
									if (key > 31 && (key < 48 || key > 57))	
											return false;
	
									return true;  
									} ;

// FUNCION QUE TIRA LA ALERTA
Validator.prototype.throwAlert = function()
								{
									// INSTANCIA LA VARIABLE MENSAJE CON UN TEXTO
									var msg = 'Hay errores en los datos ingresados:'
									// HACE UN SWITCH CON EL TIPO DE ALERTA QUE SE HAYA ESTABLECIDO (1 - HTML, 2 - ALERTA)
									switch(this.msgAlertType) 
									{
										case 1:
												// CONSTRUYE EL MENSAJE CON LOS CAMPOS INVALIDOS 
												// Y REMPLZA EL {LINEBREAK} POR \R\N
												// msg += '\r\n' + this.validatorMsg.replace(/{linebreak}/g, "\r\n");					
												// alert(msg) ;
												// console.log(msg) ;
												$('.nopadding').prepend('<div class="alert-box error">' + msg + '<a href="#" class="close">×</a> </div>').show();
										break;
										case 2:
											var target = document.getElementById(this.div);
											
											// MUESTRA EL DIV SI ESTA ESCONDIDO
											if(target.style.display == 'none')
											{
												target.style.display = '';
											}
											console.log(msg);
											// CONSTRUYE EL MENSAJE CON LOS CAMPOS INVALIDOS 
											// Y REMPLZA EL {LINEBREAK} POR <BR/>	
											target.innerHTML = msg + '<br>' + this.validatorMsg.replace(/{linebreak}/g, "<br/>");	
											
										break;
									}
								} ;
$(document).ready(function () { validInst = new Validator(1, '', true); });