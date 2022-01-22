<script type="text/javascript">
		
		// DO NOT REMOVE : GLOBAL FUNCTIONS!
		
		$(document).ready(function() {
			
			pageSetUp();
			var errorClass = 'invalid';
			var errorElement = 'em';
			
			var $checkoutForm = $('#checkout-form').validate({
				errorClass		: errorClass,
				errorElement	: errorElement,
				highlight: function(element) {
			        $(element).parent().removeClass('state-success').addClass("state-error");
			        $(element).removeClass('valid');
			    },
			    unhighlight: function(element) {
			        $(element).parent().removeClass("state-error").addClass('state-success');
			        $(element).addClass('valid');
			    },

			// Rules for form validation
				rules : {
					fname : {
						required : true
					},
					lname : {
						required : true
					},
					email : {
						required : true,
						email : true
					},
					phone : {
						required : true
					},
					country : {
						required : true
					},
					city : {
						required : true
					},
					code : {
						required : true,
						digits : true
					},
					address : {
						required : true
					},
					name : {
						required : true
					},
					card : {
						required : true,
						creditcard : true
					},
					cvv : {
						required : true,
						digits : true
					},
					month : {
						required : true
					},
					year : {
						required : true,
						digits : true
					}
				},
		
				// Messages for form validation
				messages : {
					fname : {
						required : 'Por favor ingrese sus Nombres'
					},
					lname : {
						required : 'Por favor ingrese sus Apellidos'
					},
					email : {
						required : 'Por favor ingrese su Email',
						email : 'Por favor ingrese un Email VALIDO'
					},
					phone : {
						required : 'Por favor ingrese su numero telefonico'
					},
					country : {
						required : 'Por favor seleccione un Pais'
					},
					city : {
						required : 'Por favor seleccione una Ciudad'
					},
					code : {
						required : 'Please enter code',
						digits : 'Digits only please'
					},
					address : {
						required : 'Por favor ingrese su direccion completa'
					},
					name : {
						required : 'Please enter name on your card'
					},
					card : {
						required : 'Please enter your card number'
					},
					cvv : {
						required : 'Enter CVV2',
						digits : 'Digits only'
					},
					month : {
						required : 'Seleccione mes'
					},
					year : {
						required : 'Ingrese Año',
						digits : 'Solo digitos por favor'
					}
				},
		
				// Do not change code below
				errorPlacement : function(error, element) {
					error.insertAfter(element.parent());
				}
			});
					
			var $registerForm = $("#smart-form-register").validate({
				errorClass		: errorClass,
				errorElement	: errorElement,
				highlight: function(element) {
			        $(element).parent().removeClass('state-success').addClass("state-error");
			        $(element).removeClass('valid');
			    },
			    unhighlight: function(element) {
			        $(element).parent().removeClass("state-error").addClass('state-success');
			        $(element).addClass('valid');
			    },
	
				// Rules for form validation
				rules : {
					username : {
						required : true
					},
					email : {
						required : true,
						email : true
					},
					password : {
						required : true,
						minlength : 3,
						maxlength : 20
					},
					passwordConfirm : {
						required : true,
						minlength : 3,
						maxlength : 20,
						equalTo : '#password'
					},
					firstname : {
						required : true
					},
					lastname : {
						required : true
					},
					gender : {
						required : true
					},
					terms : {
						required : true
					}
				},
	
				// Messages for form validation
				messages : {
					login : {
						required : 'Por favor ingrese su login'
					},
					email : {
						required : 'Por favor ingrese su Email',
						email : 'Por favor ingrese un Email VALIDO'
					},
					password : {
						required : 'Por favor ingrese su Password'
					},
					passwordConfirm : {
						required : 'Please enter your password one more time',
						equalTo : 'Please enter the same password as above'
					},
					firstname : {
						required : 'Please select your first name'
					},
					lastname : {
						required : 'Please select your last name'
					},
					gender : {
						required : 'Please select your gender'
					},
					terms : {
						required : 'You must agree with Terms and Conditions'
					}
				},
	
				// Do not change code below
				errorPlacement : function(error, element) {
					error.insertAfter(element.parent());
				}
			});
	
			var $reviewForm = $("#review-form").validate({
				errorClass		: errorClass,
				errorElement	: errorElement,
				highlight: function(element) {
			        $(element).parent().removeClass('state-success').addClass("state-error");
			        $(element).removeClass('valid');
			    },
			    unhighlight: function(element) {
			        $(element).parent().removeClass("state-error").addClass('state-success');
			        $(element).addClass('valid');
			    },
				// Rules for form validation
				rules : {
					name : {
						required : true
					},
					email : {
						required : true,
						email : true
					},
					review : {
						required : true,
						minlength : 20
					},
					quality : {
						required : true
					},
					reliability : {
						required : true
					},
					overall : {
						required : true
					}
				},
	
				// Messages for form validation
				messages : {
					name : {
						required : 'Por favor ingrese sus Nombres'
					},
					email : {
						required : 'Por favor ingrese su Email',
						email : '<i class="fa fa-warning"></i><strong>Por favor ingrese un Email VALIDO</strong>'
					},
					review : {
						required : 'Please enter your review'
					},
					quality : {
						required : 'Please rate quality of the product'
					},
					reliability : {
						required : 'Please rate reliability of the product'
					},
					overall : {
						required : 'Please rate the product'
					}
				},
	
				// Do not change code below
				errorPlacement : function(error, element) {
					error.insertAfter(element.parent());
				}
			});
			
			var $commentForm = $("#comment-form").validate({
				errorClass		: errorClass,
				errorElement	: errorElement,
				highlight: function(element) {
			        $(element).parent().removeClass('state-success').addClass("state-error");
			        $(element).removeClass('valid');
			    },
			    unhighlight: function(element) {
			        $(element).parent().removeClass("state-error").addClass('state-success');
			        $(element).addClass('valid');
			    },
				// Rules for form validation
				rules : {
					name : {
						required : true
					},
					email : {
						required : true,
						email : true
					},
					url : {
						url : true
					},
					comment : {
						required : true
					}
				},
	
				// Messages for form validation
				messages : {
					name : {
						required : 'Ingrese su Nombre',
					},
					email : {
						required : 'Ingrese su Email',
						email : 'Ingrese Email VALIDO'
					},
					url : {
						email : 'Ingrese un URL VALIDO'
					},
					comment : {
						required : 'Please enter your comment'
					}
				},
	
				// Ajax form submition
				submitHandler : function(form) {
					$(form).ajaxSubmit({
						success : function() {
							$("#comment-form").addClass('submited');
						}
					});
				},
	
				// Do not change code below
				errorPlacement : function(error, element) {
					error.insertAfter(element.parent());
				}
			});
	
			var $contactForm = $("#contact-form").validate({
				errorClass		: errorClass,
				errorElement	: errorElement,
				highlight: function(element) {
			        $(element).parent().removeClass('state-success').addClass("state-error");
			        $(element).removeClass('valid');
			    },
			    unhighlight: function(element) {
			        $(element).parent().removeClass("state-error").addClass('state-success');
			        $(element).addClass('valid');
			    },
				// Rules for form validation
				rules : {
					name : {
						required : true
					},
					email : {
						required : true,
						email : true
					},
					message : {
						required : true,
						minlength : 10
					}
				},
	
				// Messages for form validation
				messages : {
					name : {
						required : 'Por favor ingrese su Nombre',
					},
					email : {
						required : 'Por favor ingrese su Email',
						email : 'Por favor ingrese Email VALIDO'
					},
					message : {
						required : 'Please enter your message'
					}
				},
	
				// Ajax form submition
				submitHandler : function(form) {
					$(form).ajaxSubmit({
						success : function() {
							$("#contact-form").addClass('submited');
						}
					});
				},
	
				// Do not change code below
				errorPlacement : function(error, element) {
					error.insertAfter(element.parent());
				}
			});
	
			var $loginForm = $("#login-form").validate({
				errorClass		: errorClass,
				errorElement	: errorElement,
				highlight: function(element) {
			        $(element).parent().removeClass('state-success').addClass("state-error");
			        $(element).removeClass('valid');
			    },
			    unhighlight: function(element) {
			        $(element).parent().removeClass("state-error").addClass('state-success');
			        $(element).addClass('valid');
			    },
				// Rules for form validation
				rules : {
					email : {
						required : true,
						email : true
					},
					password : {
						required : true,
						minlength : 3,
						maxlength : 20
					}
				},
	
				// Messages for form validation
				messages : {
					email : {
						required : 'Por favor ingrese su Email',
						email : 'Por favor ingrese Email VALIDO'
					},
					password : {
						required : 'Por favor ingrese Password'
					}
				},
	
				// Do not change code below
				errorPlacement : function(error, element) {
					error.insertAfter(element.parent());
				}
			});
	
			var $orderForm = $("#order-form").validate({
				errorClass		: errorClass,
				errorElement	: errorElement,
				highlight: function(element) {
			        $(element).parent().removeClass('state-success').addClass("state-error");
			        $(element).removeClass('valid');
			    },
			    unhighlight: function(element) {
			        $(element).parent().removeClass("state-error").addClass('state-success');
			        $(element).addClass('valid');
			    },
				// Rules for form validation
				rules : {
					name : {
						required : true
					},
					email : {
						required : true,
						email : true
					},
					phone : {
						required : true
					},
					interested : {
						required : true
					},
					budget : {
						required : true
					}
				},
	
				// Messages for form validation
				messages : {
					name : {
						required : 'Please enter your name'
					},
					email : {
						required : 'Por favor ingrese su Email',
						email : 'Por favor ingrese Email VALIDO'
					},
					phone : {
						required : 'Please enter your phone number'
					},
					interested : {
						required : 'Please select interested service'
					},
					budget : {
						required : 'Please select your budget'
					}
				},
	
				// Do not change code below
				errorPlacement : function(error, element) {
					error.insertAfter(element.parent());
				}
			});
	
			// START AND FINISH DATE
			$('#startdate').datepicker({
				dateFormat : 'dd.mm.yy',
				prevText : '<i class="fa fa-chevron-left"></i>',
				nextText : '<i class="fa fa-chevron-right"></i>',
				onSelect : function(selectedDate) {
					$('#finishdate').datepicker('option', 'minDate', selectedDate);
				}
			});
			
			$('#finishdate').datepicker({
				dateFormat : 'dd.mm.yy',
				prevText : '<i class="fa fa-chevron-left"></i>',
				nextText : '<i class="fa fa-chevron-right"></i>',
				onSelect : function(selectedDate) {
					$('#startdate').datepicker('option', 'maxDate', selectedDate);
				}
			});


		
		})

		</script>